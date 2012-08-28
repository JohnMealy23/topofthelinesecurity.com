<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
         public function __construct()
	{ 	
		
		header('Expires: Mon, 14 Oct 2002 05:00:00 GMT');              // Date in the past
		header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); // always modified
		header('Cache-Control: no-store, no-cache, must-revalidate');  // HTTP 1.1
		header('Cache-Control: post-check=0, pre-check=0', false);
		header('Pragma: no-cache');                                    // HTTP 1.0
		parent::__construct();	
		$this->params = $this->input->get();
		$this->CI =&get_instance();
		$this->load->library('session');
		$this->load->model('captcha_model');
        $this->load->helper('form');
		$this->load->library('email');
		session_start();
	}
    
    
        public function index()
	{
		 if(empty($_POST))
		{
		  $captcha = $this->captcha_model->generateCaptcha();
		  $_SESSION['captchaWord'] = $captcha['word'];

		  $data['captcha'] = $captcha;
		  $data['msg'] = '';
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
			$Sender = $_POST[''];
			$Recipient = 'topofthelinetraining@gmail.com';
			$Subject = $_POST[''];
			$SenderName = $_POST[''];
			$Message = $_POST[''];
			
			$this->email->from($Sender, $SenderName);
			$this->email->to($Recipient); 
			$this->email->cc(''); 
			$this->email->bcc(''); 

			$this->email->subject($Subject);
			$this->email->message($Message);	

			$this->email->send();
			
		    //Direct to success page:
			
			$data['msg'] = '';
			$this->load->view('common/header');
			$this->load->view('common/success_view');
			echo $this->email->print_debugger();
			$this->load->view('common/footer');
		  }
		  else
		  {
			//empty($_POST);
			$data['msg'] = 'Please enter the correct security code.';
			$captcha = $this->captcha_model->generateCaptcha();
			$_SESSION['captchaWord'] = $captcha['word'];
			$data['captcha'] = $captcha;
			$this->load->view('common/header');
			$this->load->view('common/contact', $data);
			$this->load->view('common/footer');
		  }
		}
	
	} 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */