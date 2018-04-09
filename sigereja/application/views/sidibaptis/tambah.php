<!-- TinyMCE -->
<script type="text/javascript" src="../../asset/scripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "simple",
        plugins : "paste",

        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        forced_root_block : false,
        force_p_newlines : 'false',
        remove_linebreaks : false,
        force_br_newlines : true,
        remove_trailing_nbsp : false,
        verify_html : false
    });	
</script>
<link rel="stylesheet" type="text/css" media="all" href="../../asset/styles/app/calendar.css" />
<script type="text/javascript" src="../../asset/scripts/calendar/calendar.js"></script>
<form method="post" name="frmTambah" action="<?php echo site_url('sidibaptis/tambahSidiBaptis'); ?>">
    <h3><u>TAMBAH SIDI/BAPTIS</u></h3>
    <input type="submit" name="btnSave" value="Save" class="btn" />
    |
    <input type="reset" name="btnClear" value="Clear" class="btn" />
    |
    <input type="button" name="btnClose" value="Back" class="btn" onclick="javascript:history.back(1);" />
    <br /><br />
<?php
if((count($message) > 0) && ($message != '')){
	echo $message;
} 
?>
    <br />
    <table>
        <tr>
            <td valign="top">Nama</td>
            <td valign="top">:</td>
            <td>
                <select name="nama">
                    <?php
                        foreach($individu as $ind){
                            echo "<option id=\"". $ind->nama_individu ."\">". $ind->nama_individu ."</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tanggal Surat</td>
            <td>:</td>
            <td><input type="text" name="tglsurat" />
                <script type="text/javascript">
                    new tcal ({
                        // form name
                        'formname': 'frmTambah',
                        // input name
                        'controlname': 'tglsurat'
                    });
                </script>&nbsp;MM/DD/YYYY
            </td>
        </tr>
        <tr>
            <td>Tanggal Sidi/Baptis</td>
            <td>:</td>
            <td><input type="text" name="tglbaptissidi" />
                <script type="text/javascript">
                    new tcal ({
                        // form name
                        'formname': 'frmTambah',
                        // input name
                        'controlname': 'tglbaptissidi'
                    });
                </script>&nbsp;MM/DD/YYYY
            </td>
        </tr>
        <tr>
            <td valign="top">Tempat Sidi/Baptis</td>
            <td valign="top">:</td>
            <td>
                <input type="text" name="tempat_sidibaptis" />
            </td>
        </tr>
        <tr>
            <td valign="top">Pendeta</td>
            <td valign="top">:</td>
            <td>
                <select name="pendeta">
                    <?php
                    $count = count($pendeta);
                    foreach ($pendeta as $comboPdt) {
                        ?>
                        <option value="<?php echo $comboPdt->id ?>"><?php echo $comboPdt->nama; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tipe</td>
            <td>:</td>
            <td>
                <select name="tipe">			
                    <option value="0">Baptis</option>
                    <option value="1">Sidi</option>
                </select>
            </td>
        </tr><tr>
            <td valign="top">Keterangan</td>
            <td valign="top">:</td>
            <td>
                <textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 100%">				
                </textarea>
            </td>
        </tr>    
    </table>
</form>