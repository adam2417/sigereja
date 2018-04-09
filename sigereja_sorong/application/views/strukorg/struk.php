<h3><u>STRUKTUR ORGANISASI GEREJA</u></h3>
<?php
$role = $this->session->userdata('role');
if($role == '1'){
?>
<a href="<?php echo site_url('strukturorg/modifyDescription');?>">Edit</a>
<br/>
<?php } ?>
{datastrukorg}
<br />
{description}
<br/>
<br/>
<font face="Verdana,Helvetica,Sans" size="1">Posted at <i>{last_edited}</i> by <b>{edited_by}</b></font>
{/datastrukorg}