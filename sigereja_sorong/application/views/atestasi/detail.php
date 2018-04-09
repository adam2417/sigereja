<h3><u>DETAIL SURAT BAPTIS/SIDI</u></h3>
<a href="javascript:history.back(1);"><< Back</a>
<br/><br/>
{listatestasi}
<table>
	<tr>
		<td>
		<?php 
			$tgl_surat = $listatestasi[0]->tanggal_surat;
			list($m,$d,$y) = explode('/',$tgl_surat);
			$suratdate = mktime(0,0,0,$m,$d,$y);	
		?>
		Tanggal Surat</td>
		<td>:</td>
		<td><?php echo date('d M Y',$suratdate); ?></td>
	</tr>
	<tr>
		<td>
		<?php 
			$tgl_atestasi = $listatestasi[0]->tanggal_atestasi_keluarmasuk;
			list($m,$d,$y) = explode('/',$tgl_atestasi);
			$atestasi = mktime(0,0,0,$m,$d,$y);	
		?>
		Tanggal Atestasi
		</td>
		<td>:</td>
		<td><?php echo date('d M Y',$atestasi); ?></td>
	</tr>
	<tr>
		<td>Gereja Tujuan/Asal</td>		
		<td>:</td>
		<td>{gereja_tujuanasal}</td>
	</tr>
	<tr>
		<td>Alamat Gereja Tujuan/Asal</td>
		<td>:</td>
		<td>{alamat_gereja_tujuanasal}</td>
	</tr>
	<tr>
		<td>Alamat Tinggal</td>
		<td>:</td>
		<td>{alamat_tinggal}</td>
	</tr>
	<tr>
		<td>
		<?php 
			$tgl_masukkeluar = $listatestasi[0]->tanggal_masukkeluar;
			list($m,$d,$y) = explode('/',$tgl_masukkeluar);
			$tglmasukkeluar = mktime(0,0,0,$m,$d,$y);	
		?>
		Tanggal Masuk Keluar</td>
		<td>:</td>
		<td><?php echo date('d M Y',$tglmasukkeluar); ?></td>
	</tr>
	<tr>
		<td>Individu</td>
		<td>:</td>
		<td>{individu}</td>
	</tr>
	<tr>
		<td>Keluarga</td>
		<td>:</td>
		<td>{keluarga}</td>
	</tr>
</table>
{/listatestasi}