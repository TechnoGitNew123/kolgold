<?php
class User_Model extends CI_Model{

  function check_login($mobile, $password){
    $query = $this->db->select('*')
      ->where('user_mobile', $mobile)
      ->where('user_password', $password)
      ->from('user')
      ->get();
    $result = $query->result_array();
    return $result;
  }

  public function user_list($company_id){
    $this->db->select('*');
    $this->db->where('is_admin', 0);
    if($company_id != ''){
      $this->db->where('company_id', $company_id);
    }
    $this->db->from('user');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }



}
?>
