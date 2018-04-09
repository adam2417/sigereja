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