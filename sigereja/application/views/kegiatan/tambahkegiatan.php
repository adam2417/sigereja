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