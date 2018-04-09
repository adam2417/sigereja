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
{listatestasi}
<form method="post" name="frmEdit" action="<?php echo site_url('atestasi/ubahAtestasi');?>/{id}">
<h3><u>EDIT SURAT ATESTASI</u></h3>
<input type="submit" name="btnSave" value="Save" class="btn" />
|
<input type="reset" name="btnClear" value="Clear" class="btn" />
|
<input type="button" name="btnClose" value="Back" class="btn" onclick="javascript:history.back(1);" />
<br />
<br />
<table>	
	<tr>
		<td>Tanggal Surat</td>
		<td>:</td>
		<td><input type="text" name="tglsurat" value="{tanggal_surat}" />
		<script type="text/javascript">
				new tcal ({
					// form name
					'formname': 'frmEdit',
					// input name
					'controlname': 'tglsurat'
				});
			</script>&nbsp;MM/DD/YYYY
		</td>
	</tr>
    <tr>
		<td>Tanggal Atestasi</td>
		<td>:</td>
		<td><input type="text" name="tglatestasi" value="{tanggal_atestasi_keluarmasuk}"/>
		<script type="text/javascript">
				new tcal ({
					// form name
					'formname': 'frmEdit',
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
			<input type="text" name="gereja_tujuanasal" value="{gereja_tujuanasal}" />
		</td>
	</tr>
	<tr>
		<td valign="top">Alamat Gereja Tujuan/Asal</td>
		<td valign="top">:</td>
		<td>
			<textarea id="almtgerejatujuanasal" name="almtgerejatujuanasal" rows="15" cols="80" style="width: 100%">
					{alamat_gereja_tujuanasal}			
			</textarea>
		</td>
	</tr>
	<tr>
		<td valign="top">Alamat Tinggal</td>
		<td valign="top">:</td>
		<td>
			<textarea id="almttinggal" name="almttinggal" rows="15" cols="80" style="width: 100%">{alamat_tinggal}				
			</textarea>
		</td>
	</tr>
	<tr>
		<td>Tanggal Masuk/Keluar</td>
		<td>:</td>
		<td><input type="text" name="tglmasukkeluar" value="{tanggal_masukkeluar}" />
		<script type="text/javascript">
				new tcal ({
					// form name
					'formname': 'frmEdit',
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
			<input type="text" name="individu" value="{individu}" disabled="disabled" />
		</td>
	</tr>
	<tr>
		<td>Keluarga</td>
		<td>:</td>
		<td>
			<input type="text" name="keluarga" value="{keluarga}" disabled="disabled"/>
		</td>
	</tr>	    
</table>
</form>
{/listatestasi}