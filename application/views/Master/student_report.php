<!DOCTYPE html>
<html>
<style media="screen">
  .dataTables_length{
    display: none !important;
  }
  .dataTables_filter{
    display: none !important;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header pt-0 pb-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-left mt-2">
            <h4>Student Report</h4>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Filter</h3>
                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Hide / Show </button>
                </div> -->
              </div>
              <!--  -->
                <div class="card-body p-0">
                  <form class="input_form m-0" id="form_action" role="form" action="" method="post">
                    <div class="row p-4">
                      <div class="col-md-10">
                        <div class="row">
                          <div class="form-group col-md-3 select_sm">
                            <label>Select Acadamic Year</label>
                            <select class="form-control select2" name="academic_year_id" id="academic_year_id" data-placeholder="Select Academic Year">
                              <option value="">Select Academic Year</option>
                              <?php foreach ($academic_year_list as $academic_year_list1) { ?>
                                <option value="<?php echo $academic_year_list1->academic_year_id; ?>" <?php if(isset($student_info) && $student_info['academic_year_id'] == $academic_year_list1->academic_year_id){ echo 'selected'; } ?>><?php echo $academic_year_list1->academic_year_title; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group col-md-3 select_sm">
                            <label>Select Medium</label>
                            <select class="form-control select2" name="medium_id" id="medium_id" data-placeholder="Select Medium">
                              <option value="">Select Medium</option>
                              <?php foreach ($medium_list as $medium_list1) { ?>
                                <option value="<?php echo $medium_list1->medium_id; ?>" <?php if(isset($student_info) && $student_info['medium_id'] == $medium_list1->medium_id){ echo 'selected'; } ?>><?php echo $medium_list1->medium_name; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group col-md-3 select_sm">
                            <label>Select Class</label>
                            <select class="form-control select2" name="class_id" id="class_id" data-placeholder="Select Class">
                              <option value="">Select Class</option>
                              <!-- <?php if(isset($class_list)){
                                 foreach ($class_list as $class_list1) { ?>
                                <option value="<?php echo $class_list1->class_id; ?>" <?php if(isset($student_info) && $student_info['class_id'] == $class_list1->class_id){ echo 'selected'; } ?>><?php echo $class_list1->class_name; ?></option>
                              <?php } } ?> -->
                            </select>
                          </div>
                          <div class="form-group col-md-3 select_sm">
                            <label>Select Batch</label>
                            <select class="form-control select2" name="batch_id" id="batch_id" data-placeholder="Select Batch">
                              <option value="">Select Batch</option>
                              <?php foreach ($batch_list as $batch_list1) { ?>
                                <option value="<?php echo $batch_list1->batch_id; ?>" <?php if(isset($student_info) && $student_info['batch_id'] == $batch_list1->batch_id){ echo 'selected'; } ?>><?php echo $batch_list1->batch_name; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group col-md-2 text-right mt-4">
                          <button id="btn_save" type="submit" class="btn btn-sm btn-primary px-4">Get</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
          </div>

          <div class="col-md-12">
            <!-- Education Level -->
            <div class="row">
              <div class="col-md-12">
                <div class="card card-default">
                  <div class="card-header">
                    <h5 class="card-title f-16">List Student Report</h5>
                  </div>
                  <div class="card-body pt-0">
                    <div class="row mt-3">
                      <div class="col-md-3">
                        <p>Acadamic Year : 2020-21</p>
                      </div>
                      <div class="col-md-3">
                        <p>Medium name : English</p>
                      </div>
                      <div class="col-md-3">
                        <p>Standard Name : 10th</p>
                      </div>
                      <div class="col-md-3">
                          <p>Batch Name : Morning </p>
                      </div>
                    </div>
                    <table id="example2" class="table table-striped">
                      <thead>
                        <tr>
                          <th style="display:none;">#</th>
                          <th class="wt_50">Action</th>
                          <th>Student Name</th>
                          <th>Mobile No.</th>
                          <th>Total Fees</th>
                          <th>Advance Fees</th>
                          <th>Total Received Fees</th>
                          <th>Balance Fees </th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 0;
                        foreach ($student_list as $student_list) {
                          $i++;
                          $status = $student_list->student_status;
                          if($status=='1'){
                            $stat='Active';
                          }
                          else{
                            $stat='Inctive';
                          }
                          ?>
                        <tr>
                          <?php //echo print_r($student_list).'<br><br>'; ?>
                          <!-- <td> <?php echo $i; ?></td> -->
                          <td class="text-center">
                            <div class="btn-group">
                              <a href="<?php echo base_url() ?>Master/edit_student/<?php echo $student_list->student_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                              <a href="<?php echo base_url() ?>Master/delete_student/<?php echo $student_list->student_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Student');"><i class="fa fa-trash text-danger"></i></a>
                            </div>
                          </td>
                          <td><?php echo $student_list->student_name; ?></td>
                          <td><?php echo $student_list->student_mobile; ?></td>
                          <td><?php echo $student_list->student_tot_fees; ?></td>
                          <td><?php echo $student_list->student_adv_amt; ?></td>
                          <td><?php echo $student_list->student_adv_amt; ?></td>
                          <td></td>
                          <td><?php echo $stat; ?></td>
                          </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- // Education Level -->
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
