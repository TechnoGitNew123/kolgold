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

    public function privacy_policy(){
      $this->load->view('Website/header');
      $this->load->view('Website/privacy_policy');
      $this->load->view('Website/footer');
    }

    public function shipping_policy(){
      $this->load->view('Website/header');
      $this->load->view('Website/shipping_policy');
      $this->load->view('Website/footer');
    }

    public function cancel_policy(){
      $this->load->view('Website/header');
      $this->load->view('Website/cancel_policy');
      $this->load->view('Website/footer');
    }

    public function return_policy(){
      $this->load->view('Website/header');
      $this->load->view('Website/return_policy');
      $this->load->view('Website/footer');
    }

    public function terms(){
      $this->load->view('Website/header');
      $this->load->view('Website/terms');
      $this->load->view('Website/footer');
    }

    public function disclaimer(){
      $this->load->view('Website/header');
      $this->load->view('Website/disclaimer');
      $this->load->view('Website/footer');
    }

    public function payment_methode(){
      $this->load->view('Website/header');
      $this->load->view('Website/payment_methode');
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
