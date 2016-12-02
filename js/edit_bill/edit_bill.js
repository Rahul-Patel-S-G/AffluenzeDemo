var app = angular.module('bill', []);

app.controller('bill_controller', ['$scope', '$http', function ($scope, $http) {
     $scope.bill_no={};
	  $scope.bill_details={};
	  $scope.bill={};
       
     $scope.get_bill_details=function(){
	 
	   
	             
						$http.post("show_details.php",{bill_no: $scope.bill_no})
														.success(function(data,status,headers,config){
														
														 
														   $scope.bill_details = data;
													
                                                          
														}).error(function(data, status) {
														   alert("error");
													   });  
	 
	 };


$scope.call=function(sl_no,quantity,amount,bill_no){
	
	              if(quantity=="" || quantity==0)
				  {
					  
				  }		
            else{				  
	                              
								$http.post("update_bill.php",{sl_no: sl_no,quantity:quantity,amount:amount,bill_no:bill_no})
											.success(function(data,status,headers,config){
														
														   $scope.bill_details = data;
														  
                                                          
														}).error(function(data, status) {
														   alert("error");
													   });  


	}
};

$scope.bill_no={};
$scope.print_section=function(){
	
											$http({     
						                method : 'POST' ,
										url: 'bill_no.php',
										data: {bill_no:$scope.bill_no,discount : $scope.discount}
										
								}).success(function(data){
			                          $scope.billdetails=data;
									  
									
											setTimeout(function(){
													var innerContents = document.getElementById("printdischarge").innerHTML;
														var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');  
														popupWinindow.document.open();
														popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
														popupWinindow.document.close();		

											},500);
								}).error(function(data, status) {
								alert("error");
								
								});
	
	
	
};
	
}]);

