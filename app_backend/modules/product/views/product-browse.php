<?php $this->load->view('template/header') ?>
<body class="app sidebar-mini rtl">
  <!-- Navbar-->
  <?php $this->load->view('template/navbar') ?>
  <!-- Sidebar menu-->
  <?php $this->load->view('template/sidebar') ?>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> ข้อมูลสินค้า</h1>
        
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <a href="<?=base_url('product/create')?>" class="btn btn-primary">เพิ่มข้อมูล</a>

      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php if($this->session->flashdata()): ?>
          <!-- alert -->
          <?php if($this->session->flashdata('status') == 3): ?>
            <div class="alert alert-success" role="alert">
              ลบข้อมูลสินค้าเรียบร้อย
            </div>
          <?php endif; endif; ?>

          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>ชื่อสินค้า</th>
                    <th>ประเภทสินค้า</th>
                    <th>รูป</th>
                    <th>ราคาต้นทุน</th>
                    <th>ราคาขาย</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($products as $product ) {?>
                    <tr>
                      <td><?=$product->name?></td>
                      <td><?=$product->cat_name?></td>
                      <td>
                        <img width="150"  src="<?=$this->config->item('root_url').$product->cover?>" >
                      </td>
                      <td><?=$product->price1?> บาท</td>
                      <td><?=$product->price2?> บาท</td>
                      <td>
                        <a href="<?=base_url().'product/edit/'.$product->id?>" class="btn btn-warning">แก้ไข</a>
                        <a href="<?=base_url().'product/destroy/'.$product->id?>" class="btn btn-danger confirm">ลบ</a>
                      </td>
                    </tr>
                  <?php }?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <?php $this->load->view('template/script-main') ?>
    <script type="text/javascript">
      $('a.confirm').confirm({
        title: 'คุณแน่ใจที่จะลบข้อมูลนี้',
        content: 'ข้อมูลจะถูกลบออกจากฐานข้อมูล',
        buttons: {

          ok: {
            text: 'ลบ', // text for button
            btnClass: 'btn-danger', // class for the button
            keys: ['enter', 'a'], // keyboard event for button
            isHidden: false, // initially not hidden
            isDisabled: false, // initially not disabled
            action: function(heyThereButton){
             location.href = this.$target.attr('href');
           }
         },
         cancle: {
            text: 'ยกเลิก', // text for button
            btnClass: 'btn-info', // class for the button
            keys: ['enter', 'a'], // keyboard event for button
            isHidden: false, // initially not hidden
            isDisabled: false, // initially not disabled
          },


        }
      });
      $('#sampleTable').DataTable();
    </script>
  </body>
  </html>