angular.module('adminService', [])

	.factory('Admin', function($http) {

		return {
			login : function(loginData) {
				return $http({
					method: 'POST',
					url: 'authenticate',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(loginData)
				});
			},
			show : function(id) {
				return $http.get('api/comments/' + id);
			},
			save : function(commentData) {
				return $http({
					method: 'POST',
					url: 'api/comments',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(commentData)
				});
			},
			destroy : function(id) {
				return $http.delete('api/comments/' + id);
			},
                        
                        status : function(id,status) {
				return $http({
					method: 'POST',
					url: 'admin/update',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: {id:id,status:status}
				});
			},
                        get : function() {
				return $http.get(base_url+'/admin/getall');
			},
		}

	});