<?php

// Include config file
require_once('config.php');

// Check if specific page requested
if(isset($_GET['page'])) {
	// Page link
	$page_link = addslashes($_GET['page']);
	// Query database
	$sql = "SELECT * FROM pages WHERE link = '/".$page_link."'";
	$query = $database->query($sql);
	// Check for errors
	if($database->is_error()) {
		// Print error
		die($database->get_error());
	} elseif($query->numRows() > 0) {
		// Get page id
		$page = $query->fetchRow();
		$page_id = $page['page_id'];
		unset($page);
		// Include main script
		require_once('index.php');
	}
}

?>