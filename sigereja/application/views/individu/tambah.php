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
<link rel="stylesheet" type="text/css" media="all" href="../../asset/styles/app/calendar.css" />
<script type="text/javascript" src="../../asset/scripts/calendar/calendar.js"></script>
<form method="post" name="frmTambah" action="<?php echo site_url('individu/tambahIndividu');?>" enctype="multipart/form-data">
<h3><u>TAMBAH DATA JEMA'AT</u></h3>
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
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td>
			<select id="jenkel" name="jenkel">
				<option value="0">Laki-Laki</option>
				<option value="1">Perempuan</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Tempat Lahir</td>
		<td>:</td>
		<td><input type="text" name="tmplahir" /></td>
		<td>&nbsp;</td>
		<td>Tanggal Lahir</td>
		<td>:</td>
		<td><input type="text" name="tgllahir" />
		<script type="text/javascript">
				new tcal ({
					// form name
					'formname': 'frmTambah',
					// input name
					'controlname': 'tgllahir'
				});
			</script>&nbsp;MM/DD/YYYY
		</td>
	</tr>	
	<tr>
		<td valign="top">Alamat</td>
		<td valign="top">:</td>
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
	<tr>
		<td>Pekerjaan</td>
		<td>:</td>
		<td><input type="text" name="pekerjaan" /></td>
	</tr>
	<tr>
		<td>Status Nikah</td>
		<td>:</td>
		<td><select name="statusnikah">
			<?php $count = count($status_nikah);
			foreach($status_nikah as $comboWil){
			?>
			<option value="<?php echo $comboWil->id?>"><?php echo $comboWil->status;?></option>
			<?php }?>
		</select></td>
	</tr>
	<tr>
		<td>Baptis</td>
		<td>:</td>
		<td><input type="radio" name="baptis" value="0" />Belum&nbsp;<input type="radio" name="baptis" value="1" />Sudah</td>
	</tr>
	<tr>
		<td>Sidi</td>
		<td>:</td>
		<td><input type="radio" name="sidi" value="0" />Belum&nbsp;<input type="radio" name="sidi" value="1" />Sudah</td>
	</tr>
	<tr>
		<td>Wafat</td>
		<td>:</td>
		<td><input type="checkbox" name="wafat" /></td>
	</tr>
	<tr>
		<td>Foto</td>
		<td>:</td>
		<td><?php echo form_upload('userfile');?></td>
	</tr>   
</table>
</form>