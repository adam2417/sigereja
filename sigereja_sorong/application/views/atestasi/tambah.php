<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>scripts/tinymce/tinymce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		  selector: '#almtgerejatujuanasal,#almttinggal',  // change this value according to your html
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
<script type="text/javascript" src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>scripts/calendar/calendar.js"></script>
<form method="post" name="frmTambah" action="<?php echo site_url('atestasi/tambahAtestasi');?>">
<h3><u>TAMBAH ATESTASI</u></h3>
<input type="submit" name="btnSave" value="Save" class="btn" />
|
<input type="reset" name="btnClear" value="Clear" class="btn" />
|
<input type="button" name="btnClose" value="Back" class="btn" onclick="javascript:history.back(1);" />
<br />
<br/>
<?php
if((count($message) > 0) && ($message != '')){
	echo $message;
} 
?>
<br />
<table>
	<tr>
		<td>Atestasi</td>
		<td>:</td>
		<td>
			<select name="tipe">
				<option value="0">Keluar</option>
				<option value="1">Masuk</option>
			</select>
		</td>
	</tr>	
	<tr>
		<td>Tanggal Surat</td>
		<td>:</td>
		<td><input type="text" name="tglsurat" />
		<script type="text/javascript">
				new tcal ({
					// form name
					'formname': 'frmTambah',
					// input name
					'controlname': 'tglsurat'
				});
			</script>&nbsp;MM/DD/YYYY
		</td>
	</tr>
    <tr>
		<td>Tanggal Atestasi</td>
		<td>:</td>
		<td><input type="text" name="tglatestasi" />
		<script type="text/javascript">
				new tcal ({
					// form name
					'formname': 'frmTambah',
					// input name
					'controlname': 'tglatestasi'
				});
			</script>&nbsp;MM/DD/YYYY
		</td>
	</tr>
	<tr>
		<td valign="top">Gereja Tujuan/Asal</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="gereja_tujuanasal" />
		</td>
	</tr>
	<tr>
		<td valign="top">Alamat Gereja Tujuan/Asal</td>
		<td valign="top">:</td>
		<td>
			<textarea id="almtgerejatujuanasal" name="almtgerejatujuanasal" rows="15" cols="80" style="width: 100%">				
			</textarea>
		</td>
	</tr>
	<tr>
		<td valign="top">Alamat Tinggal</td>
		<td valign="top">:</td>
		<td>
			<textarea id="almttinggal" name="almttinggal" rows="15" cols="80" style="width: 100%">				
			</textarea>
		</td>
	</tr>
	<tr>
		<td>Tanggal Masuk/Keluar</td>
		<td>:</td>
		<td><input type="text" name="tglmasukkeluar" />
		<script type="text/javascript">
				new tcal ({
					// form name
					'formname': 'frmTambah',
					// input name
					'controlname': 'tglmasukkeluar'
				});
			</script>&nbsp;MM/DD/YYYY
		</td>
	</tr>
    <tr>
		<td valign="top">Individu</td>
		<td valign="top">:</td>
		<td>
			<select name="individu">
			<?php $count = count($individu);
			foreach($individu as $comboInd){
			?>
			<option value="<?php echo $comboInd->id_individu?>"><?php echo $comboInd->nama_individu;?></option>
			<?php }?>
		</select>
		</td>
	</tr>
	<tr>
		<td>Keluarga</td>
		<td>:</td>
		<td>
			<select name="keluarga">
			<?php $count = count($keluarga);
			foreach($keluarga as $comboKel){
			?>
			<option value="<?php echo $comboKel->id?>"><?php echo $comboKel->nama;?></option>
			<?php }?>
		</select>
		</td>
	</tr>	    
</table>
</form>