<section class="default-page-heading">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="text-center">Our Products</h2>
      </div>
    </div>
  </div>
</section>

<section class="default-page">
  <div class="container">
    <div class="row">
      <div class="col-md-3 ">
          <?php include('side_filter.php'); ?>
      </div>
      <div class="col-md-9 col-12">
        <div class="row">
      <?php foreach ($product_list as $product_list1) { ?>
      <div class="col-md-3">
        <div class="card mb-5">
           <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/kolgold.png" alt="Card image cap">
           <div class="card-body px-2">
             <h5 class="card-title text-center"><?php  echo $product_list1->product_name; ?></h5>
             <div class="attr">
               <div class="row ">
                 <div class="col-9 pr-1 pl-0 m-0">
                   <select class="form-control form-control-sm">
                     <option value="">Select Attribute</option>
                     <?php foreach ($product_list1->product_attribute_list as $attribute_list){ ?>
                       <option value="<?php echo $attribute_list->product_attribute_id; ?>"><?php echo 'Size: '.$attribute_list->product_attribute_size.' - '.$attribute_list->product_attribute_color; ?></option>
                     <?php } ?>
                    </select>
                 </div>
                           <div class="col-3 pr-0 pl-1 m-0">
                             <input class="form-control form-control-sm text-center" type="text" name="" value="1">
                           </div>
                         </div>
                       </div>
                       <p class="card-text text-center mb-1">  <span class="price">Rs. 1500</span> <!--span class="line-throw ml-3">Rs. 1500</span--> </p>
                       <button type="button" class="btn btn-sm btn-outline-success w-100">Add To Cart</button>
                     </div>
                   </div>
                </div>
              <?php } ?>
            </div>
          </div>
    </div>
  </div>
</section>
