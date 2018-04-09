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
<script type="text/javascript" src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>scripts/calendar/calendar.js"></script>
<form method="post" name="frmTambah" action="<?php echo site_url('kegiatan/tambahKegiatan');?>">
<h3><u>TAMBAH KEGIATAN</u></h3>
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
		<td>Tanggal Kegiatan</td>
		<td>:</td>
		<td><input type="text" name="tglkeg" />
		<script type="text/javascript">
				new tcal ({
					// form name
					'formname': 'frmTambah',
					// input name
					'controlname': 'tglkeg'
				});
			</script>&nbsp;MM/DD/YYYY
		</td>
		<td>Jam</td>
		<td>:</td>
		<td>
			<?php
			echo '<select name="jam">';
			    for ($i=0;$i<60*24;$i++)
			    {
			        $hours = (int)($i/60);
			        $minutes = (($i%60 == 0)? 00:($i%60));
			        $isPM = false;
			        $mm = ((strlen($minutes)) > 1)? $minutes : ('0'.$minutes);
			
			        //Fix hours, our time system is really weird :/
			        if ($hours == 0)
			            $hours = 24;
			
			        /*if ($hours >= 13)
			        {
			            $hours -= 12;
			            $isPM = true;
			        }*/
			
			        echo '<option>'.((strlen($hours) > 1) ? $hours:('0'.$hours)).':'.(($minutes == 0)?'00':$mm).'</option>';
			    }
			    echo '</select>';			
			?>
		</td>
	</tr>
	<tr>
		<td valign="top">Tempat</td>
		<td valign="top">:</td>
		<td>
			<textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 100%">				
			</textarea>
		</td>
	</tr>
    <tr>
		<td valign="top">Koordinasi</td>
		<td valign="top">:</td>
		<td>
			<select name="koordinasi">
				<?php $count = count($majelis);
				foreach($majelis as $comboMjl){
				?>
				<option value="<?php echo $comboMjl->nama?>"><?php echo $comboMjl->nama;?></option>
				<?php }?>
			</select>
		</td>
	</tr>
</table>
</form>