<?php
require_once("../../database.php");
header("Content-type: image/png");
$data = json_decode(file_get_contents("php://input"));

$bill_no=$data->bill_no;
$discount=$data->discount;



$update="UPDATE make_payment SET discount='{$discount}' WHERE bill_no='{$bill_no}'";
$res_update=mysqli_query($con,$update) or die(mysqli_error($con));



$sql="SELECT * FROM make_payment mk,patient_registration pr WHERE  mk.bill_no='{$bill_no}' ORDER BY bill_no DESC LIMIT 1";

$res_patient=mysqli_query($con,$sql) or die(mysqli_error($con));

$send=array();
$row_patient=mysqli_fetch_array($res_patient);

				$send['bill_no']=$row_patient['bill_no'];
				$send['date']=$row_patient['date'];
				$send['paymentmode']=$row_patient['paymentmode'];
				$send['patient_id']=$row_patient['patient_id'];
				$send['patient_name']=$row_patient['patient_name'];
				$send['gender']=$row_patient['gender'];
				$send['phone']=$row_patient['phone'];
				
				
	
	print json_encode($send);	
?>
	