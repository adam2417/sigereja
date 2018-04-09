<!DOCTYPE html>
<html>
<head>
  <title><?php echo $page_title?></title>
  <style>
    tr.header {
        background: rgb(201,201,201);	
        text-align: center;
        color: white;
    }
    tr.header th{
        padding : 0 30px 0 30px;
        font-family: Helvetica,Arial,sans-serif;
        font-size: 15px;
        font-weight: bold;
    }
    tr.header td{
        padding : 0 30px 0 30px;
        font-family: Helvetica,Arial,sans-serif;
        font-size: 12px;
        font-weight: bold;
    }
    tr th{
        font-size:10px;
        font-weight:normal;
    }
    tr td {
        border:1px;
    }
  </style>
</head>
<body>
<table>
    <tr>
        <!--<td rowspan="3"><img src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>images/header-image2.png" width="75" height="75"/></td>-->
        <td>GEREJA KRISTEN INJILI DI TANAH PAPUA</td>
    </tr>
    <tr>
        <td>KLASIS SORONG</td>
    </tr>
    <tr>
        <td>BIODATA WARGA JEMAAT</td>
    </tr>
</table>
<br/><br/>
<table>
    <?php foreach($keluargadata as $keldata) {?>
    <tr>
        <td>Propinsi</td>
        <td>:</td>
        <td><?php echo $keldata->pdesc; ?></td>
        <td>&nbsp;</td>
        <td>Distrik/Kel./Kamp.</td>
        <td>:</td>
        <td><?php echo $keldata->ddesc; ?></td>
    </tr>
    <tr>
        <td>Kab./Kota</td>
        <td>:</td>
        <td><?php echo $keldata->kabdesc; ?></td>
        <td>&nbsp;</td>
        <td>Sinode/Wilayah</td>
        <td>:</td>
        <td><?php echo $keldata->nama_wilayah; ?></td>
    </tr>
    <tr>
        <td>Nama Kepala Keluarga</td>
        <td>:</td>
        <td><?php echo $keldata->nama; ?></td>
        <td>&nbsp;</td>
        <td>Klasis</td>
        <td>:</td>
        <td><?php echo $keldata->kdesc; ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $keldata->alamat; ?></td>
        <td>&nbsp;</td>
        <td>Lingkungan</td>
        <td>:</td>
        <td><?php echo $keldata->ldesc; ?></td>
    </tr>
    <tr>
        <td>Telepon</td>
        <td>:</td>
        <td><?php echo $keldata->notelp; ?></td>
        <td>&nbsp;</td>
        <td>Jemaat</td>
        <td>:</td>
        <td><?php echo $keldata->jdesc; ?></td>
    </tr>
    <tr>        
        <td colspan="4">&nbsp;</td>
        <td>Wyk/Rayon/Sektor</td>
        <td>:</td>
        <td><?php echo $keldata->sdesc; ?></td>
    </tr>
    <?php } ?>
</table>
<br/>
<table>
    <tr class="header">
        <th width="25px" style="text-align:right;">No.</th>
        <th>Nama</th>
		<th>Jenis Kelamin</th>
        <th>Golongan Darah</th>
        <th>Tempat Lahir</th>
        <th>Tanggal/Bulan/Tahun <br/>Lahir</th>
        <th>Pekerjaan</th>
        <th>Status Nikah</th>        
    </tr>
    <?php $i = 1; ?>
    <?php foreach($listlaporandataindividuAll as $data_individual){?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $data_individual->nama_individu; ?></td>
        <td><?php echo $data_individual->jenis_kelamin; ?></td>
        <td><?php echo $data_individual->gol_darah; ?></td>
        <td><?php echo $data_individual->tempat_lahir; ?></td>
        <td><?php echo $data_individual->tanggal_lahir; ?></td>
        <td><?php echo $data_individual->pekerjaan; ?></td>
        <td><?php echo $data_individual->stat_nikah; ?></td>        
    </tr>
    <?php } ?>
</table>
<br/><br/>
<table>
    <tr class="header">
        <th>Tanggal Nikah</th>
        <th>Tempat Nikah</th>
        <th>Status Hubungan <br/>Dalam Keluarga</th>
        <th>Pendidikan Terakhir</th>
        <th>Gelar</th>
        <th>Nama Ayah</th>
        <th>Nama Ibu</th>
        <th>Suku</th>
        <th>Intra</th>
	</tr>    
    <?php foreach($listlaporandataindividuAll as $data_individual){?>
    <tr>        
        <td><?php echo $data_individual->tanggal_nikah; ?></td>		
		<td><?php echo $data_individual->tempat_nikah; ?></td>
        <td><?php echo $data_individual->stat_hub_dlm_kel; ?></td>
        <td><?php echo $data_individual->pendidikan_terakhir; ?></td>
        <td><?php echo $data_individual->gelar; ?></td>
        <td><?php echo $data_individual->nama_ayah; ?></td>
        <td><?php echo $data_individual->nama_ibu; ?></td>		
		<td><?php echo $data_individual->suku; ?></td>
        <td><?php echo $data_individual->intra; ?></td>        
    </tr>
    <?php } ?>
</table>
<br/><br/>
<table>
    <tr class="header">        
        <th>Asal Gereja</th>
        <th>Status Domisili</th>
	</tr>
    <?php //$j = 1; ?>
    <?php foreach($listlaporandataindividuAll as $data_individual){?>
    <tr>        
        <td><?php echo $data_individual->asal_gereja; ?></td>
        <td><?php echo $data_individual->status_domisili; ?></td>
    </tr>
    <?php } ?>
</table>
<br/><br/>
<?php 
    if(count($listlaporandataindividuAll) > 1){
        echo '<br/><br/><br/><br/><br/>';
    }
?>
<table>
    <tr>
        <td colspan="4"></td>
        <td>Kepala Keluarga Jemaat</td>
    </tr>
    <tr>
        <td>Nama Koordinator Wyk</td>
        <td>:</td>
        <td>___________________________________________</td>
        <td width="125px">&nbsp;</td>
    </tr>
    <tr>
        <td>Nama Pdt/Grj/Gri</td>
        <td>:</td>
        <td>___________________________________________</td>
        <td width="125px">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td>___________________________________________</td>
    </tr>
    <tr>
        <td colspan="4">&nbsp;</td>
        <td>Nama Jelas</td>
    </tr>
</table>
</body>
</html>