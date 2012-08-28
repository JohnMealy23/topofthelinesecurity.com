<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

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
		///$this->load->library('api');
		$this->CI =&get_instance();
		$this->load->library('session');
		$this->load->model('Users_model');
		//$this->load->model('Users_model');
                $this->load->helper('form');
		
		//$this->login_check();
	}
    
    
        public function index()
	{
            $data['msg'] = '';
			$data['page_title'] = 'About';
            $events_list = $this->Users_model->get_events_list();
            //echo "<pre>events_list: ";   print_r($events_list);   echo "</pre>";
            $data['events_list'] = $events_list;
            //$this->load->view('welcome_message');
            $this->load->view('common/header',$data);
            $this->load->view('common/about',$data);
            $this->load->view('common/footer',$data);
	}
       
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */