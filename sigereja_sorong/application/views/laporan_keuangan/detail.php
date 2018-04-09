<h3><u>DETAIL LAPORAN KEUANGAN</u></h3>
<a href="javascript:history.back(1);"><< Back</a>
<br/><br/>
{listlap_keu}
<?php 
	$dates = $listlap_keu[0]->tanggal;
	list($m,$d,$y) = explode('/',$dates);
	$date = mktime(0,0,0,$m,$d,$y);	
?>
<table>  
  <tr>
    <td>Tanggal</td>
    <td>:</td>
    <td><?php echo date('d M Y',$date); ?></td>
  </tr>
  <tr>
    <td>Jumlah Pengeluaran</td>
    <td>:</td>
    <td>{jum_pengeluaran}</td>
  </tr>
  <tr>
    <td>Jumlah Pemasukan</td>
    <td>:</td>
    <td>{jum_pemasukan}</td>
  </tr>
  <tr>
    <td>Saldo Akhir</td>
    <td>:</td>
    <td>{saldo_akhir}</td>
  </tr>
  <tr>
    <td>Keterangan</td>
    <td>:</td>
    <td>{keterangan}</td>
  </tr>
</table>
{/listlap_keu}