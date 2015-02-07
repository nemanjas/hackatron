<!doctype html>
<html lang="en">
<head>
    
    <script type="text/javascript">
        base_url = '<?php echo URL::to('/')?>';
        action ='<?php echo Route::currentRouteAction()?>';
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
        <nav class="nav nav-pills">
        <li role="presentation" class="active">
      <a href="<?php echo URL::to('admin/index')?>">
       Prijave
      </a>
        </li>
        <li role="presentation" >
         <a  href="<?php echo URL::to('admin/podesavanja')?>">
       Podesavanja
      </a>
        </li>

</nav>
    <div class="comment container" ng-hide="loading" ng-repeat="comment in comments" style="margin-top: 50px">
             <a href="#" ng-click="deleteComment(comment.id)" class="btn btn-danger">Obrisi</a>
                <div class="pull-right">
                    <label>Status</label><br/>
                    <select   name="status" ng-model="comment.status" value="{{comment.status}}"  ng-change="changeStatus(comment.id,comment.status)" ng-options="status.id as status.name for status in statuses">
                        
                    </select>
                </div>
		<h3>Email {{ comment.email }}</h3>
		<p>{{ comment.data.description }}</p>

		<p>
               
                </p>
                <hr>
	</div>
</body>
</html>