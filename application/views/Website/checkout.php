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
  <div class="row">
    <div class="col-md-9">
      <div class="billing mb-3">
        <div class="col-md-12">
          <h4>Cart Details</h4>
          <hr class="grey-hr">
          <div class="m-autoscroll" id="myCartPage">
            <table class="table table-bordered" id="tbl_modal_cart">
    <thead>
      <tr>
        <th style="width: 10px">#</th>
        <th>Product</th>
        <th>MRP</th>
        <th>Price</th>
        <th class="" style="width:150px;">Qty</th>
        <th>Amount</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td>1</td>
        <td>Maida - 1 KG</td>
        <td><span class="cart_product_price">₹50</span></td>
        <td><span class="cart_product_price">₹45</span></td>
        <td style="width:150px;">
          <div class="row">
            <div class="col-3 text-right px-0">
              <button type="button" class="btn btn-outline-secondary btn-sm text-center btn_qty_minus"><i class="fa fa-minus"></i></button>
            </div>
            <div class="col-6 text-center px-1">
              <input type="number" min="1" step="1" class="form-control form-control-sm text-center cart_product_qty" value="1">
            </div>
            <div class="col-3 text-left px-0">
              <button type="button" class="btn btn-outline-secondary btn-sm text-center btn_qty_plus"><i class="fa fa-plus"></i></button>
            </div>
          </div>
        </td>
        <td><span class="cart_product_subtotal">₹45</span></td>
        <td>
          <input type="hidden" class="rowid" value="eccbc87e4b5ce2fe28308fd9f2a7baf3">
          <a class="rem_cart_row" id="rem1"><i class="fa fa-trash text-danger"></i></a>
        </td>
      </tr>

      <tr>
        <td>2</td>
        <td>Aashirvaad Powder - Chilli - 500 g</td>
        <td><span class="cart_product_price">₹150</span></td>
        <td><span class="cart_product_price">₹150</span></td>
        <td style="width:150px;">
          <div class="row">
            <div class="col-3 text-right px-0">
              <button type="button" class="btn btn-outline-secondary btn-sm text-center btn_qty_minus"><i class="fa fa-minus"></i></button>
            </div>
            <div class="col-6 text-center px-1">
              <input type="number" min="1" step="1" class="form-control form-control-sm text-center cart_product_qty" value="1">
            </div>
            <div class="col-3 text-left px-0">
              <button type="button" class="btn btn-outline-secondary btn-sm text-center btn_qty_plus"><i class="fa fa-plus"></i></button>
            </div>
          </div>
        </td>
        <td><span class="cart_product_subtotal">₹150</span></td>
        <td>
          <input type="hidden" class="rowid" value="81ca0262c82e712e50c580c032d99b60">
          <a class="rem_cart_row" id="rem2"><i class="fa fa-trash text-danger"></i></a>
        </td>
      </tr>

    <tr>
      <td colspan="5" class="text-right text-bold">Total MRP</td>
      <td colspan="2" class="text-left cart_total text-bold">₹200</td>
    </tr>
    <tr>
      <td colspan="5" class="text-right text-bold">Total Discount</td>
      <td colspan="2" class="text-left cart_total text-bold">₹5</td>
    </tr>
    <tr>
      <td colspan="5" class="text-right text-bold">Total</td>
      <td colspan="2" class="text-left cart_total text-bold">₹195</td>
    </tr>
    </tbody>
  </table>
          </div>
        </div>
      </div>
      <hr>
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

    <div class="col-md-12 text-center">
      <a href="<?php echo base_url(); ?>Checkout" type="button" class="btn btn-outline-success">Checkout</a>
    </div>
  </div>
</section>
