<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>scripts/tinymce/tinymce.js"></script>
<script type="text/javascript">
    function clearContents() {
        tinyMCE.getInstanceById('elm1').setContent('');
        //alert('test');
    }    
</script>
<script type="text/javascript">
	tinyMCE.init({
		  selector: '#elm1',  // change this value according to your html
          toolbar: 'undo redo | image code',
          plugins: "image,link,autosave,imagetools,codesample,emoticons,paste,autoresize,textcolor,table,preview,jbimages",
          menubar:false,
          statusbar: false,
          theme_advanced_resizing : true,
          toolbar1: 'insertfile undo redo | styleselect | table | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
          toolbar2: 'preview | forecolor backcolor | codesample emoticons',
          toolbar3: 'jbimages',
          relative_urls: false
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