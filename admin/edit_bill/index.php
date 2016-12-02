<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=="admin")
{
	
}
else{
	header('Location: ../../login/index.html');
	die();
	
}
?>

<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="../../css/sidebar-menu.css">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/style.css">
<link href='../../css/fullcalendar.css' rel='stylesheet' />
<link href='../../css/fullcalendar.print.css' rel='stylesheet' media='print' />

  <link rel="stylesheet" href="../../css/datepicker/jquery-ui.css" >
<script src='../../js/jquery.min.js'></script>
<script src="../../js/bootstrap.min.js"></script> 
<script src="../../js/angular.min.js"></script>
<script src="../../js/custom.js"></script>
<script src="../../js/custom_jquery.js"></script>	
	
<script src='../../js/moment.min.js'></script>
<script src='../../js/moment.min.js'></script>

</head>

<body ng-app="bill">
	
<div class=" container-fluid" ng-controller="bill_controller" >




		
		

<div ng-include="'../include/header.html'"></div>
		

	
<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 adjust-margin disp-dept-cont">
<div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
		
 </div>

 </div>
	
	
<div class="row" >

  <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>
		<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 ">
 
			
	  </div>
 </div>
 
 
 
 
 
 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>

	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space">
					
					<div class="group col-md-6 col-sm-6 col-lg-6"> 
							<div class="col-md-12 col-sm-12 col-lg-12">	
								  <input type="number" required class="module-input "  id="patientid"  ng-model="bill_no" ng-change="get_bill_details()">
							  <span class="bar"></span>
							  <label class="label-text">Enter Bill Number</label>
							  </div>
					</div>	  
								 
				<table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th >Description</th>
										<th >Price</th>
										<th >Quantity</th>
										<th >Total</th>
										
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									  
										 <tr class="border-data-btm" ng-repeat="bill in bill_details.billdetails" > 
										<td class=" left-padding" >{{$index+1}}</td>
										<td> {{bill.description}}</td>
										<td  >{{bill.amount}}</td>
										<td  ><input type="text" name="" id="" ng-model="bill.quantity" ng-change="call(bill.sl_no,bill.quantity,bill.amount,bill.bill_no)"/></td>
										<td  >{{bill.amount * bill.quantity}}</td>
										
										<td>
											
											
										</td>
										</tr> 
										  <tr>
									  <td></td>
									  <td></td>
									  <td></td>
									  <td>Discount</td>
									  <td><input type="number" name="" id="" ng-model="discount" /></td>
									  </tr>
									
									  <tr>
									  <td></td>
									  <td></td>
									  <td></td>
									  <td>Total amount</td>
									  <td>{{bill_details.total.total-discount}}</td>
									  </tr>
									  
									  
								
									</tbody>
					  </table>			  
					
				<div style="margin-left:88%;">
                  <button type = "submit" class = "btn btn-primary align-submit"  ng-click="print_section()" >
					Print
					</button>
		    </div> 
					  
					 
					 
		</div>
	</div>
 
 
 
 
</div> 
 
 
 
<!-- Print setion strats here -->

<div class="hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="printdischarge">
  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"  >
	            
              </div>
				
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
						<center><p style="font-size: 30px;">SRI LAKSHMI SUPER SPECILITY HOSPITAL</p></center>
						<center><p style="font-size: 20px;">#5,6 & 7,Nagappa Layout,Kaggadasapura</p></center>
						<center><p style="font-size: 20px;">C.V Raman Nagar Post Bangalore-560093</p></center>
						<center><p style="font-size: 20px;">Ph:080 41676336,M:9535566566</p></center>
						<img src="print_barcode.php?barcode_to_print={{personal_details.barcode}}"/>
					</div>
					<div style="height:20px;"><hr style="height:2px;"></div>
			
	         
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-left:100px"> 	
			
				<div class="col-md-6 col-sm-6 col-xs-6" style="width:300px;">
					<table cellpadding="10">
						<tr>
							<td >Patient Id : </td>
							<td>{{billdetails.patient_id}}</td>
							
						</tr>
						<tr>
							<td >Patient Name :  </td>
							<td>{{billdetails.patient_name}}</td>
							
						</tr>
						<tr>
							<td >Contact number : &nbsp;</td>
							<td>{{billdetails.phone}}</td>
								
						</tr>
						<tr>
							<td >Gender : &nbsp;</td>
							<td>{{billdetails.gender}}</td>
						</tr>
						
						
					</table>
				</div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				
				
				<div class="col-md-6 col-sm-6 col-xs-6" style="width:350px;margin-top:-230px;margin-left:300px;">
					<table cellpadding="10">
						<tr>
							<td >Date : </td>
							<td>{{billdetails.date}}</td>
							
						</tr>
					
						
						<tr>
							<td >IP Bill Number : &nbsp;</td>
							<td>{{billdetails.bill_no}}</td>
								
						</tr>
					</table>
				</div>
					<div style="height:20px;"></div>
						<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 	
			<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">&nbsp;</div>
			<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12" style="margin-left:0px;margin-top:30px">
				<table style="border:1px solid black;width:82%;">
					<tr style="height: 58px;">
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%;">Sl.no</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:65%">Discription</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Price</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Quantity</th>
						<th style="border-bottom:1px solid black;padding-left:5px;">Amount</th>
					</tr>
					<tr style="height:20px;" ng-repeat="bill in bill_details.billdetails">
						<td style="border-right:1px solid black;padding-left:5px;padding:4px;">{{$index+1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{bill.description}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{bill.quantity}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{bill.amount}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{bill.amount * bill.quantity}}</td>
					</tr>
					
					<tr>
						<td colspan="4" style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:right;padding:2px;">Sub Total</td>
						<td style="border-right:1px solid black;padding-left:5px;border-top:1px solid black;">{{bill_details.total.total}}</td>
					</tr>
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Discount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{discount}}</td>
					</tr>
				
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Total Amount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{bill_details.total.total-discount}}</td>
					</tr>
					
					
				</table>
				
				<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="padding-top:60px;" >
				<div style=" width:80px ;border-top:1px solid black;margin-left:450px;text-align:center;">
				 Signature 
				</div>
				
				</div>
				</div>
		
		  </div>

	</div>
 </div>
</div>

<!-- print section ends here -->





   <script src="../../js/edit_bill/edit_bill.js"></script> 
</body> <!-- Body End -->
</html>