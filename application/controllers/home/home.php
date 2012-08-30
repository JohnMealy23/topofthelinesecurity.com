<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
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
		$this->load->model('Users_model');
        $this->load->helper('form');
	}
    
    
        public function index()
	{
            $data['msg'] = '';
			$events_list = $this->Users_model->get_events_list();
            $data['events_list'] = $events_list;
            $this->load->view('common/home',$data);
	}

}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */