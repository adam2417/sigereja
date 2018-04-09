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
{listpa}
<form method="post" name="frmEdit" action="<?php echo site_url('pa/ubahPa');?>/{id_pa}">
<h3><u>EDIT PA</u></h3>
<input type="submit" name="btnSave" value="Save" class="btn" />
|
<input type="reset" name="btnClear" value="Clear" class="btn" />
|
<input type="button" name="btnClose" value="Back" class="btn" onclick="javascript:history.back(1);" />
<br />
<br />
<?php $idlistpa = $listpa[0]->id_wil;?>
<table>
	<tr>
		<td>Wilayah</td>
		<td>:</td>
		<td><select name="wilayah">
			<?php $count = count($combowilayah);
			foreach($combowilayah as $comboWil){
			?>
			<option value="<?php echo $comboWil->id?>" <?php if (($comboWil->id) == $idlistpa) { ?> selected="selected"
		 	<?php } else { echo ''; }?>><?php echo $comboWil->nama;?></option>
			<?php }?>
		</select></td>
	</tr>
    <tr>
		<td>Keluarga</td>
		<td>:</td>
		<td>
                    <select name="keluarga">
			{combokeluarga}
			<option value="{id}">{nama}</option>
			{/combokeluarga}
                    </select>
                </td>
	</tr>
	<tr>
		<td>Tanggal Pa</td>
		<td>:</td>
		<td><input type="text" name="tglpa" id="tglpa" value="{tgl_kebaktian}" />
		<script type="text/javascript">
			new tcal ({
				// form name
				'formname': 'frmEdit',
				// input name
				'controlname': 'tglpa'
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
			        list($hs,$mi) = explode(':',$listpa[0]->waktu_kebaktian);
					if(($hs == $hours) && ($mi == $minutes))
			        	echo '<option selected="selected">'.((strlen($hours) > 1) ? $hours:('0'.$hours)).':'.(($minutes == 0)?'00':$mm).'</option>';
			        else
			        	echo '<option>'.((strlen($hours) > 1) ? $hours:('0'.$hours)).':'.(($minutes == 0)?'00':$mm).'</option>'; 
			    }
			    echo '</select>';			
			?>
		</td>
	</tr>
	 <tr>
		<td valign="top">Pemimpin</td>
		<td valign="top">:</td>
		<td>
			<select name="pemimpin">
			<?php $count = count($majelis);
			foreach($majelis as $comboKoord){
			?>
			<option value="<?php echo $comboKoord->id?>" <?php if (($comboKoord->id) == $listpa[0]->pemimpin_id) { ?> selected="selected"
		 	<?php } else { echo ''; }?>><?php echo $comboKoord->nama;?></option>
			<?php }?>
		</select>
		</td>
	</tr>
    <tr>
		<td valign="top">Pendamping</td>
		<td valign="top">:</td>
		<td>
			<select name="pendamping">
			<?php $counts = count($majelis);
			foreach($majelis as $comboKoords){
			?>
			<option value="<?php echo $comboKoords->id?>" <?php if (($comboKoords->id) == $listpa[0]->pendamping_id) { ?> selected="selected"
		 	<?php } else { echo ''; }?>><?php echo $comboKoords->nama;?></option>
			<?php }?>
		</select>
		</td>
	</tr>
</table>
</form>
{/listpa}