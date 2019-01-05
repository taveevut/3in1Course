<?php $this->load->view('template/header') ?>
<body class="app sidebar-mini rtl">
  <!-- Navbar-->
  <?php $this->load->view('template/navbar') ?>
  <!-- Sidebar menu-->
  <?php $this->load->view('template/sidebar') ?>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i> <?=$method == 'edit' ? 'แก้ไขสินค้า' : 'สร้างสินค้า';?></h1>
        <!-- <p>Bootstrap default form components</p> -->
      </div>
      
    </div>
    <div class="row">
      <div class="col-md-12">

        <div class="tile">
          <div class="row">
            <div class="col-lg-12">

              <?php if($this->session->flashdata()): ?>
                <!-- alert -->
                <?php if($this->session->flashdata('status') == 1): ?>
                  <div class="alert alert-success" role="alert">
                    เพิ่มข้อมูลสินค้าเรียบร้อย
                  </div>
                  <?php else:?>
                    <div class="alert alert-success" role="alert">
                      แก้ไขข้อมูลสินค้าเรียบร้อย
                    </div>
                  <?php endif; ?>
                <?php endif; ?>

                <?php 
                if($method == 'edit'):
                 echo form_open_multipart(base_url().'product/update/'.$products->id,'id="form_validation"'); 
               else:  
                 echo form_open_multipart(base_url().'product/store','id="form_validation"');
               endif; 

               ?>
               <input type="hidden" class="form-control" name="id" id="id" value="<?=isset($products->id)? $products->id : '';?>">

               <div class="form-group">
                <label for="product_name">ชื่อสินค้า</label>
                <input class="form-control" id="product_name" type="text"  placeholder="ชื่อสินค้า" name="product_name"
                value="<?=isset($products->name)? $products->name : '';?>">
              </div>

              <div class="form-group">
                <label for="des_product">รายละเอียดสินค้า</label>
                <textarea name="des_product" class="form-control" rows="5"><?=isset($products->details)? $products->details : '';?></textarea>
              </div>

              <div class="form-group">
                <label for="price1">ราคาต้นทุน</label>
                <input class="form-control" id="price1" type="number"  placeholder="ราคาต้นทุน" name="price1"
                value="<?=isset($products->price1)? $products->price1 : '';?>">
              </div>

              <div class="form-group">
                <label for="price2">ราคาขาย</label>
                <input class="form-control" id="price2" type="number"  placeholder="ราคาขาย" name="price2"
                value="<?=isset($products->price2)? $products->price2 : '';?>">
              </div>


              <div class="form-group">
                <label for="cat_product">ประเภทสินค้า</label>
                <select class="form-control" id="exampleSelect1" name="category_id">
                  <option  value="">กรุณาเลือกประเภทสินค้า</option>

                  <?php 
                  foreach ($cat as $item) {
                    if(isset($products->category_id) && $products->category_id == $item['category_id'] ){
                      echo '<option value="'.$item['category_id'].'" selected>'.$item['category_name'].'</option>';
                    }else{
                     echo '<option value="'.$item['category_id'].'">'.$item['category_name'].'</option>';
                   }
                 } 
                 ?>

               </select>
             </div>


             <div class="form-group">
              <label for="exampleInputFile">รูปสินค้า</label>

              <?php if($method == 'edit'): ?> 
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="<?=isset($products->cover) ? $this->config->item('root_url').$products->cover : '';?>" >
                </div>
                <br>

              <?php endif;?> 
              <input type="hidden" name="outfile_cover" value="<?=(isset($product->cover)) ? $product->cover : ''; ?>">
              <input class="form-control-file" id="exampleInputFile" type="file" name="cover" aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">อัปโหลดรูปเท่านั้น</small>
            </div>

            <div class="tile-footer">
              <?php if($method == 'edit'): ?> 
                <button class="btn btn-warning" type="submit">แก้ไข</button>
                <?php else: ?>  
                  <button class="btn btn-primary" type="submit">บันทึก</button>
                <?php endif; ?>    
              </div>

            </form>
          </div>

        </div>

      </div>
    </div>
  </div>
</main>
<!-- Essential javascripts for application to work-->
<?php $this->load->view('template/script-main') ?>

<script type="text/javascript">
  $( document ).ready(function() {
    $(".alert").delay(2000).fadeOut();
  });
  // Wait for the DOM to be ready
  $(function() {

    $("#form_validation").validate({

      rules: {
        product_name: "required",
        des_product: "required",
        price1: "required",
        price2: "required",
        category_id:"required",
        <?php if($method != 'edit'): ?> 
          cover:"required",
        <?php endif; ?>

      },
      messages: {
        product_name: "กรุณาใส่ชื่อสินค้า",
        des_product: "กรุณาใส่รายละเอียด",
        price1: "กรุณาใส่ราคาต้นทุน",
        price2: "กรุณาใส่ราคาต้นขาย",
        category_id:"กรุณาเลือกประเภท",
        cover:"กรุณาเลือกไฟล์",
      },
      submitHandler: function(form) {
        form.submit();
      }
    });
  });
</script>

</body>
</html>