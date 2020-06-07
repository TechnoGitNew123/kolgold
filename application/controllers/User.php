<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
  public function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Kolkata');
  }

  public function logout(){
    $this->session->sess_destroy();
    header('location:'.base_url().'User');
  }

/**************************      Login      ********************************/
  public function index(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){
      $this->form_validation->set_rules('mobile', 'Mobile No', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      if ($this->form_validation->run() == FALSE) {
      	$this->load->view('User/login');
      } else{
        $mobile = $this->input->post('mobile');
        $password = $this->input->post('password');

        $login = $this->User_Model->check_login($mobile, $password);
        // print_r($login);
        if($login == null){
          $this->session->set_flashdata('msg','login_error');
          header('location:'.base_url().'User');
        } else{
          // echo 'null not';
          $this->session->set_userdata('coach_user_id', $login[0]['user_id']);
          $this->session->set_userdata('coach_company_id', $login[0]['company_id']);
          $this->session->set_userdata('coach_role_id', $login[0]['role_id']);
          // $this->session->set_userdata('branch_id', $login[0]['branch_id']);
          header('location:'.base_url().'User/dashboard');
        }
      }
    }
    else{
      header('location:'.base_url().'User/dashboard');
    }
  }

/**************************      Dashboard      ********************************/
  public function dashboard(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $company_id = '';

    $data['medium_cnt'] = $this->Master_Model->get_count('medium_id', $company_id,'','','','','','','medium');
    $data['class_cnt'] = $this->Master_Model->get_count('class_id', $company_id,'','','','','','','class');
    $data['batch_cnt'] = $this->Master_Model->get_count('batch_id', $company_id,'','','','','','','batch');
    $data['student_cnt'] = $this->Master_Model->get_count('student_id', $company_id,'','','','','','','student');
    $data['subject_cnt'] = $this->Master_Model->get_count('subject_id', $company_id,'','','','','','','subject');
    $data['topic_cnt'] = $this->Master_Model->get_count('topic_id', $company_id,'','','','','','','topic');
    $data['download_content_cnt'] = $this->Master_Model->get_count('download_content_id', $company_id,'','','','','','','download_content');
    $data['receipt_cnt'] = $this->Master_Model->get_count('receipt_id', $company_id,'','','','','','','receipt');

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/dashboard', $data);
    $this->load->view('Include/footer', $data);
  }

