"use strict";

app.controller("ecomController", function ($scope, $http, $window) {

	$scope.carts = {
		items: [],
		total: 0
	};

	//  get cart of session storage
	if (!angular.isUndefinedOrNull($window.sessionStorage.getItem("carts"))) {
		$scope.carts = JSON.parse($window.sessionStorage.getItem("carts"));
	}

	$scope.addItemToCart = function (product) {
		// console.log(product)
		if ($scope.carts.items.length === 0) {
			product.amount = product.price2;
			$scope.carts.items.push(product);
		} else {
			var repeat = false;
			for (var i = 0; i < $scope.carts.items.length; i++) {
				if ($scope.carts.items[i].id === product.id) {
					repeat = true;
					$scope.carts.items[i].qty = parseInt($scope.carts.items[i].qty) + 1;
					$scope.carts.items[i].amount = $scope.carts.items[i].qty * $scope.carts.items[i].price2;
				}
			}
			if (!repeat) {
				product.amount = product.price2;
				$scope.carts.items.push(product);
			}
		}

		$scope.carts.total += parseFloat(product.price2);
		// console.log($scope.carts);

		// set session storage
		$window.sessionStorage.setItem("carts", JSON.stringify($scope.carts));

	}

	$scope.setUpdateQuantity = function (value, index) {
		//   console.log(value, index);
		$scope.carts.items[index].qty = value;
		$scope.carts.items[index].amount =
			$scope.carts.items[index].qty * $scope.carts.items[index].price2;
		$scope.carts.total = 0;
		angular.forEach($scope.carts.items, function (value, index) {
			$scope.carts.total += parseFloat(value.amount);
		});
		// set session storage
		$window.sessionStorage.setItem("carts", JSON.stringify($scope.carts));
	};

	$scope.removeItemCart = function (index) {
		// remove order
		$scope.carts.items.splice(index, 1);

		// คำนวณเงินใหม่
		$scope.carts.total = 0;
		angular.forEach($scope.carts.items, function (value, key) {
			$scope.carts.total += parseFloat(value.amount);
		});

		// set session storage
		$window.sessionStorage.setItem("carts", JSON.stringify($scope.carts));
	};

	$scope.clearItemCart = function () {
		delete $scope.carts;
		// remove session storage
		sessionStorage.removeItem("carts");
	};

	$scope.confirmOrder = function (event) {
		event.preventDefault();

		$scope.carts.users = $scope.user;

		$http.post("./main/confirmOrder", $scope.carts).then(function (resp) {
			if (resp.data.status) {
				swal({
					title: "บันทึกข้อมูลได้สำเร็จ",
					text: "<strong>รหัสสั่งซื้อ คือ " + resp.data.code.code + " </strong><br> คัดลอกรหัสนี้เพื่อทำการแจ้งชำระเงินรายการสั่งซื้อ",
					type: "success",
					html: true,
					confirmButtonClass: "btn-success",
					confirmButtonText: "ตกลง",
				}, function () {
					$scope.clearItemCart();
					delete $scope.user;

					// redirect ไปยังหน้าแรก
					$window.location.href = "./payment";
				});
			} else {
				swal("บันทึกข้อมูลไม่สำเร็จ", "เกิดข้อผิดพลาดในการบันทึกข้อมูล กรุณาตรวจสอบอีกครั้ง", "danger")
			}
		});
	};
});

app.directive("numericOnly", function () {
	return {
		require: "ngModel",
		link: function (scope, element, attrs, modelCtrl) {
			modelCtrl.$parsers.push(function (inputValue) {
				var transformedInput = inputValue ?
					inputValue.replace(/[^\d.-]/g, "") :
					null;

				if (transformedInput != inputValue) {
					modelCtrl.$setViewValue(transformedInput);
					modelCtrl.$render();
				}

				return transformedInput;
			});
		}
	};
});

app.directive("numberSpin", [
	function () {
		return {
			restrict: "E",
			scope: {
				ngValue: "="
			},
			template: `
            <div>
               <a class="ns-plus" ng-click="plus()">+</a>
               <input numeric-only ng-model="ngValue" ng-pattern="onlyNumbers" type="text">
               <a class="ns-minus" ng-click="minus()">-</a>
            </div>
         `,
			link: function (scope, elem, attrs) {
				scope.onlyNumbers = /^\d+$/;

				scope.plus = function () {
					scope.ngValue = parseInt(scope.ngValue) + 1;
					var index = scope.$parent.$index;
					scope.$parent.setUpdateQuantity(scope.ngValue, index);
				};

				scope.minus = function () {
					scope.ngValue = parseInt(scope.ngValue) - 1;
					var index = scope.$parent.$index;
					scope.$parent.setUpdateQuantity(scope.ngValue, index);
				};
			}
		};
	}
]);
