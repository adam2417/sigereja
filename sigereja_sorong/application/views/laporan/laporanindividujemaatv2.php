<h3><u>LAPORAN INDIVIDU</u></h3>
<form method="post" name="frmSearch" action="<?php echo site_url('laporan/getDataLaporanIndividuNew');?>">
<table>
<tr>
	<td>Keluarga</td>
	<td>:</td>
	<td><select name="keluarga">
		<?php
		$count = count($keluarga_list);
		foreach($keluarga_list as $comboKel){
			$wil[$comboKel->id] .= $comboKel->nama;			
		}
		foreach($wil as $key=>$value){
		?>
		<option value="<?php echo $key; ?>" <?php if(isset($curr_val)) { if ($key == $curr_val) { echo 'selected="selected"'; }} ?> ><?php echo $value?></option>
		<?php }?>
	</select></td>	
</tr>
<tr>
    <td><input type="submit" name="btnview" value="View" /></td>
    <td colspan="2"><input type="submit" name="btnpdf" value="Cetak PDF" /></td>
</tr>
</table>
</form>
<div style="overflow-x:scroll;width:75%;">
<table id="datatable">
<thead>
	<tr class="header">		
		<th>Nama</th>
		<th>Jenis Kelamin</th>
        <th>Golongan Darah</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Pekerjaan</th>
        <th>Status Nikah</th>
        <th>Tanggal Nikah</th>
        <th>Tempat Nikah</th>
	</tr>
<thead>
<tbody>
	<?php if(count($listlaporandataindividuAll) > 0) {?>
	{listlaporandataindividuAll}
	<tr>
		<td>{nama_individu}</td>		
		<td>{jenis_kelamin}</td>
        <td>{gol_darah}</td>
        <td>{tempat_lahir}</td>
        <td>{tanggal_lahir}</td>
        <td>{pekerjaan}</td>
        <td>{stat_nikah}</td>
        <td>{tanggal_nikah}</td>		
		<td>{tempat_nikah}</td>
	</tr>
	{/listlaporandataindividuAll}
    <?php } 
		else{
            echo "<tr>";
            echo "<td colspan='2' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }
	?>
</tbody>
</table>
</div>
<br/><br/>
<div style="overflow-x:scroll;width:75%;">
<table id="datatable2">
<thead>
	<tr class="header">
        <th>Status Hubungan <br/>Dalam Keluarga</th>
        <th>Pendidikan Terakhir</th>
        <th>Gelar</th>
        <th>Nama Ayah</th>
        <th>Nama Ibu</th>
        <th>Suku</th>
        <th>Intra</th>
        <th>Asal Gereja</th>
        <th>Status Domisili</th>
	</tr>
<thead>
<tbody>
	<?php if(count($listlaporandataindividuAll) > 0) {?>
	{listlaporandataindividuAll}
	<tr>
        <td>{stat_hub_dlm_kel}</td>
        <td>{pendidikan_terakhir}</td>
        <td>{gelar}</td>
        <td>{nama_ayah}</td>
        <td>{nama_ibu}</td>		
		<td>{suku}</td>
        <td>{intra}</td>
        <td>{asal_gereja}</td>
        <td>{status_domisili}</td>
	</tr>
	{/listlaporandataindividuAll}
    <?php } 
		else{
            echo "<tr>";
            echo "<td colspan='2' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }
	?>
</tbody>
</table>
</div>
<br/><br/>
<!--<p style="text-align: left"><a href="<?php echo site_url('laporan/printDocumentToPDF')?>">Cetak PDF</a></p>-->