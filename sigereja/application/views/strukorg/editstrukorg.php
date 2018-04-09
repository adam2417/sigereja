<!-- TinyMCE -->
<script type="text/javascript" src="../../asset/scripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    function clearContents() {
        tinyMCE.getInstanceById('elm1').setContent('');
        //alert('test');
    }    
</script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "simple",
		plugins : "paste",

		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true
	});
</script>
<form method="post" name="frmEdit" action="<?php echo site_url('strukturorg/modifyDescription');?>">
<h3><u>EDIT STRUKTUR GEREJA</u></h3>
<input type="submit" name="btnSave" value="Save" class="btn" />
|
<input type="button" name="btnClear" value="Clear" class="btn" onclick="javascript:clearContents();"/>
|
<input type="button" name="btnClose" value="Back" class="btn" onclick="javascript:history.back(1);" />
<br /><br />
{datastrukorg}
<div>
	<textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 100%">
		{description}
	</textarea>
</div>
{/datastrukorg}
</form>