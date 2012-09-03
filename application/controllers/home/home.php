<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
         public function __construct()
	{ 	
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