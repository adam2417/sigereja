<h3><u>DAFTAR KELUARGA</u></h3>
<?php if(isset($this->session->userdata['userid'])){ ?>
<a href="<?php echo site_url('keluarga/tambahKeluarga');?>">Tambah Data Keluarga</a>
<?php }?>
<br/><br/>
<form method="post" name="frmSearch" action="<?php echo site_url('keluarga');?>">
<table>
<tr>
	<td>Wilayah</td>
	<td>:</td>
	<td><select name="wilayah">
		<?php $count = count($wilayahlist);
		foreach($wilayahlist as $comboWil){
		?>
		<option value="<?php echo $comboWil->id?>"><?php echo $comboWil->nama;?></option>
		<?php }?>
	</select></td>
	<td>&nbsp;</td>	
	<!-- <td>Status Hidup</td>
	<td>:</td>
	<td><select name="statushidup">		
		<option value="1">Hidup</option>		
	</select>
	</td> -->	
</tr>
</table>
<input type="submit" name="btnview" value="View" /> 
</form>
<br/>
<table>
	<tr class="header">		
		<td>Nama</td>
		<td>Wilayah</td>
		<td></td>
	</tr>
        <?php 
        if(count($keluargalist) > 0){
        ?>
	{keluargalist}
	<tr>
		<td>{nama}</td>		
		<td>{nama_wilayah}</td>
		<td>
			<a href="<?php echo site_url('keluarga/getDetailKeluarga');?>/{id}">Lihat Detail</a>
			<?php if($role == '1'){ ?>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('keluarga/ubahKeluarga');?>/{id}">Ubah</a>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('keluarga/hapusKeluarga');?>/{id}">Hapus</a>
			<?php } ?>
		</td>
	</tr>
	{/keluargalist}
        <?php 
        }else{
            echo "<tr>";
            echo "<td colspan='2' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }
        ?>
</table>