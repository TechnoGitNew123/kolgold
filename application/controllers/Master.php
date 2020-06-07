<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Master extends CI_Controller{
    public function __construct(){
      parent::__construct();
      date_default_timezone_set('Asia/Kolkata');
    }

    // public function index(){
    //     $coach_user_id = $this->session->userdata('coach_user_id');
    //     echo $coach_user_id;
    // }

    // Save Batch....
  public function batch_information(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('batch_name', 'Batch Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $batch_status = $this->input->post('batch_status');
      if(!isset($batch_status)){ $batch_status = '1'; }
      $save_data = $_POST;
      $save_data['batch_status'] = $batch_status;
      $save_data['company_id'] = $coach_company_id;
      $save_data['batch_addedby'] = $coach_user_id;
      $save_data['batch_date'] = date('d-m-Y');
      $save_data['batch_time'] = date('h:i:s A');
      $batch_id = $this->Master_Model->save_data('batch', $save_data);

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/batch_information');
    }

    $data['batch_list'] = $this->Master_Model->get_list_by_id3($coach_company_id,'','','','','','','batch_id','DESC','batch');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/batch_information', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Batch...
  public function edit_batch($batch_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('batch_name', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $batch_status = $this->input->post('batch_status');
      if(!isset($batch_status)){ $batch_status = '1'; }
      $update_data = $_POST;
      $update_data['batch_status'] = $batch_status;
      $update_data['batch_addedby'] = $coach_user_id;
      $update_data['batch_date'] = date('d-m-Y');
      $update_data['batch_time'] = date('h:i:s A');
      $this->Master_Model->update_info('batch_id', $batch_id, 'batch', $update_data);

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/batch_information');
    }

    $batch_info = $this->Master_Model->get_info_arr('batch_id',$batch_id,'batch');
    if(!$batch_info){ header('location:'.base_url().'Master/batch_information'); }
    $data['update'] = 'update';
    $data['update_batch'] = 'update';
    $data['batch_info'] = $batch_info[0];
    $data['act_link'] = base_url().'Master/edit_batch/'.$batch_id;

    $data['batch_list'] = $this->Master_Model->get_list_by_id3($coach_company_id,'','','','','','','batch_id','DESC','batch');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/batch_information', $data);
    $this->load->view('Include/footer', $data);
  }

  //Delete Batch...
  public function delete_batch($batch_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('batch_id', $batch_id, 'batch');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/batch_information');
  }

/****************************** Medium *******************************/

  // Add Medium...
  public function medium_information(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('medium_name', 'Batch Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $medium_status = $this->input->post('medium_status');
      if(!isset($medium_status)){ $medium_status = '1'; }
      $save_data = $_POST;
      $save_data['medium_status'] = $medium_status;
      $save_data['company_id'] = $coach_company_id;
      $save_data['medium_addedby'] = $coach_user_id;
      $save_data['medium_date'] = date('d-m-Y');
      $save_data['medium_time'] = date('h:i:s A');
      $medium_id = $this->Master_Model->save_data('medium', $save_data);

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/medium_information');
    }

    $data['medium_list'] = $this->Master_Model->get_list_by_id3($coach_company_id,'','','','','','','medium_id','DESC','medium');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/medium_information', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Batch...
  public function edit_medium($medium_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('medium_name', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $medium_status = $this->input->post('medium_status');
      if(!isset($medium_status)){ $medium_status = '1'; }
      $update_data = $_POST;
      $update_data['medium_status'] = $medium_status;
      $update_data['medium_addedby'] = $coach_user_id;
      $update_data['medium_date'] = date('d-m-Y');
      $update_data['medium_time'] = date('h:i:s A');
      $this->Master_Model->update_info('medium_id', $medium_id, 'medium', $update_data);

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/medium_information');
    }

    $medium_info = $this->Master_Model->get_info_arr('medium_id',$medium_id,'medium');
    if(!$medium_info){ header('location:'.base_url().'Master/medium_information'); }
    $data['update'] = 'update';
    $data['update_medium'] = 'update';
    $data['medium_info'] = $medium_info[0];
    $data['act_link'] = base_url().'Master/edit_medium/'.$medium_id;

    $data['medium_list'] = $this->Master_Model->get_list_by_id3($coach_company_id,'','','','','','','medium_id','DESC','medium');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/medium_information', $data);
    $this->load->view('Include/footer', $data);
  }

  //Delete Batch...
  public function delete_medium($medium_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('medium_id', $medium_id, 'medium');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/medium_information');
  }


/*************************************** Class ****************************/

  // Save Class...
  public function class_information(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('class_name', 'Batch Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $class_status = $this->input->post('class_status');
      if(!isset($class_status)){ $class_status = '1'; }
      $save_data = $_POST;
      $save_data['class_status'] = $class_status;
      $save_data['company_id'] = $coach_company_id;
      $save_data['class_addedby'] = $coach_user_id;
      $save_data['class_date'] = date('d-m-Y');
      $save_data['class_time'] = date('h:i:s A');
      $class_id = $this->Master_Model->save_data('class', $save_data);

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/class_information');
    }
    $data['medium_list'] = $this->Master_Model->get_list_by_id3($coach_company_id,'medium_status','1','','','','','medium_id','ASC','medium');
    $data['class_list'] = $this->Master_Model->get_list_by_id3($coach_company_id,'','','','','','','class_id','DESC','class');

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/class_information', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Class...
  public function edit_class($class_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('class_name', 'Batch Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $class_status = $this->input->post('class_status');
      if(!isset($class_status)){ $class_status = '1'; }
      $update_data = $_POST;
      $update_data['class_status'] = $class_status;
      $update_data['class_addedby'] = $coach_user_id;
      $update_data['class_date'] = date('d-m-Y');
      $update_data['class_time'] = date('h:i:s A');
      $this->Master_Model->update_info('class_id', $class_id, 'class', $update_data);

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/class_information');
    }

    $class_info = $this->Master_Model->get_info_arr('class_id',$class_id,'class');
    if(!$class_info){ header('location:'.base_url().'Master/class_information'); }
    $data['update'] = 'update';
    $data['update_class'] = 'update';
    $data['class_info'] = $class_info[0];
    $data['act_link'] = base_url().'Master/edit_class/'.$class_id;

    $data['medium_list'] = $this->Master_Model->get_list_by_id3($coach_company_id,'medium_status','1','','','','','medium_id','ASC','medium');
    $data['class_list'] = $this->Master_Model->get_list_by_id3($coach_company_id,'','','','','','','class_id','DESC','class');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/class_information', $data);
    $this->load->view('Include/footer', $data);
  }

  //Delete Class...
  public function delete_class($class_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('class_id', $class_id, 'class');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/class_information');
  }

/************************************ Student ********************************/

  // Add Student...
  public function student_information(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('student_name', 'Batch Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $student_status = '0';
      if(!isset($_POST['student_status'])){ $student_status = '1'; }
      $save_data = $_POST;
      $save_data['student_status'] = $student_status;
      $save_data['company_id'] = $coach_company_id;
      $save_data['student_addedby'] = $coach_user_id;
      $save_data['student_date'] = date('d-m-Y');
      $save_data['student_time'] = date('h:i:s A');
      $student_id = $this->Master_Model->save_data('student', $save_data);

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/student_information');
    }

    $data['student_no'] = $this->Master_Model->get_count_no($coach_company_id, 'student_no', 'student');
    $data['academic_year_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'academic_year_status',1,'','','academic_year_id','ASC','academic_year');
    $data['medium_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'medium_status',1,'','','medium_id','ASC','medium');
    // $data['class_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'class_status',1,'','','class_id','ASC','class');
    $data['batch_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'batch_status',1,'','','batch_id','ASC','batch');

    $data['student_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'','','','','student_id','ASC','student');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/student_information', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Education Level...
  public function edit_student($student_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('student_name', 'Batch Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $student_status = '0';
      if(!isset($_POST['student_status'])){ $student_status = '1'; }
      $update_data = $_POST;
      $update_data['student_status'] = $student_status;
      $update_data['student_addedby'] = $coach_user_id;
      $update_data['student_date'] = date('d-m-Y');
      $update_data['student_time'] = date('h:i:s A');
      $this->Master_Model->update_info('student_id', $student_id, 'student', $update_data);

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/student_information');
    }

    $student_info = $this->Master_Model->get_info_arr('student_id',$student_id,'student');
    if(!$student_info){ header('location:'.base_url().'Master/student_information'); }
    $data['update'] = 'update';
    $data['update_student'] = 'update';
    $data['student_info'] = $student_info[0];
    $data['act_link'] = base_url().'Master/edit_student/'.$student_id;

    $medium_id = $student_info[0]['medium_id'];
    $data['academic_year_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'academic_year_status',1,'','','academic_year_id','ASC','academic_year');
    $data['medium_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'medium_status',1,'','','medium_id','ASC','medium');
    $data['class_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'class_status',1,'medium_id',$medium_id,'class_id','ASC','class');
    $data['batch_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'batch_status',1,'','','batch_id','ASC','batch');

    $data['student_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'','','','','student_id','ASC','student');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/student_information', $data);
    $this->load->view('Include/footer', $data);
  }

  //Delete Education Level...
  public function delete_student($student_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('student_id', $student_id, 'student');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/student_information');
  }


/************************************ Subject **********************************/

  // Add Subject...
  public function subject(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('subject_name', 'Batch Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $subject_status = '0';
      if(!isset($_POST['subject_status'])){ $subject_status = '1'; }
      $save_data = $_POST;
      $save_data['subject_status'] = $subject_status;
      $save_data['company_id'] = $coach_company_id;
      $save_data['subject_addedby'] = $coach_user_id;
      $save_data['subject_date'] = date('d-m-Y');
      $save_data['subject_time'] = date('h:i:s A');
      $subject_id = $this->Master_Model->save_data('subject', $save_data);

      if($_FILES['subject_logo']['name']){
        $time = time();
        $file_name = 'SubjectLogo_'.$subject_id.'_'.$time;
        $config['upload_path'] = 'assets/uploads/master/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $file_name;
        $filename = $_FILES['subject_logo']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('subject_logo') && $filename && $ext){
          $up_image['subject_logo'] = $file_name.'.'.$ext;
          $this->Master_Model->update_info('subject_id', $subject_id, 'subject', $up_image);
          $this->session->set_flashdata('upload_success','success');
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('upload_fail','upload_fail');
          $this->session->set_flashdata('upload_error',$error);
        }
      }

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/subject');
    }


    $data['medium_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'medium_status',1,'','','medium_id','ASC','medium');
    // $data['class_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'class_status',1,'','','class_id','ASC','class');
    $data['section_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'section_status',1,'','','section_id','ASC','section');

    $data['subject_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'','','','','subject_id','ASC','subject');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/subject', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Education Level...
  public function edit_subject($subject_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('subject_name', 'Batch Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $subject_status = '0';
      if(!isset($_POST['subject_status'])){ $subject_status = '1'; }
      $save_data = $_POST;
      unset($update_data['old_file']);
      $update_data['subject_status'] = $subject_status;
      $update_data['company_id'] = $coach_company_id;
      $update_data['subject_addedby'] = $coach_user_id;
      $update_data['subject_date'] = date('d-m-Y');
      $update_data['subject_time'] = date('h:i:s A');
      $this->Master_Model->update_info('subject_id', $subject_id, 'subject', $update_data);

      if($_FILES['subject_logo']['name']){
        $time = time();
        $file_name = 'SubjectLogo_'.$subject_id.'_'.$time;
        $config['upload_path'] = 'assets/uploads/master/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $file_name;
        $filename = $_FILES['subject_logo']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('subject_logo') && $filename && $ext){
          $up_image['subject_logo'] = $file_name.'.'.$ext;
          $this->Master_Model->update_info('subject_id', $subject_id, 'subject', $up_image);
          $old_file = $_POST['old_file'];
          if($old_file){ unlink("assets/uploads/master/".$old_file); }
          $this->session->set_flashdata('upload_success','success');
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('upload_fail','upload_fail');
          $this->session->set_flashdata('upload_error',$error);
        }
      }

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/subject');
    }

    $subject_info = $this->Master_Model->get_info_arr('subject_id',$subject_id,'subject');
    if(!$subject_info){ header('location:'.base_url().'Master/subject'); }
    $data['update'] = 'update';
    $data['update_subject'] = 'update';
    $data['subject_info'] = $subject_info[0];
    $data['act_link'] = base_url().'Master/edit_subject/'.$subject_id;

    $medium_id = $subject_info[0]['medium_id'];
    $data['medium_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'medium_status',1,'','','medium_id','ASC','medium');
    $data['class_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'class_status',1,'medium_id',$medium_id,'class_id','ASC','class');
    $data['section_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'section_status',1,'','','section_id','ASC','section');

    $data['subject_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'','','','','subject_id','ASC','subject');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/subject', $data);
    $this->load->view('Include/footer', $data);
  }

  //Delete Education Level...
  public function delete_subject($subject_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('subject_id', $subject_id, 'subject');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/subject');
  }

/************************************* Receipt *********************************/

  // Add Receipt...
  public function receipt(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('receipt_no', 'Receipt No', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $receipt_status = '0';
      if(!isset($_POST['receipt_status'])){ $receipt_status = '1'; }
      $save_data = $_POST;
      $save_data['receipt_status'] = $receipt_status;
      $save_data['company_id'] = $coach_company_id;
      $save_data['receipt_addedby'] = $coach_user_id;
      $save_data['receipt_date'] = date('d-m-Y');
      $save_data['receipt_time'] = date('h:i:s A');
      $receipt_id = $this->Master_Model->save_data('receipt', $save_data);

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/receipt');
    }

    $data['receipt_no'] = $this->Master_Model->get_count_no($coach_company_id, 'receipt_no', 'receipt');
    $data['academic_year_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'academic_year_status',1,'','','academic_year_id','ASC','academic_year');
    $data['medium_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'medium_status',1,'','','medium_id','ASC','medium');
    $data['class_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'class_status',1,'','','class_id','ASC','class');
    $data['batch_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'batch_status',1,'','','batch_id','ASC','batch');
    $data['student_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'','','','','student_id','ASC','student');

    $data['receipt_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'','','','','receipt_id','ASC','receipt');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/receipt', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Receipt...
  public function edit_receipt($receipt_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('receipt_no', 'Receipt No', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $receipt_status = '0';
      if(!isset($_POST['receipt_status'])){ $receipt_status = '1'; }
      $update_data = $_POST;
      $update_data['receipt_status'] = $receipt_status;
      $update_data['company_id'] = $coach_company_id;
      $update_data['receipt_addedby'] = $coach_user_id;
      $update_data['receipt_date'] = date('d-m-Y');
      $update_data['receipt_time'] = date('h:i:s A');
      $this->Master_Model->update_info('receipt_id', $receipt_id, 'receipt', $update_data);

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/receipt');
    }

    $receipt_info = $this->Master_Model->get_info_arr('receipt_id',$receipt_id,'receipt');
    if(!$receipt_info){ header('location:'.base_url().'Master/receipt'); }
    $data['update'] = 'update';
    $data['update_receipt'] = 'update';
    $data['receipt_info'] = $receipt_info[0];
    $data['act_link'] = base_url().'Master/edit_receipt/'.$receipt_id;

    $data['academic_year_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'academic_year_status',1,'','','academic_year_id','ASC','academic_year');
    $data['medium_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'medium_status',1,'','','medium_id','ASC','medium');
    $data['class_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'class_status',1,'','','class_id','ASC','class');
    $data['batch_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'batch_status',1,'','','batch_id','ASC','batch');
    $data['student_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'','','','','student_id','ASC','student');

    $data['receipt_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'','','','','receipt_id','ASC','receipt');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/receipt', $data);
    $this->load->view('Include/footer', $data);
  }

  //Delete Receipt...
  public function delete_receipt($receipt_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('receipt_id', $receipt_id, 'receipt');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/receipt');
  }

/******************************************** Topic *********************************/

  // Add Topic...
  public function topic(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('topic_name', 'Topic Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      // $topic_status = '0';
      // if(!isset($_POST['topic_status'])){ $topic_status = '1'; }
      $save_data = $_POST;
      // $save_data['topic_status'] = $topic_status;
      $save_data['company_id'] = $coach_company_id;
      $save_data['topic_addedby'] = $coach_user_id;
      $save_data['topic_date'] = date('d-m-Y');
      $save_data['topic_time'] = date('h:i:s A');
      $topic_id = $this->Master_Model->save_data('topic', $save_data);

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/topic');
    }

    $data['section_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'section_status',1,'','','section_id','ASC','section');
    $data['medium_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'medium_status',1,'','','medium_id','ASC','medium');
    // $data['class_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'class_status',1,'','','class_id','ASC','class');
    $data['batch_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'batch_status',1,'','','batch_id','ASC','batch');
    // $data['subject_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'subject_status',1,'','','subject_id','ASC','subject');

    $data['topic_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'','','','','topic_id','ASC','topic');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/topic', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Topic...
  public function edit_topic($topic_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('topic_name', 'Topic Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data = $_POST;
      $update_data['company_id'] = $coach_company_id;
      $update_data['topic_addedby'] = $coach_user_id;
      $update_data['topic_date'] = date('d-m-Y');
      $update_data['topic_time'] = date('h:i:s A');
      $this->Master_Model->update_info('topic_id', $topic_id, 'topic', $update_data);

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/topic');
    }

    $topic_info = $this->Master_Model->get_info_arr('topic_id',$topic_id,'topic');
    if(!$topic_info){ header('location:'.base_url().'Master/topic'); }
    $data['update'] = 'update';
    $data['update_topic'] = 'update';
    $data['topic_info'] = $topic_info[0];
    $data['act_link'] = base_url().'Master/edit_topic/'.$topic_id;

    $medium_id = $topic_info[0]['medium_id'];
    $class_id = $topic_info[0]['class_id'];
    $data['section_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'section_status',1,'','','section_id','ASC','section');
    $data['medium_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'medium_status',1,'','','medium_id','ASC','medium');
    $data['class_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'class_status',1,'medium_id',$medium_id,'class_id','ASC','class');
    $data['batch_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'batch_status',1,'','','batch_id','ASC','batch');
    $data['subject_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'subject_status',1,'class_id',$class_id,'subject_id','ASC','subject');

    $data['topic_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'','','','','topic_id','ASC','topic');

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/topic', $data);
    $this->load->view('Include/footer', $data);
  }

  //Delete Topic...
  public function delete_topic($topic_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('topic_id', $topic_id, 'topic');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/topic');
  }


/*********************** Topic Content ************************/
  // Add Topic...
  public function topic_content($topic_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('topic_content_pub_date', 'Date', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data = $_POST;
      $topic_content_pub_date = $_POST['topic_content_pub_date'];
      $topic_content_pub_time = $_POST['topic_content_pub_time'];
      $save_data['topic_content_datetime'] = $topic_content_pub_date.' '.$topic_content_pub_time;
      $save_data['topic_id'] = $topic_id;
      $save_data['company_id'] = $coach_company_id;
      $save_data['topic_content_addedby'] = $coach_user_id;
      $save_data['topic_content_date'] = date('d-m-Y');
      $save_data['topic_content_time'] = date('h:i:s A');
      $topic_content_id = $this->Master_Model->save_data('topic_content', $save_data);

      if(isset($_FILES['topic_content_file']['name'])){
        $time = time();
        $file_name = 'TopicContent'.$topic_id.'_'.$topic_content_id.'_'.$time;
        $config['upload_path'] = 'assets/uploads/topic_content/';
        $config['allowed_types'] = 'wmv|mp4';
        $config['file_name'] = $file_name;
        $filename = $_FILES['topic_content_file']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('topic_content_file') && $filename && $ext){
          $up_image['topic_content_file'] = $file_name.'.'.$ext;
          $this->Master_Model->update_info('topic_content_id', $topic_content_id, 'topic_content', $up_image);
          $this->session->set_flashdata('save_success','success');
          $this->session->set_flashdata('upload_success','success');
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('upload_fail','upload_fail');
          $this->session->set_flashdata('upload_error',$error);
        }
      }

      header('location:'.base_url().'Master/topic_content/'.$topic_id);
    }

    $topic_info = $this->Master_Model->get_info_arr('topic_id',$topic_id,'topic');
    if(!$topic_info){ header('location:'.base_url().'Master/topic'); }
    // $data['update'] = 'update';
    $data['update_topic'] = 'update';
    $data['topic_info'] = $topic_info[0];
    $data['act_link'] = base_url().'Master/topic_content/'.$topic_id;

    $data['academic_year_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'academic_year_status',1,'','','academic_year_id','ASC','academic_year');
    $data['section_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'section_status',1,'','','section_id','ASC','section');
    $data['medium_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'medium_status',1,'','','medium_id','ASC','medium');
    $data['class_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'class_status',1,'','','class_id','ASC','class');
    $data['batch_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'batch_status',1,'','','batch_id','ASC','batch');
    $data['subject_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'subject_status',1,'','','subject_id','ASC','subject');

    $data['topic_content_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'','','','','topic_content_id','ASC','topic_content');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/topic_content', $data);
    $this->load->view('Include/footer', $data);
  }

  public function edit_topic_content($topic_content_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $topic_details = $this->Master_Model->get_info_arr_fields('topic_id','topic_content_id', $topic_content_id, 'topic_content');
    if(!$topic_details){ header('location:'.base_url().'Master/topic'); }
    $topic_id = $topic_details[0]['topic_id'];

    $this->form_validation->set_rules('topic_content_pub_date', 'Date', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data = $_POST;
      unset($update_data['old_file']);
      $topic_content_pub_date = $_POST['topic_content_pub_date'];
      $topic_content_pub_time = $_POST['topic_content_pub_time'];
      $update_data['topic_content_datetime'] = $topic_content_pub_date.' '.$topic_content_pub_time;
      $update_data['topic_content_addedby'] = $coach_user_id;
      $update_data['topic_content_date'] = date('d-m-Y');
      $update_data['topic_content_time'] = date('h:i:s A');
      $this->Master_Model->update_info('topic_content_id', $topic_content_id, 'topic_content', $update_data);

      if($_FILES['topic_content_file']['name']){
        $time = time();
        $file_name = 'TopicContent'.$topic_id.'_'.$topic_content_id.'_'.$time;
        $config['upload_path'] = 'assets/uploads/topic_content/';
        $config['allowed_types'] = 'wmv|mp4';
        $config['file_name'] = $file_name;
        $filename = $_FILES['topic_content_file']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('topic_content_file') && $filename && $ext){
          $up_image['topic_content_file'] = $file_name.'.'.$ext;
          $this->Master_Model->update_info('topic_content_id', $topic_content_id, 'topic_content', $up_image);
          $old_file = $_POST['old_file'];
          if($old_file){ unlink("assets/uploads/topic_content/".$old_file); }
          $this->session->set_flashdata('upload_success','success');
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('upload_fail','upload_fail');
          $this->session->set_flashdata('upload_error',$error);
        }
      }

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/topic_content/'.$topic_id);
    }

    $topic_info = $this->Master_Model->get_info_arr('topic_id',$topic_id,'topic');
    if(!$topic_info){ header('location:'.base_url().'Master/topic'); }
    $data['update'] = 'update';
    $data['update_topic'] = 'update';
    $data['topic_info'] = $topic_info[0];

    $topic_content_info = $this->Master_Model->get_info_arr('topic_content_id',$topic_content_id,'topic_content');
    if(!$topic_content_info){ header('location:'.base_url().'Master/topic'); }
    $data['topic_content_info'] = $topic_content_info[0];

    $data['act_link'] = base_url().'Master/topic_content/'.$topic_id;

    $data['academic_year_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'academic_year_status',1,'','','academic_year_id','ASC','academic_year');
    $data['section_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'section_status',1,'','','section_id','ASC','section');
    $data['medium_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'medium_status',1,'','','medium_id','ASC','medium');
    $data['class_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'class_status',1,'','','class_id','ASC','class');
    $data['batch_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'batch_status',1,'','','batch_id','ASC','batch');
    $data['subject_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'subject_status',1,'','','subject_id','ASC','subject');

    $data['topic_content_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'','','','','topic_content_id','ASC','topic_content');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/topic_content', $data);
    $this->load->view('Include/footer', $data);
  }

  //Delete Topic...
  public function delete_topic_content($topic_content_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $topic_containt_details = $this->Master_Model->get_info_arr('topic_content_id',$topic_content_id,'topic_content');
    if(!$topic_containt_details){ header('location:'.base_url().'Master/topic'); }
    $topic_id = $topic_containt_details[0]['topic_id'];
    $topic_content_file = $topic_containt_details[0]['topic_content_file'];
    if($topic_content_file){ unlink("assets/uploads/topic_content/".$topic_content_file); }
    $this->Master_Model->delete_info('topic_content_id', $topic_content_id, 'topic_content');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/topic_content/'.$topic_id);
  }


/*********************** Download Content ************************/
  // Add Download Content......
  public function download_content(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('download_content_desc', 'Desc', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data = $_POST;
      $save_data['company_id'] = $coach_company_id;
      $save_data['download_content_addedby'] = $coach_user_id;
      $save_data['download_content_date'] = date('d-m-Y');
      $save_data['download_content_time'] = date('h:i:s A');
      $download_content_id = $this->Master_Model->save_data('download_content', $save_data);

      if(isset($_FILES['download_content_file']['name'])){
        $time = time();
        $file_name = 'DownloadContent_'.$download_content_id.'_'.$time;
        $config['upload_path'] = 'assets/uploads/download_content/';
        $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip';
        $config['file_name'] = $file_name;
        $filename = $_FILES['download_content_file']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('download_content_file') && $filename && $ext){
          $up_image['download_content_file'] = $file_name.'.'.$ext;
          $this->Master_Model->update_info('download_content_id', $download_content_id, 'download_content', $up_image);
          $this->session->set_flashdata('save_success','success');
          $this->session->set_flashdata('upload_success','success');
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('upload_fail','upload_fail');
          $this->session->set_flashdata('upload_error',$error);
        }
      }
      header('location:'.base_url().'Master/download_content');
    }

    $data['academic_year_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'academic_year_status',1,'','','academic_year_id','ASC','academic_year');
    $data['medium_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'medium_status',1,'','','medium_id','ASC','medium');
    $data['class_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'class_status',1,'','','class_id','ASC','class');
    $data['batch_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'batch_status',1,'','','batch_id','ASC','batch');
    // $data['subject_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'subject_status',1,'','','subject_id','ASC','subject');
    // $data['topic_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'topic_status',1,'','','topic_id','ASC','topic');

    $data['download_content_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'','','','','download_content_id','ASC','download_content');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/download_content', $data);
    $this->load->view('Include/footer', $data);
  }


  //Edit/Update Download Content...
  public function edit_download_content($download_content_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $download_details = $this->Master_Model->get_info_arr_fields('topic_id','download_content_id', $download_content_id, 'download_content');
    if(!$download_details){ header('location:'.base_url().'Master/download'); }
    $topic_id = $download_details[0]['topic_id'];

    $this->form_validation->set_rules('download_content_desc', 'Desc', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data = $_POST;
      unset($update_data['old_file']);
      $update_data['download_content_addedby'] = $coach_user_id;
      $update_data['download_content_date'] = date('d-m-Y');
      $update_data['download_content_time'] = date('h:i:s A');
      $this->Master_Model->update_info('download_content_id', $download_content_id, 'download_content', $update_data);

      if(isset($_FILES['download_content_file']['name'])){
        $time = time();
        $file_name = 'DownloadContent_'.$download_content_id.'_'.$time;
        $config['upload_path'] = 'assets/uploads/download_content/';
        $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx';
        $config['file_name'] = $file_name;
        $filename = $_FILES['download_content_file']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('download_content_file') && $filename && $ext){
          $up_image['download_content_file'] = $file_name.'.'.$ext;
          $this->Master_Model->update_info('download_content_id', $download_content_id, 'download_content', $up_image);
          $old_file = $_POST['old_file'];
          if($old_file){ unlink("assets/uploads/download_content/".$old_file); }
          $this->session->set_flashdata('update_success','success');
          $this->session->set_flashdata('upload_success','success');
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('upload_fail','upload_fail');
          $this->session->set_flashdata('upload_error',$error);
        }
      }

      header('location:'.base_url().'Master/download_content');
    }

    $download_content_info = $this->Master_Model->get_info_arr('download_content_id',$download_content_id,'download_content');
    if(!$download_content_info){ header('location:'.base_url().'Master/download_content'); }
    $data['update'] = 'update';
    $data['update_download_content'] = 'update';
    $data['download_content_info'] = $download_content_info[0];
    $data['act_link'] = base_url().'Master/edit_download_content/'.$download_content_id;
    $medium_id = $download_content_info[0]['medium_id'];
    // $data['section_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'section_status',1,'','','section_id','ASC','section');
    $data['academic_year_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'academic_year_status',1,'','','academic_year_id','ASC','academic_year');
    $data['medium_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'medium_status',1,'','','medium_id','ASC','medium');
    $data['class_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'class_status',1,'medium_id',$medium_id,'class_id','ASC','class');
    $data['batch_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'batch_status',1,'','','batch_id','ASC','batch');
    // $data['subject_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'subject_status',1,'','','subject_id','ASC','subject');
    // $data['topic_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'topic_status',1,'','','topic_id','ASC','topic');

    $data['download_content_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'','','','','download_content_id','ASC','download_content');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/download_content', $data);
    $this->load->view('Include/footer', $data);
  }

  //Delete Download Content...
  public function delete_download_content($download_content_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $download_containt_details = $this->Master_Model->get_info_arr('download_content_id',$download_content_id,'download_content');
    if(!$download_containt_details){ header('location:'.base_url().'Master/download'); }
    $download_content_file = $download_containt_details[0]['download_content_file'];
    if($download_content_file){ unlink("assets/uploads/download_content/".$download_content_file); }
    $this->Master_Model->delete_info('download_content_id', $download_content_id, 'download_content');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/download_content');
  }

/************************************* Student Report *****************************/

  public function student_report(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('academic_year_id', 'Academic Year', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $academic_year_id = $this->input->post('academic_year_id');
      $medium_id = $this->input->post('medium_id');
      $class_id = $this->input->post('class_id');
      $batch_id = $this->input->post('batch_id');
      $data['student_list'] = $this->Master_Model->student_report_list($academic_year_id,$medium_id,$class_id,$batch_id);
    }

    else{
      $data['student_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'','','','','student_id','ASC','student');
    }

    $data['academic_year_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'academic_year_status',1,'','','academic_year_id','ASC','academic_year');
    $data['medium_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'medium_status',1,'','','medium_id','ASC','medium');
    // $data['class_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'class_status',1,'','','class_id','ASC','class');
    $data['batch_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'batch_status',1,'','','batch_id','ASC','batch');

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/student_report', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Education Level...
  public function edit_student_report($student_report_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/student_report');
    $this->load->view('Include/footer');
  }

  //Delete Education Level...
  public function delete_student_report($student_report_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('student_report_id', $student_report_id, 'student_report');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/student_report');
  }



  /************************************* Student Report *****************************/

    public function topic_report(){
      $coach_user_id = $this->session->userdata('coach_user_id');
      $coach_company_id = $this->session->userdata('coach_company_id');
      $coach_role_id = $this->session->userdata('coach_role_id');
      if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

        $this->form_validation->set_rules('section_id', 'Academic Year', 'trim|required');
        if ($this->form_validation->run() != FALSE) {
        $section_id = $this->input->post('section_id');
        $medium_id = $this->input->post('medium_id');
        $class_id = $this->input->post('class_id');
        $subject_id = $this->input->post('subject_id');
        $data['topic_list'] = $this->Master_Model->topic_report_list($section_id,$medium_id,$class_id,$subject_id);

      } else{
        $data['topic_list'] = $this->Master_Model->topic_report_list_all($coach_company_id);
        }
      $data['medium_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'medium_status',1,'','','medium_id','ASC','medium');
      $data['section_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'section_status',1,'','','section_id','ASC','section');
      $data['batch_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'batch_status',1,'','','batch_id','ASC','batch');
      $data['section_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'section_status',1,'','','section_id','ASC','section');
      $data['subject_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'subject_status',1,'','','subject_id','ASC','subject');

      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('Master/topic_report', $data);
      $this->load->view('Include/footer', $data);
    }

    // Edit/Update Education Level...
    public function edit_topic_report($topic_report_id){
      $coach_user_id = $this->session->userdata('coach_user_id');
      $coach_company_id = $this->session->userdata('coach_company_id');
      $coach_role_id = $this->session->userdata('coach_role_id');
      if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('Master/topic_report');
      $this->load->view('Include/footer');
    }

    //Delete Education Level...
    public function delete_topic_report($topic_report_id){
      $coach_user_id = $this->session->userdata('coach_user_id');
      $coach_company_id = $this->session->userdata('coach_company_id');
      $coach_role_id = $this->session->userdata('coach_role_id');
      if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
      $this->Master_Model->delete_info('topic_report_id', $topic_report_id, 'topic_report');
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Master/topic_report');
    }

/*******************************  Check Duplication  ****************************/
  public function check_duplication(){
    $column_name = $this->input->post('column_name');
    $column_val = $this->input->post('column_val');
    $table_name = $this->input->post('table_name');
    $company_id = '';
    $cnt = $this->Master_Model->check_duplication($company_id,$column_val,$column_name,$table_name);
    echo $cnt;
  }
}
?>
