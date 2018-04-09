<h3><u>DETAIL INDIVIDU</u></h3>
<a href="javascript:history.back(1);"><< Back</a>
<br/><br/>
{individulist}
<table>
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
		<td><?php $idJenisKelamin = $individulist[0]->jenis_kelamin == '0' ? 'Laki-laki' : 'Perempuan;'; echo $idJenisKelamin;?></td>
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
		<td>Alamat</td>
		<td>:</td>
		<td>{alamat}</td>
	</tr>
	<tr>
		<td>No. Telp</td>
		<td>:</td>
		<td>{telp}</td>
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
		<td>Baptis</td>
		<td>:</td>
		<td><?php $baptis = ($individulist[0]->baptis) == '0' ? 'Belum' : 'Sudah';echo $baptis;?></td>
	</tr>
	<tr>
		<td>Sidi</td>
		<td>:</td>
		<td><?php $sidi = ($individulist[0]->sidi) == '0' ? 'Belum' : 'Sudah';echo $sidi;?></td>
	</tr>
	<tr>
		<td>Life</td>
		<td>:</td>
		<td><?php $life = ($individulist[0]->life) == '1' ? 'Hidup' : 'Meninggal';echo $life;?></td>
	</tr>
	<tr>
		<td valign="top">Foto</td>
		<td valign="top">:</td>
		<td><img src="{foto}" /></td>
	</tr>
</table>
{/individulist}