<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header pt-0 pb-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-left mt-2">
            <h4>Product Information</h4>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card <?php if(!isset($update)){ echo 'collapsed-card'; } ?>">
              <div class="card-header">
                <h3 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Product Information</h3>
                <div class="card-tools">
                  <?php if(!isset($update)){
                    echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                  } ?>
                </div>
              </div>
              <!--  -->
                <div class="card-body p-0 " <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>>
                  <form class="input_form m-0" id="form_action" role="form" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="row p-4">
                      <div class="form-group col-md-6 select_sm">
                        <label>Select Product Main Category</label>
                        <select class="form-control select2" name="main_category_id" id="main_category_id" data-placeholder="Select Product Main Category">
                          <option value="">Select Product Main Category</option>
                          <?php foreach ($main_category_list as $list1) { ?>
                            <option value="<?php echo $list1->main_category_id; ?>" <?php if(isset($product_info) && $product_info['main_category_id'] == $list1->main_category_id){ echo 'selected'; } ?>><?php echo $list1->main_category_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Select Product Sub Category</label>
                        <select class="form-control select2" name="sub_category_id" id="sub_category_id" data-placeholder="Select Product Sub Category">
                          <option value="">Select Product Sub Category</option>
                          <?php if(isset($sub_category_list)){ foreach ($sub_category_list as $list1) { ?>
                            <option value="<?php echo $list1->sub_category_id; ?>" <?php if(isset($product_info) && $product_info['sub_category_id'] == $list1->sub_category_id){ echo 'selected'; } ?>><?php echo $list1->sub_category_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-12 ">
                        <label>Enter Title of Product</label>
                        <input type="text" class="form-control form-control-sm" name="product_name" id="product_name" value="<?php if(isset($product_info)){ echo $product_info['product_name']; } ?>" placeholder="Enter Title of Product" >
                      </div>
                      <div class="form-group col-md-12 select_sm">
                        <label>Discription</label>
                        <textarea class="form-control form-control-sm" name="product_desc" id="product_desc" rows="3"><?php if(isset($product_info)){ echo $product_info['product_desc']; } ?></textarea>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Select GST %</label>
                        <select class="form-control select2" name="product_gst_per" id="product_gst_per" data-placeholder="Select GST %">
                          <option value="">Select GST %</option>
                          <?php foreach ($gst_list as $list1) { ?>
                            <option value="<?php echo $list1->gst_rate; ?>" <?php if(isset($product_info) && $product_info['product_gst_per'] == $list1->gst_rate){ echo 'selected'; } ?>><?php echo $list1->gst_title; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Product SKU </label>
                        <input type="text" class="form-control form-control-sm" name="product_sku" id="product_sku" value="<?php if(isset($product_info)){ echo $product_info['product_sku']; } ?>"  placeholder="Product SKU " readonly >
                      </div>
                      <div class="form-group col-md-4">
                        <label>Local Shipping Charges</label>
                        <input type="text" class="form-control form-control-sm" name="product_local_shipping" id="product_local_shipping" value="<?php if(isset($product_info)){ echo $product_info['product_local_shipping']; } ?>"  placeholder="Local Shipping Charges" required >
                      </div>
                      <div class="form-group col-md-4">
                        <label>Within India Shipping Charges</label>
                        <input type="text" class="form-control form-control-sm" name="product_india_shipping" id="product_india_shipping" value="<?php if(isset($product_info)){ echo $product_info['product_india_shipping']; } ?>"  placeholder="Within India Shipping Charges" required >
                      </div>
                      <div class="form-group col-md-4">
                        <label>International Shipping Charges</label>
                        <input type="text" class="form-control form-control-sm" name="product_international_shipping" id="product_international_shipping" value="<?php if(isset($product_info)){ echo $product_info['product_international_shipping']; } ?>"  placeholder="International Shipping Charges" required >
                      </div>
                      <div class="form-group col-md-6">
                        <label>Product Image</label>
                        <input type="file" class="form-control form-control-sm" name="product_image" id="product_image">
                      </div>
                      <div class="form-group col-md-6">
                        <?php if(isset($product_info) && $product_info['product_image']){ ?>
                          <label>Uploaded Blog Image</label><br>
                          <img width="200px" src="<?php echo base_url() ?>assets/images/product/<?php echo $product_info['product_image'];  ?>" alt="Blog Image">
                          <input type="hidden" name="old_product_image" value="<?php echo $product_info['product_image']; ?>">
                        <?php } ?>
                      </div>

                      <div class="col-md-12">
                        <hr>
                      </div>
                      <div class="form-group col-md-12 text-right">
                        <button type="button" id="add_row" class="btn btn-sm btn-primary">Add Row</button>
                      </div>
                    <div class="form-group col-md-12">
                      <table id="myTable" class="table table-bordered tbl_list">
                        <thead>
                        <tr>
                          <th>Attribute (Size)</th>
                          <th>Attribute (Color)</th>
                          <th>Weight</th>
                          <th>Select Unit</th>
                          <th>Amount</th>
                          <th class="wt_50"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!isset($product_attribute_list)){?>
                          <tr>
                            <td class="">
                              <input type="text" class="form-control form-control-sm" name="attribute[0][product_attribute_size]" placeholder="" required>
                            </td>
                            <td class="">
                              <input type="text" class="form-control form-control-sm" name="attribute[0][product_attribute_color]" placeholder="" required>
                            </td>
                            <td class="">
                              <input type="text" class="form-control form-control-sm" name="attribute[0][product_attribute_weight]" placeholder="" required>
                            </td>
                            <td>
                              <select class="form-control form-control-sm unit_id" name="attribute[0][unit_id]" data-placeholder="Select Type" required>
                                <option value="">Select Type</option>
                                <?php foreach ($unit_list as $list1) { ?>
                                  <option value="<?php echo $list1->unit_id; ?>" unit_name="<?php echo $list1->unit_name; ?>"><?php echo $list1->unit_name; ?></option>
                                <?php } ?>
                              </select>
                              <input type="hidden" class="product_attribute_unit" name="attribute[0][product_attribute_unit]">
                            </td>
                            <td>
                              <input type="text" class="form-control form-control-sm" name="attribute[0][product_attribute_price]" required>
                            </td>
                            <td class=""></td>
                          </tr>
                        <?php } else{ $i = 0;
                          foreach ($product_attribute_list as $attr_list) {
                        ?>
                        <input type="hidden" name="attribute[<?php echo $i; ?>][product_attribute_id]" value="<?php echo $attr_list->product_attribute_id; ?>">
                        <tr>
                          <td class="">
                            <input type="text" class="form-control form-control-sm" name="attribute[<?php echo $i; ?>][product_attribute_size]" value="<?php echo $attr_list->product_attribute_size; ?>" placeholder="" required>
                          </td>
                          <td class="">
                            <input type="text" class="form-control form-control-sm" name="attribute[<?php echo $i; ?>][product_attribute_color]" value="<?php echo $attr_list->product_attribute_color; ?>" placeholder="" required>
                          </td>
                          <td class="">
                            <input type="text" class="form-control form-control-sm" name="attribute[<?php echo $i; ?>][product_attribute_weight]" value="<?php echo $attr_list->product_attribute_weight; ?>" placeholder="" required>
                          </td>
                          <td>
                            <select class="form-control form-control-sm unit_id" name="attribute[<?php echo $i; ?>][unit_id]" data-placeholder="Select Type" required>
                              <option value="">Select Type</option>
                              <?php foreach ($unit_list as $list1) { ?>
                                <option value="<?php echo $list1->unit_id; ?>" unit_name="<?php echo $list1->unit_name; ?>" <?php if($list1->unit_id == $attr_list->unit_id){ echo 'selected'; } ?>><?php echo $list1->unit_name; ?></option>
                              <?php } ?>
                            </select>
                            <input type="hidden" class="product_attribute_unit" name="attribute[<?php echo $i; ?>][product_attribute_unit]" value="<?php echo $attr_list->product_attribute_unit; ?>">
                          </td>
                          <td>
                            <input type="text" class="form-control form-control-sm" name="attribute[<?php echo $i; ?>][product_attribute_price]" value="<?php echo $attr_list->product_attribute_price; ?>" required>
                          </td>
                          <td class=""><?php if($i > 0){ ?><a class="rem_row"><i class="fa fa-trash text-danger"></i></a><?php } ?></td>
                        </tr>
                        <?php $i++;  }  } ?>
                        </tbody>
                      </table>
                    </div>


                    </div>
                    <div class="card-footer clearfix" style="display: block;">
                      <div class="row">
                        <div class="col-md-6 text-left">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="product_status" id="product_status" value="0" <?php if(isset($product_info) && $product_info['product_status'] == 0){ echo 'checked'; } ?>>
                            <label for="product_status" class="custom-control-label">Disable This Product Information</label>
                          </div>
                        </div>
                        <div class="col-md-6 text-right">
                          <a href="<?php base_url(); ?>User/user_information" class="btn btn-sm btn-default px-4 mx-4">Cancel</a>
                          <?php if(isset($update)){
                            echo '<button class="btn btn-sm btn-primary float-right px-4">Update</button>';
                          } else{
                            echo '<button class="btn btn-sm btn-success float-right px-4">Save</button>';
                          } ?>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
          </div>


          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List All Product Information</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="d-none">#</th>
                      <th class="wt_50">Action</th>
                      <th>Product Title</th>
                      <th class="wt_100">Main Category</th>
                      <th class="">Sub Category</th>
                      <th class="wt_75">GST</th>
                      <th>Shipping Charges Local </th>
                      <th>in India</th>
                      <th>Outside India</th>
                      <th class="wt_50">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; foreach ($product_list as $list) { $i++;
                      $main_category_details = $this->Master_Model->get_info_arr_fields('main_category_name','main_category_id', $list->main_category_id, 'main_category');
                      $sub_category_details = $this->Master_Model->get_info_arr_fields('sub_category_name','sub_category_id', $list->sub_category_id, 'sub_category');
                      // $batch_details = $this->Master_Model->get_info_arr_fields('batch_name','batch_id', $list->batch_id, 'batch');
                    ?>
                    <tr>
                      <td class="d-none"><?php echo $i; ?></td>
                      <td class="text-center">
                        <div class="btn-group">
                          <a href="<?php echo base_url() ?>Master/edit_product/<?php echo $list->product_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                          <a href="<?php echo base_url() ?>Master/delete_product/<?php echo $list->product_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Product Information');"><i class="fa fa-trash text-danger"></i></a>
                        </div>
                      </td>
                      <td><?php echo $list->product_name; ?></td>
                      <td><?php if($main_category_details){ echo $main_category_details[0]['main_category_name']; } ?></td>
                      <td><?php if($sub_category_details){ echo $sub_category_details[0]['sub_category_name']; } ?></td>
                      <td><?php echo $list->product_gst_per; ?>%</td>
                      <td><?php echo $list->product_local_shipping; ?></td>
                      <td><?php echo $list->product_india_shipping; ?></td>
                      <td><?php echo $list->product_international_shipping; ?></td>
                      <td>
                        <?php if($list->product_status == 0){ echo '<span class="text-danger">Inactive</span>'; }
                          else{ echo '<span class="text-success">Active</span>'; } ?>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>


<script type="text/javascript">
  // Add Row...
  <?php if(isset($update)){ ?>
  var i = <?php echo $i-1; ?>
  <?php } else { ?>
  var i = 0;
  <?php } ?>

  $('#add_row').click(function(){
    i++;
    var row = ''+
    '<tr>'+
      '<td class="">'+
        '<input type="text" class="form-control form-control-sm" name="attribute['+i+'][product_attribute_size]" placeholder="" required>'+
      '</td>'+
      '<td class="">'+
        '<input type="text" class="form-control form-control-sm" name="attribute['+i+'][product_attribute_color]" placeholder="" required>'+
      '</td>'+
      '<td class="">'+
        '<input type="text" class="form-control form-control-sm" name="attribute['+i+'][product_attribute_weight]" placeholder="" required>'+
      '</td>'+
      '<td>'+
        '<select class="form-control form-control-sm unit_id" name="attribute['+i+'][unit_id]" data-placeholder="Select Type" required>'+
          '<option value="">Select Type</option>'+
          '<?php foreach ($unit_list as $list1) { ?>'+
            '<option value="<?php echo $list1->unit_id; ?>" unit_name="<?php echo $list1->unit_name; ?>"><?php echo $list1->unit_name; ?></option>'+
          '<?php } ?>'+
        '</select>'+
        '<input type="hidden" class="product_attribute_unit" name="attribute['+i+'][product_attribute_unit]">'+
      '</td>'+
      '<td>'+
        '<input type="text" class="form-control form-control-sm" name="attribute['+i+'][product_attribute_price]" required>'+
      '</td>'+
      '<td class=""><a class="rem_row"><i class="fa fa-trash text-danger"></i></td>'+
    '</tr>';
    $('#myTable').append(row);
  });
  // Remove Row...
  $('#myTable').on('click', '.rem_row', function () {
   $(this).closest('tr').remove();
  });

  //
  $(document).on('change','.unit_id', function(){
    var unit_name = $(this).find("option:selected").attr('unit_name');
    $(this).closest('tr').find('.product_attribute_unit').val(unit_name);
    // alert(a);
  });
</script>

</body>
</html>
