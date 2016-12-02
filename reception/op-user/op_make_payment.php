<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=="Reciptionist")
{
		$user_id=$_SESSION['user_id'];
}
else{
	header('Location: ../../login/index.html');
	die();
	
}

require_once("../../database.php");
$data1 = json_decode(file_get_contents("php://input"));

$patient_id=$data1->patient_id;
$totalamt=$data1->totalamt;
$payment=$data1->payment;
if($payment=="Both")
{
$cashamt=$data1->paymode->devidecash;
$cardamt=$totalamt-$cashamt;
}
if($payment=="Cash")
{
$cashamt=$totalamt;
$cardamt=0;
}
if($payment=="Card")
{
$cashamt=0;
$cardamt=$totalamt;
}

date_default_timezone_set("Asia/Calcutta");
$currdate=date("Y-m-d");
$currtime=date("h:m:sa");

$sql="INSERT INTO op_make_payment(patient_id,date,time,cashamt,cardamt,totalamt,paymentmode,user_id) VALUES ('{$patient_id}','{$currdate}','{$currtime}','{$cashamt}','{$cardamt}','{$totalamt}','{$payment}','{$user_id}')";
mysqli_query($con,$sql) or die(mysqli_error($con));



$data=array();
$select="SELECT * FROM op_make_payment where patient_id='{$patient_id}' ORDER BY bill_no DESC LIMIT 1";
$result1=mysqli_query($con,$select) or die(mysqli_error($con));
 $row=mysqli_fetch_array($result1);
	  $data['bill_no']=$row['bill_no'];
	  $data['date']=$row['date'];
	  $billno=$row['bill_no'];
	$data['paymentmode']=$row['paymentmode'];
	  
 $print="select * from patient_registration where patient_id='{$patient_id}'";
 $printres=mysqli_query($con,$print) or die(mysqli_error($con));
	$row1=mysqli_fetch_array($printres);
		$data['patient_id']=$row1['patient_id'];
				
				$data['patient_name']=$row1['patient_name'];
				$data['phone']=$row1['phone'];
				$data['barcode']=$row1['barcode_reader'];
				$data['age']=$row1['age'];
				$data['gender']=$row1['gender'];
				
				
	       $printdoc="select * from op_consultation oc,doctors d where oc.doctor_id=d.doctor_id and oc.patient_id='{$patient_id}' order by d.doctor_id desc limit 1";
 $printresdoc=mysqli_query($con,$printdoc) or die(mysqli_error($con));
	$row2=mysqli_fetch_array($printresdoc);   
    $data['doctor_name']=$row2['doctor_name'];	
    $doctor_id=$row2['doctor_id'];	
	
$i=0;
while($i<sizeof($data1->details))
{
	$discription[]=$data1->details[$i]->description;
	$quantity[]=$data1->details[$i]->quantity;
	$amount[]=$data1->details[$i]->amount;
	$total[]=$data1->details[$i]->total;
	$insert="insert into op_bill_details(description,quantity,amount,total,bill_no) values('{$discription[$i]}','{$quantity[$i]}','{$amount[$i]}','{$total[$i]}','{$billno}')";
	mysqli_query($con,$insert) or die(mysqli_error($con));
	$i++;
}
	

$update="update op_consultation set flag=1 where patient_id= '{$patient_id}'  and flag=0";
mysqli_query($con,$update) or die(mysqli_error($con));

$delete="delete from op_service_taken where patient_id = '{$patient_id}'";
mysqli_query($con,$delete) or die(mysqli_error($con));


print json_encode($data);

?>