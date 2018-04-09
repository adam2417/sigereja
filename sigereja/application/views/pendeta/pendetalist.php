<h3><u>DAFTAR PENDETA YANG MELAYANI DI GKS WAINGAPU</u></h3>
<?php
$role = $this->session->userdata('role');
if($role == '1'){
?>
<a href="<?php echo site_url('pendeta/tambahPendeta');?>">Tambah Pendeta</a>
<br/><br/>
<?php } ?>
<table>
	<tr class="header">
		<td>Nama</td>
		<td>Status</td>
		<td></td>
	</tr>
        <?php 
        if(count($pendetalist) > 0){
        ?>
	{pendetalist}
	<tr>
		<td>{nama}</td>
		<td style="text-align:center;"><?php if($pendetalist[0]->status == '1')echo "Aktif"; else echo "Tidak Aktif"?></td>
		<td>
			<a href="<?php echo site_url('pendeta/getDetailPendeta');?>/{id}">Lihat Detail</a>
			<?php if($role == '1'){ ?>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('pendeta/ubahPendeta');?>/{id}">Ubah</a>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('pendeta/hapusPendeta');?>/{id}">Hapus</a>
			<?php } ?>
		</td>
	</tr>	
	{/pendetalist}
        <?php         
        } else{
            echo "<tr>";
            echo "<td colspan='2' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }        
        ?>
</table>
