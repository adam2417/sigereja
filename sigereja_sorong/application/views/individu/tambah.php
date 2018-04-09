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
		<td>Keluarga</td>
		<td>:</td>
		<td><select name="keluarga">
			<?php $count = count($keluargalist);
			foreach($keluargalist as $comboKel){
			?>
			<option value="<?php echo $comboKel->id?>"><?php echo $comboKel->nama;?></option>
			<?php }?>
		</select></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><input type="text" name="nama" /></td>
	</tr>	
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><select name="jenkel">
			<?php $count = count($jenkellist);
			foreach($jenkellist as $comboJenKel){
			?>
			<option value="<?php echo $comboJenKel->param_val?>"><?php echo $comboJenKel->param_desc;?></option>
			<?php }?>
		</select></td>
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
		<td valign="top">Golongan Darah</td>
		<td valign="top">:</td>
		<td><select name="golongan_darah">
			<?php $count = count($goldar);
			foreach($goldar as $comboGolDar){
			?>
			<option value="<?php echo $comboGolDar->param_val?>"><?php echo $comboGolDar->param_desc;?></option>
			<?php }?>
		</select></td>
	</tr>
    <tr>
		<td>Pendidikan Terakhir</td>
		<td>:</td>
		<td><select name="pendidikan_terakhir">
			<?php $count = count($pendidikan);
			foreach($pendidikan as $comboPendidikan){
			?>
			<option value="<?php echo $comboPendidikan->param_val?>"><?php echo $comboPendidikan->param_desc;?></option>
			<?php }?>
		</select></td>
        <td>&nbsp;</td>
		<td>Gelar</td>
		<td>:</td>
		<td><input type="text" name="gelar" />
	</tr>
	<tr>
		<td>Pekerjaan</td>
		<td>:</td>
		<td><select name="pekerjaan">
			<?php $count = count($joblist);
			foreach($joblist as $comboJob){
			?>
			<option value="<?php echo $comboJob->param_val?>"><?php echo $comboJob->param_desc;?></option>
			<?php }?>
		</select></td>
	</tr>
	<tr>
		<td>Status Nikah</td>
		<td>:</td>
		<td><select name="statusnikah">
			<?php $count = count($status_nikah);
			foreach($status_nikah as $comboStatusNikah){
			?>
			<option value="<?php echo $comboStatusNikah->param_val?>"><?php echo $comboStatusNikah->param_desc;?></option>
			<?php }?>
		</select></td>
        <td>&nbsp;</td>
		<td>Tanggal Nikah</td>
		<td>:</td>
		<td><input type="text" name="tglnikah" />
		<script type="text/javascript">
				new tcal ({
					// form name
					'formname': 'frmTambah',
					// input name
					'controlname': 'tglnikah'
				});
			</script>&nbsp;MM/DD/YYYY
		</td>
        <td>&nbsp;</td>
		<td>Tempat Nikah</td>
		<td>:</td>
		<td><input type="text" name="tmptnikah" />
	</tr>
    <tr>
		<td>Status Hubungan Dalam Keluarga</td>
		<td>:</td>
		<td><select name="stat_kel">
			<?php $count = count($status_kel);
			foreach($status_kel as $comboStatusKeluarga){
			?>
			<option value="<?php echo $comboStatusKeluarga->param_val?>"><?php echo $comboStatusKeluarga->param_desc;?></option>
			<?php }?>
		</select></td>
	</tr>    
    <tr>
        <td>Asal Gereja</td>
        <td>:</td>
        <td><input type="text" name="asalgereja" /></td>
    </tr>
	<tr>
		<td>Baptis</td>
		<td>:</td>
		<td>
            <?php $count = count($status_baptis);
			foreach($status_baptis as $rdBaptis){
			?>
            <input type="radio" name="baptis" value="<?php echo $rdBaptis->param_val ?>" /><?php echo $rdBaptis->param_desc;?>&nbsp;
			<?php }?>
        </td>
	</tr>
	<tr>
		<td>Sidi</td>
		<td>:</td>
		<td>
            <?php $count = count($status_sidi);
			foreach($status_sidi as $rdSidi){
			?>
            <input type="radio" name="sidi" value="<?php echo $rdSidi->param_val ?>" /><?php echo $rdSidi->param_desc;?>&nbsp;
			<?php }?>
        </td>
	</tr>
    <tr>
        <td>Nama Ibu</td>
        <td>:</td>
        <td><input type="text" name="nama_ibu" /></td>
        <td>&nbsp;</td>
        <td>Nama Ayah</td>
        <td>:</td>
        <td><input type="text" name="nama_ayah" /></td>
    </tr>
    <tr>
        <td>Suku</td>
        <td>:</td>
        <td><input type="text" name="suku" /></td>
    </tr>
    <tr>
		<td>Intra</td>
		<td>:</td>
		<td><select name="intra">
			<?php $count = count($intra);
			foreach($intra as $comboIntra){
			?>
			<option value="<?php echo $comboIntra->param_val?>"><?php echo $comboIntra->param_desc;?></option>
			<?php }?>
		</select></td>
	</tr>
    <tr>
		<td>Tempat Domisili</td>
		<td>:</td>
		<td><select name="tmpt_domisili">
			<?php $count = count($status_domisili);
			foreach($status_domisili as $comboStatusDomisili){
			?>
			<option value="<?php echo $comboStatusDomisili->param_val?>"><?php echo $comboStatusDomisili->param_desc;?></option>
			<?php }?>
		</select></td>
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