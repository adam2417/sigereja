<h3><u>DAFTAR INDIVIDU</u></h3>
<?php if(isset($this->session->userdata['userid'])){ ?>
<a href="<?php echo site_url('individu/tambahIndividu');?>">Tambah Data Individu</a>
<?php }?>
<br/><br/>
<form method="post" name="frmSearch" action="<?php echo site_url('individu');?>">
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
	<td>Cari Nama</td>
	<td>:</td>
	<td><input type="text" name="search_name" /></td>
</tr>
</table>
<input type="submit" name="btnview" value="View" /> 
</form>
<br/>
<?php 
//print_r($individulist);
?>
<table>
	<tr class="header">		
		<td>No</td>
		<td>Nama Keluarga</td>
		<td>Nama Anggota Keluarga</td>
		<td></td>
	</tr>
        <?php 
        if(count($individulist) > 0){
        ?>
	{individulist}
	<tr>
		<td>{id_individu}</td>		
		<td>{nama_keluarga}</td>
		<td>{nama_individu}</td>
		<td>
			<a href="<?php echo site_url('individu/getDetailIndividu');?>/{id_individu}">Lihat Detail</a>
			<?php if($role == '1'){ ?>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('individu/ubahIndividu');?>/{id_individu}">Ubah</a>
			&nbsp;|&nbsp;
			<a href="<?php echo site_url('individu/hapusIndividu');?>/{id_individu}">Hapus</a>
			<?php } ?>
		</td>
	</tr>
	{/individulist}
        <?php 
        }else{
            echo "<tr>";
            echo "<td colspan='3' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }
        ?>
</table>