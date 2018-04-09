<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>scripts/tinymce/tinymce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		  selector: '#almt',  // change this value according to your html
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
{keluargalist}
<form method="post" name="frmEdit" action="<?php echo site_url('keluarga/ubahKeluarga');?>/{id}">
<h3><u>EDIT DATA KELUARGA</u></h3>
<input type="submit" name="btnSave" value="Save" class="btn" />
|
<input type="reset" name="btnClear" value="Clear" class="btn" />
|
<input type="button" name="btnClose" value="Back" class="btn" onclick="javascript:history.back(1);" />
<br />
<br />
<?php 
	$idwilkeluarga = $keluargalist[0]->wilayah;
    $idprop = $keluargalist[0]->id_prop;
    $idkab = $keluargalist[0]->id_kab_kota;
    $iddistrik = $keluargalist[0]->id_distrik;
    $idklasis = $keluargalist[0]->id_klasis;
    $idlingk = $keluargalist[0]->id_lingkungan;
    $idjemaat = $keluargalist[0]->id_jemaat;
    $idsektor = $keluargalist[0]->id_sektor;
?>
<table>	
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><input type="text" value="{nama}" name="nama" /></td>
	</tr>
    <tr>
		<td>Propinsi</td>
		<td>:</td>
		<td><select name="prop">
			<?php $count = count($propinsilist);
			foreach($propinsilist as $comboProp){
			?>
			<option value="<?php echo $comboProp->id?>" <?php if (($comboProp->id) == $idprop) { ?> selected="selected"
		 	<?php } else { echo ''; }?>><?php echo $comboProp->pdesc;?></option>
			<?php }?>
		</select></td>
	</tr>
    <tr>
		<td>Kab./Kota</td>
		<td>:</td>
		<td><select name="kab">
			<?php $count = count($kabkotalist);
			foreach($kabkotalist as $comboKab){
			?>
			<option value="<?php echo $comboKab->id?>" <?php if (($comboKab->id) == $idkab) { ?> selected="selected"
		 	<?php } else { echo ''; }?>><?php echo $comboKab->pdesc;?></option>
			<?php }?>
		</select></td>
	</tr>
    <tr>
		<td>Distrik/Kel/Kamp.</td>
		<td>:</td>
		<td><select name="distrik">
			<?php $count = count($distriklist);
			foreach($distriklist as $comboDistrik){
			?>
			<option value="<?php echo $comboDistrik->id?>" <?php if (($comboDistrik->id) == $iddistrik) { ?> selected="selected"
		 	<?php } else { echo ''; }?>><?php echo $comboDistrik->pdesc;?></option>
			<?php }?>
		</select></td>
	</tr>
	<tr>
		<td>Sinode/Wilayah</td>
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
		<td>Klasis</td>
		<td>:</td>
		<td><select name="klasis">
			<?php $count = count($klasislist);
			foreach($klasislist as $comboKlasis){
			?>
			<option value="<?php echo $comboKlasis->id?>" <?php if (($comboKlasis->id) == $idklasis) { ?> selected="selected"
		 	<?php } else { echo ''; }?>><?php echo $comboKlasis->pdesc;?></option>
			<?php }?>
		</select></td>
	</tr>
    <tr>
		<td>Lingkungan</td>
		<td>:</td>
		<td><select name="lingkungan">
			<?php $count = count($lingklist);
			foreach($lingklist as $comboLingk){
			?>
			<option value="<?php echo $comboLingk->id?>" <?php if (($comboLingk->id) == $idlingk) { ?> selected="selected"
		 	<?php } else { echo ''; }?>><?php echo $comboLingk->pdesc;?></option>
			<?php }?>
		</select></td>
	</tr>
    <tr>
		<td>Jemaat</td>
		<td>:</td>
		<td><select name="jemaat">
			<?php $count = count($jemaatlist);
			foreach($jemaatlist as $comboJemaat){
			?>
			<option value="<?php echo $comboJemaat->id?>" <?php if (($comboJemaat->id) == $idjemaat) { ?> selected="selected"
		 	<?php } else { echo ''; }?>><?php echo $comboJemaat->pdesc;?></option>
			<?php }?>
		</select></td>
	</tr>
    <tr>
		<td>Wyk/Rayon/Sektor</td>
		<td>:</td>
		<td><select name="sektor">
			<?php $count = count($sektorlist);
			foreach($sektorlist as $comboSektor){
			?>
			<option value="<?php echo $comboSektor->id?>" <?php if (($comboSektor->id) == $idsektor) { ?> selected="selected"
		 	<?php } else { echo ''; }?>><?php echo $comboSektor->pdesc;?></option>
			<?php }?>
		</select></td>
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
		<td><input type="text" value="{notelp}" name="notelp" /></td>
	</tr>   
</table>
</form>
{/keluargalist}