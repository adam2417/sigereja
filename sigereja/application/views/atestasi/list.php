<h3><u>DAFTAR SURAT SIDI DAN BAPTIS</u></h3>
<?php if(isset($this->session->userdata['userid'])){ ?>
<a href="<?php echo site_url('atestasi/tambahAtestasi');?>">Tambah Surat Atestasi</a>
<?php }?>
<br/><br/>
<table>
	<tr class="header">		
		<td>Tanggal Surat</td>
		<td>Tanggal Atestasi</td>        
        <td>Nama Individu</td>
        <td>Nama Keluarga</td>
		<td></td>
	</tr>
        <?php 
        if(count($listatestasi) > 0){
        ?>
	{listatestasi}
	<tr>
		<td>{tanggal_surat}</td>		
		<td>{tanggal_atestasi_keluarmasuk}</td>        
        <td>{individu}</td>
        <td>{keluarga}</td>
		<td>
			<a href="<?php echo site_url('atestasi/atestasiOneSelect');?>/{id}">Lihat Detail</a>
			<?php if($role == '1'){ ?>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('atestasi/ubahAtestasi');?>/{id}">Ubah</a>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('atestasi/hapusAtestasi');?>/{id}">Hapus</a>
			<?php } ?>
		</td>
	</tr>
	{/listatestasi}
        <?php 
        }else{
            echo "<tr>";
            echo "<td colspan='4' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }
        ?>
</table>