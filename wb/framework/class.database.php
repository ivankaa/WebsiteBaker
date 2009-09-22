<?php

// $Id$

/*

 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2008, Ryan Djurovich

 Website Baker is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Website Baker is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Website Baker; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

/*

Database class

This class will be used to interface between the database
and the Website Baker code

*/

/**
 *	Stop this file from being accessed directly
 */
if ( !defined('WB_URL') ) die (header('location: ../index.php') );


/**
 *	Modifications on this file made by
 *	- Dietrich Roland Pehlke (aldus)
 *		
 *	@version	2.2.2
 *	@date		2009-01-09
 *	@state		beta
 *	@require	php 5.2.x
 *	@package	Website Baker - framework: class.database
 *
 *	0.2.2	add "type" to mysql-fetchRow method
 *
 *	0.2.1	add new class functions "copy_content" and "fetch_query".
 */
define('DATABASE_CLASS_LOADED', true);

class database {
	
	public $mySQL_handle	= 0;
	public $db_handle		= 0;
	public $connected		= 0;
	public $status			= 0;
	public $log_querys		= false;
	public $log_filename	= "wb_querys.log";
	public $log_path		= "";
	public $last_query		= "";
	public $last_jobnumber	= 0;
	
	public $error_tmpl  = "
	<span style='font-family:Verdana, sans-serif;font-size:11px;display:block; width:400px;'>
	An error has occured:<br />
	Job: <b><font color='#990000'>{job}</font></b><br />
	Message: <i><font color='#990000'>{message}</font></i><br />
	</span>";
	
	public $error = 0;
	
	public function __construct ($url="") {
		$this->database($url);
		$this->mySQL_handle = new c_mysql();
	}
	
	/**
	 *	Set DB_URL
	 */
	public function database($url = '') {
		// Connect to database
		$this->connect();
		// Check for database connection error
		if($this->is_error()) {
			die($this->get_error());
		}
	}
	
	/**
	 *	Connect to the database
	 */
	public function connect() {
		$this->status = $this->db_handle = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
		if(mysql_error()) {
			$this->connected = false;
			$this->error = mysql_error();
		} else {
			if(!mysql_select_db(DB_NAME)) {
				$this->connected = false;
				$this->error = mysql_error();
			} else {
				$this->connected = true;
			}
		}
		return $this->connected;
	}
	
