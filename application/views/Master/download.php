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
            <h4>Download Information</h4>
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
                    <h5 class="card-title f-16"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Download</h5>
                    <div class="card-tools">
                      <?php if(!isset($update)){
                        echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                      } ?>
                    </div>
                  </div>
                  <div class="card-body p-0 <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>">
                    <form class="m-0 input_form" id="form_action" role="form" action="" method="post">
                      <div class="row p-4">
                        <div class="form-group col-md-6 select_sm">
                          <label>Select Section</label>
                          <select class="form-control select2" name="section_id" id="section_id" data-placeholder="Select Section" required>
                            <option value="">Select Section</option>
                            <?php foreach ($section_list as $section_list1) { ?>
                              <option value="<?php echo $section_list1->section_id; ?>" <?php if(isset($download_info) && $download_info['section_id'] == $section_list1->section_id){ echo 'selected'; } ?>><?php echo $section_list1->section_name; ?></option>
                            <?php } ?>
                          </select>
                        </div>

                        <div class="form-group col-md-6 select_sm">
                          <label>Select Medium</label>
                          <select class="form-control select2" name="medium_id" id="medium_id" data-placeholder="Select medium" required>
                            <option value="">Select Medium</option>
                            <?php foreach ($medium_list as $medium_list1) { ?>
                              <option value="<?php echo $medium_list1->medium_id; ?>" <?php if(isset($download_info) && $download_info['medium_id'] == $medium_list1->medium_id){ echo 'selected'; } ?>><?php echo $medium_list1->medium_name; ?></option>
                            <?php } ?>
                          </select>
                        </div>

                        <div class="form-group col-md-6 select_sm" id="std_regular">
                          <label>Select Class</label>
                          <select class="form-control select2" name="class_id" id="class_id" data-placeholder="Select Class" required>
                            <option value="">Select Class</option>
                            <?php foreach ($class_list as $class_list1) { ?>
                              <option value="<?php echo $class_list1->class_id; ?>" <?php if(isset($download_info) && $download_info['class_id'] == $class_list1->class_id){ echo 'selected'; } ?>><?php echo $class_list1->class_name; ?></option>
                            <?php } ?>
                          </select>
                        </div>

                        <div class="col-md-6 select_sm" id="std_multiple">
                          <div class="form-Class">
                            <label>Select Class</label>
                            <select class="form-control form-control-sm select2" multiple="multiple" id="class_id_multi" data-placeholder="Select Class" disabled required>
                              <option value="">Select Class</option>
                              <?php foreach ($class_list as $class_list1) { ?>
                                <option value="<?php echo $class_list1->class_id; ?>"
                                  <?php if(isset($download_info['class_id'])) {
                                    $str_arr = explode (",", $download_info['class_id']);
                                    foreach ($str_arr as $x) {
                                      if($x == $class_list1->class_id) { echo "selected"; }
                                    }
                                  } ?>
                                ><?php echo $class_list1->class_name; ?>
                                </option>
                              <?php } ?>
                            </select>
                            <input type="hidden" name="class_id" id="class_id_multi_text" disabled>
                          </div>
                        </div>
                        <div class="form-group col-md-6 select_sm">
                          <label>Select Batch</label>
                          <select class="form-control select2" name="batch_id" id="batch_id" data-placeholder="Select Batch">
                            <option value="">Select Batch</option>
                            <?php foreach ($batch_list as $batch_list1) { ?>
                              <option value="<?php echo $batch_list1->batch_id; ?>" <?php if(isset($download_info) && $download_info['batch_id'] == $batch_list1->batch_id){ echo 'selected'; } ?>><?php echo $batch_list1->batch_name; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group col-md-6 select_sm" id="subsec">
                          <label>Select Subject</label>
                          <select class="form-control select2" name="subject_id" id="subject_id" data-placeholder="Select Subject">
                            <option value="">Select Subject</option>
                            <?php foreach ($subject_list as $subject_list1) { ?>
                              <option value="<?php echo $subject_list1->subject_id; ?>" <?php if(isset($download_info) && $download_info['subject_id'] == $subject_list1->subject_id){ echo 'selected'; } ?>><?php echo $subject_list1->subject_name; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group col-md-6 select_sm">
                          <label>Select Topic</label>
                          <select class="form-control select2" name="topic_id" id="topic_id" data-placeholder="Select Topic">
                            <option value="">Select Topic</option>
                            <?php foreach ($topic_list as $topic_list1) { ?>
                              <option value="<?php echo $topic_list1->topic_id; ?>" <?php if(isset($download_info) && $download_info['topic_id'] == $topic_list1->topic_id){ echo 'selected'; } ?>><?php echo $topic_list1->topic_name; ?></option>
                            <?php } ?>
                          </select>
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
                    <h3 class="card-title">List All Download</h3>
                  </div>
                  <div class="card-body p-2">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th class="d-none">#</th>
                        <th class="wt_50">Action</th>
                        <th>Topic Name</th>
                        <th>Medium</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Batch</th>
                        <th class="wt_50">Content</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; foreach ($download_list as $list) { $i++;
                          $medium_details = $this->Master_Model->get_info_arr_fields('medium_name','medium_id', $list->medium_id, 'medium');
                          // $class_details = $this->Master_Model->get_info_arr_fields('class_name','class_id', $list->class_id, 'class');
                          $section_details = $this->Master_Model->get_info_arr_fields('section_name','section_id', $list->section_id, 'section');
                          $batch_details = $this->Master_Model->get_info_arr_fields('batch_name','batch_id', $list->batch_id, 'batch');
                          $topic_details = $this->Master_Model->get_info_arr_fields('topic_name','topic_id', $list->topic_id, 'topic');


                          $str_arr = explode (",", $list->class_id);
                          $class_name = '';
                          foreach ($str_arr as $class_id) {
                            $class_details = $this->Master_Model->get_info_arr_fields('class_name','class_id', $class_id, 'class');
                            if($class_details){
                              $class_name .= $class_details[0]['class_name'].', ';
                            }
                          }


                        ?>
                        <tr>
                          <td class="d-none"><?php echo $i; ?></td>
                          <td class="text-center">
                            <div class="btn-group">
                              <a href="<?php echo base_url() ?>Master/edit_download/<?php echo $list->download_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                              <a href="<?php echo base_url() ?>Master/delete_download/<?php echo $list->download_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Subject');"><i class="fa fa-trash text-danger"></i></a>
                            </div>
                          </td>
                          <td><?php if($topic_details){ echo $topic_details[0]['topic_name']; } ?></td>
                          <td><?php if($medium_details){ echo $medium_details[0]['medium_name']; } ?></td>
                          <td><?php echo $class_name; ?></td>
                          <td><?php if($section_details){ echo $section_details[0]['section_name']; } ?></td>
                          <td><?php if($batch_details){ echo $batch_details[0]['batch_name']; } ?></td>
                          <td><a href="<?php echo base_url() ?>Master/topic_content/<?php echo $list->topic_id; ?>" type="button" class="btn btn-sm btn-info">Add</td>
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

    $(document).ready(function(){
      var section = $('#section_id').val();
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

    $(function() {
      // $('#subsec').hide();
      // $('#std_multiple').hide();
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
  </script>
