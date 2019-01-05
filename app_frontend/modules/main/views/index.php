<?php $this->load->view('template/temp_head');?>

</head>

<body ng-controller="ecomController">
	<?php $this->load->view('template/temp_navbar');?>

	<!--/ส่วนของslide -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="<?php echo $this->config->item('root_url') ?>uploads/banner/pixel-2.jpg">
				<div class="carousel-caption d-none d-md-block">
					<h1>คอลเลกชันฤดูหนาวที่ดีที่สุด</h1>
					<p>เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์</p>
					<button class="btn btn-info btn-lg">ช้อปเลย</button>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="<?php echo $this->config->item('root_url') ?>uploads/banner/pixel-3.jpg">
				<div class="carousel-caption d-none d-md-block">
					<h1>คอลเลกชันฤดูหนาวที่ดีที่สุด</h1>
					<p>เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์</p>
					<button class="btn btn-info btn-lg">ช้อปเลย</button>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!--/.ส่วนของslide -->

	<div class="container-fluid offer pt-3 pb-3 bg-orange d-none d-md-block">
		<div class="container">
			<div class="row">
				<div class="col-md-4 m-right">
					<h4>จัดส่งฟรี</h4>
					<p>หากสั่งซื้อทั้งหมดมากกว่า 90บาท</p>
				</div>
				<div class="col-md-4 m-right">
					<h4>โทรหาเราทุกเวลา</h4>
					<p>086-2887987</p>
				</div>
				<div class="col-md-4">
					<h4>ที่ตั้งของเรา</h4>
					<p>มหาวิทยาลัยราชภัฏยะลา</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid bg-light-gray">
		<div class="container pt-5">
			<div class="row">
				<h3>ติดอันดับสำหรับผู้หญิง</h3>
			</div>
			<div class="row">
				<div class="underline"></div>
			</div>
		</div>
		<div class="container mt-5">
			<div class="row">
				<?php foreach ($woman_products as $index => $value) {?>
				<div class="col-md-3 mb-3" ng-init='product[<?php echo $index; ?>]=<?php echo json_encode( $value ); ?>'>
					<div class="card">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/pexels-photo-206410.jpeg" alt="card-1" class="card-img-top">
						<div class="card-body product-card-body">
							<h5>
								<?php echo $value['name'];?>
							</h5>
							<h6>
								<span class="text-danger" style="text-decoration:line-through">ราคา
									<?php echo number_format($value['price1'],2);?> บาท</span><br>
								<span class="text-success">ราคาขาย
									<?php echo number_format($value['price2'],2);?> บาท</span>
							</h6>
							<button class="btn btn-danger" ng-click="addItemToCart(product[<?php echo $index; ?>])" ><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
				</div>
				<?php }?>
			</div>
		</div>
		<div class="container mt-5">
			<div class="row">
				<h3>รองเท้าส้นสูง</h3>
			</div>
			<div class="row">
				<div class="underline"></div>
			</div>
		</div>
		<div class="container mt-5 pb-5">
			<div class="row">
				<div class="col-md-3">
					<div class="card">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/show 1.jpg" alt="card-1" class="card-img-top">
						<div class="card-body product-card-body">
							<h5>Black Shoes</h5>
							<h6>34.00 บาท</h6>
							<button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/show 2.jpg" alt="card-1" class="card-img-top">
						<div class="card-body product-card-body">
							<h5>Red Shoes</h5>
							<h6>34.00 บาท</h6>
							<button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/show 3.jpg" alt="card-1" class="card-img-top">
						<div class="card-body product-card-body">
							<h5>Modern Shoes</h5>
							<h6>34.00 บาท</h6>
							<button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/show 4.jpg" alt="card-1" class="card-img-top">
						<div class="card-body product-card-body">
							<h5>High Hill Shoes</h5>
							<h6>34.00 บาท</h6>
							<button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid pt-5 pb-5">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="row">
						<h4>ต้องการมากที่สุด</h4>
					</div>
					<div class="row">
						<div class="underline-green"></div>
					</div>
					<div class="media mt-5">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/belts-823257_1920-540x500.jpg" class="img-fluid mr-3" alt="media1">
						<div class="media-body mt-2">
							<h5>FITT Belts</h5>
							<h6>35.00 บาท</h6>
							<button class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
					<div class="media mt-5">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/fashion-731827_1920-540x500.jpg" class="img-fluid mr-3" alt="media1">
						<div class="media-body mt-2">
							<h5>Magnolia Dress</h5>
							<h6>25.00 บาท</h6>
							<button class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
					<div class="media mt-5">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/jeans-428614_1920-540x500.jpg" class="img-fluid mr-3" alt="media1">
						<div class="media-body mt-2">
							<h5>Rocadi Jeans</h5>
							<h6>75.00 <span style="text-decoration: line-through">99.00</span> บาท</h6>
							<button class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row">
						<h4>ผ้าพันคอ</h4>
					</div>
					<div class="row">
						<div class="underline-blue"></div>
					</div>
					<div class="media mt-5">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/a-neckerchief-1317830_1920-540x500.jpg" class="img-fluid mr-3" alt="media1">
						<div class="media-body mt-2">
							<h5>Istwic Scarf</h5>
							<h6>23.00 บาท</h6>
							<button class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
					<div class="media mt-5">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/a-neckerchief-1315912_1920-540x500.jpg" class="img-fluid mr-3" alt="media1">
						<div class="media-body mt-2">
							<h5>Jennifer Scarf</h5>
							<h6>36.00 บาท</h6>
							<button class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
					<div class="media mt-5">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/a-neckerchief-1315916_1920-540x500.jpg" class="img-fluid mr-3" alt="media1">
						<div class="media-body mt-2">
							<h5>Andora Scarf</h5>
							<h6>37.00 บาท</h6>
							<button class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row">
						<h4>ลดราคา</h4>
					</div>
					<div class="row">
						<div class="underline-black"></div>
					</div>
					<div class="media mt-5">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/woman-1484279_1920-540x500.jpg" class="img-fluid mr-3" alt="media1">
						<div class="media-body mt-2">
							<h5>Marina Style</h5>
							<h6>46.00 บาท</h6>
							<button class="btn btn-dark"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
					<div class="media mt-5">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/key-692199_1920-540x500.jpg" class="img-fluid mr-3" alt="media1">
						<div class="media-body mt-2">
							<h5>Jennifer Scarf</h5>
							<h6>36.00 บาท</h6>
							<button class="btn btn-dark"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
					<div class="media mt-5">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/cute-955782_1920-540x500.jpg" class="img-fluid mr-3" alt="media1">
						<div class="media-body mt-2">
							<h5>Manago Shirt</h5>
							<h6>25.00 บาท</h6>
							<button class="btn btn-dark"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid bg-light-gray pt-5 pb-5">
		<div class="container mt-0">
			<div class="row">
				<h4>ที่โดดเด่น</h4>
			</div>
			<div class="row">
				<div class="underline"></div>
			</div>
		</div>
		<div class="container mt-5">
			<div class="row">
				<div class="col-md-3">
					<div class="card">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/pexels-photo-220449.jpeg" class="card-img-top">
						<div class="card-body product-card-body">
							<h5>Black Shirt</h5>
							<h6>67.87 บาท</h6>
							<button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/pexels-photo-731794.jpeg" class="card-img-top">
						<div class="card-body product-card-body">
							<h5>Black Shirt</h5>
							<h6>67.87 บาท</h6>
							<button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/pexels-photo-301279.jpeg" class="card-img-top">
						<div class="card-body product-card-body">
							<h5>Black Shirt</h5>
							<h6>67.87 บาท</h6>
							<button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/pexels-photo-245931.jpeg" class="card-img-top">
						<div class="card-body product-card-body">
							<h5>Black Shirt</h5>
							<h6>67.87 บาท</h6>
							<button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid pt-5 pb-5 bg-light-gray">
		<div class="container">
			<div class="row">
				<h4>เทรนด์</h4>
			</div>
			<div class="row">
				<div class="underline-blue"></div>
			</div>
		</div>
		<div class="container pt-5">
			<div class="row">
				<div class="col-md-3">
					<div class="card">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/pexels-photo-247206.jpeg" alt="img" class="card-img-top">
						<div class="card-body product-card-body">
							<h5>Denim Shirt</h5>
							<h6>67.87 บาท</h6>
							<button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/pexels-photo-206454.jpeg" alt="img" class="card-img-top">
						<div class="card-body product-card-body">
							<h5>White Net</h5>
							<h6>67.87 บาท</h6>
							<button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/pexels-photo-245931.jpeg" alt="img" class="card-img-top">
						<div class="card-body product-card-body">
							<h5>Purple Bra</h5>
							<h6>67.87 บาท</h6>
							<button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<img src="<?php echo $this->config->item('root_url') ?>uploads/product/2018/12/pexels-photo-206381.jpeg" alt="img" class="card-img-top">
						<div class="card-body product-card-body">
							<h5>Blue Skart</h5>
							<h6>67.87 บาท</h6>
							<button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> หยิบใส่ตะกร้า</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <?php $this->load->view('template/temp_footer');?>
    <script src="<?php echo $this->config->item('public') ?>js/app.ecom.controller.js"></script>
</body>

</html>
