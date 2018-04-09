<h3><u>DETAIL INDIVIDU</u></h3>
<a href="javascript:history.back(1);"><< Back</a>
<br/><br/>
{individulist}
<table>
    <tr>
        <td>Keluarga</td>
        <td>:</td>
        <td>{nama_keluarga}</td>
    </tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td>{nama_individu}</td>
	</tr>
	<tr>
		<td>Wilayah</td>
		<td>:</td>
		<td>{nama_wil}</td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td>{jenis_kelamin}</td>
	</tr>
	<tr>
		<td>Tempat Lahir</td>
		<td>:</td>
		<td>{tempat_lahir}</td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td>
		<td>:</td>
		<?php 
			$dates = $individulist[0]->tanggal_lahir;
			list($m,$d,$y) = explode('/',$dates);
			$date = mktime(0,0,0,$m,$d,$y);	
		?>
		<td><?php echo date('d M Y',$date);?></td>
	</tr>
	<tr>
		<td>Golongan Darah</td>
		<td>:</td>
		<td>{gol_darah}</td>
	</tr>
	<tr>
		<td>Pekerjaan</td>
		<td>:</td>
		<td>{pekerjaan}</td>
	</tr>
	<tr>
		<td>Status Nikah</td>
		<td>:</td>
		<td>{stat_nikah}</td>
	</tr>
    <tr>
		<td>Tanggal Nikah</td>
		<td>:</td>
		<?php 
			$dates = $individulist[0]->tanggal_nikah;
			list($m,$d,$y) = explode('/',$dates);
			$date = mktime(0,0,0,$m,$d,$y);	
		?>
		<td><?php echo date('d M Y',$date);?></td>
	</tr>
    <tr>
		<td>Tempat Nikah</td>
		<td>:</td>
		<td>{tempat_nikah}</td>
	</tr>
    <tr>
		<td>Status Hubungan Dalam Keluarga</td>
		<td>:</td>
		<td>{stat_hub_dlm_kel}</td>
	</tr>
    <tr>
		<td>Pendidikan Terakhir</td>
		<td>:</td>
		<td>{pendidikan_terakhir}</td>
	</tr>
    <tr>
		<td>Gelar</td>
		<td>:</td>
		<td>{gelar}</td>
	</tr>
    <tr>
		<td>Asal Gereja</td>
		<td>:</td>
		<td>{asal_gereja}</td>
	</tr>
	<tr>
		<td>Baptis</td>
		<td>:</td>
		<td>{baptis}</td>
	</tr>
	<tr>
		<td>Sidi</td>
		<td>:</td>
		<td>{sidi}</td>
	</tr>
    <tr>
		<td>Nama Ibu</td>
		<td>:</td>
		<td>{nama_ibu}</td>
	</tr>
    <tr>
		<td>Nama Ayah</td>
		<td>:</td>
		<td>{nama_ayah}</td>
	</tr>
    <tr>
		<td>Suku</td>
		<td>:</td>
		<td>{suku}</td>
	</tr>
    <tr>
		<td>Intra</td>
		<td>:</td>
		<td>{intra}</td>
	</tr>
    <tr>
		<td>Status Domisili</td>
		<td>:</td>
		<td>{status_domisili}</td>
	</tr>
	<tr>
		<td>Life</td>
		<td>:</td>
		<td>{life}</td>
	</tr>
	<tr>
		<td valign="top">Foto</td>
		<td valign="top">:</td>
		<td><img src="{foto}" /></td>
	</tr>
</table>
{/individulist}