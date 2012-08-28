<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

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
            $events_list = $this->Users_model->get_events_list();
            //echo "<pre>events_list: ";   print_r($events_list);   echo "</pre>";
            $data['events_list'] = $events_list;
            //$this->load->view('welcome_message');
			$this->load->view('common/header',$data);
            $this->load->view('users/main',$data);
            $this->load->view('common/footer',$data);
	}
        
        
        public function event($event_type)
	{
            //echo "<br>Event type : ".$event_type; 
            $event_detail = $this->Users_model->get_event_detail($event_type);
            //echo "<pre>event detail in controller: ";   print_r($event_detail);   echo "</pre>";
            
            $data['event_detail'] = $event_detail;
            $data['msg'] = '';
            $this->load->view('users/event',$data);
        }
        
        public function registration($type = 0,$event_id=0)
	{
            //echo "<br>Type : ".$type;
            $data['msg'] = "";
            //echo "<pre>POST in controller: ";   print_r($this->input->post());   echo "</pre>";
            if($this->input->post('submit'))
            {
                $data['event_type'] = $this->input->post('event_type');
                $data['event_id'] = $this->input->post('event_id');
                $data['date'] = $this->input->post('date');
                $data['surname'] = $this->input->post('surname');
                $data['f_name'] = $this->input->post('f_name');
                $data['l_name'] = $this->input->post('l_name');
                $data['suffix'] = $this->input->post('suffix');
                $data['street_address'] = $this->input->post('street_address');
                $data['city'] = $this->input->post('city');
                $data['state'] = $this->input->post('state');
                $data['zip'] = $this->input->post('zip');
                $data['phone'] = $this->input->post('phone');
                
                $data['m_name'] = $this->input->post('m_name');
                $data['name_on_certificate'] = $this->input->post('name_on_certificate');
                $data['email'] = $this->input->post('email');
                
                $message = $this->Users_model->add_registration($data);
                
                $data['type'] = $this->input->post('event_type');
                $data['msg'] = "User registered.";
            }
            else
            {    
                $data['event_id'] = $event_id;
                $data['type'] = $type;
            }    
            $this->load->view('users/add_registration',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */