<h3><u>VISI DAN MISI GEREJA KRISTEN SUMBA WAINGAPU</u></h3>
<?php
$role = $this->session->userdata('role');
if($role == '1'){
?>
<a href="<?php echo site_url('visimisi/modifyDescription');?>">Edit</a>
<br/>
<?php } ?>
{datavisimisi}
<br />
{description}
<br/>
<br/>
<font face="Verdana,Helvetica,Sans" size="1">Posted at <i>{last_edited}</i> by <b>{edited_by}</b></font>
{/datavisimisi}