<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Website extends CI_Controller{
    public function __construct(){
      parent::__construct();
      date_default_timezone_set('Asia/Kolkata');
    }

    public function index(){
      $data['slider_list'] = $this->Master_Model->get_list_by_id3('','slider_status','1','','','','','slider_id','ASC','slider');
      $data['main_category_list'] = $this->Master_Model->get_list_by_id3('','main_category_status','1','','','','','main_category_id','ASC','main_category');
      $product_list = $this->Master_Model->get_list_by_id3('','product_status','1','','','','','product_id','DESC','product');
      foreach ($product_list as $product_list1) {
        $product_id = $product_list1->product_id;
        $product_attribute_list = $this->Master_Model->get_list_by_id3('','product_id',$product_id,'','','','','product_attribute_id','ASC','product_attribute');
        $product_list1->product_attribute_list = $product_attribute_list;
      }
      $data['product_list'] = $product_list;
      // $data['product_list'] = $this->Master_Model->get_list_by_id3('','product_status','1','','','','','product_id','ASC','product');
      $this->load->view('Website/header', $data);
      $this->load->view('Website/index', $data);
      $this->load->view('Website/footer', $data);
    }

    public function login(){
      $this->load->view('Website/login');
    }

    public function signup(){
      $this->load->view('Website/signup');
    }
}
?>
