<section class="default-page-heading">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- <h2>About Us</h2> -->
      </div>
    </div>
  </div>
</section>

<section class="contact-page">
   <div class="container">
     <div class="row mb-5">
       <div class="col-md-12 mb-5">
         <h1 class="big-heading text-center font-bold">Quick Contact</h1>
            </div>
            <div class="col-md-6 bg-orange div-contact" >
              <h2 class="text-center">Kolgold</h2>
              <p class="f-18"> <span class="text-bold big-text" >Address : </span> Plot No. P-83, 2nd Floor Near Maha E-Seva Kendra, Gokul Chowk Gokul Shirgaon, MIDC, Kolhapur, Maharashtra 416234</p>
              <hr class="hr-white">
              <p class="f-18"> <span class="text-bold big-text" >Call  : </span>Mobile :095270 01144</p>

              <hr class="hr-white">
              <p class="f-18"> <span class="text-bold big-text" >Mail : </span> info@kolgold.com</p>
            </div>

            <div class="col-md-6">
              <form action="<?php echo base_url();?>Website/send_mail" method="post"  enctype="multipart/form-data" role="form" class="">
                <div class="row">
                  <div class="col-md-12">
                      <div class="alert alert-success " role="alert" style="display:none">
                        Email Send Successfully
                      </div>
                      <div class="alert alert-danger" role="alert" style="display:none">
                        Email Not Send please Try Again
                      </div>
                    </div>


                  <div class="col-6">
                    <div class="input-group mb-3">
                          <label class="w-100" >First Name</label>
                          <input type="text" class="form-control" name="first_name" placeholder="First Name " aria-label="First Name " aria-describedby="basic-addon1" required>
                        </div>
                  </div>
                  <div class="col-6">
                    <div class="input-group mb-3">
                        <label class="w-100">Last Name</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name " aria-label="Last Name " aria-describedby="basic-addon1">
                      </div>
                  </div>
                  <div class="col-12">
                    <div class="input-group mb-3">
                        <label class="w-100">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email " aria-label="Email " aria-describedby="basic-addon1" required>
                      </div>
                  </div>

                  <div class="col-12">
                    <div class="input-group mb-3">
                        <label class="w-100">Contact No.</label>
                        <input type="text" class="form-control" name="mobile" placeholder="Contact"  aria-describedby="basic-addon1">
                      </div>
                  </div>

                  <div class="col-12">
                    <div class="input-group mb-3">
                        <label class="w-100">Comments </label>
                        <textarea class="form-control" name="message" rows="3" cols="80"></textarea>
                        </div>
                  </div>

                  <div class="col-12">
                        <button  type="submit" class="btn btn-outline-success mt-2 w-100">Submit</button>
                  </div>
                </div>
              </form>
            </div>
     </div>
   </div>
 </section>
