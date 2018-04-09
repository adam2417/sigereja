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
<script type="text/javascript">
	function test(chk){
		var ele = document.getElementById("cal");		
		if(chk){
			document.getElementById("emiritus").disabled = false;
			ele.style.display = "block";
		}else{
			document.getElementById("emiritus").value = "";
			document.getElementById("emiritus").disabled = true;
			ele.style.display = "none";
		}		
	}	
</script>
<form method="post" name="frmTambah" action="<?php echo site_url('pendeta/tambahPendeta');?>" enctype="multipart/form-data">
<h3><u>TAMBAH PENDETA</u></h3>
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
		<td><select name="nama">
			<?php $count = count($individu);
			foreach($individu as $comboInd){
			?>
			<option value="<?php echo $comboInd->id_individu?>"><?php echo $comboInd->nama_individu;?></option>
			<?php }?>
		</select></td>
	</tr>
	<tr>
		<td>Tanggal Pentahbisan</td>
		<td>:</td>
		<td><input type="text" name="tgltahbis" />
		<script type="text/javascript">
				new tcal ({
					// form name
					'formname': 'frmTambah',
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
			<table>
				<tr>
					<td><input type="checkbox" name="chkemirit"  onclick="test(this.checked);"  /></td>
					<td><input type="text" name="emiritus" id="emiritus" disabled/></td>
					<td>
						<div id="cal" style="display:none;width:10px;">	
							<script type="text/javascript">
								new tcal ({
									// form name
									'formname': 'frmTambah',
									// input name
									'controlname': 'emiritus'
								});
							</script>
						</div>
					</td>
				</tr>
			</table>						
		</td>
	</tr>
	<tr>
		<td valign="top">Biografi</td>
		<td valign="top">:</td>
		<td>
			<textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 100%">				
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