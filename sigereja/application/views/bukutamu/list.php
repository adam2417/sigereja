<h3><u>DAFTAR BUKU TAMU</u></h3>
<br/><br/>
<table>
	<tr class="header">
		<td>No</td>
		<td>Pengirim</td>
		<td>Pesan</td>
		<td></td>
	</tr>
        <?php 
        if(count($bukutamu) > 0){
        ?>
	{bukutamu}
	<tr>
		<td style="text-align:center;">{id}</td>
		<td>{pengiriman}</td>
		<td style="text-align:center;">{pesan}</td>
		<td>
			<a href="<?php echo site_url('bukutamu/getBukuTamuDetail');?>/{id}">Lihat Detail</a>
			<?php if($role == '1'){ ?>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('bukutamu/deleteBukuTamu');?>/{id}">Hapus</a>
			<?php } ?>
		</td>
	</tr>	
	{/bukutamu}
        <?php 
        }else{
            echo "<tr>";
            echo "<td colspan='3' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }
        ?>
</table>