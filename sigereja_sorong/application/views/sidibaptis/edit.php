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
{listsidibaptis}
<?php 
    $pdt = $listsidibaptis[0]->pendeta;
?>
<form method="post" name="frmEdit" action="<?php echo site_url('sidibaptis/ubahSidiBaptis');?>/{id}">
<h3><u>EDIT SURAT SIDI/BAPTIS</u></h3>
<input type="submit" name="btnSave" value="Save" class="btn" />
|
<input type="reset" name="btnClear" value="Clear" class="btn" />
|
<input type="button" name="btnClose" value="Back" class="btn" onclick="javascript:history.back(1);" />
<br />
<br />
<table>
	<tr>
		<td valign="top">Nama</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="nama" value="{nama}" />
		</td>
	</tr>
	<tr>
		<td>Tanggal Surat</td>
		<td>:</td>
		<td><input type="text" name="tglsurat" value="{tanggal_surat}" />
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
		<td>Tanggal Sidi/Baptis</td>
		<td>:</td>
		<td><input type="text" name="tglbaptissidi" value="{tanggal_baptis_sidi}" />
		<script type="text/javascript">
				new tcal ({
					// form name
					'formname': 'frmTambah',
					// input name
					'controlname': 'tglbaptissidi'
				});
			</script>&nbsp;MM/DD/YYYY
		</td>
	</tr>
	<tr>
		<td valign="top">Tempat Sidi/Baptis</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="tempat_sidibaptis" value="{tempat_sidibaptis}" />
		</td>
	</tr>
    <tr>
		<td valign="top">Pendeta</td>
		<td valign="top">:</td>
		<td>
                    <select name="pendeta">
			<?php $count = count($pendeta);
			foreach($pendeta as $combopdt){
			?>
			<option value="<?php echo $combopdt->id?>" <?php if (($combopdt->nama) == $pdt) { ?> selected="selected"
		 	<?php } else { echo ''; }?>><?php echo $combopdt->nama;?></option>
			<?php }?>
                    </select>
		</td>
	</tr>
	<tr>
		<td>Tipe</td>
		<td>:</td>
		<td>
		<select name="tipe">
			<option value="0" <?php $selected = ($listsidibaptis[0]->tipe == "Baptis") ? "selected" : "";echo $selected;?>>Baptis</option>
                        <option value="1" <?php $selected = ($listsidibaptis[0]->tipe == "Sidi") ? "selected" : "";echo $selected;?>>Sidi</option>
		</select>
		</td>
	</tr><tr>
		<td valign="top">Keterangan</td>
		<td valign="top">:</td>
		<td>
			<textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 100%">		
            	{keterangan}		
			</textarea>
		</td>
	</tr>    
</table>
</form>
{/listsidibaptis}