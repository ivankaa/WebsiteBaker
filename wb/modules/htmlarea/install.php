<?php

if(defined('WB_URL')) {

	// Set the filename of the actual editor file
	$editor_file = $module_dir.'/htmlarea.zip';
	
	// Setup the PclZip object
	$editor_archive = new PclZip($editor_file);

	// Unzip to module dir
	$list = $editor_archive->extract(PCLZIP_OPT_PATH, $module_dir);
	if(!$list) {
		$admin->print_error($MESSAGE['GENERIC']['CANNOT_UNZIP']);
	}
	// Delete the zip file
	if(file_exists($editor_file)) { unlink($editor_file); }
	
	// Chmod all the editors files
	chmod_directory_contents($module_dir.'/htmlarea', OCTAL_FILE_MODE);
	
}

?>
