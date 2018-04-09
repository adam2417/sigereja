<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>scripts/tinymce/tinymce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		  selector: '#elm1',  // change this value according to your html
          toolbar: 'undo redo | image code',
          plugins: "image,link,autosave,imagetools,codesample,emoticons,paste,autoresize,textcolor,table,preview,jbimages",
          menubar:false,
          statusbar: false,
          theme_advanced_resizing : true,
          toolbar1: 'insertfile undo redo | styleselect | table | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
          toolbar2: 'preview | forecolor backcolor | codesample emoticons',
          toolbar3: 'jbimages',
          relative_urls: false
	});
</script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>styles/app/calendar.css" />
<script type="text/javascript" src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>scripts/calendar/calendar_us.js"></script>
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
	$idkeluarga = $individulist[0]->id_keluarga;
	$idStatusNikah = $individulist[0]->status_nikah;
	$idJenisKelamin = $individulist[0]->jenis_kelamin;
    $goldar = $individulist[0]->gol_darah;
    $job = $individulist[0]->pekerjaan_id;
    $status_kel = $individulist[0]->sta_kel;
    $baptis = $individulist[0]->baptis_id;
    $sidi = $individulist[0]->sidi_id;
    $intra = $individulist[0]->intra_id;
    $status_dom = $individulist[0]->stat_dom;
    $pend_akhir = $individulist[0]->pend_akhir;
?>
<table>
    <tr>
		<td>Keluarga</td>
		<td>:</td>
		<td><select name="keluarga">
			<?php $count = count($keluargalist);
			foreach($keluargalist as $comboKel){
			?>
			<option value="<?php echo $comboKel->id?>" <?php                 
                echo ($comboKel->id == $idkeluarga)? "selected" : ""; 
                    ?>
            ><?php echo $comboKel->nama;?></option>
			<?php }?>
		</select></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><input type="text" value="{nama_individu}" name="nama" /></td>
	</tr>    
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><select name="jenkel">
			<?php $count = count($jenkellist);
			foreach($jenkellist as $comboJenKel){
			?>
			<option value="<?php echo $comboJenKel->param_val?>"  <?php                 
                echo ($comboJenKel->param_val == $idJenisKelamin)? "selected" : ""; 
                    ?>><?php echo $comboJenKel->param_desc;?></option>
			<?php }?>
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
		<td>Golongan Darah</td>
		<td>:</td>
		<td><select name="golongan_darah">
			<?php $count = count($goldarah);
			foreach($goldarah as $comboGolDar){
			?>
			<option value="<?php echo $comboGolDar->param_val?>" <?php                 
                echo ($comboGolDar->param_val == $goldar)? "selected" : ""; 
                    ?>><?php echo $comboGolDar->param_desc;?></option>
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
			<option value="<?php echo $comboPendidikan->param_val?>"  <?php                 
                echo ($comboPendidikan->param_val == $pend_akhir)? "selected" : ""; 
                    ?>><?php echo $comboPendidikan->param_desc;?></option>
			<?php }?>
		</select></td>
        <td>&nbsp;</td>
		<td>Gelar</td>
		<td>:</td>
		<td><input type="text" name="gelar" value="{gelar}"/>
	</tr>
    <tr>
		<td>Pekerjaan</td>
		<td>:</td>
		<td><select name="pekerjaan">
			<?php $count = count($joblist);
			foreach($joblist as $comboJob){
			?>
			<option value="<?php echo $comboJob->param_val?>" <?php                 
                echo ($comboJob->param_val == $job)? "selected" : ""; 
                    ?>><?php echo $comboJob->param_desc;?></option>
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
			<option value="<?php echo $comboStatusNikah->param_val?>" <?php                 
                echo ($comboStatusNikah->param_val == $idStatusNikah)? "selected" : ""; 
                    ?>><?php echo $comboStatusNikah->param_desc;?></option>
			<?php }?>
		</select></td>
        <td>&nbsp;</td>
		<td>Tanggal Nikah</td>
		<td>:</td>
		<td><input type="text" name="tglnikah" value="{tanggal_nikah}" />
		<script type="text/javascript">
				new tcal ({
					// form name
					'formname': 'frmEdit',
					// input name
					'controlname': 'tglnikah'
				});
			</script>&nbsp;MM/DD/YYYY
		</td>
        <td>&nbsp;</td>
		<td>Tempat Nikah</td>
		<td>:</td>
		<td><input type="text" name="tmptnikah" value="{tempat_nikah}"/>
	</tr>
    <tr>
		<td>Status Hubungan Dalam Keluarga</td>
		<td>:</td>
		<td><select name="stat_kel">
			<?php $count = count($stat_kel);
			foreach($stat_kel as $comboStatusKeluarga){
			?>
			<option value="<?php echo $comboStatusKeluarga->param_val?>" <?php                 
                echo ($comboStatusKeluarga->param_val == $status_kel)? "selected" : ""; 
                    ?>><?php echo $comboStatusKeluarga->param_desc;?></option>
			<?php }?>
		</select></td>
	</tr>
    <tr>
        <td>Asal Gereja</td>
        <td>:</td>
        <td><input type="text" name="asalgereja" value="{asal_gereja}" /></td>
    </tr>
	<tr>
		<td>Baptis</td>
		<td>:</td>
		<td>
            <?php $count = count($status_baptis);
			foreach($status_baptis as $rdBaptis){
			?>
            <input type="radio" name="baptis" value="<?php echo $rdBaptis->param_val ?>" <?php                 
                echo ($rdBaptis->param_val == $baptis)? "checked=\"checked\"" : ""; 
                    ?> /><?php echo $rdBaptis->param_desc;?>&nbsp;
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
            <input type="radio" name="sidi" value="<?php echo $rdSidi->param_val ?>" <?php                 
                echo ($rdSidi->param_val == $sidi)? "checked=\"checked\"" : ""; 
                    ?> /><?php echo $rdSidi->param_desc;?>&nbsp;
			<?php }?>
        </td>
	</tr>
    <tr>
        <td>Nama Ibu</td>
        <td>:</td>
        <td><input type="text" name="nama_ibu" value="{nama_ibu}"/></td>
        <td>&nbsp;</td>
        <td>Nama Ayah</td>
        <td>:</td>
        <td><input type="text" name="nama_ayah" value="{nama_ayah}"/></td>
    </tr>
    <tr>
        <td>Suku</td>
        <td>:</td>
        <td><input type="text" name="suku" value="{suku}"/></td>
    </tr>
    <tr>
		<td>Intra</td>
		<td>:</td>
		<td><select name="intra">
			<?php $count = count($intralist);
			foreach($intralist as $comboIntra){
			?>
			<option value="<?php echo $comboIntra->param_val?>" <?php                 
                echo ($comboIntra->param_val == $intra)? "selected" : ""; 
                    ?>><?php echo $comboIntra->param_desc;?></option>
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
			<option value="<?php echo $comboStatusDomisili->param_val?>"  <?php                 
                echo ($comboStatusDomisili->param_val == $status_dom)? "selected" : ""; 
                    ?>><?php echo $comboStatusDomisili->param_desc;?></option>
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
{/individulist}