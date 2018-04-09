<link rel="stylesheet" type="text/css" media="all" href="../../../asset/styles/app/calendar.css" />
<script type="text/javascript" src="../../../asset/scripts/calendar/calendar_us.js"></script>
{majelislist}
<form method="post" name="frmEdit" action="<?php echo site_url('majelis/edit');?>/{id}">
<h3><u>EDIT PROFIL MAJELIS</u></h3>
<input type="submit" name="btnSave" value="Save" class="btn" />
|
<input type="reset" name="btnClear" value="Clear" class="btn" />
|
<input type="button" name="btnClose" value="Back" class="btn" onclick="javascript:history.back(1);" />
<br />
<br />
<?php 
	$idwilmajelis = $majelislist[0]->wilayah;
	$idjabatan = $majelislist[0]->jabatan;
?>
<table>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><input type="text" value="{nama}" name="nama" disabled="disabled"/></td>
	</tr>
	<tr>
		<td>Wilayah</td>
		<td>:</td>
		<td><select name="wilayah">
			<?php $count = count($combowilayah);
			foreach($combowilayah as $comboWil){
			?>
			<option value="<?php echo $comboWil->id?>" <?php if (($comboWil->id) == $idwilmajelis) { ?> selected="selected"
		 	<?php } else { echo ''; }?>><?php echo $comboWil->nama;?></option>
			<?php }?>
		</select></td>
	</tr>
	<!--<tr>
		<td>Jabatan</td>
		<td>:</td>
		<td><select name="jabatan">
			<?php $count = count($combojabatan);
			foreach($combojabatan as $comboJbtn){
			?>
			<option value="<?php echo $comboJbtn->id?>" <?php if (($comboJbtn->id) == $idjabatan) { ?> selected="selected"
		 	<?php } else { echo ''; }?>><?php echo $comboJbtn->nama;?></option>
			<?php }?>
		</select></td>
	</tr>
	--><tr>
		<td>Tanggal Pentahbisan</td>
		<td>:</td>
		<td><input type="text" name="tgltahbis" id="tgltahbis" value="{tgl_pentahbisan}" />
		<script type="text/javascript">
			new tcal ({
				// form name
				'formname': 'frmEdit',
				// input name
				'controlname': 'tgltahbis'
			});
		</script>&nbsp;MM/DD/YYYY
		</td>
	</tr>
		
</table>
</form>
{/majelislist}