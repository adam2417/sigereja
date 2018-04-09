<h3><u>DAFTAR SURAT SIDI DAN BAPTIS</u></h3>
<?php if(isset($this->session->userdata['userid'])){ ?>
<a href="<?php echo site_url('sidibaptis/tambahSidiBaptis');?>">Tambah Surat Baptis/Sidi</a>
<?php }?>
<br/><br/>
<table>
	<tr class="header">		
		<td>Nama</td>
		<td>Tanggal Baptis/Sidi</td>
        <td>Status</td>
		<td></td>
	</tr>
        <?php 
        if(count($listsidibaptis) > 0){
        ?>
	{listsidibaptis}
	<tr>
		<td>{nama}</td>		
		<td>{tanggal_baptis_sidi}</td>
                <td>{tipe}</td>
		<td>
			<a href="<?php echo site_url('sidibaptis/sidibaptisOneSelect');?>/{id}">Lihat Detail</a>
			<?php if($role == '1'){ ?>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('sidibaptis/ubahSidiBaptis');?>/{id}">Ubah</a>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('sidibaptis/hapusSidiBaptis');?>/{id}">Hapus</a>
			<?php } ?>
		</td>
	</tr>
	{/listsidibaptis}
        <?php 
        } else{
            echo "<tr>";
            echo "<td colspan='3' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }
        ?>
</table>