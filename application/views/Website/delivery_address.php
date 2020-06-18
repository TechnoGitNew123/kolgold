

<section class="default-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-heading">Checkout</h1>
      </div>
    </div>
  </div>
</section>


<section class="checkout-middle">
<div class="container">
  <form class="" action="<?php echo base_url(); ?>Cart/checkout_pay_calculation" method="post">

  <div class="row">
    <div class="col-md-9">
      <div class="billing mb-3">
        <div class="col-md-12">
          <h4>Delivery Address</h4>
          <hr class="grey-hr">
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="checkout-fn">First Name</label>
              <input class="form-control form-control-sm" name="customer_fname" type="text" value="<?php if(isset($eco_cust_info)){ echo $eco_cust_info['customer_fname']; } ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="checkout-fn">Last Name</label>
              <input class="form-control form-control-sm" name="customer_lname" type="text" value="<?php if(isset($eco_cust_info)){ echo $eco_cust_info['customer_lname']; } ?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="checkout-fn">Address</label>
              <input class="form-control form-control-sm" name="customer_address" type="text" value="<?php if(isset($eco_cust_info)){ echo $eco_cust_info['customer_address']; } ?>" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="checkout-fn">City</label>
              <input class="form-control form-control-sm" name="customer_city" type="text" value="<?php if(isset($eco_cust_info)){ echo $eco_cust_info['customer_city']; } ?>" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="checkout-fn">Pin/Zip No.</label>
              <input class="form-control form-control-sm" name="customer_pin" type="number" value="<?php if(isset($eco_cust_info)){ echo $eco_cust_info['customer_pin']; } ?>" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="checkout-fn">Mobile Number *</label>
              <input class="form-control form-control-sm" name="customer_mobile" type="number" value="<?php if(isset($eco_cust_info)){ echo $eco_cust_info['customer_mobile']; } ?>" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="checkout-fn">Email</label>
              <input class="form-control form-control-sm" name="customer_email" type="email" value="<?php if(isset($eco_cust_info)){ echo $eco_cust_info['customer_email']; } ?>">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="order_summary">
        <h4 class="text-left">Order Summary</h4>
        <hr class="grey-hr">
        <div class="card py-3">
          <div class="row">
            <div class="col-8">
              <p>Cart Subtotal:</p>
              <p>Shipping:</p>
              <p>GST(Inclusive):</p>
            </div>
            <div class="col-4 text-right">
              <p id="cart_subtotal">&#8377;0</p>
              <p id="shipping_amt">&#8377;0</p>
              <p id="gst_amount">&#8377;0</p>
            </div>
            <div class="col-12">
              <hr class="grey-hr">
            </div>
            <div class="col-8">
              <p>Total:</p>
            </div>
            <div class="col-4 text-right">
              <p id="final_amount">&#8377;0</p>
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="col-md-12 mb-3"><hr></div>
    <div class="col-md-12 text-center">
      <button type="submit" class="btn btn-outline-success">Make Payment</button>
    </div>
  </div>
</form>
  </div>

</section>

<input type="hidden" name="coupon_amt" id="coupon_amt2" value="0">
