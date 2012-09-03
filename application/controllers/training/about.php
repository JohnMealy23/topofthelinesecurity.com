<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {
	
         public function __construct()
	{ 
		parent::__construct();	
		$this->params = $this->input->get();
		$this->CI =&get_instance();
		$this->load->library('session');
		$this->load->model('Users_model');
		$this->load->model('Nav_model');
		$this->load->helper('form');
	}
    
        public function index()
	{
            $data['msg'] = '';
			$data['page_title'] = 'About';
			$nav = $this->Nav_model->nav('training');
			$data['sitesection'] = $nav['SiteSection'];
			$data['navlinks'] = $nav['NavLinks'];
            $this->load->view('common/header',$data);
            $this->load->view('common/about',$data);
            $this->load->view('common/footer',$data);
	}
       
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */