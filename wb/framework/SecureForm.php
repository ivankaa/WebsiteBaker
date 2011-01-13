<?php
/**
 *
 * @category        framework
 * @package         SecureForm
 * @author          Independend-Software-Team
 * @author          WebsiteBaker Project
 * @copyright       2004-2009, Ryan Djurovich
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id$
 * @filesource		$HeadURL$
 * @lastmodified    $Date$
 * @description     
 */

class SecureForm {

	const FRONTEND = 0;
	const BACKEND  = 1;

	private $_FTAN        = '';
	private $_IDKEYs      = array('0'=>'0');
	private $_ftan_name   = '';
	private $_idkey_name  = '';
	private $_salt        = '';
	private $_fingerprint = '';

/* Construtor */
	protected function __construct($mode = self::FRONTEND)
	{
		$this->_FTAN  = '';
		$this->_salt = $this->_generate_salt();
		$this->_fingerprint = $this->_generate_fingerprint();
	// generate names for session variables
		$this->_ftan_name = substr($this->_fingerprint, -(16 + hexdec($this->_fingerprint[0])), 16);
	// make sure there is a alpha-letter at first position
		$this->_ftan_name[0] = dechex(10 + (hexdec($this->_ftan_name[0]) % 5));
		$this->_idkey_name = substr($this->_fingerprint, hexdec($this->_fingerprint[strlen($this->_fingerprint)-1]), 16);
	// make sure there is a alpha-letter at first position
		$this->_idkey_name[0] = dechex(10 + (hexdec($this->_idkey_name[0]) % 5));
	// takeover id_keys from session if available
		if(isset($_SESSION[$this->_idkey_name]) && is_array($_SESSION[$this->_idkey_name]))
		{
			$this->_IDKEYs = $_SESSION[$this->_idkey_name];
		}else{
			$this->_IDKEYs = array('0'=>'0');
			$_SESSION[$this->_idkey_name] = $this->_IDKEYs;
		}
	}

	private function _generate_salt()
	{
		if(function_exists('microtime'))
		{
			list($usec, $sec) = explode(" ", microtime());
			$salt = (string)((float)$usec + (float)$sec);
		}else{
			$salt = (string)time();
		}
		$salt = (string)rand(10000, 99999) . $salt . (string)rand(10000, 99999);
		return md5($salt);
	}

