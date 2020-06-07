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
            <h4>Topic Content Information</h4>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">

            <!-- Education Level -->
            <div class="row">
              <div class="col-md-12">
                <div class="card <?php if(!isset($update)){ echo 'collapsed-card'; } ?>">
                  <div class="card-header">
                    <h5 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Topic Content</h5>
                    <div class="card-tools">
                      <?php if(!isset($update)){
                        echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                      } ?>
                    </div>
                  </div>
                  <div class="card-body p-0 <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>">
                    <form class="m-0 input_form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                      <div class="row p-4">
                        <div class="form-group col-md-4 select_sm">
                          <label> Section :
                            <?php foreach ($section_list as $section_list1) { ?>
                              <?php if(isset($topic_info) && $topic_info['section_id'] == $section_list1->section_id){ echo $section_list1->section_name; } ?>
                            <?php } ?>
                          </label>
                        </div>
                        <div class="form-group col-md-4 select_sm">
                          <label>Medium :
                            <?php foreach ($medium_list as $medium_list1) { ?>
                              <?php if(isset($topic_info) && $topic_info['medium_id'] == $medium_list1->medium_id){ echo $medium_list1->medium_name; } ?>
                            <?php } ?>
                          </label>
                        </div>
                        <div class="form-group col-md-4 select_sm" id="std_regular">
                          <label>Class :
                            <?php foreach ($class_list as $class_list1) { ?>
                              <?php if(isset($topic_info) && $topic_info['class_id'] == $class_list1->class_id){ echo $class_list1->class_name; } ?>
                            <?php } ?>
                          </label>
                        </div>
                        <!-- <div class="col-md-4 select_sm" id="std_multiple">
                          <div class="form-Class">
                            <label>Select Class</label>
                            <select class="form-control form-control-sm select2" multiple="multiple" id="class_id_multi" data-placeholder="Select Class" disabled>
                              <option value="">Select Class</option>
                              <?php foreach ($class_list as $class_list1) { ?>
                                <option value="<?php echo $class_list1->class_id; ?>" <?php if(isset($topic_info) && $topic_info['class_id'] == $class_list1->class_id){ echo 'selected'; } ?>><?php echo $class_list1->class_name; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div> -->
                        <div class="form-group col-md-4 select_sm">
                          <label>Batch :
                            <?php foreach ($batch_list as $batch_list1) { ?>
                              <?php if(isset($topic_info) && $topic_info['batch_id'] == $batch_list1->batch_id){ echo $batch_list1->batch_name; } ?>
                            <?php } ?>
                          </label>
                        </div>
                        <div class="form-group col-md-4 select_sm" id="subsec">
                          <label>Subject :
                            <?php foreach ($subject_list as $subject_list1) { ?>
                              <?php if(isset($topic_info) && $topic_info['subject_id'] == $subject_list1->subject_id){ echo $subject_list1->subject_name; } ?>
                            <?php } ?>
                          </label>
                        </div>
                        <div class="form-group col-md-6 select_sm">
                          <label>Topic Name : <?php if(isset($topic_info)){ echo $topic_info['topic_name']; } ?></label>
                        </div>

                        <div class="col-md-12"><hr></div>
                        <!-- <input type="hidden" name="topic_id" value="<?php if(isset($topic_info)){ echo $topic_info['topic_id']; } ?>"> -->
                        <div class="form-group col-md-8 offset-md-2 select_sm">
                          <label>Select Acadamic Year</label>
                          <select class="form-control select2" name="academic_year_id" id="academic_year_id" data-placeholder="Select Academic Year">
                            <option value="">Select Academic Year</option>
                            <?php foreach ($academic_year_list as $academic_year_list1) { ?>
                              <option value="<?php echo $academic_year_list1->academic_year_id; ?>" <?php if(isset($topic_content_info) && $topic_content_info['academic_year_id'] == $academic_year_list1->academic_year_id){ echo 'selected'; } ?>><?php echo $academic_year_list1->academic_year_title; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group col-md-8 offset-md-2 select_sm">
                          <label>Browes Video</label>
                          <?php if(isset($topic_content_info)){ ?>
                            <input type="file" class="form-control form-control-sm" name="topic_content_file" id="topic_content_file" placeholder="" >
                            <a target="_blank" href="<?php echo base_url() ?>assets/uploads/topic_content/<?php if(isset($topic_content_info)){ echo $topic_content_info['topic_content_file']; } ?>"> <i class="fa fa-download"></i> <?php if(isset($topic_content_info)){ echo $topic_content_info['topic_content_file']; } ?></a>
                            <input type="hidden" name="old_file" value="<?php if(isset($topic_content_info)){ echo $topic_content_info['topic_content_file']; } ?>">
                          <?php } else{ ?>
                            <input type="file" class="form-control form-control-sm" name="topic_content_file" id="topic_content_file" placeholder="" required >
                          <?php } ?>
                        </div>
                        <div class="form-group col-md-4 offset-md-2 select_sm">
                          <label>Publish Date</label>
                          <input type="text" class="form-control form-control-sm" name="topic_content_pub_date" id="date1"  value="<?php if(isset($topic_content_info)){ echo $topic_content_info['topic_content_pub_date']; } ?>" data-target="#date1" data-toggle="datetimepicker" placeholder="Enter Publish Date" required >
                        </div>
                        <div class="form-group col-md-4 select_sm">
                          <label>Publish Time</label>
                          <input type="text" class="form-control form-control-sm" name="topic_content_pub_time" id="time1"  value="<?php if(isset($topic_content_info)){ echo $topic_content_info['topic_content_pub_time']; } ?>" data-target="#time1" data-toggle="datetimepicker" placeholder="Enter Publish Time" required >
                        </div>
                        <div class="form-group col-md-8 offset-md-2">
                          <label>Enter Key Learning Points in this video</label>
                          <textarea class="form-control form-control-sm" name="topic_content_desc" id="topic_content_desc" rows="4"><?php if(isset($topic_content_info)){ echo $topic_content_info['topic_content_desc']; } ?></textarea>
                        </div>
                      </div>
                      <div class="card-footer clearfix" style="display: block;">
                        <div class="row">
                          <div class="col-md-6 text-left">
                          </div>
                          <div class="col-md-6 text-right">
                            <a href="<?php echo base_url(); ?>Master/topic" class="btn btn-sm btn-default px-4 mx-4">Cancel</a>
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
                    <h3 class="card-title">List All Topic Content</h3>
                    <div class="card-tools">
                      <a href="<?php echo base_url(); ?>Master/topic" class="btn btn-sm btn-outline-info">Topic Information</a>
                    </div>
                  </div>
                  <div class="card-body p-2">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th class="d-none">#</th>
                        <th class="wt_50">Action</th>
                        <th>File</th>
                        <th>Publish Date</th>
                        <th>Publish Time</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; foreach ($topic_content_list as $list) { $i++;
                        ?>
                        <tr>
                          <td class="d-none"><?php echo $i; ?></td>
                          <td class="text-center">
                            <div class="btn-group">
                              <a href="<?php echo base_url() ?>Master/edit_topic_content/<?php echo $list->topic_content_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                              <a href="<?php echo base_url() ?>Master/delete_topic_content/<?php echo $list->topic_content_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Topic Containt');"><i class="fa fa-trash text-danger"></i></a>
                            </div>
                          </td>
                          <td> <a target="_blank" href="<?php echo base_url() ?>assets/uploads/topic_content/<?php echo $list->topic_content_file; ?>"><?php echo $list->topic_content_file; ?></a></td>
                          <td><?php echo $list->topic_content_pub_date; ?></td>
                          <td><?php echo $list->topic_content_pub_time; ?></td>
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


  <!-- <script type="text/javascript">
    $(function() {
      $('#subsec').hide();
      $('#std_multiple').hide();
      $('#section_id').change(function(){
        var section =$('#section_id').val();
        if(section=='1'){
          $('#subsec').show();
          $('#std_multiple').hide();
          $('#std_regular').show();
          $('#class_id_multi').attr('disabled', true);
          $('#class_id_multi_text').attr('disabled', true);
          $('#class_id').attr('disabled', false);
        } else{
          $('#subsec').hide();
          $('#std_multiple').show();
          $('#std_regular').hide();
          $('#class_id_multi').attr('disabled', false);
          $('#class_id_multi_text').attr('disabled', false);
          $('#class_id').attr('disabled', true);
        }
      });
    });

    $(document).on('change', '#class_id_multi', function(){
      var class_id_multi = $(this).val();
      $('#class_id_multi_text').val(class_id_multi);
    })
  </script> -->
