<h3><u>DAFTAR LAPORAN KEUANGAN</u></h3>
<?php if(isset($this->session->userdata['userid'])){ ?>
<a href="<?php echo site_url('lap_keu/tambahLap_keu');?>">Tambah Laporan Keuangan</a>
<?php }?>
<br/><br/>

<table>
	<tr class="header">		
		<td width="200">Tanggal</td>
		<td width="300">Keterangan</td>
		<td></td>
	</tr>
        <?php 
        if(count($listlap_keu) > 0){
        ?>
	{listlap_keu}
	<tr>
		<td>{tanggal}</td>		
		<td>{keterangan}</td>
		<td>
			<a href="<?php echo site_url('lap_keu/lap_keuOneSelect');?>/{id}">Lihat Detail</a>
			<?php if($role == '1'){ ?>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('lap_keu/ubahLap_keu');?>/{id}">Ubah</a>
                        &nbsp;|&nbsp;
			<a href="<?php echo site_url('lap_keu/hapus');?>/{id}">Hapus</a>
			<?php } ?>
		</td>
	</tr>
	{/listlap_keu}
        <?php 
        } else{
            echo "<tr>";
            echo "<td colspan='2' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }
        ?>
</table>