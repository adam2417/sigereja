<h3><u>DAFTAR PA</u></h3>
<?php if(isset($this->session->userdata['userid'])){ ?>
<a href="<?php echo site_url('pa/tambahPa');?>">Tambah PA</a>
<?php }?>
<br/><br/>

<table>
	<tr class="header">		
		<td>Wilayah</td>
		<td>Keluarga</td>
        <td>Pemimpin</td>
		<td></td>
	</tr>
        <?php 
        if(count($listpa) > 0){
        ?>
	{listpa}
	<tr>
		<td>{nama}</td>		
		<td>{keluarga}</td>
        <td>{pemimpin}</td>
		<td>
			<a href="<?php echo site_url('pa/PaOneSelect');?>/{id}">Lihat Detail</a>
			<?php if($role == '1'){ ?>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('pa/ubahPa');?>/{id}">Ubah</a>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('pa/hapusPa');?>/{id}">Hapus</a>
			<?php } ?>
		</td>
	</tr>
	{/listpa}
        <?php 
        }else{
            echo "<tr>";
            echo "<td colspan='2' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }
        ?>
</table>