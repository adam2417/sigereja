<h3><u>DETAIL KELUARGA</u></h3>
<a href="javascript:history.back(1);"><< Back</a>
<br/><br/>
{keluargalist}
<table>
    <tr>
		<td>Propinsi</td>
		<td>:</td>
		<td>{pdesc}</td>
        <td>&nbsp;</td>
        <td>Distrik/Kel/Kamp.</td>
		<td>:</td>
		<td>{ddesc}</td>
	</tr>
    <tr>
		<td>Kab./Kota</td>
		<td>:</td>
		<td>{kabdesc}</td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td>{nama}</td>
        <td>&nbsp;</td>
        <td>Sinode/Wilayah</td>
		<td>:</td>
		<td>{nama_wilayah}</td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td>{alamat}</td>
        <td>&nbsp;</td>
        <td>Klasis</td>
		<td>:</td>
		<td>{kdesc}</td>
	</tr>	
	<tr>
		<td>No. Telp</td>
		<td>:</td>
		<td>{notelp}</td>
        <td>&nbsp;</td>
        <td>Lingkungan</td>
		<td>:</td>
		<td>{ldesc}</td>
	</tr>
    <tr>
		<td>Jemaat</td>
		<td>:</td>
		<td>{jdesc}</td>
        <td>&nbsp;</td>
        <td>Wyk/Rayon/Sektor</td>
		<td>:</td>
		<td>{sdesc}</td>
	</tr>
</table>
{/keluargalist}
<h5><u>DAFTAR ANGGOTA KELUARGA</u></h5>
<table>
    <tr class="header">
        <td>No</td>
        <td>Nama Lengkap</td>
        <td>Status Hubungan Dalam Keluarga</td>
        <td>&nbsp;</td>
    </tr>    
    <?php $i = 1;?>
    <?php foreach($individulist as $individu) {?>    
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $individu->nama_individu;?></td>
        <td><?php echo $individu->stat_hub_dlm_kel;?></td>
        <td><a href="<?php echo site_url('individu/getDetailIndividu');?>/<?php echo $individu->id_individu; ?>">Detail</a></td>
    </tr>
    <?php } ?>
</table>