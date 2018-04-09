<h3><u>STRUKTUR ORGANISASI GEREJA KRISTEN SUMBA WAINGAPU</u></h3>
<?php
$role = $this->session->userdata('role');
if($role == '1'){
?>
<a href="<?php echo site_url('strukturorg/modifyDescription');?>">Edit</a>
<br/>
<?php } ?>
<img src="<?php echo $this->load->config->item('base_url') . $this->load->config->item('inc_folder');?>images/strukorg.png"/>
{datastrukorg}
<br />
{description}
<br/>
<br/>
<font face="Verdana,Helvetica,Sans" size="1">Posted at <i>{last_edited}</i> by <b>{edited_by}</b></font>
{/datastrukorg}