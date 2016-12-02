 <!DOCTYPE html>
<html>
<head>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>-->
	<script src="js/angular.min.js"></script>
 	<script  src="js/bootstrap.js"></script>

 	<link rel="Stylesheet" href="css/bootstrap.css">
 	<link href="https://fonts.googleapis.com/css?family=Cabin+Condensed" rel="stylesheet">

	<title>Address Book</title>
	<style>
		*{
        font-family: 'Cabin Condensed', sans-serif;
        } 
        body { 
                 background-color: #f2f2f2 ;
                 
            }
        
        hr.style1 { 
          border: 0; 
          height: 1px; 
          background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
          background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
          background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
          background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0); 

        }
        hr.style2 {
                background-color: #404040 !important;
                color: #404040 !important;
                border: solid 2px #404040 !important;
                height: 2px !important;
                margin-bottom: 0;
                margin-top: 0;
            }
      hr.style3 {
          background-color: #fff;
          border-top: 1px dashed #8c8b8b;
        }
      hr.style4 {
          border-top: 3px double #8c8b8b;
        }
	</style>
</head>
<body >
	
	
		<div class="container-fluid" style="background-color:">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1> Contact Book</h1>
				<h5 align="right">BEST WAY TO SAVE YOUR CONTACTS</h5>
			</div>
			
		</div>
		<hr class="style2">

	<div class="container-fluid" ng-app="myApp" ng-controller="myController">

			<div class="panel panel-default">
				<div class="panel-body">
				<br><br>
					<div class="col-lg-4">
			<form class="form-horizontal">
				  
				  <div class="form-group">
				  	<legend>
				  	<span class="glyphicon glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Add Contacts
				  </legend>
				    <label class="control-label">Name :</label>
				    <div>
				      <input type="text" class="form-control" placeholder="Enter Name" ng-model="name">
				      <input type="hidden" ng-model="id">
				    </div>
				    <label class="control-label">City :</label>
				    <div>
				      <input type="text" class="form-control" placeholder="Enter City" ng-model="city">
				    </div>
				    <label class="control-label">Pnone No :</label>
				    <div>
				      <input type="text" class="form-control" placeholder="Enter Phone No." ng-model="phone">
				    </div>
				    <label class="control-label">Address :</label>
				    <div>
				      <input type="text" class="form-control" placeholder="Enter Address" ng-model="addr">
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div>
				      <button class="btn btn-info" value="submit" ng-click="insertdata()" >{{btn_name}} </button>
				    </div>
				  </div>
			</form>
		</div>
		<div class="col-lg-8">
			<div class="input-group">
			  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
			  <input type="text" class="form-control" placeholder="Search Names" aria-describedby="basic-addon1" ng-model="dataFilter">
			</div>
			<br>
			<table class="table table-striped table-hover">
				<thead th bgcolor="#99ccff">
					<th>Sl.</th>
					<th>Name</th>
					<th>City</th>
					<th>Mobile No.</th>
					<th>Address</th>	
					<th>Action</th>
				</thead>
				<tbody>
					<tr ng-repeat="rows in data| filter:dataFilter">
						<td>{{rows.id}}</td>
						<td>{{rows.name}}</td>
						<td>{{rows.city}}</td>
						<td>{{rows.phone}}</td>
						<td>{{rows.addr}}</td>
						<td>
							<span ng-click="" class="glyphicon glyphicon-map-marker"></span>
							&nbsp; &nbsp;&nbsp; &nbsp;
							<span  ng-click="editData(rows.id, rows.name, rows.city, rows.phone, rows.addr)" class="glyphicon glyphicon-pencil"> </span>
							&nbsp; &nbsp;&nbsp; &nbsp;
							<span  ng-click="deleteData(rows.id)" class="glyphicon glyphicon glyphicon-trash"></span>
							
							
							
						</td>
					</tr>	
				</tbody>
				
			</table>
				</div>
			</div>
		
			
		</div>

	<script>
		var app = angular.module('myApp',[]);


		app.controller('myController',function($scope,$http){

			$scope.btn_name ="Submit";
			$scope.id='';

			$http.get("select.php")
			.success(function(data){
				$scope.data=data;
			})

			$scope.insertdata= function(){
				$http.post("insert.php",{'id':$scope.id, 'name':$scope.name,'city':$scope.city,'phone':$scope.phone,'addr':$scope.addr, 'btn_name':$scope.btn_name})
				.success(function(data,status,headers,config){
						alert("data inserted successfully");
						$scope.displayData();
						$scope.clearField();

				});

			}

			$scope.displayData= function(){
				$http.get("select.php")
				.success(function(data){
					$scope.data = data;
				});
			}

			$scope.deleteData=function(id){
				$http.post("delete.php",{'id':id})
				.success(function(){
					$scope.displayData();
					$scope.clearField();
				});
			}

			$scope.editData=function(id,name,city,phone,addr){
				$scope.id=id;
				$scope.name=name;
				$scope.city=city;
				$scope.phone=phone;
				$scope.addr=addr;
				$scope.btn_name ="Update";


			}


			$scope.clearField=function(){
				$scope.id='';
				$scope.name='';
				$scope.city='';
				$scope.phone='';
				$scope.addr='';
			}


		});

	</script>

	</div>

</body>
</html>