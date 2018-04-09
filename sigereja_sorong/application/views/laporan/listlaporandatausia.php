<script type="text/javascript">
<!--
/**
 * Visualize an HTML table using Highcharts. The top (horizontal) header 
 * is used for series names, and the left (vertical) header is used 
 * for category names. This function is based on jQuery.
 * @param {Object} table The reference to the HTML table to visualize
 * @param {Object} options Highcharts options
 */
Highcharts.visualize = function(table, options) {
	// the categories
	options.xAxis.categories = [];
	$('tbody th', table).each( function(i) {
		options.xAxis.categories.push(this.innerHTML);
	});
	
	// the data series
	options.series = [];
	$('tr', table).each( function(i) {
		var tr = this;
		$('th, td', tr).each( function(j) {
			if (j > 0) { // skip first column
				if (i == 0) { // get the name and init the series
					options.series[j - 1] = { 
						name: 'Kelompok Umur',
						data: []
					};
				} else { // add values
					options.series[j - 1].data.push(parseFloat(this.innerHTML));
				}
			}
		});
	});
	
	var chart = new Highcharts.Chart(options);
}
	
// On document ready, call visualize on the datatable.
$(document).ready(function() {			
	var table = document.getElementById('datatable'),
	options = {
		   chart: {
		      renderTo: 'grafik',
		      defaultSeriesType: 'column'
		   },
		   title: {
		      text: 'Laporan Data Usia'
		   },
		   subtitle: {
				text: 'Wilayah: ' + "<?php echo $wil;?>"
			},
		   xAxis: {
		   },
		   yAxis: {
		      title: {
		         text: 'Jumlah'
		      }
		   },
		   tooltip: {
		      formatter: function() {
		         return '<b>'+ this.series.name +': </b>'+ this.x +'<br/>' + ' Jumlah: ' + this.y;
		      }
		   }
		};      					
	Highcharts.visualize(table, options);
});
--></script>
<script type="text/javascript">
function toggleDiv(divId) {
   $("#"+divId).toggle();
}
</script>
<h3><u>LAPORAN KELOMPOK USIA</u></h3>
<br/>
<a href="javascript:toggleDiv('grafik');" style="background-color: #ccc; padding: 5px 10px;">Lihat Grafik</a>
<br/><br/>
<div id="grafik" style="width: 600px; height: 350px; margin: 0 auto; display:none;"></div>
<br/>
<form method="post" name="frmSearch" action="<?php echo site_url('laporan/getDataLaporanUsia');?>">
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
<br/>
<table id="datatable">
<thead>
	<tr class="header">		
		<th>Kelompok Umur</th>
		<th>Jumlah</th>
	</tr>
<thead>
<tbody>
	<?php if(count($listlaporandatausia) > 0) {?>
	{listlaporandatausia}
	<tr>
		<th>{kelompok_umur}</th>		
		<td>{jumlah}</td>
	</tr>
	{/listlaporandatausia}
    <?php } 
		else{
            echo "<tr>";
            echo "<td colspan='2' style='text-align:center;color:red;'>No Data To Display</td>";
            echo "</tr>";
        }

	?>
</tbody>
</table>
<br/>
<h2>Keterangan</h2>
<?php 
$balita = array();
$anak = array();
$remaja = array();
$pemuda = array();
$orangtua = array();
$manula = array();
$others = array();
foreach($listlaporandatausiaAll as $dataAll){
    if($dataAll->kelompok_umur == 'Balita'){
        array_push($balita, $dataAll->nama_individu);        
    }else if($dataAll->kelompok_umur == 'Anak-anak'){
        array_push($anak,$dataAll->nama_individu);
    }else if($dataAll->kelompok_umur == 'Remaja'){
        array_push($remaja,$dataAll->nama_individu);
    }else if($dataAll->kelompok_umur == 'Pemuda'){
        array_push($pemuda,$dataAll->nama_individu);
    }else if($dataAll->kelompok_umur == 'OrangTua'){
        array_push($orangtua,$dataAll->nama_individu);
    }else if($dataAll->kelompok_umur == 'Manula'){
        array_push($manula,$dataAll->nama_individu);
    }else if($dataAll->kelompok_umur == 'Others'){
        array_push($others,$dataAll->nama_individu);
    }
}

