var app = angular.module('reports', []);

app.controller('reports_controller', ['$scope', '$http', function ($scope, $http) {
        // scope variables
        $scope.display_doctor={};
        $scope.display_specialization={};
		$scope.add_doct={};
		$scope.edit_doct={};
		$scope.total=0;
		$scope.totalamt=0;
		$scope.packageamt=0;
		
        		
		
		$scope.patient_add={};
		$scope.patient_details={};
		$scope.op={};
		$scope.ip={};
		$scope.testdetails={};
		$scope.package1={};
		$scope.receptionists={};
		$scope.testamount=0;
		
		$scope.display_ip={};
		$scope.show_test=false;
		$scope.show_package=false;
		$scope.show_ip=false;
		$scope.show_op=true;
		
		$scope.show_op_div=false;
		$scope.show_ip_div=false;
		$scope.show_package_div=false;
		$scope.show_test_div=false;
		
		
		$scope.get_ip_report=function(){ 
								$scope.show_test=false;
						$scope.show_package=false;
						$scope.show_op=false;
						$scope.show_ip=true;
		};
		$scope.get_op_report=function(){
								$scope.show_test=false;
						$scope.show_package=false;
						$scope.show_ip=false;
						$scope.show_op=true;
		};
		$scope.get_tests_report=function(){
								$scope.show_test=true;
						$scope.show_package=false;
						$scope.show_ip=false;
						$scope.show_op=false;
		};
		$scope.get_package_report=function(){
								$scope.show_test=false;
						$scope.show_package=true;
						$scope.show_ip=false;
						$scope.show_op=false;
		};
		
		
		$http({     
						                method : 'POST' ,
										url: 'get_receptionists.php',
										
										
								}).success(function(data){
										$scope.receptionists=data;
					                
						       }).error(function(data, status) {
						                 alert("error");
					   }); 
		
		 $scope.cash=0;
		                $scope.card=0;
        $scope.displayreports = function() {
			
			
		                $scope.total=0;
		                $scope.cash=0;
		                $scope.card=0;
		               
								$scope.show_op_div=true;
			      
						$http({     
						                method : 'POST' ,
										url: 'op_report.php',
										data: $scope.op
										
								}).success(function(data){
										$scope.display_op=data;
										
										for(var i in data)
										{
							                	 	$scope.total+= parseInt(data[i][17],10);	     
							                	 	$scope.cash+= parseInt(data[i][14],10);	     
							                	 	$scope.card+= parseInt(data[i][15],10);	     
										}
										
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };
		
		$scope.cashamt=0;
                      $scope.cardamt=0;
		 $scope.displayipreports = function() {
		
                      $scope.totalamt=0;
                      $scope.cashamt=0;
                      $scope.cardamt=0;
			         $scope.show_ip_div=true;
						$http({     
						                method : 'POST' ,
										url: 'ip_patient_report.php',
										data: $scope.ip 
										
								}).success(function(data){
										$scope.display_ip=data;
										
										for(var i in data)
										{
							                	 	$scope.totalamt+= parseInt(data[i][8],10);	     
							                	 	$scope.cashamt+= parseInt(data[i][5],10);	     
							                	 	$scope.cardamt+= parseInt(data[i][6],10);	     
										}
										
										console.log(data);
										
										
										
									
										
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };

         
		 $scope.testcash=0;
		                $scope.testcard=0;
      $scope.testreport = function() {
		                $scope.testamount=0;
		                $scope.testcash=0;
		                $scope.testcard=0;
						$scope.show_test_div=true;
			      
						$http({     
						                method : 'POST' ,
										url: 'op_test_report.php',
										data: $scope.op_test 
										
								}).success(function(data){
										$scope.testdetails=data;
										console.log(data);
										for(var i in data)
										{
							                	 	$scope.testamount+= parseInt(data[i][6],10);	     
							                	 	$scope.testcash+= parseInt(data[i][3],10);	     
							                	 	$scope.testcard+= parseInt(data[i][4],10);	     
										}
								
										
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };
		    $scope.packagecash=0;
		                $scope.packagecard=0;
			$scope.packageamount=0;
		$scope.packagereport = function() {
		                $scope.packageamt=0;
		                $scope.packagecash=0;
		                $scope.packagecard=0;
						$scope.packageamount=0;
						$scope.show_package_div=true;
			      
						$http({     
						                method : 'POST' ,
										url: 'package_report.php',
										data: $scope.package1
										
								}).success(function(data){
										$scope.package_disp=data;
										
										for(var i in data)
										{
							                	 	$scope.packageamt+= parseInt(data[i][11]);	
							                	 	$scope.packagecash+= parseInt(data[i][7]);	
							                	 	$scope.packagecard+= parseInt(data[i][8]);	
													
										}
									
									
										
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };
     
}]);
