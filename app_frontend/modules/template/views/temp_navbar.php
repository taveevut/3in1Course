<section class="fixed-top">
	<!--/ส่วนบนสุด -->
	<div class="container-fluid bg-dark header-top d-none d-md-block">
		<div class="container">
			<div class="row text-light pt-2 pb-2">
				<div class="col-md-6 text-left">
					<i class="fa fa-envelope-o" aria-hidden="true"></i> nakomah.web@gmail.com
				</div>
				<div class="col-md-6 text-right">
					<a href="#" class="text-light"><i class="fa fa-user-o" aria-hidden="true"></i> บัญชี</a> |
					<a href="<?php echo site_url('main/cart'); ?>" class="text-light"><i class="fa fa-cart-plus" aria-hidden="true"></i> ตะกร้าของฉัน ({{carts.items.length}})</a>
				</div>
			</div>
		</div>
	</div>

	<!--/.ส่วนบนสุด -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-black">
		<div class="container">
			<a class="navbar-brand" href="<?php echo site_url('/'); ?>">SinKhaTook</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo site_url('/'); ?>">หน้าแรก <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">เกี่ยวกับเรา</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							บริการของเรา
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">ติดต่อเรา</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo site_url('main/payment'); ?>">แจ้งชำระเงิน</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--/ส่วนบนสุด -->
</section>
