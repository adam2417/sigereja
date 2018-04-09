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
{pendetalist}
<form method="post" name="frmEdit" action="<?php echo site_url('pendeta/ubahPendeta');?>/{id}" enctype="multipart/form-data">
<h3><u>EDIT PROFIL PENDETA</u></h3>
<input type="submit" name="btnSave" value="Save" class="btn" />
|
<input type="reset" name="btnClear" value="Clear" class="btn" />
|
<input type="button" name="btnClose" value="Back" class="btn" onclick="javascript:history.back(1);" />
<br />
<br />

<table>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><input type="text" value="{nama}" name="nama" disabled="disabled"/></td>
	</tr>
	<tr>
		<td>Tanggal Pentahbisan</td>
		<td>:</td>
		<td><input type="text" name="tgltahbis" id="tgltahbis" value="{tgl_pentahbisan}" />
		<script type="text/javascript">
			new tcal ({
				// form name
				'formname': 'frmEdit',
				// input name
				'controlname': 'tgltahbis'
			});
		</script>&nbsp;MM/DD/YYYY
		</td>
	</tr>
	<tr>
		<td>Emiritus</td>
		<td>:</td>
		<td>
			<?php
				$emirit = $pendetalist[0]->emiritus; 
				if ($emirit != null){
			?>
			<input type="checkbox" name="chkemirit" checked="checked" />
			<?php }else{?>
			<input type="checkbox" name="chkemirit" />
			<?php }?>
			<input type="text" value="{emiritus}" name="emiritus" />
			<script type="text/javascript">
				new tcal ({
					// form name
					'formname': 'frmEdit',
					// input name
					'controlname': 'emiritus'
				});
			</script>&nbsp;MM/DD/YYYY
		</td>
	</tr>
	<tr>
		<td valign="top">Biografi</td>
		<td valign="top">:</td>
		<td>
			<textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 100%">
				{biografi}
			</textarea>
		</td>
	</tr>
	<tr>
		<td>Foto</td>
		<td>:</td>
		<td><?php echo form_upload('userfile');?></td>
	</tr>
</table>
</form>
{/pendetalist}