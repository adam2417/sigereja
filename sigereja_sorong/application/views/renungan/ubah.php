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
{renunganlist}
<?php 
    $pdt = $renunganlist[0]->penulis;
?>
<form method="post" name="frmUbah" action="<?php echo site_url('renungan/ubahRenungan');?>/{id}">
<h3><u>UBAH RENUNGAN</u></h3>
<input type="submit" name="btnSave" value="Save" class="btn" />
|
<input type="reset" name="btnClear" value="Clear" class="btn" />
|
<input type="button" name="btnClose" value="Back" class="btn" onclick="javascript:history.back(1);" />
<br />
<br />
<table>
	<tr>
		<td>Judul</td>
		<td>:</td>
		<td><input type="text" name="judul" size="75" value="{judul}" /></td>
	</tr>
	<tr>
		<td valign="top">Bacaan</td>
		<td valign="top">:</td>
		<td><textarea name="bacaan">{bacaan}</textarea></td>
	</tr>
	<tr>
		<td valign="top">Renungan</td>
		<td valign="top">:</td>
		<td><textarea name="renungan" cols="100" rows="20">{renungan}</textarea></td>
	</tr>
	<tr>
		<td>Penulis</td>
		<td>:</td>
		<td><select name="penulis">
			<?php $count = count($pendeta);
			foreach($pendeta as $combopdt){
			?>
			<option value="<?php echo $combopdt->id?>" <?php if (($combopdt->nama) == $pdt) { ?> selected="selected"
		 	<?php } else { echo ''; }?>><?php echo $combopdt->nama;?></option>
			<?php }?>
		</select></td>
	</tr>
</table>
</form>
{/renunganlist}