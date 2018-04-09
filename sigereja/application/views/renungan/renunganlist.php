<h3><u>DAFTAR RENUNGAN</u></h3>
<link rel="stylesheet" type="text/css" media="all" href="../asset/styles/app/calendar.css" />
<script type="text/javascript" src="../asset/scripts/calendar/cal.js"></script>
<?php
$role = $this->session->userdata('role');
if($role == '1'){
?>
<a href="<?php echo site_url('renungan/tambahRenungan');?>">Tambah Renungan</a>
<br/><br/>
<?php } ?>
<form method="post" name="frmSearch" action="<?php echo site_url('renungan');?>">
Tanggal&nbsp;:&nbsp;<input type="text" name="searchDate"/>
<script type="text/javascript">
	new tcal ({
		// form name
		'formname': 'frmSearch',
		// input name
		'controlname': 'searchDate'
	});
</script>
<input type="submit" name="btnview" value="View" /> 
</form>
<br/>
<?php 
    if((count($message) > 0) && !($message == '')){
        echo $message;
    }
?>
<br/>
<table>
	<tr class="header">		
		<td width="400">Judul</td>
		<td>Penulis</td>
		<td></td>
	</tr>
        <?php 
        if((count($renunganlist) > 0) && !($renunganlist == '') && !($renunganlist == NULL)){
        ?>
	{renunganlist}
	<tr>
		<td>{judul}</td>		
		<td>{penulis}</td>
		<td>
			<a href="<?php echo site_url('renungan/renunganOneSelect');?>/{id}">Lihat Detail</a>
			<?php if($role == '1'){ ?>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('renungan/ubahRenungan');?>/{id}">Ubah</a>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('renungan/hapusRenungan');?>/{id}">Hapus</a>
			<?php } ?>
		</td>
	</tr>
	{/renunganlist}
        <?php 
        } else{
            echo "<tr>";
            echo "<td colspan='2' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }
        ?>
</table>
