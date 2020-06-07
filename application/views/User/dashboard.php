<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1> Dashboard Information</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <hr>
        <h4 class="mb-3">Master Summary</h4>
        <div class="row">
          <!-- left column -->
          <div class="col-md-3 col-6">
            <a href="<?php echo base_url() ?>Master/medium_information">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tachometer-alt"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Medium</span>
                  <span class="info-box-number"><?php echo $medium_cnt; ?></span>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-6">
            <a href="<?php echo base_url() ?>Master/class_information">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Class</span>
                  <span class="info-box-number"><?php echo $class_cnt ?></span>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-6">
            <a href="<?php echo base_url() ?>Master/batch_information">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Batch</span>
                <span class="info-box-number"><?php echo $batch_cnt ?></span>
              </div>
            </div>
          </a>
          </div>
          <div class="col-md-3 col-6">
            <a href="<?php echo base_url() ?>Master/student_information">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Student</span>
                <span class="info-box-number"><?php echo $student_cnt ?></span>
              </div>
            </div>
          </a>
          </div>
        </div>

        <div class="row">
          <!-- left column -->
          <div class="col-md-3 col-6">
            <a href="<?php echo base_url() ?>Master/subject">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tachometer-alt"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Subject</span>
                  <span class="info-box-number"><?php echo $subject_cnt ?></span>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-6">
            <a href="<?php echo base_url() ?>Master/topic">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Topic</span>
                <span class="info-box-number"><?php echo $topic_cnt ?></span>
              </div>
            </div>
          </a>
          </div>
          <div class="col-md-3 col-6">
            <a href="<?php echo base_url() ?>Master/download_content">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Download Content</span>
                <span class="info-box-number"><?php echo $download_content_cnt ?></span>
              </div>
            </div>
          </a>
          </div>
          <div class="col-md-3 col-6">
            <a href="<?php echo base_url() ?>Master/receipt">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Receipt</span>
                <span class="info-box-number"><?php echo $receipt_cnt ?></span>
              </div>
            </div>
          </a>
          </div>

        </div>
        <hr>

      </div><!-- /.container-fluid -->
    </section>
  </div>

</body>
</html>
