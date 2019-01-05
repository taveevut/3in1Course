"use strict";

app.controller("paymentController", function ($scope, $http, $window) {
	console.log('hi, paymentController')

	$scope.confirm = {
		bank: 'scb'
	}
	$scope.disable = true;

	$scope.orderCheck = function (code) {
		if (!angular.isUndefinedOrNull(code)) {
			$http.post("./main/orderCheck", {
				code: code
			}).then(function (resp) {
				swal({
					title: resp.data.dialog.title,
					text: resp.data.dialog.text,
					type: resp.data.dialog.status,
					html: true,
					confirmButtonClass: "btn-success",
					confirmButtonText: "ตกลง",
					closeOnConfirm: false
				});
				$scope.confirm.id = resp.data.id;
				$scope.disable = false;
			});
		}
	}

	$scope.confirmPayment = function (event) {
		event.preventDefault();
		// $scope.confirm.id = 9;

		var form_data = new FormData();

		form_data.append('inputText', JSON.stringify($scope.confirm));
		angular.forEach($scope.files, function (file) {
			form_data.append('file', file);
		});

		$http.post("./main/paymentConfirm", form_data, {
			transformRequest: angular.identity,
			headers: {
				'Content-Type': undefined,
				'Process-Data': false
			}
		}).then(function (resp) {
			swal({
				title: resp.data.dialog.title,
				text: resp.data.dialog.text,
				type: resp.data.dialog.status,
				html: true,
				confirmButtonClass: "btn-success",
				confirmButtonText: "ตกลง",
				closeOnConfirm: false
			});
		});
	}
});
