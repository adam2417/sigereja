<h3><u>DETAIL RENUNGAN</u></h3>
<a href="javascript:history.back(1);"><< Back</a>
<br/><br/>
{listkegiatan}
<?php 
	$dates = $listkegiatan[0]->waktu;
	list($m,$d,$y,$h,$i) = explode('/',$dates);
	$date = mktime($h,$i,0,$m,$d,$y);	
?>
Tanggal:&nbsp;<i><?php echo date('d M Y H:i',$date); ?></i>
<br/>
<br/>
<font size="4"><b><u>{nama}</u></b></font>
<br/>
Tempat:&nbsp;{tempat}
<br/>
<i>Koordinasi: {koordinasi}</i>
<br/>
{/listkegiatan}