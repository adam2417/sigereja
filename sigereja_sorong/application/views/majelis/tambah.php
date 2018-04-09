<link rel="stylesheet" type="text/css" media="all" href="../../asset/styles/app/calendar.css" />
<script type="text/javascript" src="../../asset/scripts/calendar/calendar.js"></script>
<script type="text/javascript">
	function test(chk){
		var ele = document.getElementById("cal");		
		if(chk){
			document.getElementById("emiritus").disabled = false;
			ele.style.display = "block";
		}else{
			document.getElementById("emiritus").value = "";
			document.getElementById("emiritus").disabled = true;
			ele.style.display = "none";
		}		
	}	
</script>
<form method="post" name="frmTambah" action="<?php echo site_url('majelis/addMajelis');?>">
<h3><u>TAMBAH MAJELIS</u></h3>
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
		<td><select name="nama">
			<?php $count = count($individu);
			foreach($individu as $comboInd){
			?>
			<option value="<?php echo $comboInd->id_individu?>"><?php echo $comboInd->nama_individu;?></option>
			<?php }?>
		</select></td>
	</tr>
	<tr>
		<td>Wilayah</td>
		<td>:</td>
		<td><select name="wilayah">
			<?php $count = count($combowilayah);
			foreach($combowilayah as $comboWil){
			?>
			<option value="<?php echo $comboWil->id?>"><?php echo $comboWil->nama;?></option>
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
			<option value="<?php echo $comboJbtn->id?>"><?php echo $comboJbtn->nama;?></option>
			<?php }?>
		</select></td>
	</tr>
	--><tr>
		<td>Tanggal Pentahbisan</td>
		<td>:</td>
		<td><input type="text" name="tgltahbis" id="tgltahbis"/>
		<script type="text/javascript">
			new tcal ({
				// form name
				'formname': 'frmTambah',
				// input name
				'controlname': 'tgltahbis'
			});
		</script>&nbsp;MM/DD/YYYY
		</td>
	</tr>
</table>
</form>