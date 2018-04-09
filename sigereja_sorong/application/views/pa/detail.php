<h3><u>DETAIL PA</u></h3>
<a href="javascript:history.back(1);"><< Back</a>
<br/><br/>
{listpa}
<?php 

	$dates = $listpa[0]->tgl_kebaktian;
	list($m,$d,$y) = explode('/',$dates);
	$date = mktime(0,0,0,$m,$d,$y);	
?>
Tanggal Kebaktian:&nbsp;<?php echo date('d M Y',$date); ?>
<br/>
Jam Kebaktian:&nbsp;{waktu_kebaktian}
<br/>
Wilayah:&nbsp;{nama_wil}
<br/>
<i>Keluarga:&nbsp;{keluarga}</i>
<br/>
Pemimpin: {pemimpin}
<br/>
Pendamping: {pendamping}
<br/>
{/listpa}