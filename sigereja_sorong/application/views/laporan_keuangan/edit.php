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
{listlap_keu}
<form method="post" name="frmEdit" action="<?php echo site_url('lap_keu/ubahLap_keu');?>/{id}">
<h3><u>EDIT LAPORAN KEUANGAN</u></h3>
<input type="submit" name="btnSave" value="Save" class="btn" />
|
<input type="reset" name="btnClear" value="Clear" class="btn" />
|
<input type="button" name="btnClose" value="Back" class="btn" onclick="javascript:history.back(1);" />
<br />
<br />

<table>
	<tr>
		<td>Tanggal</td>
		<td>:</td>
		<td><input type="text" name="tgllap_keu" value="{tanggal}"/>
		<script type="text/javascript">
				new tcal ({
					// form name
					'formname': 'frmTambah',
					// input name
					'controlname': 'tgllap_keu'
				});
			</script>&nbsp;MM/DD/YYYY
		</td>
	</tr>
	<tr>
		<td>Jumlah Pemasukan</td>
		<td>:</td>
		<td><input type="text" name="jum_pemasukan" value="{jum_pemasukan}"/></td>
	</tr>
    <tr>
		<td valign="top">Jumlah Pengeluaran</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="jum_pengeluaran" value="{jum_pengeluaran}"/>
		</td>
	</tr>
    <tr>
		<td valign="top">Saldo Akhir</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="saldo_akhir" value="{saldo_akhir}"/>
		</td>
	</tr>
	<tr>
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
{/listlap_keu}