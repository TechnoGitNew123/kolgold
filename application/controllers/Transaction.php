<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller{
  public function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Kolkata');
  }

  public function get_class_by_medium(){
    $coach_company_id = $this->session->userdata('coach_company_id');
    $medium_id = $this->input->post('medium_id');
    $class_list = $this->Master_Model->get_list_by_id2($coach_company_id,'class_status',1,'medium_id',$medium_id,'class_id','ASC','class');;
    echo "<option value=''>Select Class</option>";
    foreach ($class_list as $list) {
      echo "<option value='".$list->class_id."'> ".$list->class_name." </option>";
    }
  }

  public function get_subject_by_class(){
    $coach_company_id = $this->session->userdata('coach_company_id');
    $class_id = $this->input->post('class_id');
    $subject_list = $this->Master_Model->get_list_by_id2($coach_company_id,'subject_status',1,'class_id',$class_id,'subject_id','ASC','subject');;
    echo "<option value=''>Select Subject</option>";
    foreach ($subject_list as $list) {
      echo "<option value='".$list->subject_id."'> ".$list->subject_name." </option>";
    }
  }





}
