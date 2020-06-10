<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Master extends CI_Controller{
    public function __construct(){
      parent::__construct();
      date_default_timezone_set('Asia/Kolkata');
    }

    // public function index(){
    //     $col_user_id = $this->session->userdata('col_user_id');
    //     echo $col_user_id;
    // }

    // Save Batch....
  public function main_category_information(){
    $col_user_id = $this->session->userdata('col_user_id');
    $col_company_id = $this->session->userdata('col_company_id');
    $col_role_id = $this->session->userdata('col_role_id');
    if($col_user_id == '' && $col_company_id == ''){ header('location:'.base_url().'User'); }

    // $this->form_validation->set_rules('main_category_name', 'Batch Name', 'trim|required');
    // if ($this->form_validation->run() != FALSE) {
    //   $main_category_status = $this->input->post('main_category_status');
    //   if(!isset($main_category_status)){ $main_category_status = '1'; }
    //   $save_data = $_POST;
    //   $save_data['main_category_status'] = $main_category_status;
    //   $save_data['company_id'] = $col_company_id;
    //   $save_data['main_category_addedby'] = $col_user_id;
    //   $save_data['main_category_date'] = date('d-m-Y');
    //   $save_data['main_category_time'] = date('h:i:s A');
    //   $main_category_id = $this->Master_Model->save_data('main_category', $save_data);
    //
    //   $this->session->set_flashdata('save_success','success');
    //   header('location:'.base_url().'Master/main_category_information');
    // }
    //
    // $data['main_category_list'] = $this->Master_Model->get_list_by_id3($col_company_id,'','','','','','','main_category_id','DESC','main_category');
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/main_category_information');
    $this->load->view('Include/footer');
  }

  // Edit/Update Batch...
  public function edit_main_category($main_category_id){
    $col_user_id = $this->session->userdata('col_user_id');
    $col_company_id = $this->session->userdata('col_company_id');
    $col_role_id = $this->session->userdata('col_role_id');
    if($col_user_id == '' && $col_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('main_category_name', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $main_category_status = $this->input->post('main_category_status');
      if(!isset($main_category_status)){ $main_category_status = '1'; }
      $update_data = $_POST;
      $update_data['main_category_status'] = $main_category_status;
      $update_data['main_category_addedby'] = $col_user_id;
      $update_data['main_category_date'] = date('d-m-Y');
      $update_data['main_category_time'] = date('h:i:s A');
      $this->Master_Model->update_info('main_category_id', $main_category_id, 'main_category', $update_data);

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/main_category_information');
    }

    $main_category_info = $this->Master_Model->get_info_arr('main_category_id',$main_category_id,'main_category');
    if(!$main_category_info){ header('location:'.base_url().'Master/main_category_information'); }
    $data['update'] = 'update';
    $data['update_main_category'] = 'update';
    $data['main_category_info'] = $main_category_info[0];
    $data['act_link'] = base_url().'Master/edit_main_category/'.$main_category_id;

    $data['main_category_list'] = $this->Master_Model->get_list_by_id3($col_company_id,'','','','','','','main_category_id','DESC','main_category');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/main_category_information', $data);
    $this->load->view('Include/footer', $data);
  }

  //Delete Batch...
  public function delete_main_category($main_category_id){
    $col_user_id = $this->session->userdata('col_user_id');
    $col_company_id = $this->session->userdata('col_company_id');
    $col_role_id = $this->session->userdata('col_role_id');
    if($col_user_id == '' && $col_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('main_category_id', $main_category_id, 'main_category');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/main_category_information');
  }




  public function sub_category_information(){
    $col_user_id = $this->session->userdata('col_user_id');
    $col_company_id = $this->session->userdata('col_company_id');
    $col_role_id = $this->session->userdata('col_role_id');
    if($col_user_id == '' && $col_company_id == ''){ header('location:'.base_url().'User'); }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/sub_category_information');
    $this->load->view('Include/footer');
  }

  public function blog_information(){
    $col_user_id = $this->session->userdata('col_user_id');
    $col_company_id = $this->session->userdata('col_company_id');
    $col_role_id = $this->session->userdata('col_role_id');
    if($col_user_id == '' && $col_company_id == ''){ header('location:'.base_url().'User'); }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/blog_information');
    $this->load->view('Include/footer');
  }

  public function product_information(){
    $col_user_id = $this->session->userdata('col_user_id');
    $col_company_id = $this->session->userdata('col_company_id');
    $col_role_id = $this->session->userdata('col_role_id');
    if($col_user_id == '' && $col_company_id == ''){ header('location:'.base_url().'User'); }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/product_information');
    $this->load->view('Include/footer');
  }

  public function order_list(){
    $col_user_id = $this->session->userdata('col_user_id');
    $col_company_id = $this->session->userdata('col_company_id');
    $col_role_id = $this->session->userdata('col_role_id');
    if($col_user_id == '' && $col_company_id == ''){ header('location:'.base_url().'User'); }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/order_list');
    $this->load->view('Include/footer');
  }

  public function slider(){
    $col_user_id = $this->session->userdata('col_user_id');
    $col_company_id = $this->session->userdata('col_company_id');
    $col_role_id = $this->session->userdata('col_role_id');
    if($col_user_id == '' && $col_company_id == ''){ header('location:'.base_url().'User'); }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/slider');
    $this->load->view('Include/footer');
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
