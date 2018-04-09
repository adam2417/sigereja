<form method="post" name="frmTambah" action="<?php echo site_url('wilayah/tambahWilayah');?>" onsubmit="javascript:return validate(this);">
<h3><u>TAMBAH WILAYAH</u></h3>
<input type="submit" name="btnSave" value="Save" class="btn" />
|
<input type="reset" name="btnClear" value="Clear" class="btn" />
|
<input type="button" name="btnClose" value="Back" class="btn" onclick="javascript:history.back(1);" />
<br />
<br />
<table>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><input type="text" name="nama" /></td>
	</tr>	
</table>
</form>