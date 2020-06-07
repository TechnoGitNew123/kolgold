<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('Admin_Model');
    $this->load->model('User_Model');
  }

  public function logout(){
    $this->session->sess_destroy();
    header('location:'.base_url().'Admin');
  }

  public function index(){
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == FALSE) {
    	$this->load->view('Admin/login');
    }
    else{
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $login = $this->Admin_Model->check_login($email, $password);
      if($login == null){
        $this->session->set_flashdata('msg','login_error');
        header('location:'.base_url().'Admin');
      }
      else{
        foreach ($login as $login){
          $this->session->set_userdata('coach_admin_id', $login['admin_id']);
        }
        header('location:'.base_url().'Admin/dashboard');
      }
    }
  }

  public function dashboard(){
    $coach_admin_id = $this->session->userdata('coach_admin_id');
    if($coach_admin_id == ''){ header('location:'.base_url().'Admin'); }
    $this->load->view('Admin/dashboard');
  }

  public function company_information(){
    $coach_admin_id = $this->session->userdata('coach_admin_id');
    if($coach_admin_id == ''){ header('location:'.base_url().'Admin'); }
    $data['country_list'] = $this->User_Model->get_list2('','ASC','country');
    $data['state_list'] = $this->User_Model->get_list2('','ASC','state');
    $data['district_list'] = $this->User_Model->get_list2('','ASC','district');
    $this->load->view('Admin/company_information', $data);
  }

  public function company_information_list(){
    $coach_admin_id = $this->session->userdata('coach_admin_id');
    if($coach_admin_id == ''){ header('location:'.base_url().'Admin'); }
    $data['company_list'] = $this->Admin_Model->get_company_list();
    $this->load->view('Admin/company_information_list',$data);
  }

  public function save_company(){
    // Save Company Data...
    $data = array(
      'company_name' => $this->input->post('company_name'),
      'company_address' => $this->input->post('company_address'),
      'country_id' => $this->input->post('country_id'),
      'state_id' => $this->input->post('state_id'),
      'company_statecode' => $this->input->post('company_statecode'),
      'company_mob1' => $this->input->post('company_mob1'),
      'company_mob2' => $this->input->post('company_mob2'),
      'company_email' => $this->input->post('company_email'),
      'company_website' => $this->input->post('company_website'),
      'company_pan_no' => $this->input->post('company_pan_no'),
      'company_gst_no' => $this->input->post('company_gst_no'),
      'company_cin_no' => $this->input->post('company_cin_no'),
      'company_iec_no' => $this->input->post('company_iec_no'),
    );
    $company_id = $this->Admin_Model->save_data('company', $data);
    // Save User Data...
    $data2 = array(
      'company_id'=>$company_id,
      'user_email'=>$this->input->post('admin_email'),
      'user_password'=>$this->input->post('admin_password'),
      'user_name'=>'Admin',
      'role_id'=>1,
      'user_city'=>$this->input->post('company_city'),
      'user_mobile'=>$this->input->post('company_mob1'),
      'user_addedby'=>'Admin',
      'is_admin'=>1,
    );
    $this->Admin_Model->save_data('user', $data2);
    header('location:'.base_url().'Admin/company_information_list');
  }

  public function edit_company($company_id){
    $coach_admin_id = $this->session->userdata('coach_admin_id');
    if($coach_admin_id == ''){ header('location:'.base_url().'Admin'); }
    $company_info = $this->Admin_Model->get_info('company_id', $company_id, 'company');
    $data['country_list'] = $this->User_Model->get_list2('','ASC','country');
    $data['state_list'] = $this->User_Model->get_list2('','ASC','state');
    $data['district_list'] = $this->User_Model->get_list2('','ASC','district');
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
      $this->load->view('Admin/company_information',$data);
    }
  }

  public function update_company(){
    $coach_admin_id = $this->session->userdata('coach_admin_id');
    if($coach_admin_id == ''){ header('location:'.base_url().'Admin'); }
    $data['country_list'] = $this->User_Model->get_list2('','ASC','country');
    $data['state_list'] = $this->User_Model->get_list2('','ASC','state');
    $data['district_list'] = $this->User_Model->get_list2('','ASC','district');
    $company_id = $this->input->post('company_id');
    $data = array(
      'company_name' => $this->input->post('company_name'),
      'company_address' => $this->input->post('company_address'),
      'country_id' => $this->input->post('country_id'),
      'state_id' => $this->input->post('state_id'),
      'company_statecode' => $this->input->post('company_statecode'),
      'company_mob1' => $this->input->post('company_mob1'),
      'company_mob2' => $this->input->post('company_mob2'),
      'company_email' => $this->input->post('company_email'),
      'company_website' => $this->input->post('company_website'),
      'company_pan_no' => $this->input->post('company_pan_no'),
      'company_gst_no' => $this->input->post('company_gst_no'),
      'company_cin_no' => $this->input->post('company_cin_no'),
      'company_iec_no' => $this->input->post('company_iec_no'),

    );
    $this->Admin_Model->update_info('company_id', $company_id, 'company', $data);
    header('location:'.base_url().'Admin/company_information_list');
  }

  public function delete_company($company_id){
    $coach_admin_id = $this->session->userdata('coach_admin_id');
    if($coach_admin_id == ''){ header('location:'.base_url().'Admin'); }
    $this->User_Model->delete_info('company_id', $company_id, 'company');
    header('location:'.base_url().'Admin/company_information_list');
  }

}
?>
