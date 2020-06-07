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
            <h4>Topic Report</h4>
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
                            <label>Select Section</label>
                            <select class="form-control select2" name="section_id" id="section_id" data-placeholder="Select Section">
                              <option value="">Select Section</option>
                              <?php foreach ($section_list as $section_list1) { ?>
                                <option value="<?php echo $section_list1->section_id; ?>" <?php if(isset($subject_info) && $subject_info['section_id'] == $section_list1->section_id){ echo 'selected'; } ?>><?php echo $section_list1->section_name; ?></option>
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
                            <label>Select Standard</label>
                            <select class="form-control select2" name="class_id" id="class_id" data-placeholder="Select Standard">
                              <option value="">Select Standard</option>
                              <?php if(isset($class_list)){
                                 foreach ($class_list as $class_list1) { ?>
                                <option value="<?php echo $class_list1->class_id; ?>" <?php if(isset($student_info) && $student_info['class_id'] == $class_list1->class_id){ echo 'selected'; } ?>><?php echo $class_list1->class_name; ?></option>
                              <?php } } ?>
                            </select>
                          </div>
                          <div class="form-group col-md-3 select_sm">
                            <label>Select Subject</label>
                            <select class="form-control select2" name="subject_id" id="subject_id" data-placeholder="Select Subject">
                              <option value="">Select Subject</option>
                              <?php foreach ($subject_list as $subject_list1) { ?>
                                <option value="<?php echo $subject_list1->subject_id; ?>" <?php if(isset($student_info) && $student_info['subject_id'] == $subject_list1->batch_id){ echo 'selected'; } ?>><?php echo $subject_list1->subject_name; ?></option>
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
                    <h5 class="card-title f-16">List Topic Report</h5>
                  </div>
                  <div class="card-body pt-0">

                    <table id="example2" class="table table-striped">
                      <thead>
                        <tr>
                          <th class="d-none">#</th>
                          <th class="wt_50">Action</th>
                          <th>Topic Name</th>
                          <th>Medium</th>
                          <th>Class</th>
                          <th>Subject</th>
                          <th>Section</th>
                          <th>Batch</th>
                          <th class="wt_50">Content</th>
                          <!-- <th class="wt_50">Download Content</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 0;
                        foreach ($topic_list as $topic_list) {
                          $i++;
                          $status = $topic_list->topic_status;
                          if($status=='1'){
                            $stat='Active';
                          }
                          else{
                            $stat='Inctive';
                          }
                          ?>
                        <tr>
                          <?php //echo print_r($topic_list).'<br><br>'; ?>
                          <td class="text-center">
                            <div class="btn-group">
                              <a href="<?php echo base_url() ?>Master/edit_topic/<?php echo $topic_list->topic_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                              <a href="<?php echo base_url() ?>Master/delete_topic/<?php echo $topic_list->topic_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Subject');"><i class="fa fa-trash text-danger"></i></a>
                            </div>
                          </td>
                          <td><?php echo $topic_list->topic_name; ?></td>
                          <td><?php echo $topic_list->medium_name; ?></td>
                          <td><?php echo $topic_list->class_name; ?></td>
                          <td><?php echo $topic_list->subject_name; ?></td>
                          <td><?php echo $topic_list->section_name; ?></td>
                          <td><?php echo $topic_list->batch_name; ?></td>
                          <!-- <td><?php echo $topic_list->topic_adv_amt; ?></td> -->
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

<script type="text/javascript">
  $("#class_id").on("change", function(){
    var class_id =  $('#class_id').find("option:selected").val();
    $.ajax({
      url:'<?php echo base_url(); ?>Transaction/get_subject_by_class',
      type: 'POST',
      data: {"class_id":class_id},
      context: this,
      success: function(result){
        $('#subject_id').html(result);
      }
    });
  });
</script>
