<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {
	
         public function __construct()
	{ 	
		session_start();
		parent::__construct();	
		$this->params = $this->input->get();
		$this->CI =&get_instance();
		$this->load->library('session');
		$this->load->model('captcha_model');
		$this->load->model('Nav_model');
        $this->load->helper('form');
		$this->load->library('email');
	}
    
        public function index()
	{
		$nav = $this->Nav_model->nav('training');
		$data['sitesection'] = $nav['SiteSection'];
		$data['navlinks'] = $nav['NavLinks'];	
		 if(empty($_POST))
		{
		  $captcha = $this->captcha_model->generateCaptcha();
		  $_SESSION['captchaWord'] = $captcha['word'];

		  $data['captcha'] = $captcha;
		  $data['msg'] = '';
		  $data['page_title'] = 'Contact Form';
		  $this->load->view('common/header', $data);
		  $this->load->view('common/contact', $data);
		  $this->load->view('common/footer', $data);
		}
		else
		{
		  //check captcha matches
		  if(strcasecmp($_SESSION['captchaWord'], $_POST['confirmCaptcha']) == 0)
		  {
			//If captcha matches:
			//Compose email:
			$Sender = $_POST['email'];
			$Recipient = 'topofthelinesecuritytraining@gmail.com';
			$Subject = $_POST['query_type'];
			$SenderName = $_POST['name'];
			$Message = $_POST['message'];
			
			$this->email->from($Sender, $SenderName);
			$this->email->to($Recipient); 
			$this->email->cc(''); 
			$this->email->bcc(''); 

			$this->email->subject($Subject);
			$this->email->message($Message);	

			$this->email->send();
			
		    //Direct to success page:
			
			$data['msg'] = '';
			$data['page_title'] = 'Thank you.';
			$this->load->view('common/header', $data);
			$this->load->view('common/contactconfirm', $data);
			$this->load->view('common/footer', $data);
		  }
		  else
		  {
			//empty($_POST);
			$data['msg'] = 'Please enter the correct security code.';
			$data['page_title'] = 'Contact';
			$captcha = $this->captcha_model->generateCaptcha();
			$_SESSION['captchaWord'] = $captcha['word'];
			$data['captcha'] = $captcha;
			$this->load->view('common/header', $data);
			$this->load->view('common/contact', $data);
			$this->load->view('common/footer', $data);
		  }
		}
	
	} 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */