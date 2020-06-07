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
            <h4>Subject</h4>
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
                <h3 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Subject</h3>
                <div class="card-tools">
                  <?php if(!isset($update)){
                    echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                  } ?>
                </div>
              </div>
              <!--  -->
                <div class="card-body p-0" <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>>
                  <form class="input_form m-0" id="form_action" role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="row p-4">
                      <div class="form-group col-md-6 select_sm">
                        <label>Select medium</label>
                        <select class="form-control select2" name="medium_id" id="medium_id" data-placeholder="Select medium Name">
                          <option value="">Select Medium Name</option>
                          <?php foreach ($medium_list as $medium_list1) { ?>
                            <option value="<?php echo $medium_list1->medium_id; ?>" <?php if(isset($subject_info) && $subject_info['medium_id'] == $medium_list1->medium_id){ echo 'selected'; } ?>><?php echo $medium_list1->medium_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Select Class</label>
                        <select class="form-control select2" name="class_id" id="class_id" data-placeholder="Select Class" required>
                          <option value="">Select Class</option>
                          <?php if(isset($class_list)){
                          foreach ($class_list as $class_list1) { ?>
                            <option value="<?php echo $class_list1->class_id; ?>" <?php if(isset($subject_info) && $subject_info['class_id'] == $class_list1->class_id){ echo 'selected'; } ?>><?php echo $class_list1->class_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Select Section</label>
                        <select class="form-control select2" name="section_id" id="section_id" data-placeholder="Select Section">
                          <option value="">Select Section</option>
                          <?php foreach ($section_list as $section_list1) { ?>
                            <option value="<?php echo $section_list1->section_id; ?>" <?php if(isset($subject_info) && $subject_info['section_id'] == $section_list1->section_id){ echo 'selected'; } ?>><?php echo $section_list1->section_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Enter Subject Name</label>
                        <input type="text" class="form-control form-control-sm" name="subject_name" id="subject_name" value="<?php if(isset($subject_info)){ echo $subject_info['subject_name']; } ?>" placeholder="Enter Subject Name" required >
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Subject Logo</label>
                        <input type="file" class="form-control form-control-sm" name="subject_logo" id="subject_logo" placeholder="" >
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <?php if(isset($subject_info) && $subject_info['subject_logo']){ ?>
                          <img width="200px" src="<?php echo base_url(); ?>assets/uploads/master/<?php echo $subject_info['subject_logo']; ?>" alt="">
                          <input type="hidden" name="old_file" value="<?php echo $subject_info['subject_logo']; ?>">
                        <?php } ?>
                      </div>

                    </div>
                    <div class="card-footer clearfix" style="display: block;">
                      <div class="row">
                        <div class="col-md-6 text-left">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="subject_status" id="subject_status" value="0" <?php if(isset($subject_info) && $subject_info['subject_status'] == 0){ echo 'checked'; } ?>>
                            <label for="subject_status" class="custom-control-label">Disable This Subject</label>
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
                <h3 class="card-title">List All Subject</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th>Subject Name</th>
                    <th>Medium</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th class="wt_50">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; foreach ($subject_list as $list) { $i++;
                      $medium_details = $this->Master_Model->get_info_arr_fields('medium_name','medium_id', $list->medium_id, 'medium');
                      $class_details = $this->Master_Model->get_info_arr_fields('class_name','class_id', $list->class_id, 'class');
                      $section_details = $this->Master_Model->get_info_arr_fields('section_name','section_id', $list->section_id, 'section');
                    ?>
                    <tr>
                      <td class="d-none"><?php echo $i; ?></td>
                      <td class="text-center">
                        <div class="btn-group">
                          <a href="<?php echo base_url() ?>Master/edit_subject/<?php echo $list->subject_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                          <a href="<?php echo base_url() ?>Master/delete_subject/<?php echo $list->subject_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Subject');"><i class="fa fa-trash text-danger"></i></a>
                        </div>
                      </td>
                      <td><?php echo $list->subject_name; ?></td>
                      <td><?php if($medium_details){ echo $medium_details[0]['medium_name']; } ?></td>
                      <td><?php if($class_details){ echo $class_details[0]['class_name']; } ?></td>
                      <td><?php if($section_details){ echo $section_details[0]['section_name']; } ?></td>
                      <td>
                        <?php if($list->subject_status == 0){ echo '<span class="text-danger">Inactive</span>'; }
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
