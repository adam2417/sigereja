<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>scripts/tinymce/tinymce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		  selector: '#bacaan,#renungan',  // change this value according to your html
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
<form method="post" name="frmTambah" action="<?php echo site_url('renungan/tambahRenungan');?>" onsubmit="javascript:return validate(this);">
<h3><u>TAMBAH RENUNGAN</u></h3>
<input type="submit" name="btnSave" value="Save" class="btn" />
|
<input type="reset" name="btnClear" value="Clear" class="btn" />
|
<input type="button" name="btnClose" value="Back" class="btn" onclick="javascript:history.back(1);" />
<br /><br />
<?php
if((count($message) > 0) && ($message != '')){
	echo $message;
} 
?>
<br />
<table>
	<tr>
		<td>Judul</td>
		<td>:</td>
		<td><input type="text" name="judul" size="75"/></td>
	</tr>
	<tr>
		<td valign="top">Bacaan</td>
		<td valign="top">:</td>
		<td><textarea name="bacaan"></textarea></td>
	</tr>
	<tr>
		<td valign="top">Renungan</td>
		<td valign="top">:</td>
		<td><textarea name="renungan" id="renungan" cols="100" rows="20"></textarea></td>
	</tr>
	<tr>
		<td>Penulis</td>
		<td>:</td>
		<td><select name="penulis">
			<?php $count = count($pendeta);
			foreach($pendeta as $comboPdt){
			?>
			<option value="<?php echo $comboPdt->id?>"><?php echo $comboPdt->nama;?></option>
			<?php }?>
		</select></td>
	</tr>
</table>
</form>