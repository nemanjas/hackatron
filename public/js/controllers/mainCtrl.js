var token;
angular.module('mainCtrl', [])

	.controller('mainController', function($scope, $http, Admin) {
		// object to hold all the data for the new comment form
	

		// loading variable to show the spinning loading icon
		$scope.loading = true;
               
		
		// get all the comments first and bind it to the $scope.comments object
                if(action == 'AdminController@index'){
		Admin.get()
			.success(function(data) {
                         
				$scope.comments = data.data;
                               // $scope.status = $scope.statuses[$scope.comments.status] ;
				$scope.loading = false;

				for(var i =0; i< $scope.comments.length;i++){
					$scope.comments[i].decodedImage = $scope.convertToBase64($scope.comments[i].image);
				}
			});
                    }else{
                        
                Admin.getpodesavanja()
			.success(function(data) {
                         
				$scope.comments = data.data;
                               // $scope.status = $scope.statuses[$scope.comments.status] ;
				$scope.loading = false;
			});
                    }

                $scope.statuses = [{id:'0',name:'primljeno'},{id:'1',name:'poslato'},{id:'2',name:'reseno'}]; 
                
                

		// function to handle submitting the form
		$scope.login = function(loginData) {

			$scope.loading = true;

			// save the comment. pass in comment data from the form
			Admin.login($scope.loginData)
				.success(function(data) {
                                    if(data=='false'){
                                        $('#error').html('Pogresan Username I Password');
                                    }else{
                                        window.location.replace("admin/index");
                                    }
				})
				.error(function(data) {
					console.log(data);
				});
		};

		// function to handle deleting a comment
		$scope.deleteComment = function(id) {
			$scope.loading = true; 

			Admin.destroy(id)
				.success(function(data) {

					// if successful, we'll need to refresh the comment list
					 Admin.get()
                                        .success(function(data) {

                                                $scope.comments = data.data;
                                                $scope.loading = false;
                                        });

				});
		};
             
                
                	$scope.changeStatus = function(id,status) {
			$scope.loading = true; 
                        console.log(status);
			Admin.status(id,status)
				.success(function(data) {
                                    Admin.get()
                                        .success(function(data) {

                                                $scope.comments = data.data;
                                                $scope.loading = false;
                                        });

				});
		};

		$scope.convertToBase64 = function(byteString){

			var byteArray = JSON.parse(byteString);
			var len = byteArray.length;
			var baseImage = new Array(len);
			for(var i = 0; i<len; i++){
				baseImage[i] = String.fromCharCode(byteArray[i] & 0xff);
			}

			return baseImage;
		}
	})