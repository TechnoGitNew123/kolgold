<?php
class Transaction_Model extends CI_Model{

/***************************** API ********************************/
// Check Login...
  function check_login($mobile_no, $password, $student_imei_no){
    $this->db->select('*');
    $this->db->where('student_mobile', $mobile_no);
    $this->db->where('student_password', $password);
    if($student_imei_no != ''){
      $this->db->where('student_imei_no', $student_imei_no);
    }
    $this->db->where('student_status', 1);
    $this->db->from('student');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function get_topic_list($medium_id, $class_id, $batch_id, $section_id, $subject_id){
    $this->db->select('*');
    $this->db->where('medium_id', $medium_id);
    $this->db->where('section_id', $section_id);
    if($section_id == 1){
      $this->db->where('subject_id', $subject_id);
    }
    $this->db->where("FIND_IN_SET('".$class_id."', class_id) != 0");
    $this->db->where("FIND_IN_SET('".$batch_id."', batch_id) != 0");
    $this->db->from('topic');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function get_topic_video_list($academic_year_id, $topic_id, $new_date){
    $this->db->select('*');
    $this->db->where('topic_id', $topic_id);
    $this->db->where('academic_year_id', $academic_year_id);
    $this->db->where('topic_content_datetime >=', $new_date);
    // $this->db->where("str_to_date(topic_content_datetime,'%d-%m-%Y %h:%i %A') >= str_to_date('$new_date','%d-%m-%Y %h:%i %A')");
    // $this->db->where("str_to_date(topic_content_pub_time,'%h:%i %A') >= str_to_date('$new_time','%h:%i %A')");
    $this->db->from('topic_content');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function get_download_content_list($company_id, $academic_year_id, $medium_id, $class_id, $batch_id){
    $this->db->select('*');
    $this->db->where('company_id', $company_id);
    $this->db->where('academic_year_id', $academic_year_id);
    $this->db->where('medium_id', $medium_id);
    $this->db->where("FIND_IN_SET('".$class_id."', class_id) != 0");
    $this->db->where("FIND_IN_SET('".$batch_id."', batch_id) != 0");
    $this->db->from('download_content');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
}
?>
