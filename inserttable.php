<!DOCTYPE html>
<html>
<head>
	<title>Inster table</title>
	<script src="js/angular.min.js"></script>
</head>
<body>
	<div ng-app="myApp" ng-controller="empcontroller">
		<form>
			id: <input type="text" ng-model="id" name="">
			name: <input type="text" ng-model="name" name="">
			<input type="button" value="submit" ng-click="postdata()">
		</form>
		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Roll No</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="student in data">
					<td>{{student.studname}}</td>
					<td>{{student.studid}}</td>
				</tr>
			</tbody>
		</table>
	</div>
	
	<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.3/angular-route.min.js"></script>    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

	<script>
		var app=angular.module('myApp',[]);
		app.controller('empcontroller', function ($scope, $http) {
		
			$scope.postData = function () {

			    var request = $http({
			        method: "post",
			        url: window.location.href + "insert.php",
			        data: {
			            id: $scope.id,
			            name: $scope.name,
			        },
			        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
			    });

			 }
		}); 
	</script>
</body>
</html>