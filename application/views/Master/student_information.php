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
            <h4>Student</h4>
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
                <h3 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Student</h3>
                <div class="card-tools">
                  <?php if(!isset($update)){
                    echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                  } ?>
                </div>
              </div>
              <!--  -->
                <div class="card-body p-0 " <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>>
                  <form class="input_form m-0" id="form_action" role="form" action="" method="post" autocomplete="off">
                    <div class="row p-4">
                      <div class="form-group col-md-6 select_sm">
                        <label>Student No.</label>
                        <input type="number" class="form-control form-control-sm" name="student_no" id="student_no" value="<?php if(isset($student_info)){ echo $student_info['student_no']; } else{ echo $student_no; } ?>" placeholder="Student No." readonly >
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Date</label>
                        <input type="text" class="form-control form-control-sm" name="student_add_date" value="<?php if(isset($student_info)){ echo $student_info['student_add_date']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" placeholder="Date" Required >
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Select Academic Year</label>
                        <select class="form-control select2" name="academic_year_id" id="academic_year_id" data-placeholder="Select Academic Year">
                          <option value="">Select Academic Year</option>
                          <?php foreach ($academic_year_list as $academic_year_list1) { ?>
                            <option value="<?php echo $academic_year_list1->academic_year_id; ?>" <?php if(isset($student_info) && $student_info['academic_year_id'] == $academic_year_list1->academic_year_id){ echo 'selected'; } ?>><?php echo $academic_year_list1->academic_year_title; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Select medium</label>
                        <select class="form-control select2" name="medium_id" id="medium_id" data-placeholder="Select medium Name">
                          <option value="">Select Medium Name</option>
                          <?php foreach ($medium_list as $medium_list1) { ?>
                            <option value="<?php echo $medium_list1->medium_id; ?>" <?php if(isset($student_info) && $student_info['medium_id'] == $medium_list1->medium_id){ echo 'selected'; } ?>><?php echo $medium_list1->medium_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Select Class Name</label>
                        <select class="form-control select2" name="class_id" id="class_id" data-placeholder="Select Class Name">
                          <option value="">Select Class Name</option>
                          <?php if(isset($class_list)){
                             foreach ($class_list as $class_list1) { ?>
                            <option value="<?php echo $class_list1->class_id; ?>" <?php if(isset($student_info) && $student_info['class_id'] == $class_list1->class_id){ echo 'selected'; } ?>><?php echo $class_list1->class_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Select Batch Name</label>
                        <select class="form-control select2" name="batch_id" id="batch_id" data-placeholder="Select Batch Name">
                          <option value="">Select Batch Name</option>
                          <?php foreach ($batch_list as $batch_list1) { ?>
                            <option value="<?php echo $batch_list1->batch_id; ?>" <?php if(isset($student_info) && $student_info['batch_id'] == $batch_list1->batch_id){ echo 'selected'; } ?>><?php echo $batch_list1->batch_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Student Name</label>
                        <input type="text" class="form-control form-control-sm" name="student_name" id="student_name" value="<?php if(isset($student_info)){ echo $student_info['student_name']; } ?>"  placeholder="Student Name" required >
                      </div>
                      <div class="form-group col-md-4">
                        <label>Mobile No.</label>
                        <input type="number" class="form-control form-control-sm" name="student_mobile" id="student_mobile" value="<?php if(isset($student_info)){ echo $student_info['student_mobile']; } ?>"  placeholder="Mobile No." required >
                      </div>
                      <div class="form-group col-md-4">
                        <label>Password</label>
                        <input type="password" class="form-control form-control-sm" name="student_password" id="student_password" value="<?php if(isset($student_info)){ echo $student_info['student_password']; } ?>"  placeholder="Enter Password" required >
                      </div>
                      <div class="form-group col-md-4">
                        <label>IMEI Number</label>
                        <input type="text" class="form-control form-control-sm" name="student_imei_no" id="student_imei_no" value="<?php if(isset($student_info)){ echo $student_info['student_imei_no']; } ?>" <?php if(!isset($student_info)){ echo 'disabled'; } ?>  placeholder="Student Mobile IMEI No."  >
                      </div>
                      <div class="form-group col-md-12">
                        <label>Address</label>
                        <textarea class="form-control form-control-sm" name="student_address" id="student_address" rows="3" ><?php if(isset($student_info)){ echo $student_info['student_address']; } ?></textarea>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Enter Total Fees</label>
                        <input type="number" class="form-control form-control-sm" name="student_tot_fees" id="student_tot_fees" value="<?php if(isset($student_info)){ echo $student_info['student_tot_fees']; } ?>"  placeholder="Enter Total Fees"  >
                      </div>
                      <div class="form-group col-md-6">
                        <label>Advance Amount</label>
                        <input type="number" class="form-control form-control-sm" name="student_adv_amt" id="student_adv_amt" value="<?php if(isset($student_info)){ echo $student_info['student_adv_amt']; } ?>"  placeholder="Advance Amount"  >
                      </div>
                    </div>
                    <div class="card-footer clearfix" style="display: block;">
                      <div class="row">
                        <div class="col-md-6 text-left">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="student_status" id="student_status" value="0" <?php if(isset($student_info) && $student_info['student_status'] == 0){ echo 'checked'; } ?>>
                            <label for="student_status" class="custom-control-label">Disable This Student</label>
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
                <h3 class="card-title">List All Student</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th>Student Name</th>
                    <th class="wt_100">Mobile No.</th>
                    <th class="wt_75">Password</th>
                    <th class="wt_75">Medium</th>
                    <th>Class</th>
                    <th>Batch</th>
                    <th class="wt_50">Status</th>
                  </tr>
                  </thead>
                  <tbody>
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
                          <a href="<?php echo base_url() ?>Master/delete_student/<?php echo $list->student_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Student');"><i class="fa fa-trash text-danger"></i></a>
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
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>

</body>
</html>

<script type="text/javascript">
  $("#medium_id").on("change", function(){
    var medium_id =  $('#medium_id').find("option:selected").val();
    $.ajax({
      url:'<?php echo base_url(); ?>Transaction/get_class_by_medium',
      type: 'POST',
      data: {"medium_id":medium_id},
      context: this,
      success: function(result){
        $('#class_id').html(result);
      }
    });
  });
</script>
