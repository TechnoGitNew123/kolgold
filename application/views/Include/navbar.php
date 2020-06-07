<?php
  $coach_user_id = $this->session->userdata('coach_user_id');
  $coach_company_id = $this->session->userdata('coach_company_id');
  $coach_role_id = $this->session->userdata('coach_role_id');
  $company_info = $this->Master_Model->get_info_arr_fields('company_name','company_id', $coach_company_id, 'company');
  $user_info = $this->Master_Model->get_info_arr_fields('user_name','user_id', $coach_user_id, 'user');
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url(); ?>User/logout">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light"><?php echo $company_info[0]['company_name']; ?></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $user_info[0]['user_name']; ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>User/dashboard" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link head">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Company
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/company_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Company Information</p>
              </a>
            </li>
            <li class="nav-item">
              <a <?php if(isset($update_user)){ echo 'href="'.$act_link.'"'; } else{ ?> href="<?php echo base_url(); ?>User/user_information" <?php } ?> class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User Information</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link head">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Master
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a <?php if(isset($update_batch)){ echo 'href="'.$act_link.'"'; } else{ ?> href="<?php echo base_url(); ?>Master/batch_information" <?php } ?> class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Batch</p>
              </a>
            </li>
            <li class="nav-item">
              <a <?php if(isset($update_medium)){ echo 'href="'.$act_link.'"'; } else{ echo 'href="'.base_url().'Master/medium_information"'; }  ?> class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Medium</p>
              </a>
            </li>
            <li class="nav-item">
              <a <?php if(isset($update_class)){ echo 'href="'.$act_link.'"'; } else{ echo 'href="'.base_url().'Master/class_information"'; }  ?> class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Class</p>
              </a>
            </li>
            <li class="nav-item">
              <a <?php if(isset($update_student)){ echo 'href="'.$act_link.'"'; } else{ echo 'href="'.base_url().'Master/student_information"'; }  ?> class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Student</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a <?php if(isset($update_receipt)){ echo 'href="'.$act_link.'"'; } else{ echo 'href="'.base_url().'Master/receipt"'; } ?> class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Receipt</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a <?php if(isset($update_subject)){ echo 'href="'.$act_link.'"'; } else{ echo 'href="'.base_url().'Master/subject"'; } ?> class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Subject</p>
              </a>
            </li>
            <li class="nav-item">
              <a <?php if(isset($update_topic)){ echo 'href="'.$act_link.'"'; } else{ echo 'href="'.base_url().'Master/topic"'; } ?> class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Topic</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/student_report" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Student List Report</p>
              </a>
            </li> -->

            <!-- <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/download" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Topic Download</p>
              </a>
            </li> -->
          </ul>
        </li>
        <li class="nav-item">
          <a <?php if(isset($update_download_content)){ echo 'href="'.$act_link.'"'; } else{ echo 'href="'.base_url().'Master/download_content"'; } ?> class="nav-link">
            <i class="nav-icon fas fa-download"></i>
            <p>Download Content</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>Master/student_report" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Student List Report</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>Master/topic_report" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Topic List Report</p>
          </a>
        </li>
        <li class="nav-item">
          <a <?php if(isset($update_receipt)){ echo 'href="'.$act_link.'"'; } else{ echo 'href="'.base_url().'Master/receipt"'; } ?> class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Receipt</p>
          </a>
        </li>

      </nav>
    <!-- /.sidebar-menu -->
    </div>
  <!-- /.sidebar -->
  </aside>
