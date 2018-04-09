<!-- TinyMCE -->
<script type="text/javascript" src="../../asset/scripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "simple",
		plugins : "paste",

		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		forced_root_block : false,
	    force_p_newlines : 'false',
	    remove_linebreaks : false,
	    force_br_newlines : true,
	    remove_trailing_nbsp : false,
	    verify_html : false,
	});	
</script>
<link rel="stylesheet" type="text/css" media="all" href="../../asset/styles/app/calendar.css" />
<script type="text/javascript" src="../../asset/scripts/calendar/calendar.js"></script>
<form method="post" name="frmTambah" action="<?php echo site_url('keluarga/tambahKeluarga');?>">
<h3><u>TAMBAH DATA KELUARGA</u></h3>
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
		<td>Nama</td>
		<td>:</td>
		<td><input type="text" name="nama" /></td>
	</tr>
	<tr>
		<td>Wilayah</td>
		<td>:</td>
		<td><select name="wilayah">
			<?php $count = count($wilayahlist);
			foreach($wilayahlist as $comboWil){
			?>
			<option value="<?php echo $comboWil->id?>"><?php echo $comboWil->nama;?></option>
			<?php }?>
		</select></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td>
			<textarea id="almt" name="almt" rows="10" cols="100" style="width: 100%">
			</textarea>
		</td>
	</tr>
	<tr>
		<td>No. Telp</td>
		<td>:</td>
		<td><input type="text" name="notelp" /></td>
	</tr>   
</table>
</form>