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
            <h4>Download Content Information</h4>
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
                    <h5 class="card-title f-16"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Download Content</h5>
                    <div class="card-tools">
                      <?php if(!isset($update)){
                        echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                      } ?>
                    </div>
                  </div>
                  <div class="card-body p-0 <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>">
                    <form class="m-0 input_form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                      <div class="row p-4">
                        <div class="form-group col-md-6 select_sm">
                          <label>Select Acadamic Year</label>
                          <select class="form-control select2" name="academic_year_id" id="academic_year_id" data-placeholder="Select Academic Year">
                            <option value="">Select Academic Year</option>
                            <?php foreach ($academic_year_list as $academic_year_list1) { ?>
                              <option value="<?php echo $academic_year_list1->academic_year_id; ?>" <?php if(isset($download_content_info) && $download_content_info['academic_year_id'] == $academic_year_list1->academic_year_id){ echo 'selected'; } ?>><?php echo $academic_year_list1->academic_year_title; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group col-md-6 select_sm">
                          <label>Select Medium</label>
                          <select class="form-control select2" name="medium_id" id="medium_id" data-placeholder="Select Medium" required>
                            <option value="">Select Medium</option>
                            <?php foreach ($medium_list as $medium_list1) { ?>
                              <option value="<?php echo $medium_list1->medium_id; ?>" <?php if(isset($download_content_info) && $download_content_info['medium_id'] == $medium_list1->medium_id){ echo 'selected'; } ?>><?php echo $medium_list1->medium_name; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group col-md-6 select_sm">
                          <label>Select Class</label>
                          <select class="form-control form-control-sm select2" multiple="multiple" id="class_id_multi" data-placeholder="Select Class" required>
                            <option value="">Select Class</option>
                            <?php  if(isset($class_list)){
                               foreach ($class_list as $class_list1) { ?>
                              <option value="<?php echo $class_list1->class_id; ?>"
                                <?php if(isset($download_content_info['class_id'])) {
                                  $str_arr = explode (",", $download_content_info['class_id']);
                                  foreach ($str_arr as $x) {
                                    if($x == $class_list1->class_id) { echo "selected"; }
                                  }
                                } ?>
                              ><?php echo $class_list1->class_name; ?>
                              </option>
                            <?php } } ?>
                          </select>
                          <input type="hidden" name="class_id" id="class_id_multi_text" value="<?php if(isset($download_content_info)){ echo $download_content_info['class_id']; } ?>">
                        </div>
                        <div class="form-group col-md-6 select_sm">
                          <label>Select Batch</label>
                          <select class="form-control form-control-sm select2" multiple="multiple" id="batch_id_multi" data-placeholder="Select Batch" required>
                            <option value="">Select Batch</option>
                            <?php  if(isset($batch_list)){
                               foreach ($batch_list as $batch_list1) { ?>
                              <option value="<?php echo $batch_list1->batch_id; ?>"
                                <?php if(isset($download_content_info['batch_id'])) {
                                  $str_arr = explode (",", $download_content_info['batch_id']);
                                  foreach ($str_arr as $x) {
                                    if($x == $batch_list1->batch_id) { echo "selected"; }
                                  }
                                } ?>
                              ><?php echo $batch_list1->batch_name; ?>
                              </option>
                            <?php } } ?>
                          </select>
                          <input type="hidden" name="batch_id" id="batch_id_multi_text" value="<?php if(isset($download_content_info)){ echo $download_content_info['batch_id']; } ?>">
                        </div>

                        <div class="col-md-12"><hr></div>

                        <div class="form-group col-md-8 offset-md-2">
                          <label>Name of Document</label>
                          <input type="text" class="form-control form-control-sm" name="download_content_desc" id="download_content_desc" value="<?php if(isset($download_content_info)){ echo $download_content_info['download_content_desc']; } ?>"  placeholder="Enter Name of Document" required >
                        </div>
                        <div class="form-group col-md-8 offset-md-2 select_sm">
                          <label>Browes File</label>
                          <?php if(isset($download_content_info)){ ?>
                            <input type="file" class="form-control form-control-sm" name="download_content_file" id="download_content_file" placeholder="" >
                            <a target="_blank" href="<?php echo base_url() ?>assets/uploads/download_content/<?php if(isset($download_content_info)){ echo $download_content_info['download_content_file']; } ?>"> <i class="fa fa-download"></i> <?php if(isset($download_content_info)){ echo $download_content_info['download_content_file']; } ?></a>
                            <input type="hidden" name="old_file" value="<?php if(isset($download_content_info)){ echo $download_content_info['download_content_file']; } ?>">
                          <?php } else{ ?>
                            <input type="file" class="form-control form-control-sm" name="download_content_file" id="download_content_file" placeholder="" required >
                          <?php } ?>
                        </div>
                      </div>
                      <div class="card-footer clearfix" style="display: block;">
                        <div class="row">
                          <div class="col-md-6 text-left">
                          </div>
                          <div class="col-md-6 text-right">
                            <a href="<?php echo base_url(); ?>Master/download_content" class="btn btn-sm btn-default px-4 mx-4">Cancel</a>
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
                    <h3 class="card-title">List All Download Content</h3>
                    <div class="card-tools">
                      <!-- <a href="<?php echo base_url(); ?>Master/topic" class="btn btn-sm btn-outline-info">Topic Information</a> -->
                    </div>
                  </div>
                  <div class="card-body p-2">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th class="d-none">#</th>
                        <th class="wt_50">Action</th>
                        <th>Name of Document</th>
                        <th>Document File</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; foreach ($download_content_list as $list) { $i++;
                        ?>
                        <tr>
                          <td class="d-none"><?php echo $i; ?></td>
                          <td class="text-center">
                            <div class="btn-group">
                              <a href="<?php echo base_url() ?>Master/edit_download_content/<?php echo $list->download_content_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                              <a href="<?php echo base_url() ?>Master/delete_download_content/<?php echo $list->download_content_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Download Containt');"><i class="fa fa-trash text-danger"></i></a>
                            </div>
                          </td>
                          <td><?php echo $list->download_content_desc; ?></td>
                          <td> <a target="_blank" href="<?php echo base_url() ?>assets/uploads/download_content/<?php echo $list->download_content_file; ?>"><?php echo $list->download_content_file; ?></a></td>
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
        $('#class_id_multi').html(result);
      }
    });
  });

  $(document).on('change', '#class_id_multi', function(){
    var class_id_multi = $(this).val();
    $('#class_id_multi_text').val(class_id_multi);
  });

  $(document).on('change', '#batch_id_multi', function(){
    var batch_id_multi = $(this).val();
    $('#batch_id_multi_text').val(batch_id_multi);
  });
</script>
