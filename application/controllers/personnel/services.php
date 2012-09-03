<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller {
	
         public function __construct()
	{ 	

		parent::__construct();	
		$this->params = $this->input->get();
		$this->CI =&get_instance();
		$this->load->library('session');
		$this->load->model('Nav_model');
	}
    
        public function index()
	{
            $data['msg'] = '';
			$data['page_title'] = 'Services';
			$nav = $this->Nav_model->nav('personnel');
			$data['sitesection'] = $nav['SiteSection'];
			$data['navlinks'] = $nav['NavLinks'];
            $this->load->view('common/header',$data);
            $this->load->view('personnel/services',$data);
            $this->load->view('common/footer',$data);
	}
       
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */