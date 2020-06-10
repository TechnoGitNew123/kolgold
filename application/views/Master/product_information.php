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
                        <select class="form-control select2" name="blog_category" id="blog_category" data-placeholder="Select Product Main Category">
                          <option value="">Select Product Main Category</option>
                        </select>
                      </div>

                      <div class="form-group col-md-6 select_sm">
                        <label>Select Product Sub Category</label>
                        <select class="form-control select2" name="blog_category" id="blog_category" data-placeholder="Select Product Sub Category">
                          <option value="">Select Product Sub Category</option>
                        </select>
                      </div>

                      <div class="form-group col-md-12 ">
                        <label>Enter Title of Product</label>
                        <input type="number" class="form-control form-control-sm" name="student_no" id="student_no" value="" placeholder="Enter Title of Product" >
                      </div>

                      <div class="form-group col-md-12 select_sm">
                          <label>Discription</label>
                          <textarea class="form-control" name="blog_description" rows="3" cols="85"></textarea>
                      </div>

                      <div class="form-group col-md-6 select_sm">
                        <label>Select GST %</label>
                        <select class="form-control select2" name="blog_category" id="blog_category" data-placeholder="Select GST %">
                          <option value="">Select GST %</option>
                        </select>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Product SKU </label>
                        <input type="text" class="form-control form-control-sm" name="student_name" id="student_name" value="<?php if(isset($student_info)){ echo $student_info['student_name']; } ?>"  placeholder="Product SKU " readonly >
                      </div>

                      <div class="form-group col-md-4">
                        <label>Local Shipping Charges</label>
                        <input type="text" class="form-control form-control-sm" name="student_name" id="student_name" value="<?php if(isset($student_info)){ echo $student_info['student_name']; } ?>"  placeholder="Local Shipping Charges" required >
                      </div>

                      <div class="form-group col-md-4">
                        <label>Within India Shipping Charges</label>
                        <input type="text" class="form-control form-control-sm" name="student_name" id="student_name" value="<?php if(isset($student_info)){ echo $student_info['student_name']; } ?>"  placeholder="Within India Shipping Charges" required >
                      </div>

                      <div class="form-group col-md-4">
                        <label>International Shipping Charges</label>
                        <input type="text" class="form-control form-control-sm" name="student_name" id="student_name" value="<?php if(isset($student_info)){ echo $student_info['student_name']; } ?>"  placeholder="International Shipping Charges" required >
                      </div>





                      <div class="form-group col-md-12 select_sm">
                        <label>Product Image</label>
                        <input type="file" name="blog_img" value="">
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
                          <tr>
                            <td class="wt_150">
                              <input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="" placeholder="" >
                            </td>
                            <td class="wt_150">
                              <input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="" placeholder="" >
                            </td>

                            <td class="wt_100">
                              <input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="" placeholder="" >
                            </td>
                            <td>
                              <select class="form-control form-control-sm" name="stock_type_id" id="stock_type_id" data-placeholder="Select Type">
                                <option value="">Select Type</option>
                                <option >1</option>
                                <option >2</option>
                                <option >3</option>
                              </select>
                            </td>
                            <td class="wt_100">
                              <input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="" placeholder="" >
                            </td>
                            <td class="wt_50"></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>


                    </div>
                    <div class="card-footer clearfix" style="display: block;">
                      <div class="row">
                        <div class="col-md-6 text-left">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="student_status" id="student_status" value="0" <?php if(isset($student_info) && $student_info['student_status'] == 0){ echo 'checked'; } ?>>
                            <label for="student_status" class="custom-control-label">Disable This Product Information</label>
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
                    <th class="wt_75">Sub Category</th>
                    <th class="wt_75">GST</th>
                    <th>Shipping Charges Local </th>
                    <th>in India</th>
                    <th>Outside India</th>
                    <th class="wt_50">Status</th>
                  </tr>
                  </thead>
                  <!-- <tbody>
                    <?php $i=0; foreach ($student_list as $list) { $i++;
                      $medium_details = $this->Master_Model->get_info_arr_fields('medium_name','medium_id', $list->medium_id, 'medium');
                      $class_details = $this->Master_Model->get_info_arr_fields('class_name','class_id', $list->class_id, 'class');
                      $batch_details = $this->Master_Model->get_info_arr_fields('batch_name','batch_id', $list->batch_id, 'batch');
                    ?>
                    <tr>
                      <td class="d-none"><?php echo $i; ?></td>
                      <td class="text-center">
                        <div class="btn-group">
                          <a href="<?php echo base_url() ?>Master/edit_student/<?php echo $list->student_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                          <a href="<?php echo base_url() ?>Master/delete_student/<?php echo $list->student_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Product Information');"><i class="fa fa-trash text-danger"></i></a>
                        </div>
                      </td>
                      <td><?php echo $list->student_name; ?></td>
                      <td><?php echo $list->student_mobile; ?></td>
                      <td><?php echo $list->student_password; ?></td>
                      <td><?php if($medium_details){ echo $medium_details[0]['medium_name']; } ?></td>
                      <td><?php if($class_details){ echo $class_details[0]['class_name']; } ?></td>
                      <td><?php if($batch_details){ echo $batch_details[0]['batch_name']; } ?></td>
                      <td>
                        <?php if($list->student_status == 0){ echo '<span class="text-danger">Inactive</span>'; }
                          else{ echo '<span class="text-success">Active</span>'; } ?>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody> -->
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
  var i = 1;
  <?php } ?>

  $('#add_row').click(function(){
    i++;
    var row = ''+
    '<tr>'+
    '<td class="wt_150">'+
      '<input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="" placeholder="" required>'+
    '</td>'+
    '<td class="wt_150">'+
      '<input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="" placeholder="" required>'+
    '</td>'+
    '<td class="wt_150">'+
      '<input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="" placeholder="" required>'+
    '</td>'+
      '<td>'+
        '<select class="form-control form-control-sm" name="stock_type_id" id="stock_type_id" data-placeholder="Select Type">'+
          '<option value="">Select Type</option>'+
          '<option >1</option>'+
          '<option >2</option>'+
          '<option >3</option>'+
        '</select>'+
      '</td>'+
      '<td class="wt_150">'+
        '<input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="" placeholder="" required>'+
      '</td>'+
      '<td class="wt_50"><a class="rem_row"><i class="fa fa-trash text-danger"></i></a></td>'+
    '</tr>';
    $('#myTable').append(row);
  });

  $('#myTable').on('click', '.rem_row', function () {
   $(this).closest('tr').remove();
 });
  </script>

</body>
</html>
