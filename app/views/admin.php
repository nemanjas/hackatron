<!doctype html>
<html lang="en">
<head>
    <script type="text/javascript">
        base_url = '<?php echo URL::to('/')?>';
        
    </script>
	<meta charset="UTF-8">
	<title>Admin</title>

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
		<script src="<?php echo URL::to('/')?>/js/controllers/mainCtrl.js"></script> <!-- load our controller -->
		<script src="<?php echo URL::to('/')?>/js/services/adminService.js"></script> <!-- load our service -->
                <script src="<?php echo URL::to('/')?>/js/app.js"></script> <!-- load our application -->
                <title></title>	

</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="adminApp" ng-controller="mainController">
    <div class="comment" ng-hide="loading" ng-repeat="comment in comments">
		<h3>Email {{ comment.email }}</h3>
		<p>{{ comment.data.description }}</p>

		<p><a href="#" ng-click="deleteComment(comment.id)" class="text-muted">Obrisi</a>
                    <label>Status</label>
                    <select class="right"  name="status" ng-model="status" ng-change="changeStatus(comment.id,$(this).val())" ng-options="status.id as status.name for status in statuses">
                        
                    </select>
                </p>
	</div>
</body>
</html>