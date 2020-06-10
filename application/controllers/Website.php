<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Website extends CI_Controller{
    public function __construct(){
      parent::__construct();
      date_default_timezone_set('Asia/Kolkata');
    }

    public function index(){
      $this->load->view('Website/header');
      $this->load->view('Website/index');
      $this->load->view('Website/footer');
    }

    public function login(){
      $this->load->view('Website/login');
    }

    public function signup(){
      $this->load->view('Website/signup');
    }
}
?>
