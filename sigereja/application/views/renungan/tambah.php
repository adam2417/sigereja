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
	    verify_html : false
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