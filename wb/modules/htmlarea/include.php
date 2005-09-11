<?php
      $WB_DIRECTORY = substr(WB_PATH, strlen($_SERVER['DOCUMENT_ROOT'])).'/media/';
?>

<script type="text/javascript">
  _editor_url = "<?php echo WB_URL;?>/modules/htmlarea/htmlarea/";
  _editor_lang = "en";
</script>

<script type="text/javascript" src="<?php echo WB_URL;?>/modules/htmlarea/htmlarea/htmlarea.js"></script>
<script type="text/javascript">
	HTMLArea.loadPlugin("ContextMenu");
	HTMLArea.loadPlugin("TableOperations");
	window.onload = function() {
<?php
	foreach($id_list AS $textarea_id)
	{
		echo 'var editor = new HTMLArea("'.$textarea_id.'"); '
		.'editor.registerPlugin(ContextMenu);'
		.'editor.registerPlugin(TableOperations);'
		.'editor.config.pageStyle = "body { '.stripslashes(WYSIWYG_STYLE).' }";'
		.'editor.generate();';
	}
?>
}
</script>

<?php
	function show_wysiwyg_editor($name,$id,$content,$width,$height) {
		echo '<textarea name="'.$name.'" id="'.$id.'" style="width: '.$width.'; height: '.$height.';">'.$content.'</textarea>';
	}
?>
