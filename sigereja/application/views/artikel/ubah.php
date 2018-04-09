<!-- TinyMCE -->
<script type="text/javascript" src="../../../asset/scripts/tiny_mce/tiny_mce.js"></script>
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
{artikellist}
<form method="post" name="frmUbah" action="<?php echo site_url('artikel/ubahArtikel');?>/{id}">
<h3><u>UBAH ARTIKEL</u></h3>
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
		<td><input type="text" name="judul" size="75" value="{judul_artikel}"/></td>
	</tr>
	<tr>
		<td valign="top">Deskripsi</td>
		<td valign="top">:</td>
		<td><textarea name="elm1" id="elm1" cols="55" rows="20">{deskripsi}</textarea></td>
	</tr>	
</table>
</form>
{/artikellist}