if(count($balita) > 0){
    echo '<div>';
    echo '<h3>Balita</h3>';
    echo '<table>';
    echo '<tr class="header"><td width="3">No</td>';
    echo '<td>Nama Individu</td></tr>';
    $i = 0;
    foreach($balita as $balita_individu){
        $i++;
        echo '<tr><td align="right">'.$i.'</td>';
        echo '<td>'.$balita_individu.'</td></tr>';        
    }
    echo '</table>';
    echo '</div>';
}
echo "<br/>";
if(count($anak) > 0){
     echo '<div>';
    echo '<h3>Anak-anak</h3>';
    echo '<table>';
    echo '<tr class="header"><td width="3">No</td>';
    echo '<td>Nama Individu</td></tr>';
    $i = 0;
    foreach($anak as $anak_individu){
        $i++;
        echo '<tr><td align="right">'.$i.'</td>';
        echo '<td>'.$anak_individu.'</td></tr>';        
    }
    echo '</table>';
    echo '</div>';
}
echo "<br/>";
if(count($remaja) > 0){
    echo '<div>';
    echo '<h3>Remaja</h3>';
    echo '<table>';
    echo '<tr class="header"><td width="3">No</td>';
    echo '<td>Nama Individu</td></tr>';
    $i = 0;
    foreach($remaja as $remaja_individu){
        $i++;
        echo '<tr><td align="right">'.$i.'</td>';
        echo '<td>'.$remaja_individu.'</td></tr>';        
    }
    echo '</table>';
    echo '</div>';
}
echo "<br/>";
if(count($pemuda) > 0){
     echo '<div>';
    echo '<h3>Pemuda</h3>';
    echo '<table>';
    echo '<tr class="header"><td width="3">No</td>';
    echo '<td>Nama Individu</td></tr>';
    $i = 0;
    foreach($pemuda as $pemuda_individu){
        $i++;
        echo '<tr><td align="right">'.$i.'</td>';
        echo '<td>'.$pemuda_individu.'</td></tr>';        
    }
    echo '</table>';
    echo '</div>';
}
echo "<br/>";
if(count($orangtua) > 0){
     echo '<div>';
    echo '<h3>Orang Tua</h3>';
    echo '<table>';
    echo '<tr class="header"><td width="3">No</td>';
    echo '<td>Nama Individu</td></tr>';
    $i = 0;
    foreach($orangtua as $orangtua_individu){
        $i++;
        echo '<tr><td align="right">'.$i.'</td>';
        echo '<td>'.$orangtua_individu.'</td></tr>';        
    }
    echo '</table>';
    echo '</div>';
}
echo "<br/>";
if(count($manula) > 0){
     echo '<div>';
    echo '<h3>Manula</h3>';
    echo '<table>';
    echo '<tr class="header"><td width="3">No</td>';
    echo '<td>Nama Individu</td></tr>';
    $i = 0;
    foreach($manula as $manula_individu){
        $i++;
        echo '<tr><td align="right">'.$i.'</td>';
        echo '<td>'.$manula_individu.'</td></tr>';        
    }
    echo '</table>';
    echo '</div>';
}
echo "<br/>";
if(count($others) > 0){
     echo '<div>';
    echo '<h3>Others</h3>';
    echo '<table>';
    echo '<tr class="header"><td width="3">No</td>';
    echo '<td>Nama Individu</td></tr>';
    $i = 0;
    foreach($others as $others_individu){
        $i++;
        echo '<tr><td align="right">'.$i.'</td>';
        echo '<td>'.$others_individu.'</td></tr>';        
    }
    echo '</table>';
    echo '</div>';
}
?>