<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$to_date=$data->todate;

$from_date=$data->fromdate;
$recep_id=$data->recep_id;

if($recep_id=="All")
{
$sql="select p.*,op.* ,u.* from op_make_payment op , patient_registration p, users u where p.patient_id=op.patient_id and u.user_id= op.user_id and op.date between '{$from_date}' and '{$to_date}' order by op.bill_no ASC";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);
	
	
	
}	
else
{
$sql="select p.*,op.* ,u.* from op_make_payment op , patient_registration p, users u where p.patient_id=op.patient_id and u.user_id= op.user_id and op.user_id='{$recep_id}' and op.date between '{$from_date}' and '{$to_date}' order by  op.bill_no ASC";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);

}
?>