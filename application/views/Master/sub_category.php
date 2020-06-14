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
            <h4>Sub Category</h4>
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
                <h3 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Sub Category</h3>
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
                      <div class="form-group col-md-12 select_sm">
                        <label>Select Main Category</label>
                        <select class="form-control select2" name="main_category_id" id="main_category_id" data-placeholder="Select Main Category" required>
                          <option value="">Select Main Category</option>
                          <?php foreach ($main_category_list as $list1) { ?>
                            <option value="<?php echo  $list1->main_category_id; ?>" <?php if(isset($sub_category_info) && $sub_category_info['main_category_id'] == $list1->main_category_id){ echo 'selected'; } ?>><?php echo  $list1->main_category_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-12 ">
                        <label>Enter Sub Category Name</label>
                        <input type="text" class="form-control form-control-sm" name="sub_category_name" id="sub_category_name" value="<?php if(isset($sub_category_info)){ echo $sub_category_info['sub_category_name']; } ?>" placeholder="Enter Sub Category Name" required>
                      </div>
                      <div class="form-group col-md-12 ">
                        <label>Discription</label>
                        <textarea class="form-control form-control-sm" name="sub_category_desc" id="sub_category_desc" rows="3" required><?php if(isset($sub_category_info)){ echo $sub_category_info['sub_category_desc']; } ?></textarea>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Category Image</label>
                        <input type="file" class="form-control form-control-sm" name="sub_category_image" id="sub_category_image" >
                      </div>
                      <div class="form-group col-md-6">
                        <?php if(isset($sub_category_info) && $sub_category_info['sub_category_image']){ ?>
                          <label>Uploaded Slider Image</label><br>
                          <img width="200px" src="<?php echo base_url() ?>assets/images/category/<?php echo $sub_category_info['sub_category_image'];  ?>" alt="Slider Image">
                          <input type="hidden" name="old_sub_category_img" value="<?php echo $sub_category_info['sub_category_image']; ?>">
                        <?php } ?>
                      </div>
                    </div>
                    <div class="card-footer clearfix" style="display: block;">
                      <div class="row">
                        <div class="col-md-6 text-left">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="sub_category_status" id="sub_category_status" value="0" <?php if(isset($sub_category_info) && $sub_category_info['sub_category_status'] == 0){ echo 'checked'; } ?>>
                            <label for="sub_category_status" class="custom-control-label">Disable This Sub Category</label>
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
                <h3 class="card-title">List All Sub Category Information</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th>Sub Category Name</th>
                    <th>Main Category Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th class="wt_50">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; foreach ($sub_category_list as $list) { $i++;
                      $main_category_details = $this->Master_Model->get_info_arr_fields('main_category_name','main_category_id', $list->main_category_id, 'main_category');
                    ?>
                    <tr>
                      <td class="d-none"><?php echo $i; ?></td>
                      <td class="text-center">
                        <div class="btn-group">
                          <a href="<?php echo base_url() ?>Master/edit_sub_category/<?php echo $list->sub_category_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                          <a href="<?php echo base_url() ?>Master/delete_sub_category/<?php echo $list->sub_category_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Sub Category Information');"><i class="fa fa-trash text-danger"></i></a>
                        </div>
                      </td>
                      <td><?php echo $list->sub_category_name; ?></td>
                      <td><?php if($main_category_details){ echo $main_category_details[0]['main_category_name']; } ?></td>
                      <td><?php echo $list->sub_category_desc; ?></td>
                      <td><a target="_blank" href="<?php echo base_url() ?>assets/images/category/<?php echo $list->sub_category_image;?>"><?php echo $list->sub_category_image; ?></a></td>
                      <td>
                        <?php if($list->sub_category_status == 0){ echo '<span class="text-danger">Inactive</span>'; }
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