	private function _generate_fingerprint()
	{
	// server depending values
 		$fingerprint  = ( isset($_SERVER['SERVER_SIGNATURE']) ) ? $_SERVER['SERVER_SIGNATURE'] : '2';
		$fingerprint .= ( isset($_SERVER['SERVER_SOFTWARE']) ) ? $_SERVER['SERVER_SOFTWARE'] : '3';
		$fingerprint .= ( isset($_SERVER['SERVER_NAME']) ) ? $_SERVER['SERVER_NAME'] : '5';
		$fingerprint .= ( isset($_SERVER['SERVER_ADDR']) ) ? $_SERVER['SERVER_ADDR'] : '7';
		$fingerprint .= ( isset($_SERVER['SERVER_PORT']) ) ? $_SERVER['SERVER_PORT'] : '11';
		$fingerprint .= ( isset($_SERVER['SERVER_ADMIN']) ) ? $_SERVER['SERVER_ADMIN'] : '13';
		$fingerprint .= PHP_VERSION;
	// client depending values
		$fingerprint .= ( isset($_SERVER['HTTP_ACCEPT']) ) ? $_SERVER['HTTP_ACCEPT'] : '17';
		$fingerprint .= ( isset($_SERVER['HTTP_ACCEPT_CHARSET']) ) ? $_SERVER['HTTP_ACCEPT_CHARSET'] : '19';
		$fingerprint .= ( isset($_SERVER['HTTP_ACCEPT_ENCODING']) ) ? $_SERVER['HTTP_ACCEPT_ENCODING'] : '23';
		$fingerprint .= ( isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : '29';
		$fingerprint .= ( isset($_SERVER['HTTP_CONNECTION']) ) ? $_SERVER['HTTP_CONNECTION'] : '31';
		$fingerprint .= ( isset($_SERVER['HTTP_USER_AGENT']) ) ? $_SERVER['HTTP_USER_AGENT'] : '37';
		$fingerprint .= ( isset($_SERVER['REMOTE_ADDR']) ) ? $_SERVER['REMOTE_ADDR'] : '41';
		return md5($fingerprint);
	}

	private function _calcFtan($tanPart)
	{
		$ftan = md5($tanPart . $this->_fingerprint);
		$name = substr($ftan, -(16 + hexdec($ftan[0])), 16);
		$name[0] = dechex(10 + (hexdec($name[0]) % 5));
		$value = substr($ftan, hexdec($ftan[strlen($ftan)-1]), 16);
		return array( $name, $value);
	}
/*
 * creates Formular transactionnumbers for unique use
 * @access public
 * @param bool $asTAG: true returns a complete prepared, hidden HTML-Input-Tag (default)
 *                    false returns an array including FTAN0 and FTAN1
 * @return mixed:      array or string
 *
 * requirements: an active session must be available
 */
	final public function getFTAN( $as_tag = true)
	{
		if( $this->_FTAN == '')
		{ // if no FTAN exists, create new one from time and salt
			$this->_FTAN = md5($this->_fingerprint.$this->_salt);
			$_SESSION[$this->_ftan_name] = $this->_FTAN; // store FTAN into session
		}
		$ftan = $this->_calcFtan($this->_FTAN);
		if($as_tag == true)
		{ // by default return a complete, hidden <input>-tag
			return '<input type="hidden" name="'.$ftan[0].'" value="'.$ftan[1].'" title="" alt="" />';
		}else{ // return an array with raw FTAN0 and FTAN1
			return array('FTAN0' => $ftan[0], 'FTAN1'=>$ftan[1]);
		}
	}

/*
 * checks received form-transactionnumbers against session-stored one
 * @access public
 * @param string $mode: requestmethode POST(default) or GET
 * @return bool:    true if numbers matches against stored ones
 *
 * requirements: an active session must be available
 * this check will prevent from multiple sending a form. history.back() also will never work
 */
	final public function checkFTAN( $mode = 'POST')
	{
		$retval = false;
		if(isset($_SESSION[$this->_ftan_name]) &&
		   (strlen($_SESSION[$this->_ftan_name]) == strlen(md5('dummy'))))
		{
			$ftan = $this->_calcFtan($_SESSION[$this->_ftan_name]);
			unset($_SESSION[$this->_ftan_name]);
			$mode = (strtoupper($mode) != 'POST' ? '_GET' : '_POST');
			if( isset($GLOBALS[$mode][$ftan[0]]))
			{
				$retval = ($GLOBALS[$mode][$ftan[0]] == $ftan[1]);
				unset($GLOBALS[$mode][$ftan[0]]);
			}
		}
		return $retval;
	}

/*
 * save values in session and returns a ID-key
 * @access public
 * @param mixed $value: the value for witch a key shall be generated and memorized
 * @return string:      a MD5-Key to use instead of the real value
 *
 * @requirements: an active session must be available
 * @description: IDKEY can handle string/numeric/array - vars. Each key is a
 */
	final public function getIDKEY($value)
	{
		if( is_array($value) == true )
		{ // serialize value, if it's an array
			$value = serialize($value);
		}
		// crypt value with salt into md5-hash
		// and return a 16-digit block from random start position
		$key = substr( md5($this->_salt.(string)$value), rand(0,15), 16);
		do{ // loop while key/value isn't added
			if( !array_key_exists($key, $this->_IDKEYs) )
			{ // the key is unique, so store it in list
				$this->_IDKEYs[$key] = $value;
				break;
			}else {
				// if key already exist, increment the last five digits until the key is unique
				$key = substr($key, 0, -5).dechex(('0x'.substr($key, -5)) + 1);
			}
		}while(0);
		// store key/value-pairs into session
		$_SESSION[$this->_idkey_name] = $this->_IDKEYs;
		return $key;
	}

/*
 * search for key in session and returns the original value
 * @access public
 * @param string $fieldname: name of the POST/GET-Field containing the key or hex-key itself
 * @param mixed $default: returnvalue if key not exist (default 0)
 * @param string $request: requestmethode can be POST or GET or '' (default POST)
 * @return mixed: the original value (string, numeric, array) or DEFAULT if request fails
 *
 * @requirements: an active session must be available
 * @description: each IDKEY can be checked only once. Unused Keys stay in list until the
 *               session is destroyed.
 */
 	final public function checkIDKEY( $fieldname, $default = 0, $request = 'POST' )
	{
		$return_value = $default; // set returnvalue to default
		switch( strtoupper($request) )
		{
			case 'POST':
				$key = isset($_POST[$fieldname]) ? $_POST[$fieldname] : $fieldname;
				break;
			case 'GET':
				$key = isset($_GET[$fieldname]) ? $_GET[$fieldname] : $fieldname;
				break;
			default:
				$key = $fieldname;
		}
		if( preg_match('/[0-9a-f]{16}$/', $key) )
		{ // key must be a 16-digit hexvalue
			if( array_key_exists($key, $this->_IDKEYs))
			{ // check if key is stored in IDKEYs-list
				$return_value = $this->_IDKEYs[$key]; // get stored value
				unset($this->_IDKEYs[$key]);   // remove from list to prevent multiuse
				$_SESSION[$this->_idkey_name] = $this->_IDKEYs; // save modified list into session again
				if( preg_match('/.*(?<!\{).*(\d:\{.*;\}).*(?!\}).*/', $return_value) )
				{ // if value is a serialized array, then deserialize it
					$return_value = unserialize($return_value);
				}
			}
		}
		return $return_value;
	}

/* @access public
 * @return void
 *
 * @requirements: an active session must be available
 * @description: remove all entries from IDKEY-Array
 *
 */
 	final public function clearIDKEY()
	{
		 $this->_IDKEYs = array('0'=>'0');
	}
}
