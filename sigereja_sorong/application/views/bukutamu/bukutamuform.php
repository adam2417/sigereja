<script type="text/javascript" src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>scripts/tinymce/tinymce.js"></script>
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
<form method="post" name="frmTambah" action="<?php echo site_url('bukutamu/tambahBukuTamu');?>">
<h3><u>BUKU TAMU</u></h3>
<br/>
<?php
$role = $this->session->userdata('role');
if($role == '1'){
?>
<a href="<?php echo site_url('bukutamu/getBukuTamuList');?>">List Buku Tamu</a>
<?php
}
?>
<br/><br/>
<input type="submit" name="btnSave" value="Save" class="btn" />
|
<input type="reset" name="btnClear" value="Clear" class="btn" />
|
<input type="button" name="btnClose" value="Back" class="btn" onclick="javascript:history.back(1);" />
<br/><br/>
<div id="form" style="width:350px;">
<table>
	<tr>
    	<td>Pengirim</td>
        <td>:</td>
        <td><input type="text" name="pengirim" /></td>
    </tr>
    <tr>
    	<td valign="top">Pesan</td>
        <td valign="top">:</td>
        <td><textarea id="elm1" name="elm1" rows="15" cols="85" style="width: 100%"></textarea></td>
    </tr>    
</table>
</div>
</form>