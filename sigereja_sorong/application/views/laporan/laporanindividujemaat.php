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
						name: 'Wilayah',
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
		      text: 'Laporan Data Individu'
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
<h3><u>LAPORAN INDIVIDU</u></h3>
<br/>
<a href="javascript:toggleDiv('grafik');" style="background-color: #ccc; padding: 5px 10px;">Lihat Grafik</a>
<br/><br/>
<div id="grafik" style="width: 600px; height: 350px; margin: 0 auto; display:none;"></div>
<br/>
<form method="post" name="frmSearch" action="<?php echo site_url('laporan/getDataLaporanIndividu');?>">
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
	 <td>Status Hidup</td>
	<td>:</td>
	<td><select name="statushidup">
		<option value="empty">&nbsp;</option>
		<option value="0">Mati</option>
		<option value="1">Hidup</option>		
	</select>
	</td>	
</tr>
</table>
<input type="submit" name="btnview" value="View" /> 
</form>
<br/>
<table id="datatable">
<thead>
	<tr class="header">		
		<th>Wilayah</th>
		<th>Jumlah</th>
	</tr>
<thead>
<tbody>
	<?php if(count($listlaporandataindividu) > 0) {?>
	{listlaporandataindividu}
	<tr>
		<th>{nama_wilayah}</th>		
		<td>{jumlah}</td>
	</tr>
	{/listlaporandataindividu}
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
echo '<div>';
echo '<table>';
echo '<tr class="header"><td width="3">No</td>';
echo '<td>Nama Individu</td>';
echo '<td>Wilayah</td></tr>';
$i = 0;
foreach($listlaporandataindividuAll as $dataAll){    
    $i++;
    echo '<tr><td>'.$i.'</td><td>'.$dataAll->nama_individu.'</td><td>'.$dataAll->nama_wilayah.'</td></tr>';
}
echo '</table>';
echo '</div>'; 
?>