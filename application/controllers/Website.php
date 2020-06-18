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

    public function about(){
      $this->load->view('Website/header');
      $this->load->view('Website/about');
      $this->load->view('Website/footer');
    }



    public function product_details(){

      $this->load->view('Website/header');
      $this->load->view('Website/product_details');
      $this->load->view('Website/footer');

    }

    public function product_page(){
      $product_list = $this->Master_Model->get_list_by_id3('','product_status','1','','','','','product_id','DESC','product');
      foreach ($product_list as $product_list1) {
        $product_id = $product_list1->product_id;
        $product_attribute_list = $this->Master_Model->get_list_by_id3('','product_id',$product_id,'','','','','product_attribute_id','ASC','product_attribute');
        $product_list1->product_attribute_list = $product_attribute_list;
      }
      $data['product_list'] = $product_list;
      $this->load->view('Website/header', $data);
      $this->load->view('Website/product_page', $data);
      $this->load->view('Website/footer', $data);
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

    public function faq(){
      $this->load->view('Website/header');
      $this->load->view('Website/faq');
      $this->load->view('Website/footer');
    }

    public function contact(){
      $this->load->view('Website/header');
      $this->load->view('Website/contact');
      $this->load->view('Website/footer');
    }

    public function checkout(){
      $this->load->view('Website/header');
      $this->load->view('Website/checkout');
      $this->load->view('Website/footer');
    }

    public function delivery_address(){
      $this->load->view('Website/header');
      $this->load->view('Website/delivery_address');
      $this->load->view('Website/footer');
    }

    public function blog(){
      $this->load->view('Website/header');
      $this->load->view('Website/blog');
      $this->load->view('Website/footer');
    }

    public function send_mail(){
		date_default_timezone_set("Asia/Kolkata");
		$this->load->library('email');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$email = $this->input->post('email');
		$mobile = $this->input->post('mobile');
		$message = $this->input->post('message');
		$message1 ='
			 <p style="color:#767676; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 14px;font-family: Georgia, serif; ">
			 Sender: '.$first_name.' '.$last_name.'
			 </p><br> <hr>
			 <p style="color:#767676; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 14px;font-family: Georgia, serif; ">
			Mobile No.: '.$mobile.'
			</p><br> <hr>
			 <p style="color:#767676; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 14px;font-family: Georgia, serif; ">
			 Message: '.$message.'
			 </p>
		 ';

		// $message.' First Name'.$first_name."\r\n".' Last Name'.$last_name."\r\n".'Designation'.$designation."\r\n".' Organization'.$organization."\r\n".' mobile No.'."\r\n".$mobile."\r\n".' Country'."\r\n".$country;
		$from_email = $email;
		$recipient = "dhananjay.technothinksup@gmail.com";
		$subject = "Mail From Website - ";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$from_email."\r\n".
		'Reply-To: '.$from_email."\r\n" .
		'X-Mailer: PHP/' . phpversion();

		$send = mail($recipient, $subject, $message1, $headers);
		if($send){
			$this->session->set_flashdata('send_email_sucess','Sucess');
		}
		else{
			$this->session->set_flashdata('send_email_error','error');
		}
		header('Location:'.base_url('Website/contact'));
	}
}
?>
