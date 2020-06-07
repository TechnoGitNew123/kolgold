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
            <h4>Medium Information</h4>
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
              <div class="col-md-5">
                <div class="card card-default">
                  <div class="card-header">
                    <h5 class="card-title f-16"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Medium</h5>
                  </div>
                  <form class="m-0 input_form" id="form_action" role="form" action="" method="post" autocomplete="off">
                    <div class="card-body row">
                      <div class="form-group col-md-12">
                        <label>Enter Medium Name</label>
                        <input type="text" class="form-control form-control-sm" name="medium_name" id="medium_name" value="<?php if(isset($medium_info)){ echo $medium_info['medium_name']; } ?>" placeholder="Enter Medium Name" required>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group ">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="medium_status" id="medium_status" value="0" <?php if(isset($medium_info) && $medium_info['medium_status'] == 0){ echo 'checked'; } ?>>
                            <label for="medium_status" class="custom-control-label">Disable This</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer form-group col-md-12 text-right m-0">
                      <a href="<?php base_url(); ?>Master/medium_information" class="btn btn-sm btn-default px-4 mx-4">Cancel</a>
                      <?php if(isset($update)){
                        echo '<button class="btn btn-sm btn-primary float-right px-4">Update</button>';
                      } else{
                        echo '<button class="btn btn-sm btn-success float-right px-4">Add</button>';
                      } ?>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-md-7">
                <div class="card card-default">
                  <div class="card-header">
                    <h5 class="card-title f-16">List All Medium</h5>
                  </div>
                  <div class="card-body pt-0">

                    <table id="example2" class="table table-striped">
                      <thead>
                      <tr>
                        <th style="display:none;">#</th>
                        <th>Name</th>
                        <th class="wt_50">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; foreach ($medium_list as $list) { $i++; ?>
                          <tr>
                            <td style="display:none;"><?php echo $i; ?></td>
                            <td><?php echo $list->medium_name; ?></td>
                            <td class="text-center">
                              <div class="btn-group">
                                <a href="<?php echo base_url(); ?>Master/edit_medium/<?php echo $list->medium_id; ?>" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                                <a href="<?php echo base_url(); ?>Master/delete_medium/<?php echo $list->medium_id; ?>" class="btn btn-sm btn-default" onclick="return confirm('Delete this Medium');" ><i class="fa fa-trash text-danger"></i></a>
                              </div>
                            </td>
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