	/**
	 *	Disconnect from the database
	 */
	public function disconnect() {
		if($this->connected==true) {
			mysql_close( $this->db_handle );
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 *	Run a query
	 */
	public function query( $statement="", $aJobNumber = 0 ) {
		$this->last_query = $statement;
		$this->last_jobnumber = $aJobNumber;
		if (true == $this->log_querys) $this->__write_log();
		$this->mySQL_handle->query($statement);
		$this->set_error($this->mySQL_handle->error());
		if($this->mySQL_handle->error()) {
			if (true == $this->log_querys) {
				$this->last_query = "Error: ".$this->mySQL_handle->error();
				$this->__write_log();
			}
			$this->__display_error();
			return null;
		} else {
			return clone $this->mySQL_handle;
		}
	}
	
	/**
	 *
	 *
	 */
	public function fetch_query ($aQuery="", $aNumber=0) {
		$result = $this->query($aQuery, $aNumber);
		if (!$result) return false;
		
		if ($result->numRows() > 0) {
			return $result->fetchRow();
		} else {
			return false;
		}
	}
	
	/**
	 *	Gets the first column of the first row
	 */
	public function get_one($statement) {
		$fetch_row = mysql_fetch_row(mysql_query($statement));
		$result = $fetch_row[0];
		$this->set_error(mysql_error());
		if(mysql_error()) {
			return null;
		} else {
			return $result;
		}
	}
	
	/**
	 *	Set the DB error
	 */
	public function set_error($message = null) {
		global $TABLE_DOES_NOT_EXIST, $TABLE_UNKNOWN;
		$this->error = $message;
		if(strpos($message, 'no such table')) {
			$this->error_type = $TABLE_DOES_NOT_EXIST;
		} else {
			$this->error_type = $TABLE_UNKNOWN;
		}
	}
	
	/**
	 *	Return true if there was an error
	 */
	public function is_error() {
		return ( 0 <> $this->error ) ? true : false;
	}
	
	/**
	 *	Return the error
	 */
	public function get_error() {
		return $this->error;
	}
	
	/**
	 *	Copy a content of a given table to another entry of the table
	 *
	 *	@param	string	The tablename
	 *	@param	string	The source condition, e.g. "page_id=23"
	 *	@param	string	The target condition, e.g. "page_id=33"
	 *	@param	mixed	The exeptions, the field, that should not copied; e.g. "page_id". Could be also an array.
	 *	@param	integer	An optional Jobnumber for debugging.
	 *	@param	bool	Debugmode to display the final querys on screen instead of execute them
	 *
	 *	@return	bool	true if all's ok.
	 *
	 */
	public function copy_content ($aTableName="", $aSourceCondition="", $aTargetCondition="", $aException="", $aJobNum=3100, $debug=false) {
		if (!is_array($aException)) $aException = array ($aException);
		$all_fields = mysql_list_fields( DB_NAME, $aTableName);
		$n = mysql_num_fields($all_fields);
		if ($n == 0) die ("Error: no fields found in ".$aTableName);
		$i=0;
		$all_names = array();
		while($i < $n) {
			$field_name = mysql_field_name($all_fields, $i++);
			if (!in_array ($field_name, $aException) ) $all_names[] = $field_name; 
		}
		
		$result = $this->query ("SELECT ".implode(", ",$all_names)." from ". $aTableName ." where ".$aSourceCondition, 3000 );
		$data = $result->fetchRow();
		if (false === $debug) {
			foreach ($all_names as $c => $item) $this->query ("UPDATE ". $aTableName ." set ". $item ."='" .$data[ $item ]."' where ".$aTargetCondition, ($aJobNum + (integer)$c));
		} else {
			foreach ($all_names as $c => $item) echo "UPDATE ". $aTableName ." set ". $item ."='" .$data[ $item ]."' where ".$aTargetCondition."<br />";
			die();
		}
		return true;
	}
	
	/**
	 *	Simple way to log the querys for debugging
	 */
	public function __write_log () {
	
		$path = ($this->log_path == "") ? WB_PATH."/framework/" : $this->log_path;
		$fp = fopen($path.$this->log_filename, 'a');
			
		if ($fp) {
			$str = "\n## ".DATE("Y-m-d H:i:s", TIME())." --------------\n".str_replace( array("\n", "\t", "\r"), array("", "", ""), $this->last_query);
			$str .= "\n";
			
			fwrite($fp, $str, strlen($str) );
			fclose($fp);
		}
	}
	
	public function __display_error() {
		ob_end_flush();
		if ($this->last_jobnumber == 0) $this->last_jobnumber = "0 (no job-number specified)";
		$msg = str_replace (
			array ('{job}', '{message}'), 
			array ($this->last_jobnumber, $this->error), 
			$this->error_tmpl 
		);
		
		die ($msg);
	}
	
}

class c_mysql {

	public $result 	= 0;
	public $error	= 0;
	
	/**
	 *	Run a query
	 */
	public function query($statement) {
		$this->result = mysql_query($statement);
		$this->error = mysql_error();
		return $this->result;
	}
	
	/**
	 *	Fetch num rows
	 */
	public function numRows() {
		return mysql_num_rows($this->result);
	}
	
	/**
	 *	Fetch row
	 *	
	 *	@param string	typ	One of the following
	 *						MYSQL_ASSOC, MYSQL_NUM, MYSQL_BOTH
	 */
	public function fetchRow($typ = MYSQL_BOTH) {
		return mysql_fetch_array($this->result);
	}
	
	/**
	 *	Get error
	 */
	public function error() {
		if ( ( 0 <> $this->error ) AND (is_string($this->error) ) ) {
			return $this->error;
		} else {
			return null;
		}
	}
}

?>