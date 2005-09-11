<?php

// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { exit("Cannot access this file directly"); }

// Delete the editor directory
rm_full_dir(WB_PATH.'/modules/htmlarea/htmlarea');

?>
