<?php $this->load->view('template/temp_head');?>
</head>

<body ng-controller="paymentController">
    
<?php $this->load->view('template/temp_navbar');?>

    <div class="container-fluid pb-5">
        <div class="container pt-5">
            <h3 class="text-center">แจ้งชำระเงิน</h3>
        </div>
        <div class="container mt-5">
            <div class="row justify-content-center mt-4">
                <div class="col-md-11">
                    <form action="#" ng-submit="confirmPayment($event)">
                        <div class="card">
                            <div class="card-header">
                                <h5>ข้อมูลแจ้งชำระเงิน</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>เลขที่ใบสั่งซื้อ</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="code" ng-model="confirm.code" placeholder="ระบุเลขที่ใบสั่งซื้อ" aria-describedby="button-addon2" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button" ng-click="orderCheck(confirm.code)" id="button-addon2">ตรวจสอบ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ยอดเงินที่โอน</label>
                                            <input type="text" class="form-control" name="amount" ng-model="confirm.amount" placeholder="ระบุยอดเงินที่โอน" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>วันที่โอน</label>
                                            <input type="date" class="form-control" name="date" ng-model="confirm.date" placeholder="ระบุวันที่โอน" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>ธนาคารที่โอน</label>
                                            <div class="pl-5">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="bank" ng-model="confirm.bank" value="scb" ng-value="'scb'" id="scb">
                                                    <label class="form-check-label" for="scb">
                                                        <img src="<?php echo $this->config->item('public') ?>images/banks/scb.png">
                                                        ธนาคาร ไทยพาณิชย์
                                                        <p>ชื่อบัญชี : ร้านไอท็อปไซเบอร์ซอฟร์ต เลขที่บัญชี 704-273584-1</p>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="bank" ng-model="confirm.bank" value="k-cyber" ng-value="'k-cyber'" id="k-cyber">
                                                    <label class="form-check-label" for="k-cyber">
                                                        <img src="<?php echo $this->config->item('public') ?>images/banks/kbank.png">
                                                        ธนาคาร กสิกรไทย
                                                        <p>ชื่อบัญชี : ร้านไอท็อปไซเบอร์ซอฟร์ต เลขที่บัญชี 704-273584-1</p>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="bank" ng-model="confirm.bank" value="paypal" ng-value="'paypal'" id="paypal">
                                                    <label class="form-check-label" for="paypal">
                                                        <img src="<?php echo $this->config->item('public') ?>images/banks/paypal.png">
                                                        ชำระออนไลน์ด้วยบัตรเครดิตหรือ PAYPAL
                                                        <p>เลขที่บัญชี nakomah.web@gmail.com</p>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="bank" ng-model="confirm.bank" value="promtpay" ng-value="'promtpay'" id="promtpay">
                                                    <label class="form-check-label" for="promtpay">
                                                        <img src="<?php echo $this->config->item('public') ?>images/banks/prompt_pay_logo.png">
                                                        Promt Pay
                                                        <p>เลขที่บัญชี 1950500092435</p>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ธนาคารต้นทางที่โอน</label>
                                            <input type="text" class="form-control" name="bank_start" ng-model="confirm.bank_start" placeholder="ระบุธนาคารต้นทางที่โอน">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>สาขา</label>
                                            <input type="text" class="form-control" name="bank_offset" ng-model="confirm.bank_offset" placeholder="ระบุสาขา" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>หลักฐานที่โอน</label>
                                            <input type="file" file-input="files" class="form-control" required />  
                                            <small class="form-text text-muted">
                                                ขนาดไฟล์ไม่เกิน 3 Mb และไฟล์ประเภท PDF หรือ JPG , JPEG , PNG เท่านั้น<br>
                                                การใช้หลักฐานปลอม มีความผิดตาม พรบ. คอมพิวเตอร์
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>หมายเหตุ</label>
                                            <textarea name="remark" class="form-control" ng-model="confirm.remark" rows="5" placeholder="ระบุที่อยู่"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted text-center">
                                <button type="submit" class="btn btn-success" ng-disabled="disable" ><i class="fa fa-floppy-o" aria-hidden="true"></i> แจ้งโอนเงิน</button>
                                <button type="reset" class="btn btn-secondary">ล้างข้อมูล</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('template/temp_footer');?>
    <script src="<?php echo $this->config->item('public') ?>js/app.payment.controller.js"></script>
</body>

</html>