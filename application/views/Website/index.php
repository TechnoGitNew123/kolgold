<div class="container-fluid">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php $i = 0; foreach ($slider_list as $slider_list1) {  ?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
    <?php $i++; } ?>
  </ol>
  <div class="carousel-inner">
    <?php $i = 0; foreach ($slider_list as $slider_list1) { $i++; ?>
      <div class="carousel-item <?php if($i == 1){ echo 'active'; } ?>">
        <img class="d-block w-100" src="<?php echo base_url(); ?>assets/images/slider/<?php echo $slider_list1->slider_image; ?>" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
            <h5>Home Made State Of Art Kolhapuri Chappels</h5>
        </div>
      </div>
    <?php  } ?>
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
</div>

<section class="welcome-section">
  <div class="container">
    <div class="jumbotron">
      <p class="text-web f-14 text-center mb-0">PREMIUM COLLECTION 2020</p>
      <h1 class="text-center ">Featured Categories</h1>
      <p class="text-center f-16">Choose your pick from our premium range of products that are perfectly 'Desi and Purely Original'</p>
    </div>
  </div>
</section>

<section class="main-category">
  <div class="container">
    <div class="row">
      <?php foreach ($main_category_list as $main_category_list1) { ?>
        <div class="col-md-3 col-6">
          <div class="category-div">
            <img class="category-img" src="<?php echo base_url(); ?>assets/images/category/<?php echo $main_category_list1->main_category_image; ?>" alt="" width="100%">
            <h5 class="text-center"><?php echo $main_category_list1->main_category_name; ?></h5>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<section class="middle-banner">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 p-0 m-0">
        <img  class="banner-img-middle" src="<?php echo base_url(); ?>assets/images/middle.png" alt="" width="100%">
      </div>
    </div>
  </div>
</section>


<section class="welcome-section">
    <div class="container">
        <div class="jumbotron">
          <p class="text-web f-14 text-center mb-0">PREMIUM COLLECTION 2020</p>
        <h1 class="text-center ">Featured Product</h1>
        <p class="text-center f-16">Choose your pick from our premium range of products that are perfectly 'Desi and Purely Original'</p>
      </div>
    </div>
</section>

  <?php //print_r($product_list); ?>

<section class="main-prduct">
  <div class="container">
    <div class="row">
      <div class="owl-carousel owl-one owl-theme">
        <?php foreach ($product_list as $product_list1) { ?>
          <div class="item">
            <div class="card">
               <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/kolgold.png" alt="Card image cap">
               <div class="card-body px-2">
                 <h5 class="card-title"><?php  echo $product_list1->product_name; ?></h5>
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
        <!-- <?php for ($i=0; $i < 10 ; $i++) { ?>
          <div class="item">
            <div class="card">
               <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/kolgold.png" alt="Card image cap">
               <div class="card-body">
                 <h5 class="card-title">Kolhapuri Chappal</h5>
                 <div class="attr">
                   <div class="row ">
                     <div class="col-9 p-0 m-0">
                       <select class="form-control form-control-sm">
                          <option>Select Size</option>
                        </select>
                     </div>
                     <div class="col-3 p-0 m-0">
                       <input class="form-control form-control-sm text-center" type="text" name="" value="1">
                     </div>
                   </div>
                 </div>
                 <p class="card-text ">  <span class="price">Rs. 1500</span> <span class="line-throw ml-3">Rs. 1500</span> </p>
                 <button type="button" class="btn btn-outline-success w-100">Add To Cart</button>
               </div>
             </div>
         </div>
        <?php } ?> -->
        <!-- <div class="item">
          <div class="card">
             <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/kolgold.png" alt="Card image cap">
             <div class="card-body">
               <h5 class="card-title">Kolhapuri Chappal</h5>
               <div class="attr">
                 <div class="row p-0 m-0">
                   <div class="col-9">
                     <select class="form-control form-control-sm">
                        <option>Select Size</option>
                      </select>
                   </div>
                   <div class="col-3">
                     <input class="form-control form-control-sm" type="text" name="" value="1">
                   </div>
                 </div>
               </div>
               <p class="card-text ">  <span class="price">Rs. 1500</span> <span class="line-throw ml-3">Rs. 1500</span> </p>
               <button type="button" class="btn btn-outline-success w-100">Add To Cart</button>
             </div>
           </div>
       </div> -->

       <!-- <div class="item">
         <div class="card">
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/kolgold.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Kolhapuri Chappal</h5>
              <div class="attr">
                <div class="row">
                  <div class="col-9">
                    <select class="form-control form-control-sm">
                       <option>Select Size</option>
                     </select>
                  </div>
                  <div class="col-3">
                    <input class="form-control form-control-sm" type="text" name="" value="1">
                  </div>
                </div>
              </div>
              <p class="card-text ">  <span class="price">Rs. 1500</span> <span class="line-throw ml-3">Rs. 1500</span> </p>
              <button type="button" class="btn btn-outline-success w-100">Add To Cart</button>
            </div>
          </div>
      </div>

      <div class="item">
        <div class="card">
           <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/kolgold.png" alt="Card image cap">
           <div class="card-body">
             <h5 class="card-title">Kolhapuri Chappal</h5>
             <div class="attr">
               <div class="row">
                 <div class="col-9">
                   <select class="form-control form-control-sm">
                      <option>Select Size</option>
                    </select>
                 </div>
                 <div class="col-3">
                   <input class="form-control form-control-sm" type="text" name="" value="1">
                 </div>
               </div>
             </div>
             <p class="card-text ">  <span class="price">Rs. 1500</span> <span class="line-throw ml-3">Rs. 1500</span> </p>
             <button type="button" class="btn btn-outline-success w-100">Add To Cart</button>
           </div>
         </div>
     </div>

     <div class="item">
       <div class="card">
          <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/kolgold.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Kolhapuri Chappal</h5>
            <div class="attr">
              <div class="row">
                <div class="col-9">
                  <select class="form-control form-control-sm">
                     <option>Select Size</option>
                   </select>
                </div>
                <div class="col-3">
                  <input class="form-control form-control-sm" type="text" name="" value="1">
                </div>
              </div>
            </div>
            <p class="card-text ">  <span class="price">Rs. 1500</span> <span class="line-throw ml-3">Rs. 1500</span> </p>
            <button type="button" class="btn btn-outline-success w-100">Add To Cart</button>
          </div>
        </div>
    </div>

    <div class="item">
      <div class="card">
         <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/kolgold.png" alt="Card image cap">
         <div class="card-body">
           <h5 class="card-title">Kolhapuri Chappal</h5>
           <div class="attr">
             <div class="row">
               <div class="col-9">
                 <select class="form-control form-control-sm">
                    <option>Select Size</option>
                  </select>
               </div>
               <div class="col-3">
                 <input class="form-control form-control-sm" type="text" name="" value="1">
               </div>
             </div>
           </div>
           <p class="card-text ">  <span class="price">Rs. 1500</span> <span class="line-throw ml-3">Rs. 1500</span> </p>
           <button type="button" class="btn btn-outline-success w-100">Add To Cart</button>
         </div>
       </div>
   </div> -->

      </div>
    </div>

    <div class="row">
      <div class="owl-carousel owl-two owl-theme  mt-4">
        <div class="item">
          <div class="card">
             <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/kolgold.png" alt="Card image cap">
             <div class="card-body">
               <h5 class="card-title">Kolhapuri Chappal</h5>
               <div class="attr">
                 <div class="row">
                   <div class="col-9">
                     <select class="form-control form-control-sm">
                        <option>Select Size</option>
                      </select>
                   </div>
                   <div class="col-3">
                     <input class="form-control form-control-sm" type="text" name="" value="1">
                   </div>
                 </div>
               </div>
               <p class="card-text ">  <span class="price">Rs. 1500</span> <span class="line-throw ml-3">Rs. 1500</span> </p>
               <button type="button" class="btn btn-outline-success w-100">Add To Cart</button>
             </div>
           </div>
       </div>

       <div class="item">
         <div class="card">
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/kolgold.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Kolhapuri Chappal</h5>
              <div class="attr">
                <div class="row">
                  <div class="col-9">
                    <select class="form-control form-control-sm">
                       <option>Select Size</option>
                     </select>
                  </div>
                  <div class="col-3">
                    <input class="form-control form-control-sm" type="text" name="" value="1">
                  </div>
                </div>
              </div>
              <p class="card-text ">  <span class="price">Rs. 1500</span> <span class="line-throw ml-3">Rs. 1500</span> </p>
              <button type="button" class="btn btn-outline-success w-100">Add To Cart</button>
            </div>
          </div>
      </div>

      <div class="item">
        <div class="card">
           <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/kolgold.png" alt="Card image cap">
           <div class="card-body">
             <h5 class="card-title">Kolhapuri Chappal</h5>
             <div class="attr">
               <div class="row">
                 <div class="col-9">
                   <select class="form-control form-control-sm">
                      <option>Select Size</option>
                    </select>
                 </div>
                 <div class="col-3">
                   <input class="form-control form-control-sm" type="text" name="" value="1">
                 </div>
               </div>
             </div>
             <p class="card-text ">  <span class="price">Rs. 1500</span> <span class="line-throw ml-3">Rs. 1500</span> </p>
             <button type="button" class="btn btn-outline-success w-100">Add To Cart</button>
           </div>
         </div>
     </div>

      </div>
    </div>
  </div>
</section>

<section class="blog">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <h2 class="text-center">The Desi Katta</h2>
      </div>
      <div class="col-md-4">
        <div class="card text-center" >
            <img class="card-img-top blog-img" src="<?php echo base_url(); ?>assets/images/misal.png" alt="Card image cap">
            <span class="badge">7 Jun</span>
            <div class="card-body">
              <h5 class="card-title text-center">Card title</h5>
              <p class="author"> <span>posted By</span> <span>  Adbcd abcd</span></p>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in  anim id est laborum.</p>
              <a href="#" class="btn btn-outline-info ">Read More</a>
            </div>
          </div>
      </div>

      <div class="col-md-4">
        <div class="card text-center" >
            <img class="card-img-top blog-img" src="<?php echo base_url(); ?>assets/images/misal.png" alt="Card image cap">
            <span class="badge">7 Jun</span>
            <div class="card-body">
              <h5 class="card-title text-center">Card title</h5>
            <p class="author"> <span>posted By</span> <span>  Adbcd abcd</span></p>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in  anim id est laborum.</p>
              <a href="#" class="btn btn-outline-info ">Read More</a>
            </div>
          </div>
      </div>


      <div class="col-md-4">
        <div class="card text-center" >
            <img class="card-img-top blog-img" src="<?php echo base_url(); ?>assets/images/misal.png" alt="Card image cap">
            <span class="badge">7 Jun</span>
            <div class="card-body">
              <h5 class="card-title text-center">Card title</h5>
            <p class="author"> <span>posted By</span> <span>  Adbcd abcd</span></p>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in  anim id est laborum.</p>
              <a href="#" class="btn btn-outline-info ">Read More</a>
            </div>
          </div>
      </div>

    </div>
  </div>
</section>

<section class="video-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
      </div>
      </div>
      <div class="col-md-6 mt-5">
        <div class="text">
            <h2>THE MAKING</h2>
          </h4>SEE HOW OUR PRODUCTS TAKE FORM</h4>
        </div>
        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit,  aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </div>
  </div>
</section>
