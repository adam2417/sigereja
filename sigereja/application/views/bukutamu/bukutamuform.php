<script type="text/javascript" src="../asset/scripts/tiny_mce/tiny_mce.js"></script>
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