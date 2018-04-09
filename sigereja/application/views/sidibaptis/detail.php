<h3><u>DETAIL SURAT BAPTIS/SIDI</u></h3>
<a href="javascript:history.back(1);"><< Back</a>
<br/><br/>
{listsidibaptis}
<table>
	<tr>
		<td>
		<?php 
			$tgl_surat = $listsidibaptis[0]->tanggal_surat;
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
			$tgl_baptisidi = $listsidibaptis[0]->tanggal_baptis_sidi;
			list($m,$d,$y) = explode('/',$tgl_baptisidi);
			$baptisididate = mktime(0,0,0,$m,$d,$y);	
		?>
		Tanggal <?php $baptis_sidi = ($listsidibaptis[0]->tipe == '0') ? "Baptis" : "Sidi"; echo $baptis_sidi;?>
		</td>
		<td>:</td>
		<td><?php echo date('d M Y',$baptisididate); ?></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td>{nama}</td>
	</tr>
	<tr>
		<td>
		Tempat <?php $baptis_sidi = ($listsidibaptis[0]->tipe == '0') ? "Baptis" : "Sidi"; echo $baptis_sidi;?>
		</td>
		<td>:</td>
		<td>{tempat_sidibaptis}</td>
	</tr>
	<tr>
		<td>Pendeta</td>
		<td>:</td>
		<td>{pendeta}</td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td>:</td>
		<td>{keterangan}</td>
	</tr>
</table>
{/listsidibaptis}