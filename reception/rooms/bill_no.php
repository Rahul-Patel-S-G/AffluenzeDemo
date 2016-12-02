<?php
require_once("../../database.php");
header("Content-type: image/png");
$data = json_decode(file_get_contents("php://input"));

$patient_id=$data->patient_id;

$sql="SELECT * FROM make_payment WHERE  patient_id='{$patient_id}' ORDER BY bill_no DESC LIMIT 1";

$res_patient=mysqli_query($con,$sql) or die(mysqli_error($con));

$send=array();
$row_patient=mysqli_fetch_array($res_patient);

				$send['bill_no']=$row_patient['bill_no'];
				$send['date']=$row_patient['date'];
				$send['paymentmode']=$row_patient['paymentmode'];
				
				
	
	print json_encode($send);	
?>
	