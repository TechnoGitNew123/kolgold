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
            <h4>Receipt</h4>
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
                <h3 class="card-title"><?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Receipt</h3>
                <div class="card-tools">
                  <?php if(!isset($update)){
                    echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                  } else{
                    echo '<a href="'.base_url().'Master/receipt" type="button" class="btn btn-sm btn-primary">Add New</a>';
                  } ?>
                </div>
              </div>
              <!--  -->
                <div class="card-body p-0" <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>>
                  <form class="input_form m-0" id="form_action" role="form" action="" method="post">
                    <div class="row p-4">
                      <div class="form-group col-md-6 select_sm">
                        <label>Receipt No.</label>
                        <input type="text" class="form-control form-control-sm" name="receipt_no" id="receipt_no" value="<?php if(isset($receipt_info)){ echo $receipt_info['receipt_no']; } else{ echo $receipt_no; } ?>"  placeholder="Receipt No." readonly >
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Receipt Date</label>
                        <input type="text" class="form-control form-control-sm" name="receipt_add_date" value="<?php if(isset($receipt_info)){ echo $receipt_info['receipt_add_date']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker"  placeholder="Receipt Date" Required >
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Select Academic Year</label>
                        <select class="form-control select2" name="academic_year_id" id="academic_year_id" data-placeholder="Select Academic Year">
                          <option value="">Select Academic Year</option>
                          <?php foreach ($academic_year_list as $academic_year_list1) { ?>
                            <option value="<?php echo $academic_year_list1->academic_year_id; ?>" <?php if(isset($receipt_info) && $receipt_info['academic_year_id'] == $academic_year_list1->academic_year_id){ echo 'selected'; } ?>><?php echo $academic_year_list1->academic_year_title; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Select medium</label>
                        <select class="form-control select2" name="medium_id" id="medium_id" data-placeholder="Select medium Name">
                          <option value="">Select Medium</option>
                          <?php foreach ($medium_list as $medium_list1) { ?>
                            <option value="<?php echo $medium_list1->medium_id; ?>" <?php if(isset($receipt_info) && $receipt_info['medium_id'] == $medium_list1->medium_id){ echo 'selected'; } ?>><?php echo $medium_list1->medium_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Select Class</label>
                        <select class="form-control select2" name="class_id" id="class_id" data-placeholder="Select Class">
                          <option value="">Select Class</option>
                          <?php foreach ($class_list as $class_list1) { ?>
                            <option value="<?php echo $class_list1->class_id; ?>" <?php if(isset($receipt_info) && $receipt_info['class_id'] == $class_list1->class_id){ echo 'selected'; } ?>><?php echo $class_list1->class_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Select Batch</label>
                        <select class="form-control select2" name="batch_id" id="batch_id" data-placeholder="Select Batch">
                          <option value="">Select Batch</option>
                          <?php foreach ($batch_list as $batch_list1) { ?>
                            <option value="<?php echo $batch_list1->batch_id; ?>" <?php if(isset($receipt_info) && $receipt_info['batch_id'] == $batch_list1->batch_id){ echo 'selected'; } ?>><?php echo $batch_list1->batch_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-12 select_sm">
                        <label>Select Student</label>
                        <select class="form-control select2" name="student_id" id="student_id" data-placeholder="Select Student">
                          <option value="">Select Student</option>
                          <?php foreach ($student_list as $student_list1) { ?>
                            <option value="<?php echo $student_list1->student_id; ?>" <?php if(isset($receipt_info) && $receipt_info['student_id'] == $student_list1->student_id){ echo 'selected'; } ?>><?php echo $student_list1->student_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Total Balance Fees</label>
                        <input type="text" class="form-control form-control-sm" name="receipt_bal_fee" id="receipt_bal_fee" value="<?php if(isset($receipt_info)){ echo $receipt_info['receipt_bal_fee']; } ?>" placeholder="Total Balance Fees" required readonly>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Enter Received Fees</label>
                        <input type="text" class="form-control form-control-sm" name="receipt_rec_fee" id="receipt_rec_fee" value="<?php if(isset($receipt_info)){ echo $receipt_info['receipt_rec_fee']; } ?>" placeholder="Enter Received Fees" required >
                      </div>
                    </div>
                    <div class="card-footer clearfix" style="display: block;">
                      <div class="row">
                        <div class="col-md-6 text-left">
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
                <h3 class="card-title">List All Receipt</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th class="wt_50">Receipt No.</th>
                    <th>Date</th>
                    <th>Student Name</th>
                    <th>Acadamic Year</th>
                    <th>Class</th>
                    <th>Batch</th>
                    <th class="wt_50">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; foreach ($receipt_list as $list) { $i++;
                      $student_details = $this->Master_Model->get_info_arr_fields('student_name','student_id', $list->student_id, 'student');
                      $academic_year_details = $this->Master_Model->get_info_arr_fields('academic_year_title','academic_year_id', $list->academic_year_id, 'academic_year');
                      $class_details = $this->Master_Model->get_info_arr_fields('class_name','class_id', $list->class_id, 'class');
                      $batch_details = $this->Master_Model->get_info_arr_fields('batch_name','batch_id', $list->batch_id, 'batch');
                    ?>
                    <tr>
                      <td class="d-none"><?php echo $i; ?></td>
                      <td class="text-center">
                        <div class="btn-group">
                          <a href="<?php echo base_url() ?>Master/edit_receipt/<?php echo $list->receipt_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                          <a href="<?php echo base_url() ?>Master/delete_receipt/<?php echo $list->receipt_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Student');"><i class="fa fa-trash text-danger"></i></a>
                        </div>
                      </td>
                      <td><?php echo $list->receipt_no; ?></td>
                      <td><?php echo $list->receipt_add_date; ?></td>
                      <td><?php if($student_details){ echo $student_details[0]['student_name']; } ?></td>
                      <td><?php if($academic_year_details){ echo $academic_year_details[0]['academic_year_title']; } ?></td>
                      <td><?php if($class_details){ echo $class_details[0]['class_name']; } ?></td>
                      <td><?php if($batch_details){ echo $batch_details[0]['batch_name']; } ?></td>
                      <td>
                        <?php if($list->receipt_status == 0){ echo '<span class="text-danger">Inactive</span>'; }
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
  $(document).on('change', '#student_id', function(){
    var student_id = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>Transaction/get_stud_balance_fees',
      type: 'POST',
      data: {"student_id":student_id},
      context: this,
      success: function(result){
        $('#receipt_bal_fee').val(result);
      }
    });
  });
</script>
