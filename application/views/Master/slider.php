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
            <h4>Slider</h4>
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
                <h3 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Slider</h3>
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
                      <div class="form-group col-md-12 ">
                        <label>Enter Slider Title</label>
                        <input type="text" class="form-control form-control-sm" name="slider_title" id="slider_title" value="<?php if(isset($slider_info)){ echo $slider_info['slider_title']; } ?>" placeholder="Enter Slider Title" required>
                      </div>
                      <div class="form-group col-md-12 select_sm">
                        <label>Select Position</label>
                        <select class="form-control select2" name="slider_possition" id="slider_possition" data-placeholder="Select Position" required>
                          <option value="">Select Position</option>
                          <option value="1" <?php if(isset($slider_info) && $slider_info['slider_possition'] == '1'){ echo 'selected'; } ?>>Home Page Slider 1</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Slider Image</label>
                        <input type="file" name="slider_image" class="form-control form-control-sm">
                      </div>
                      <div class="form-group col-md-6">
                        <?php if(isset($slider_info) && $slider_info['slider_image']){ ?>
                          <label>Uploaded Slider Image</label><br>
                          <img width="200px" src="<?php echo base_url() ?>assets/images/slider/<?php echo $slider_info['slider_image'];  ?>" alt="Slider Image">
                          <input type="hidden" name="old_slider_img" value="<?php echo $slider_info['slider_image'];  ?>">
                        <?php } ?>
                      </div>
                    </div>
                    <div class="card-footer clearfix" style="display: block;">
                      <div class="row">
                        <div class="col-md-6 text-left">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="slider_status" id="slider_status" value="0" <?php if(isset($slider_info) && $slider_info['slider_status'] == 0){ echo 'checked'; } ?>>
                            <label for="slider_status" class="custom-control-label">Disable This Slider</label>
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
                <h3 class="card-title">List All Slider</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th>Slider Title</th>
                    <th>Slider Position</th>
                    <th>Image</th>
                    <th class="wt_50">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; foreach ($slider_list as $list) { $i++;
                      // $medium_details = $this->Master_Model->get_info_arr_fields('medium_name','medium_id', $list->medium_id, 'medium');
                      // $class_details = $this->Master_Model->get_info_arr_fields('class_name','class_id', $list->class_id, 'class');
                      // $batch_details = $this->Master_Model->get_info_arr_fields('batch_name','batch_id', $list->batch_id, 'batch');
                    ?>
                    <tr>
                      <td class="d-none"><?php echo $i; ?></td>
                      <td class="text-center">
                        <div class="btn-group">
                          <a href="<?php echo base_url() ?>Master/edit_slider/<?php echo $list->slider_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                          <a href="<?php echo base_url() ?>Master/delete_slider/<?php echo $list->slider_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Slider');"><i class="fa fa-trash text-danger"></i></a>
                        </div>
                      </td>
                      <td><?php echo $list->slider_title; ?></td>
                      <td><?php echo $list->slider_possition; ?></td>
                      <td><img width="100px" src="<?php echo base_url() ?>assets/images/slider/<?php echo $list->slider_image; ?>" alt="Slider Image"></td>
                      <td>
                        <?php if($list->slider_status == 0){ echo '<span class="text-danger">Inactive</span>'; }
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
