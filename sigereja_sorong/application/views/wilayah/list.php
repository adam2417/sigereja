<h3><u>DAFTAR WILAYAH</u></h3>
<?php
$role = $this->session->userdata('role');
if($role == '1'){
?>
<a href="<?php echo site_url('wilayah/tambahWilayah');?>">Tambah Wilayah</a>
<br/><br/>
<?php } ?>
<table>
	<tr class="header">		
		<td>Nama Wilayah</td>		
		<td></td>
	</tr>
        <?php 
        if(count($wilayahlist) > 0){
        ?>
	{wilayahlist}
	<tr>		
		<td>{nama}</td>		
		<td>			
			<?php if($role == '1'){ ?>			
			<a href="<?php echo site_url('wilayah/ubahWilayah');?>/{id}">Ubah</a>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('wilayah/deleteWilayah');?>/{id}">Hapus</a>
			<?php } ?>
		</td>
	</tr>	
	{/wilayahlist}
        <?php 
        } else{
            echo "<tr>";
            echo "<td style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }
        ?>
</table>
