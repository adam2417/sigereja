<h3><u>DAFTAR MAJELIS YANG MELAYANI DI GEREJA KRISTEN SUMBA WAINGAPU</u></h3>
<?php if(isset($this->session->userdata['userid'])){ ?>
<a href="<?php echo site_url('majelis/addMajelis');?>">Tambah Majelis</a>
<?php }?>
<br/><br/>
<form method="post" name="frmSearch" action="<?php echo site_url('majelis');?>">
<table>
<tr>
	<td>Wilayah</td>
	<td>:</td>
	<td><select name="wilayah">
		<?php
		$wil = array('all'=>'All Wilayah'); 
		$count = count($wilayahlist);
		foreach($wilayahlist as $comboWil){
			$wil[$comboWil->id] .= $comboWil->nama;			
		}
		foreach($wil as $key=>$value){
		?>	
		<option value="<?php echo $key?>"><?php echo $value?></option>
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
<table>
	<tr class="header">		
		<td>Nama</td>
		<td>Wilayah</td>
		<td>Tanggal Pentahbisan</td>
		<td></td>
	</tr>
        <?php
        if(count($datamajelis) > 0){
        ?>
	{datamajelis}
	<tr>
		<td>{nama}</td>		
		<td>{nama_wilayah}</td>
		<td>{tgl_pentahbisan}</td>
		<td>
			<a href="<?php echo site_url('majelis/details');?>/{id}">Lihat Detail</a>
			<?php if($role == '1'){ ?>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('majelis/edit');?>/{id}">Ubah</a>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('majelis/hapusProfileMajelis');?>/{id}">Hapus</a>
			<?php } ?>
		</td>
	</tr>
	{/datamajelis}
        <?php 
        } else{
            echo "<tr>";
            echo "<td colspan='3' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }
        ?>
</table>