<h3><u>DAFTAR KEGIATAN</u></h3>
<?php if(isset($this->session->userdata['userid'])){ ?>
<a href="<?php echo site_url('kegiatan/tambahKegiatan');?>">Tambah Kegiatan</a>
<?php }?>
<br/><br/>

<table>
	<tr class="header">		
		<td width="400">Nama Kegiatan</td>
		<td>Tempat</td>
		<td></td>
	</tr>
        <?php 
        if(count($listkegiatan) > 0){
        ?>
	{listkegiatan}
	<tr>
		<td>{nama}</td>		
		<td>{tempat}</td>
		<td>
			<a href="<?php echo site_url('kegiatan/KegiatanOneSelect');?>/{id}">Lihat Detail</a>
			<?php if($role == '1'){ ?>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('kegiatan/ubahKegiatan');?>/{id}">Ubah</a>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('kegiatan/hapusKegiatan');?>/{id}">Hapus</a>
			<?php } ?>
		</td>
	</tr>
	{/listkegiatan}
        <?php 
        }else{
            echo "<tr>";
            echo "<td colspan='2' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }
        ?>
</table>