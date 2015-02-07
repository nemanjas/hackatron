<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
    <script type="text/javascript">
        base_url = '<?php echo URL::to('/')?>';
        
        
    </script>
	<!-- CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
	<style>
		body 		{ padding-top:30px; }
		form 		{ padding-bottom:20px; }
		.comment 	{ padding-bottom:20px; }
	</style>

	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.js"></script> <!-- load angular -->

	<!-- ANGULAR -->
	<!-- all angular resources will be loaded from the /public folder -->
		<script src="js/controllers/mainCtrl.js"></script> <!-- load our controller -->
		<script src="js/services/adminService.js"></script> <!-- load our service -->
		<script src="js/app.js"></script> <!-- load our application -->	

</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="adminApp" ng-controller="mainController">
<div class="col-md-8 col-md-offset-2">

	<!-- PAGE TITLE -->
	<div class="page-header">
		<h2>Admin</h2>
                
                
		<h4>Login</h4>
	</div>

	<!-- NEW COMMENT FORM -->
        <form id="loginform" ng-submit="login()"> <!-- ng-submit will disable the default form action and use our function -->

		<!-- AUTHOR -->
		<div class="form-group">
			<input type="text" class="form-control input-lg" ng-model="loginData.username" name="username"  placeholder="username">
		</div>

		<!-- COMMENT TEXT -->
		<div class="form-group">
			<input type="password" class="form-control input-lg" name="password" ng-model="loginData.password" placeholder="password">
		</div>
		
		<!-- SUBMIT BUTTON -->
		<div class="form-group text-right">	
			<button type="submit" class="btn btn-primary btn-lg">Login</button>
		</div>
	</form>
        <span class="error" id="error"></span>


</div>
</body>
</html>