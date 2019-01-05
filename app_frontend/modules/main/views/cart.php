<?php $this->load->view('template/temp_head');?>
</head>

<body ng-controller="ecomController">
	<?php $this->load->view('template/temp_navbar');?>

	<div class="container-fluid pb-5">
		<div class="container pt-5">
			<h3 class="text-center"><i class="fa fa-cart-plus" aria-hidden="true"></i> ตะกร้าของฉัน</h3>
		</div>
		<div class="container mt-5">
			<div class="row justify-content-center">
				<div class="col-md-11">
					<div class="card">
						<div class="card-header">
							<h5>รายสั่งซื้อของฉัน</h5>
						</div>
						<div class="card-body" ng-if="carts.items.length == 0">
                            <h5 class="text-danger text-center">--ไม่พบรายสั่งซื้อ--</h5>
                        </div>
						<div class="card-body" ng-if="carts.items.length != 0">
							<table border="0" class="table table-bordered table-hover" cellpadding="0" cellspacing="0">
								<thead>
									<tr>
										<td width="1" class="text-nowrap">ลำดับที่</td>
										<td>ชื่อสินค้า</td>
										<td width="80" class="text-nowrap text-center">จำนวน</td>
										<td width="100" class="text-center">ราคา</td>
										<td width="150" class="text-nowrap text-center">จำนวนเงิน</td>
										<td width="100" class="text-nowrap text-center">จัดการ</td>
									</tr>
								</thead>
								<tbody>
									<tr ng-repeat="item in carts.items track by $index">
										<td>{{$index+1}}</td>
										<td>{{item.name}}</td>
										<td>
											<!-- {{item.qty}} -->
											<!-- <input type="number" class="form-control" min="1" ng-value="item.qty" ng-keyup="setUpdateQuantity($event.target.value, $index)"> -->
											<number-spin ng-value="item.qty" data-index="{{$index}}" ng-keyup="setUpdateQuantity($event.target.value, $index)"></number-spin>
										</td>
										<td class="text-center">{{item.price2 | number:2}}</td>
										<td align="right">{{item.amount | number:2}}</td>
										<td>
											<button type="button" class="btn btn-secondary btn-sm" ng-click="removeItemCart($index)"><i class="fa fa-trash" aria-hidden="true"></i> ยกเลิก</button>
										</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="4">
											รวมเงินทั้งหมด
										</td>
										<td align="right">
											<strong>{{carts.total | number:2}}</strong>
										</td>
										<td>
											<button type="button" class="btn btn-danger btn-sm" ng-click="clearItemCart()"><i class="fa fa-trash" aria-hidden="true"></i> เคลียร์</button>
										</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center mt-4">
				<div class="col-md-11">
					<form action="#" ng-submit="confirmOrder($event)">
						<div class="card">
							<div class="card-header">
								<h5>ข้อมูลลูกค้า</h5>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>ชื่อ</label>
											<input type="text" class="form-control" name="name" ng-model="user.name" placeholder="ระบุชื่อ" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>นามสกุล</label>
											<input type="text" class="form-control" name="surname" ng-model="user.surname" placeholder="ระบุนามสกุล" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>ที่อยู่</label>
											<textarea name="address" ng-model="user.address" class="form-control" rows="5" placeholder="ระบุที่อยู่" required></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-8">
												<div class="form-group">
													<label>เบอร์โทรศัพท์ที่สามารถติดต่อได้</label>
													<input type="text" class="form-control" name="tel" placeholder="ระบุเบอร์โทรศัพท์" ng-model="user.tel" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>รหัสไปรษณีย์</label>
													<input type="text" class="form-control" name="zipcode" placeholder="ระบุรหัสไปรษณีย์" ng-model="user.zipcode" required>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer text-muted">
								<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> บันทึกข้อมูลการสั่งซื้อ</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

    <?php $this->load->view('template/temp_footer');?>
    <script src="<?php echo $this->config->item('public') ?>js/app.ecom.controller.js"></script>
</body>

</html>
