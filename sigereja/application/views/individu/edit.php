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
		theme_advanced_resizing : true
	});	
</script>
<link rel="stylesheet" type="text/css" media="all" href="../../../asset/styles/app/calendar.css" />
<script type="text/javascript" src="../../../asset/scripts/calendar/calendar_us.js"></script>
{individulist}
<form method="post" name="frmEdit" action="<?php echo site_url('individu/ubahIndividu');?>/{id_individu}" enctype="multipart/form-data">
<h3><u>EDIT DATA INDIVIDU</u></h3>
<input type="submit" name="btnSave" value="Save" class="btn" />
|
<input type="reset" name="btnClear" value="Clear" class="btn" />
|
<input type="button" name="btnClose" value="Back" class="btn" onclick="javascript:history.back(1);" />
<br />
<br />
<?php 
	$idwilkeluarga = $individulist[0]->nama_wil;
	$idStatusNikah = $individulist[0]->status_nikah;
	$idJenisKelamin = $individulist[0]->jenis_kelamin;
?>
<table>	
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><input type="text" value="{nama_individu}" name="nama" /></td>
	</tr>
	<tr>
		<td>Wilayah</td>
		<td>:</td>
		<td><select name="wilayah">
			<?php $count = count($wilayahlist);
			foreach($wilayahlist as $comboWil){
			?>
			<option value="<?php echo $comboWil->id?>" <?php if (($comboWil->id) == $idwilkeluarga) { ?> selected="selected"
		 	<?php } else { echo ''; }?>><?php echo $comboWil->nama;?></option>
			<?php }?>
		</select></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><select name="jenkel">
			<?php
			$jen_kel = array('Laki-laki','Perempuan'); 
			$count = count($jen_kel);
			$i = 0;
			foreach($jen_kel as $jenkel){
			?>
			<option value="<?php echo $i?>" <?php if ($i == $idJenisKelamin) { ?> selected="selected"
		 	<?php } else { echo ''; }?>><?php echo $jenkel?></option>
			<?php $i++;}?>
		</select></td>
	</tr>
	<tr>
		<td>Tempat Lahir</td>
		<td>:</td>
		<td><input type="text" value="{tempat_lahir}" name="tmplahir" /></td>
		<td>&nbsp;</td>
		<td>Tanggal Lahir</td>
		<td>:</td>
		<td><input type="text" name="tgllahir" value="{tanggal_lahir}" />
		<script type="text/javascript">
				new tcal ({
					// form name
					'formname': 'frmEdit',
					// input name
					'controlname': 'tgllahir'
				});
			</script>&nbsp;MM/DD/YYYY
		</td>
	</tr>	
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td>
			<textarea id="almt" name="almt" rows="10" cols="100" style="width: 100%">
					{alamat}	
			</textarea>
		</td>
	</tr>
	<tr>
		<td>No. Telp</td>
		<td>:</td>
		<td><input type="text" value="{telp}" name="notelp" /></td>
	</tr>
	<tr>
		<td>Pekerjaan</td>
		<td>:</td>
		<td><input type="text" value="{pekerjaan}" name="pekerjaan" /></td>
	</tr>
	<tr>
		<td>Status Nikah</td>
		<td>:</td>
		<td><select name="statusnikah">
			<?php $count = count($status_nikah);
			foreach($status_nikah as $comboStatNikah){
			?>
			<option value="<?php echo $comboStatNikah->id?>" <?php if (($comboStatNikah->id) == $idStatusNikah) { ?> selected="selected"
		 	<?php } else { echo ''; }?>><?php echo $comboStatNikah->status;?></option>
			<?php }?>
		</select></td>
	</tr>
	<tr>
		<td>Baptis</td>
		<td>:</td>
		<td><input type="radio" name="baptis" value="0" <?php if($individulist[0]->baptis == '0'){?> checked="checked" <?php }?> />Belum&nbsp;<input type="radio" name="baptis" value="1" <?php if($individulist[0]->baptis == '1'){?> checked="checked" <?php }?> />Sudah</td>
	</tr>
	<tr>
		<td>Sidi</td>
		<td>:</td>
		<td><input type="radio" name="sidi" value="0" <?php if($individulist[0]->sidi == '0'){?> checked="checked" <?php }?> />Belum&nbsp;<input type="radio" name="sidi" value="1" <?php if($individulist[0]->sidi == '1'){?> checked="checked" <?php }?>/>Sudah</td>
	</tr>
	<tr>
		<td>Wafat</td>
		<td>:</td>
		<td><input type="checkbox" name="wafat" <?php if($individulist[0]->life == '1'){?> selected="selected" <?php }else {echo '';} ?> /></td>
	</tr>
	<tr>
		<td>Foto</td>
		<td>:</td>
		<td><?php echo form_upload('userfile');?></td>
	</tr>    
</table>
</form>
{/individulist}