<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=="Reciptionist")
{
	
}
else{
	header('Location: ../../login/index.html');
	die();
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

 
  <link rel="stylesheet" href'"../../css/sidebar-menu.css">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/sidebar-menu.css">
  <link rel="stylesheet" href="../../css/datepicker/jquery-ui.css" >

   
  <script src="../../js/jquery.min.js"></script> 
  <script src="../../js/bootstrap.min.js"></script> 
  <script src="../../js/angular.min.js"></script>

<script src="../../js/custom.js"></script>
</head>

<body ng-app="reception">


<div class=" container-fluid" >
<div class="row"  ng-controller="reception_controller"  ng-cloak>
 <div ng-include="'include/header.html'">
 </div>


<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 adjust-margin disp-dept-cont">
<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9">
		
 </div>

  

<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"> 
		<!-- <button type="button" class="btn add-dep-btn font-12 adjust-add pull-right" data-toggle = "modal" data-target = "#addpatient" ><span><span><img src="../../icons/add.png" ></img></span class="font-12">&nbsp;&nbsp;<span>Register</span></span></button>-->
 </div>
 </div>
 

<div class="">
<div id="allot" ng-show="admit_patient_show">
<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
		
<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>  
 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 disp-dept-cont" id="box">
             <div>ADMIT PATIENT</div>
			 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">&nbsp;</div>  
	      <div class="group col-md-12 col-sm-12 col-lg-12"> 
		             
					  <div  class=" col-md-3 col-sm-3 col-lg-3"> 
							<label class="control-label" for="name"> Select Type of Room</label>
					  </div>		
                        <div  class="col-md-8 col-sm-8 col-lg-8 " >					   
						 <select class=" form-control room-type-drop" ng-model="roomid"  ng-change="room_type()">
							    <option  value=""selected="selected" >Select Room Type</option>
								<option name="" ng-repeat="room in display_room_type" value="{{room.room_id}}">{{room.room_name}}</option>

							  </select>
				   
					  </div>
					  </div>
            </div>
  		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" ng-show="admit_show_category">
		     <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>
			 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 room-book-tab tab-shadow">
					<table id="tbl"  class="table  table-condensed " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Category type</th>
										<th >Floor</th>
										<th >Room</th>
										<th >Total Beds</th>
										<th >Occupied Beds</th>
										<th >Available Beds</th>
										
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									 <tr class="border-btm" ng-repeat="room_category in display_room_category" > <!-- ng-repeat=" employee in empdata |  filter:searchbox" --> 
										<td class=" left-padding" >{{room_category.room_name}}</td>
										<td>{{room_category.floor}}</td>
										<td>{{room_category.ward_name}}</td>
										<td  >{{room_category.number_of_bed}}</td>
										<td  >{{room_category.number_of_bed - room_category.status}}</td>
										<td  >{{room_category.status}}</td>
										<td><a href="#" ng-click="shows_beds(room_category.ward_id)" >Show</a></td>
									</tr>
									
									  
								
									</tbody>
					  </table>
		         
		  
				
		  </div>
		  </div>
</div>		  
		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
		  <div class="col-md- 12 col-lg-12 col-xs-12 col-sm-12" ng-show="admit_show_beds" >
				  <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>
				  <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 ">
						<div class="col-md-2 col-lg-2 col-xs-2 col-sm-2"></div>
						<div class="col-md-8 col-lg-8 col-xs-8 col-sm-8 room-beds-tab tab-shadow">
						       <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 align-header"> <span class="font-lato-18-bold"> Beds Information </span></div>
								<table id="tbl"  class="table  table-condensed " cellpadding="10"  cellspacing="10">
									<thead height="100" >
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Categoty Type</th>
										<th >Floor</th>
										<th >Room</th>
										<th >Bed No</th>
										<th >Price</th>
										<th ></th>
										
									
									  </tr>
									</thead>
									<tbody>
									 <tr class="border-btm" ng-repeat="beds in beds_shows"> <!-- ng-repeat=" employee in empdata |  filter:searchbox" --> 
										<td class=" left-padding" >{{beds.room_name}}</td>
										<td>{{beds.floor}}</td>
										<td>{{beds.ward_name}}</td>
										<td  >{{beds.bed_id}}</td>
										<td  >{{beds.price}}</td>
										<td ><a href="#" data-toggle = "modal" data-target = "#admitpatient" ng-click="admit(beds.bed_id,beds.room_id,beds.ward_id)" >Admit</a></td>
										
									</tr>
									
	
									  
								
									</tbody>
					  </table>
				</div>
						<div class="col-md-2 col-lg-2 col-xs-2 col-sm-2"></div>
				  
				   <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
				</div>			
		</div>			
</div>		


<div id="shift" ng-show="shift_patient_show">
<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>  
			<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 disp-dept-cont" id="box">
			    <div>SHIFT PATIENT</div>
							<div class="col-md-6 col-sm-6 col-lg-6">	
									  <input type="text" required class="module-input " ng-model="a.b">
								  <span class="bar"></span>
								  <label class="label-text">Enter Patient Id/ Phone No</label>
								  <div ng-show="errormsg" class="error-color" >Please Enter Proper patientid/Phone.</div>
								
							</div>
							 
							
							
			</div>
			   
</div>
<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">&nbsp;</div>

<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" ng-show="shift_show_patient_category">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>  
	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 disp-dept-cont" id="box">
		  <table id="tbl"  class="table  table-condensed " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class="left-padding" >Patien Id</th>
										<th >Name</th>
										<th >Category</th>
										<th >Floor</th>
										<th >Room</th>
										<th >Bed No</th>
										<th >Date of Allocation</th>
										<th >Total Days</th>
										
										<th></th>
									  </tr>
									</thead>
									<tbody>
									 <tr class="border-btm" > <!-- ng-repeat=" employee in empdata |  filter:searchbox" --> 
										<td class=" left-padding" >{{display_bed_allot.patient_id}}</td>
										<td>{{display_bed_allot.patient_name}}</td>
										<td>{{display_bed_allot.room_name}}</td>
										<td  >{{display_bed_allot.floor}}</td>
										<td  >{{display_bed_allot.ward_name}}</td>
										<td  >{{display_bed_allot.bed_id}}</td>
										<td  >{{display_bed_allot.from_date}}</td>
										<td  >{{display_bed_allot.number_of_days}}</td>
										<td><a href="#"  ng-click="dis_room_type(display_bed_allot.room_id)">Shift</a></td>
									</tr>
									
									  
								
									</tbody>
					  </table>
	</div>
</div>

<div id="showbeds">
<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
		
<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>  
 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 disp-dept-cont" id="box" ng-show="shift_select_show">
	      <div class="group col-md-12 col-sm-12 col-lg-12"> 
					  <div  class=" col-md-3 col-sm-3 col-lg-3"> 
							<label class="control-label" for="name"> Select Type of Room</label>
					  </div>		
                        <div  class="col-md-8 col-sm-8 col-lg-8 " >					   
						 <select class=" form-control room-type-drop" ng-model="room_id"  ng-change="shift_room_type()">
							    <option  value=""selected="selected" >Select Room Type</option>
								<option name="" ng-repeat="room in shift_display_room_type" value="{{room.room_id}}">{{room.room_name}}</option>

							  </select>
				   
					  </div>
					  </div>
            </div>
  		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
		     <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>
			 <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
		     <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>
			 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 room-book-tab tab-shadow" ng-show="shift_show_category">
					<table id="tbl"  class="table  table-condensed " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Category type</th>
										<th >Floor</th>
										<th >Room</th>
										<th >Total Beds</th>
										<th >Occupied Beds</th>
										<th >Available Beds</th>
										
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									 <tr class="border-btm" ng-repeat="room_category in shift_display_room_category" > <!-- ng-repeat=" employee in empdata |  filter:searchbox" --> 
										<td class=" left-padding" >{{room_category.room_name}}</td>
										<td>{{room_category.floor}}</td>
										<td>{{room_category.ward_name}}</td>
										<td  >{{room_category.number_of_bed}}</td>
										<td  >{{room_category.number_of_bed - room_category.status}}</td>
										<td  >{{room_category.status}}</td>
										<td><a href="#" ng-click="shift_shows_beds(room_category.ward_id)" >Show</a></td>
									</tr>
									
									  
								
									</tbody>
					  </table>
		         
		  
				
				
		  </div>
		  </div>
		  </div>
</div>		  
		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
			<div class="col-md- 12 col-lg-12 col-xs-12 col-sm-12" >
				  <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>
				  <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 ">
						<div class="col-md-2 col-lg-2 col-xs-2 col-sm-2"></div>
						<div class="col-md-8 col-lg-8 col-xs-8 col-sm-8 room-beds-tab tab-shadow" ng-show="shift_show_bed">
						       <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 align-header"> <span class="font-lato-18-bold"> Beds Information </span></div>
								<table id="tbl"  class="table  table-condensed " cellpadding="10"  cellspacing="10">
									<thead height="100" >
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Categoty Type</th>
										<th >Floor</th>
										<th >Room</th>
										<th >Bed No</th>
										<th >Price</th>
										<th ></th>
										
									
									  </tr>
									</thead>
									<tbody>
									 <tr class="border-btm" ng-repeat="beds in shift_beds_shows"> <!-- ng-repeat=" employee in empdata |  filter:searchbox" --> 
										<td class=" left-padding" >{{beds.room_name}}</td>
										<td>{{beds.floor}}</td>
										<td>{{beds.ward_name}}</td>
										<td  >{{beds.bed_id}}</td>
										<td  >{{beds.price}}</td>
										<td ><a href="#" data-toggle = "modal" data-target = "#shiftpatient" ng-click="shift_admit(beds.bed_id,beds.room_id,beds.ward_id)" >shift</a></td>
										
									</tr>
									
	
									  
								
									</tbody>
					  </table>
				</div>
						<div class="col-md-2 col-lg-2 col-xs-2 col-sm-2"></div>
				  
				   <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
				</div>			
		</div>			
</div>		
</div>



<div id="discharge" ng-show="discharge_patient_show">

		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
		<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
			<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>  
					<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 disp-dept-cont" id="box">
					      <div>DISCHARGE PATIENT</div>
									<div class="col-md-12 col-sm-12 col-lg-12">	
											  <input type="text" required class="module-input " id="skills" ng-model="dpatient_id" ng-change="patient_display()">
										  <span class="bar"></span>
										  <label class="label-text">Enter Patient Id/ Email Id/ Phone No</label>
										  <div ng-show="errormsg" class="error-color" >Please Enter Proper patientid/Phone.</div>
									</div>
					</div>
					   
		</div>
		<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">&nbsp;</div>
		<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">&nbsp;</div>
				  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
					 <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>
					 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 room-book-tab tab-shadow" ng-show="show_dischagre_patient" >
							<table id="tbl"  class="table  table-condensed " cellpadding="10" cellspacing="10">
											<thead>
											  <tr class=" font-14 font-os-semibold border-btm" >
												<th class=" left-padding" >Patient Id</th>
												<th >Name</th>
												<th >Category</th>
												<th>Floor</th>
												<th >Room</th>
												<th >Bed No</th>
												<th >Date of Allotment</th>
												<th >Date of Discharge</th>
												<!--<th >Total Days</th>-->
												<th  ></th>
												<th></th>
											  </tr>
											</thead>
											<tbody>
											 <tr class="border-btm" > <!-- ng-repeat=" employee in empdata |  filter:searchbox" --> 
												<td class=" left-padding" >{{display_patient_details.patient_id}}</td>
												<td>{{display_patient_details.patient_name}}</td>
												<td>{{display_patient_details.room_name}}</td>
												<td  >{{display_patient_details.floor}}</td>
												<td  >{{display_patient_details.ward_name}}</td>
												<td  >{{display_patient_details.bed_id}}</td>
												<td  >{{display_patient_details.from_date}}</td>
												<td  >{{display_patient_details.to_date}}</td>
												<!--<td  >{{display_patient_details.total_days}}</td>-->
												
											</tr>
										
										
											</tbody>
							  </table>
						       <div class="form-group align-input-space font-lato-12-bold">
									  <label class="control-label col-sm-2 col-lg-2 col-xs-12 col-md-2 align-label lable-add-input" for="name"> Payment Mode </label>
									  <div class=" col-sm-4 col-lg-4 col-xs-12 col-md-4"  >
									
										 <input type="radio" name="payment" value="Cash" checked style="margin-left: -14%;" ng-model="display_patient_details.payment" ng-click="click_payment(display_patient_details.payment)"> Cash
										<input type="radio" name="payment" value="Card" style="margin-left: 11%;" ng-model="display_patient_details.payment" ng-click="click_payment(display_patient_details.payment)"> Card
										<input type="radio" name="payment" value="Both" style="margin-left: 11%;" ng-model="display_patient_details.payment" ng-click="click_payment(display_patient_details.payment)"> Devide
										<div ng-show="devide">
												Cash <input type="number" name="cash" ng-model="display_pay_details.devidecash" /> </br>
												Card <input type="number" name="card" ng-model="display_pay_details.devidecard" value="{{totalamt - display_pay_details.devidecash}}"/> 
												Total <input type="number" name="totalamount" ng-model="display_pay_details.devidetotalamt" />		
										</div>
									  </div>
									   <div class=" col-sm-2 col-lg-2 col-xs-12 col-md-2"  >
									
										         <a href="#" data-toggle = "modal" data-target = "#makepayment" ng-click="discharge()">Draft Copy</a>
								
									  </div>
									  <div class=" col-sm-2 col-lg-2 col-xs-12 col-md-2"  ng-show="show_print_discharge">
									
										         
								<a href="#" ng-click="finalprint()">Print & Discharge</a>
									  </div>
								</div>
				      
						
				  </div>
				  </div>
</div>


<div id="enquiry" ng-show="enquiry">

				
 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" >
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>

	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space">
					   
					   
					   <div>
					      <input type="text" class="form-control doctor-search-btn " id="usr" placeholder="Search Patient Name" ng-model="serachbox"  >
					   </div>
					 <div>
					 </div>
						 <table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th>Patient ID</th>
										<th>Patient Name</th>
										<th >Phone Number</th>
										<th>Floor</th>
										<th>Room</th>
										<th>Ward</th>
										<th>Bed</th>
										<th>Insurance Name</th>
										<th  ></th>
									  </tr>
										
									</thead>
									<tbody>
									  <tr class="border-data-btm" ng-repeat="patient in display_details_patient | filter:serachbox" > 
										
										<td class=" left-padding" >{{$index+1}}</td>
										<td>{{patient.patient_id}}</td>
										<td>{{patient.patient_name}}</td>
										<td>{{patient.phone}}</td>
										<td>{{patient.floor}}</td>
										<td>{{patient.room_name}}</td>
										<td>{{patient.ward_name}}</td>
										<td>{{patient.bed_id}}</td>
										<td>{{patient.insurance_name}}</td>
										
										
										
									
									  
								
									</tbody>
					  </table>
					  
					  <div class="calender-size hidden"  id="cal" >
							<div id='calendar' class="inner-calender" ></div>
					  </div>
					  
					  
					 
					 
		</div>
 </div>


</div>

<!-- add service section -->		


<div id="Addservive">

<div class = "adjust-model modal fade" id ="addpatientservice" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog ">
      <div class = "modal-content add-service-model-sieze ">
         <div class = "modal-header">
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Add Services
            </h4>
         </div>
         
<div class = "modal-body  row body-size  model-bg" style="height:auto;" >
	<form class="form-horizontal" name="add_Employee" id="addservice">
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Patient Id</label>
			  
				<div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8 " style="height: 100%;">
					<input type="text" class="form-control  align-input-ele font-lato-12-bold  " ng-model="service.patient_id" id="patientid" ng-change="display_name()" >
					<div ng-show="errormsg" class="error-color" >Please Enter Proper patientid/Phone.</div>
					
				</div>
			 
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Patient Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="naming" value="" ng-model="name_of_patient.patient_name" readonly>
		
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 adjust-label" style="margin-left: 3%;" for="name">Select Service</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
			  
			  
							  <select class="form-control drop-down-btn" style="margin-left: 1%;" ng-model="service.list_service"  ng-change="service_price()">
							    <option  value=""selected="selected">Select Service</option>
								<option name="" ng-repeat="services in display_service" value="{{services.service_id}}">{{services.service_name}}</option>
								
							  </select>
				 
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 adjust-label" style="margin-left: 3%;" for="name">Price</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
			      <input type="text" class="form-control  align-input-ele font-lato-12-bold " style="margin-left: 1%;" ng-model="display_service_price.price">
				  
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>			
						
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name"></label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8  adjust-restric" style="height: 100%;text-align:right !important;margin-left: -14px;">
				   <a id="add-emp"  href="#" ng-click="add_temp_service()">
				   <img src="../../icons/employee/add.png" ></img>
								<span style="padding-left:3px;">Add Service</span>
					</a>
			  </div>
			  
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>   
			<div class="col-sm-12 col-lg-12 col-xs-12 col-md-12 tbl-back-color" ng-show="show_div" ng-init="index=0">
		     <div>
		        <table class="table table-hover table-responsive">
						<thead class="font-lato-12-bold" > 
						  <tr>
							
							<th>Patient Id</th>
							<th>Service</th>
							<th>Price</th>
							<th></th>
						  </tr>
						</thead>
						<tbody class="font-lato-11-reg" ng-repeat="names in disp_service"  >
						  <tr>
						    <td class="hidden">{{$index  }}</td>
							<td>{{names.patient_id}}</td>
							<td>{{names.service_name}}</td>
							<td>{{names.price}}</td>
							<td><a href="#" ><img src="../../icons/employee/addemp.png"  ng-click="delete_temp_service($index)" ></a></td>
						     <td class="hidden">{{$index + 1}}</td>
						  </tr>
			
						  
						</tbody>
				</table>
		   </div>
        </div>
	
			
	  
    </div>
     		   
        
         <div class = "modal-footer" ng-show="show_div">
            <a><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "button" class = "btn btn-primary align-submit" ng-click="service_add_details()">
               Add Service
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   

</div> 




</div>

<!-- Make payment section -->

<div class = "adjust-model modal fade" id ="makepayment" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog ">
      <div class = "modal-content make_payment_model ">
         <div class = "modal-header">
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
               Make Payment
            </h4>
         </div>
         
<div class = "modal-body  row body-size  model-bg" style="height:auto;" >
	<form class="form-horizontal" name="add_Employee">
		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 form-group align-input-space font-lato-12-bold">
		  
			  <label class="control-label col-sm-1 col-lg-1 col-xs-12 col-md-1 align-label" for="name">Patient Id</label>
			  <div class=" col-sm-4 col-lg-4 col-xs-12 col-md-4" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" readonly ng-model="dpatient_id" placeholder="Enter Employee ID">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
		
			
		
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
	            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
			 <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
					
					 <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 room-book-tab tab-shadow" ng-show="show_dischagre_patient" >
							<table id="tbl"  class="table  table-condensed table_text_align" cellpadding="10" cellspacing="10">
											<thead>
											  <tr class=" font-14 font-os-semibold border-btm" >
												<th class=" left-padding table_th_td1_width" style="text-align:center;" >Sl No</th>
												<th class="table_th_td2_width" style="text-align:center;">Description</th>
												<th style="text-align:center;">Price</th>
												<th style="text-align:center;">Quantity</th>
												<th style="text-align:center;">Amount</th>
												<th  ></th>
											  </tr>
											</thead>
											<tbody ng-init="index=0">
											 <tr class="border-btm"  ng-repeat="beds_taken in discharge_patient"> <!-- ng-repeat=" employee in empdata |  filter:searchbox" --> 
												<td class=" left-padding" >{{$index + 1}}</td>
												<td>{{beds_taken[1]}}</td>
												<td>{{beds_taken[3]}}</td>
												<td>{{beds_taken[2]}}</td>
												<td>{{beds_taken[4]}}</td>
												
												<!--<td><a href="#" data-toggle = "modal" data-target = "#makepayment" ng-click="">Discharge</a></td>-->
											</tr>
											<!--<tr class="border-btm"  ng-repeat="service_taken in discharge_patient"> <!-- ng-repeat=" employee in empdata |  filter:searchbox" 
												<td class=" left-padding" >{{$index + 1}}</td>
												<td>{{service_taken.service_name}}</td>
												<td>{{service_taken.amount}}</td>
												<td>{{service_taken.quant}}</td>
												<td  >{{service_taken.totalamount}}</td>--> 
												
												<!--<td><a href="#" data-toggle = "modal" data-target = "#makepayment" ng-click="">Discharge</a></td>
											</tr>-->
											
											  <tr>
											       <td class="font-14 font-os-semibold border-btm" colspan="4" style="text-align:right;">Total</td>  
												   <td style="text-align:center;">{{totalamt}}</td>
											  </tr>
										
										</tbody>
											
							  </table>
						 
				  
						
				  </div>
				  </div>
			
		
			
            
		
           			
						
    </div>
     		   
        
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel </span></a>
            <!--<button type = "button" class = "btn btn-primary align-submit" ng-click="finalprint()">
               Print
            </button>-->
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->


 
 


<!-- Admit patient Modal -->
<div class = "adjust-model modal fade" id = "admitpatient" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true" >
   
   <div class = "modal-dialog ">
      <div class = "modal-content admit-model-size">
         
         <div class = "modal-header">
		  
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Admit Patient
            </h4>
         </div>
         
<div class = "modal-body body-size row model-bg">
	<form  novalidate class="form-horizontal" name="add_dept" id="add_dept" method="post">
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Enter Patient ID</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;" >
				<input type="text" class="form-control align-input-ele font-lato-12-bold" id="patientid1" ng-model="patient_admit.patient_id" value="" placeholder="Enter Patient ID" ng-change="pateint_details_name()">
				<div ng-show="errormsg" class="error-color" >Please Enter Proper patientid/Phone.</div>
				<div ng-show="errormsg4" class="error-color" >Patient is already admited.</div>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Patient Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" id="name1" ng-model="patient_admit.patient_name">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			  <!--<div class="form-group adjust-loc-inputs font-12">
								  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 adjust-label" for="name" style="    margin-left: 3.2em;">Referal Doctor</label>
								  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8 float-left-inputs" style="height: 130%!important;">
								  
								  
												  <select class="form-control drop-down-btn loc-input-size custom-dropdown" style="width: 95%!important;margin-left: -0.4em!important;"id="country" name="country" ng-model="patient_admit.doctor_id">
													<option  value=""selected="selected">selected</option>
													<option name="" value="india" ng-repeat="doctor in display_doctor" value="doctor.doctor_id">{{doctor.doctor_name}}</option>
													
												  </select>
									 
								  </div>
										  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
										  
										  </div>
					 </div> -->
			 <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Category</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold " ng-model="patient_admit.room_name" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Room</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold " ng-model="patient_admit.ward_name" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name" value="1000" disable>Bed No</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="patient_admit.bed_id" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Price</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="patient_admit.price" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>	
			
			 <div class="form-group adjust-loc-inputs font-12">
								  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 adjust-label" for="name" style="margin-left: 3em;margin-top: -1%;">Select Insurance</label>
								  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8 float-left-inputs" style="height: 27px;">
								  
								  
												  <select class="form-control drop-down-btn loc-input-size dropdown_category" id="country" name="country" ng-model="patient_admit.insurance_id" >
													<option  value=""selected="selected">Select Category</option>
													<option name="" ng-repeat="insurance in display_insurance" value="{{insurance.insurance_id}}">{{insurance.company_name}}</option>
													
												  </select>
									 
								  </div>
										  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
										  
										  </div>
					 </div>
			 
			 
		 
    </div>	
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "submit" class = "btn btn-primary align-submit" ng-disabled="enable_button" ng-click="admit_to_bed()"  >
               Admit
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   
   
   
   
   
   
  
  <!-- shift patient Model -->
  
  <div class = "adjust-model modal fade" id = "shiftpatient" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true" >
   
   <div class = "modal-dialog ">
      <div class = "modal-content admit-model-size">
         
         <div class = "modal-header">
		  
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Shift Patient
            </h4>
         </div>
         
<div class = "modal-body body-size row model-bg">
	<form  novalidate class="form-horizontal" name="add_dept" id="add_dept" method="post">
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Enter Patient ID</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="shift_patient_admit.patient_id"  placeholder="Enter Patient ID"  readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			 <!-- <div class="form-group adjust-loc-inputs font-12">
								  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 adjust-label" for="name" style="    margin-left: 3.2em;">Referal Doctor</label>
								  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8 float-left-inputs" style="height: 130%!important;">
								  
								  
												  <select class="form-control drop-down-btn loc-input-size custom-dropdown" style="width: 95%!important;margin-left: -0.4em!important;"id="country" name="country" ng-model="shift_patient_admit.doctor_id">
													<option  value=""selected="selected">selected</option>
													<option name="" value="india" ng-repeat="doctor in shift_display_doctor" value="doctor.doctor_id">{{doctor.doctor_name}}</option>
													
												  </select>
									 
								  </div>
										  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
										  
										  </div>
					 </div>-->
			 <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Category</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold " ng-model="shift_patient_admit.room_name" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Room</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold " ng-model="shift_patient_admit.ward_name" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name" value="1000" disable>Bed No</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="shift_patient_admit.bed_id" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Price</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="shift_patient_admit.price" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>	
				
			
			
			
		
    </div>	
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "submit" class = "btn btn-primary align-submit"  ng-click="shift_admit_to_bed()" >
               Shift
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  


<!-- payment section Ends here --> 

<!-- Print setion strats here -->

<div class="hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="printdischarge">
  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"  >
	            
              </div>
				
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
						<center><p style="font-size: 30px;">SRI LAKSHMI HOSPITAL</p></center>
						<center><p style="font-size: 20px;">#5,6 & 7,Nagappareddy Layout,Kaggadasapura</p></center>
						<center><p style="font-size: 20px;">C.V Raman Nagar Post Bangalore-560093</p></center>
						<center><p style="font-size: 20px;">Ph:080 41676336,M:9535566566</p></center>
						<img src="print_barcode.php?barcode_to_print={{personal_details.barcode}}"/>
					</div>
						<div style="height:20px;"><hr style="height:2px;"></div>
			
	         
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-left:100px"> 	
			
				<div class="col-md-6 col-sm-6 col-xs-6" style="width:300px;">
					<table cellpadding="10">
						<tr>
							<td >Patient Id </td>
							<td>{{personal_details.patient_id}}</td>
							
						</tr>
						<tr>
							<td >Patient Name  </td>
							<td>{{personal_details.patient_name}}</td>
							
						</tr>
						<tr>
							<td >Contact number : &nbsp;</td>
							<td>{{personal_details.phone}}</td>
								
						</tr>
						<tr>
							<td >Gender : &nbsp;</td>
							<td>{{personal_details.gender}}</td>
						</tr>
						
						
					</table>
				</div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				
				
				<div class="col-md-6 col-sm-6 col-xs-6" style="width:350px;margin-top:-170px;margin-left:300px;">
					<table cellpadding="10">
						<tr>
							<td >Date </td>
							<td>{{billdetails.date}}</td>
							
						</tr>
						<tr>
							<td >Payment Mode  </td>
							<td>{{billdetails.paymentmode}}</td>
							
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
				
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 	
			<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">&nbsp;</div>
			<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12" style="margin-left:100px;margin-top:30px">
				<table style="border:1px solid black;width:82%;">
					<tr style="height: 58px;">
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%;">Sl.no</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:65%">Discription</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Price</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Quantity</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;">Amount</th>
					</tr>
					<tr style="height:20px;" ng-repeat="beds_taken in final_patient_details">
						<td style="border-right:1px solid black;padding-left:5px;padding:4px;">{{$index+1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{beds_taken[1]}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{beds_taken[3]}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{beds_taken[2]}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{beds_taken[4]}}</td>
					</tr>
					
					<tr>
						<td colspan="4" style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:right;padding:2px;">Sub Total</td>
						<td style="border-right:1px solid black;padding-left:5px;border-top:1px solid black;">{{totalamt}}</td>
					</tr>
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Tax</td>
						<td style="border-right:1px solid black;padding-left:5px;">-</td>
					</tr>
				
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Total Amount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{totalamt}}</td>
					</tr>
					
					
				</table>
				
				<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="padding-top:60px;" >
				<div style=" width:80px ;border-top:1px solid black;margin-left:350px ">
				 Signature 
				</div>
				
				</div>
				</div>
		
		  </div>

	</div>
 </div>
</div>

<!-- print section ends here -->











	
			
						
				
			
			
  
  


 
   <!--display Modal -->
<div class = "adjust-model modal fade" id = "displaydetails" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true" >
   
   <div class = "modal-dialog ">
      <div class = "modal-content model-size ">
         
         <div class = "modal-header">
		  
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Display Details
            </h4>
         </div>
         
<div class = "modal-body body-size row model-bg">
	<form  novalidate class="form-horizontal" name="add_dept" id="add_dept" method="post">
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name"> Doctor</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="patient.Doc_name"  placeholder="Enter Doctor Name">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name"> Patient ID</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold"  ng-model="patient.id"  placeholder="Enter Patient ID">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			 <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Patient Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold " ng-model="patient.name"  placeholder="Enter Name">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Consultation Fees</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="number" class="form-control align-input-ele font-lato-12-bold" ng-model="patient.fees"  placeholder="Enter Consultation Fees">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			 <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name"> Date of Birth</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold calender-input" id="date1" ng-model="patient.dob"  placeholder="Enter Date of Birth">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>	
			 <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name"> Payment Mode </label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;margin-top: 10px;" >
				 <input type="radio" name="payment" value="Cash" checked style="margin-left: -14%;"> Cash
				<input type="radio" name="payment" value="Card" style="margin-left: 11%;"> Card
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			
		
			
		
    </div>	
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "submit" class = "btn btn-primary align-submit"  ng-click="insertdata()" >
               Print
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
 
 
 
 
 </div>
 
 </div>
 </div> <!-- Row End -->
</div>  <!-- Container End -->

<script src="../../js/datepicker/jquery-ui.js"></script>
<script src="../../js/receptionscript/receptionscript.js"></script> 

</body> <!-- Body End -->

</html>
