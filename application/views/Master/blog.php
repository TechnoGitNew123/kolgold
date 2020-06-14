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
            <h4>Blog Information</h4>
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
                <h3 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Blog Information</h3>
                <div class="card-tools">
                  <?php if(!isset($update)){
                    echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                  } ?>
                </div>
              </div>
              <!--  -->
                <div class="card-body px-0 py-0" <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>>
                  <form class="input_form m-0" id="form_action" role="form" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="row p-4">
                      <div class="form-group col-md-12 select_sm">
                        <label>Select Blog Category</label>
                        <select class="form-control select2" name="blog_category" id="blog_category" data-placeholder="Select Blog Category">
                          <option value="">Select Blog Category</option>
                        </select>
                      </div>
                      <div class="form-group col-md-12 ">
                        <label>Enter Title of Blog</label>
                        <input type="text" class="form-control form-control-sm" name="blog_title" id="blog_title" value="<?php if(isset($blog_info)){ echo $blog_info['blog_title']; } ?>" placeholder="Enter Title of Blog" >
                      </div>
                      <div class="form-group col-md-12 select_sm">
                        <label>Discription</label>
                        <textarea class="form-control" name="blog_desc" id="blog_desc" rows="3"><?php if(isset($blog_info)){ echo $blog_info['blog_desc']; } ?></textarea>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Author Name</label>
                        <input type="text" class="form-control form-control-sm" name="blog_author" id="blog_author" value="<?php if(isset($blog_info)){ echo $blog_info['blog_author']; } ?>"  placeholder="Author Name" required >
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Publish Date</label>
                        <input type="text" class="form-control form-control-sm" name="blog_publish_date" value="<?php if(isset($blog_info)){ echo $blog_info['blog_publish_date']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" placeholder="Publish Date" Required >
                      </div>
                      <div class="form-group col-md-6">
                        <label>Blog Image</label>
                        <input type="file" class="form-control form-control-sm" name="blog_image" id="blog_image">
                      </div>
                      <div class="form-group col-md-6">
                        <?php if(isset($blog_info) && $blog_info['blog_image']){ ?>
                          <label>Uploaded Blog Image</label><br>
                          <img width="200px" src="<?php echo base_url() ?>assets/images/blog/<?php echo $blog_info['blog_image'];  ?>" alt="Blog Image">
                          <input type="hidden" name="old_blog_image" value="<?php echo $blog_info['blog_image']; ?>">
                        <?php } ?>
                      </div>
                      <div class="form-group col-md-12 select_sm">
                        <label>Enter Tags</label>
                        <textarea class="form-control" name="blog_tags" id="blog_tags" rows="3"><?php if(isset($blog_info)){ echo $blog_info['blog_tags']; } ?></textarea>
                      </div>
                    </div>
                    <div class="card-footer clearfix" style="display: block;">
                      <div class="row">
                        <div class="col-md-6 text-left">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="blog_status" id="blog_status" value="0" <?php if(isset($blog_info) && $blog_info['blog_status'] == 0){ echo 'checked'; } ?>>
                            <label for="blog_status" class="custom-control-label">Disable This Blog Information</label>
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
                <h3 class="card-title">List All Blog Information</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th>blog Title</th>
                    <th class="">Category</th>
                    <th class="">Description</th>
                    <th>Author </th>
                    <th class="wt_100">Publish Date</th>
                    <th class="">Images</th>
                    <th class="wt_50">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; foreach ($blog_list as $list) { $i++;
                      // $medium_details = $this->Master_Model->get_info_arr_fields('medium_name','medium_id', $list->medium_id, 'medium');
                      // $class_details = $this->Master_Model->get_info_arr_fields('class_name','class_id', $list->class_id, 'class');
                      // $batch_details = $this->Master_Model->get_info_arr_fields('batch_name','batch_id', $list->batch_id, 'batch');
                    ?>
                    <tr>
                      <td class="d-none"><?php echo $i; ?></td>
                      <td class="text-center">
                        <div class="btn-group">
                          <a href="<?php echo base_url() ?>Master/edit_blog/<?php echo $list->blog_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                          <a href="<?php echo base_url() ?>Master/delete_blog/<?php echo $list->blog_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Blog Information');"><i class="fa fa-trash text-danger"></i></a>
                        </div>
                      </td>
                      <td><?php echo $list->blog_title; ?></td>
                      <td><?php echo $list->blog_category; ?></td>
                      <td><?php echo $list->blog_desc; ?></td>
                      <td><?php echo $list->blog_author; ?></td>
                      <td><?php echo $list->blog_publish_date; ?></td>
                      <td><a target="_blank" href="<?php echo base_url() ?>assets/images/blog/<?php echo $list->blog_image; ?>"><?php echo $list->blog_image; ?></a></td>
                      <td>
                        <?php if($list->blog_status == 0){ echo '<span class="text-danger">Inactive</span>'; }
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
