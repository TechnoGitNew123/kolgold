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
            <h4>Main Category</h4>
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
                <h3 class="card-title">List All Main Category Information</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th>Order Id </th>
                    <th>Order Date</th>
                    <th>Order Amount</th>
                    <th>Shipping Address</th>
                    <th class="wt_50">Status</th>
                    <th>Print</th>
                  </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td class="d-none">1</td>
                      <td class="text-center">
                        <div class="btn-group">
                          <a href="<?php echo base_url() ?>Master/edit_student/2" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                          <a href="<?php echo base_url() ?>Master/delete_student/2" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Main Category Information');"><i class="fa fa-trash text-danger"></i></a>
                        </div>
                      </td>
                      <td>abc</td>
                      <td>abc</td>
                      <td>abc</td>
                      <td>abc</td>
                      <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Delivered</button>
                      </td>
                      <td>
                        <button type="button" class="btn btn-success" ><i class="fa fa-print" aria-hidden="true"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Delivery Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group col-md-12 select_sm">
          <label>Select Delivery Status</label>
          <select class="form-control select2" name="blog_category" id="blog_category" data-placeholder="Select Delivery Status">
            <option value="">Select Delivery Status</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