/**************************      Company Information      ********************************/

  // Company List...
  public function company_information_list(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $data['company_list'] = $this->Master_Model->get_list($coach_company_id,'company_id','ASC','company');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/company_information_list', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit Company...
  public function edit_company($company_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('company_name', 'company_name', 'trim|required');
    $this->form_validation->set_rules('company_address', 'company_address', 'trim|required');

    if ($this->form_validation->run() != FALSE) {
      $up_data = $_POST;
      $this->Master_Model->update_info('company_id', $company_id, 'company', $up_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/company_information_list');
    }
    $company_info = $this->Master_Model->get_info('company_id', $company_id, 'company');
    $data['country_list'] = $this->Master_Model->get_list('','country_name','ASC','country');
    $data['state_list'] = $this->Master_Model->get_list('','state_name','ASC','state');
    $data['district_list'] = $this->Master_Model->get_list('','district_name','ASC','district');

    // $company_info = $this->Master_Model->get_info_arr('company_id',$company_id,'company');
    // if(!$company_info){ header('location:'.base_url().'User/company_information_list'); }
    // $data['update'] = 'update';
    // $data['update_company'] = 'update';
    // $data['company_info'] = $company_info[0];
    // $data['act_link'] = base_url().'User/edit_company/'.$company_id;


    if($company_info){
      foreach($company_info as $info){
        $data['update'] = 'update';
        $data['company_id'] = $info->company_id;
        $data['company_name'] = $info->company_name;
        $data['company_address'] = $info->company_address;
        $data['country_id'] = $info->country_id;
        $data['state_id'] = $info->state_id;
        $data['company_statecode'] = $info->company_statecode;
        $data['company_mob1'] = $info->company_mob1;
        $data['company_mob2'] = $info->company_mob2;
        $data['company_email'] = $info->company_email;
        $data['company_website'] = $info->company_website;
        $data['company_pan_no'] = $info->company_pan_no;
        $data['company_gst_no'] = $info->company_gst_no;
        $data['company_cin_no'] = $info->company_cin_no;
        $data['company_iec_no'] = $info->company_iec_no;
      }
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/company_information', $data);
      $this->load->view('Include/footer', $data);
    }
  }


/*******************************    User Information      ****************************/

  // Add User...
  public function user_information(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' || $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('user_name', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $user_status = $this->input->post('user_status');
      if(!isset($user_status)){ $user_status = '1'; }
      $save_data = $_POST;
      $save_data['user_status'] = $user_status;
      $save_data['company_id'] = $coach_company_id;
      $save_data['user_addedby'] = $coach_user_id;
      $save_data['user_date'] = date('d-m-Y');
      $save_data['user_time'] = date('h:i:s A');
      $user_id = $this->Master_Model->save_data('user', $save_data);

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'User/user_information');
    }

    $data['user_list'] = $this->Master_Model->get_list_by_id3($coach_company_id,'is_admin','0','','','','','user_id','ASC','user');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/user_information', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Education Level...
  public function edit_user($user_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' || $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('user_name', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $user_status = $this->input->post('user_status');
      if(!isset($user_status)){ $user_status = '1'; }
      $update_data = $_POST;
      $update_data['user_status'] = $user_status;
      $update_data['user_addedby'] = $coach_user_id;
      $update_data['user_date'] = date('d-m-Y');
      $update_data['user_time'] = date('h:i:s A');
      $this->Master_Model->update_info('user_id', $user_id, 'user', $update_data);

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/user_information');
    }

    $user_info = $this->Master_Model->get_info_arr('user_id',$user_id,'user');
    if(!$user_info){ header('location:'.base_url().'User/user_information'); }
    $data['update'] = 'update';
    $data['update_user'] = 'update';
    $data['user_info'] = $user_info[0];
    $data['act_link'] = base_url().'User/edit_user/'.$user_id;

    $data['user_list'] = $this->Master_Model->get_list_by_id3($coach_company_id,'is_admin','0','','','','','user_id','ASC','user');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/user_information', $data);
    $this->load->view('Include/footer', $data);
  }

  //Delete Education Level...
  public function delete_user($user_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' || $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('user_id', $user_id, 'user');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'User/user_information');
  }




  // // User List....
  // public function user_list(){
  //   $coach_user_id = $this->session->userdata('coach_user_id');
  //   $coach_company_id = $this->session->userdata('coach_company_id');
  //   $coach_role_id = $this->session->userdata('coach_role_id');
  //   if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
  //   $data['user_list'] = $this->User_Model->user_list($coach_company_id);
  //   $this->load->view('Include/head',$data);
  //   $this->load->view('Include/navbar',$data);
  //   $this->load->view('User/user_list',$data);
  //   $this->load->view('Include/footer',$data);
  // }
  //
  // // Add New User....
  // public function add_user(){
  //   $coach_user_id = $this->session->userdata('coach_user_id');
  //   $coach_company_id = $this->session->userdata('coach_company_id');
  //   $coach_role_id = $this->session->userdata('coach_role_id');
  //   if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
  //   $this->form_validation->set_rules('user_name', 'First Name', 'trim|required');
  //   if ($this->form_validation->run() != FALSE) {
  //     $user_status = $this->input->post('user_status');
  //     if(!isset($user_status)){ $user_status = '1'; }
  //     $save_data = $_POST;
  //     $save_data['user_status'] = $user_status;
  //     $save_data['company_id'] = $coach_company_id;
  //     $save_data['user_addedby'] = $coach_user_id;
  //     $save_data['user_date'] = date('d-m-Y h:i:s A');
  //     $user_id = $this->Master_Model->save_data('user', $save_data);
  //
  //     if(isset($_FILES['user_file_name']['name'])){
  //       $this->load->library('upload');
  //       $files = $_FILES;
  //       $cpt = count($_FILES['user_file_name']['name']);
  //       for($i=0; $i<$cpt; $i++)
  //       {
  //         $j = $i+1;
  //         $time = time();
  //         $image_name = 'user_'.$user_id.'_'.$j.'_'.$time;
  //           $_FILES['user_file_name']['name']= $files['user_file_name']['name'][$i];
  //           $_FILES['user_file_name']['type']= $files['user_file_name']['type'][$i];
  //           $_FILES['user_file_name']['tmp_name']= $files['user_file_name']['tmp_name'][$i];
  //           $_FILES['user_file_name']['error']= $files['user_file_name']['error'][$i];
  //           $_FILES['user_file_name']['size']= $files['user_file_name']['size'][$i];
  //           $config['upload_path'] = 'assets/images/user/';
  //           $config['allowed_types'] = 'gif|jpg|png|pdf|docx|ppt';
  //           $config['file_name'] = $image_name;
  //           $config['overwrite']     = FALSE;
  //           $filename = $files['user_file_name']['name'][$i];
  //           $ext = pathinfo($filename, PATHINFO_EXTENSION);
  //           $this->upload->initialize($config);
  //           if($this->upload->do_upload('user_file_name')){
  //             $file_data['user_id'] = $user_id;
  //             $file_data['user_file_name'] = $image_name.'.'.$ext;
  //             $this->Master_Model->save_data('user_file', $file_data);
  //           }
  //           else{
  //             $error = $this->upload->display_errors();
  //             $this->session->set_flashdata('status',$this->upload->display_errors());
  //           }
  //       }
  //     }
  //
  //
  //     $this->session->set_flashdata('save_success','success');
  //     header('location:'.base_url().'User/user_list');
  //   }
  //   $data['group_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'','','','','group_name','ASC','group');get_list_by_id('company_id',$coach_company_id,'','','group_name','ASC','group');
  //   $data['role_list'] = $this->Master_Model->get_list_by_id2('','','','','','role_name','ASC','role');
  //   $data['branch_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'','','','','branch_name','ASC','branch');
  //   $this->load->view('Include/head', $data);
  //   $this->load->view('Include/navbar', $data);
  //   $this->load->view('User/user', $data);
  //   $this->load->view('Include/footer', $data);
  // }
  //
  // // Edit User....
  // public function edit_user($user_id){
  //   $coach_user_id = $this->session->userdata('coach_user_id');
  //   $coach_company_id = $this->session->userdata('coach_company_id');
  //   $coach_role_id = $this->session->userdata('coach_role_id');
  //   if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
  //   $this->form_validation->set_rules('user_name', 'First Name', 'trim|required');
  //   if ($this->form_validation->run() != FALSE) {
  //     $user_status = $this->input->post('user_status');
  //     if(!isset($user_status)){ $user_status = '1'; }
  //     $update_data = $_POST;
  //     unset($update_data['old_img']);
  //     $update_data['user_status'] = $user_status;
  //     $update_data['company_id'] = $coach_company_id;
  //     $update_data['user_addedby'] = $coach_user_id;
  //     $update_data['user_date'] = date('d-m-Y h:i:s A');
  //     $this->Master_Model->update_info('user_id', $user_id, 'user', $update_data);
  //
  //     if(isset($_FILES['user_file_name']['name'])){
  //       $this->load->library('upload');
  //       $files = $_FILES;
  //       $cpt = count($_FILES['user_file_name']['name']);
  //       for($i=0; $i<$cpt; $i++)
  //       {
  //         $j = $i+1;
  //         $time = time();
  //         $image_name = 'user_'.$user_id.'_'.$j.'_'.$time;
  //           $_FILES['user_file_name']['name']= $files['user_file_name']['name'][$i];
  //           $_FILES['user_file_name']['type']= $files['user_file_name']['type'][$i];
  //           $_FILES['user_file_name']['tmp_name']= $files['user_file_name']['tmp_name'][$i];
  //           $_FILES['user_file_name']['error']= $files['user_file_name']['error'][$i];
  //           $_FILES['user_file_name']['size']= $files['user_file_name']['size'][$i];
  //           $config['upload_path'] = 'assets/images/user/';
  //           $config['allowed_types'] = 'gif|jpg|png|pdf|docx|ppt';
  //           $config['file_name'] = $image_name;
  //           $config['overwrite']     = FALSE;
  //           $filename = $files['user_file_name']['name'][$i];
  //           $ext = pathinfo($filename, PATHINFO_EXTENSION);
  //           $this->upload->initialize($config);
  //           if($this->upload->do_upload('user_file_name')){
  //             $file_data['user_id'] = $user_id;
  //             $file_data['user_file_name'] = $image_name.'.'.$ext;
  //             $this->Master_Model->save_data('user_file', $file_data);
  //           }
  //           else{
  //             $error = $this->upload->display_errors();
  //             $this->session->set_flashdata('status',$this->upload->display_errors());
  //           }
  //       }
  //     }
  //
  //     $this->session->set_flashdata('update_success','success');
  //     header('location:'.base_url().'User/user_list');
  //   }
  //
  //   $user_info = $this->Master_Model->get_info_arr('user_id', $user_id, 'user');
  //   if($user_info == ''){ header('location:'.base_url().'User/user_list'); }
  //   $data['update'] = 'update';
  //   $data['user_info'] = $user_info[0];
  //   $data['group_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'company_id',$coach_company_id,'','','group_name','ASC','group');
  //   $data['role_list'] = $this->Master_Model->get_list_by_id2('','','','','','role_name','ASC','role');
  //   $data['branch_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'company_id',$coach_company_id,'','','branch_name','ASC','branch');
  //   $data['user_file_list'] = $this->Master_Model->get_list_by_id2($coach_company_id,'user_id',$user_id,'','','user_file_id','ASC','user_file');
  //   $this->load->view('Include/head',$data);
  //   $this->load->view('Include/navbar',$data);
  //   $this->load->view('User/user',$data);
  //   $this->load->view('Include/footer',$data);
  // }
  //
  // // Delete User File...
  // public function delete_user_file(){
  //   $user_file_id = $_POST['user_file_id'];
  //   $user_file_name = $_POST['user_file_name'];
  //   if($user_file_name){ unlink("assets/images/user/".$user_file_name); }
  //   $this->Master_Model->delete_info('user_file_id', $user_file_id, 'user_file');
  // }
  //
  // // Delete User....
  // public function delete_user($user_id){
  //   $coach_user_id = $this->session->userdata('coach_user_id');
  //   $coach_company_id = $this->session->userdata('coach_company_id');
  //   $coach_role_id = $this->session->userdata('coach_role_id');
  //   if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
  //   $user_info = $this->Master_Model->get_info_arr_fields('user_image','user_id', $user_id, 'user');
  //   if($user_info[0]['user_image']){ unlink("assets/images/user/".$user_info[0]['user_image']); }
  //   $this->Master_Model->delete_info('user_id', $user_id, 'user');
  //   $this->session->set_flashdata('delete_success','success');
  //   header('location:'.base_url().'User/user_list');
  // }

/*******************************  Check Duplication  ****************************/
  public function check_duplication(){
    $column_name = $this->input->post('column_name');
    $column_val = $this->input->post('column_val');
    $table_name = $this->input->post('table_name');
    $company_id = '';
    $cnt = $this->Master_Model->check_duplication($company_id,$column_val,$column_name,$table_name);
    echo $cnt;
  }

  // public function get_state_by_country(){
  //   $country_id = $this->input->post('country_id');
  //   $state_list = $this->Master_Model->get_list_by_id2('','country_id',$country_id,'','','state_name','ASC','state');
  //   echo "<option value='' selected >Select State.</option>";
  //   foreach ($state_list as $list) {
  //     echo "<option value='".$list->state_id."'> ".$list->state_name." </option>";
  //   }
  // }



}
?>
