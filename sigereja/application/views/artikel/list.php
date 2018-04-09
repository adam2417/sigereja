<h3><u>DAFTAR ARTIKEL</u></h3>
<link rel="stylesheet" type="text/css" media="all" href="../asset/styles/app/calendar.css" />
<script type="text/javascript" src="../asset/scripts/calendar/cal.js"></script>
<?php
$role = $this->session->userdata('role');
if($role == '1'){
?>
<a href="<?php echo site_url('artikel/tambahArtikel');?>">Tambah Artikel</a>
<br/><br/>
<?php } ?>
<form method="post" name="frmSearch" action="<?php echo site_url('artikel');?>">
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
<table>
	<tr class="header">		
		<td width="400">Judul Artikel</td>
		<td></td>
	</tr>
        <?php
            if(count($artikellist) > 0){
        ?>
            {artikellist}
            <tr>
                    <td>{judul_artikel}</td>
                    <td>
                            <a href="<?php echo site_url('artikel/artikelOneSelect');?>/{id}">Lihat Detail</a>
                            <?php if($role == '1'){ ?>
                            &nbsp;|&nbsp;
                            <a href="<?php echo site_url('artikel/ubahArtikel');?>/{id}">Ubah</a>
                            &nbsp;|&nbsp;
                            <a href="<?php echo site_url('artikel/hapusArtikel');?>/{id}">Hapus</a>
                            <?php } ?>
                    </td>
            </tr>
            {/artikellist}
        <?php         
            }else{
                echo "<tr>";
                echo "<td style='text-align:center;color:red;'>No Data To Display</td>";
                echo "</tr>";
            }
        ?>
</table>
