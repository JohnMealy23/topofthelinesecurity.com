<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {

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
	}
    
    
        public function index()
	{
            $data['msg'] = '';
			$data['page_title'] = 'Courses';
            $events_list = $this->Users_model->get_events_list();
            //echo "<pre>events_list: ";   print_r($events_list);   echo "</pre>";
            $data['events_list'] = $events_list;
            //$this->load->view('welcome_message');
            $this->load->view('common/header',$data);
            $this->load->view('users/main',$data);
            $this->load->view('common/footer',$data);
	}
        
        
        public function event($event_url)
	{
            //echo "<br>Event url : ".$event_url; 
            $event_detail = $this->Users_model->get_event_detail($event_url);
            //echo "<pre>event detail in controller: ";   print_r($event_detail);   echo "</pre>";
            $data['event_detail'] = $event_detail;
            
			$data['page_title'] = 'Courses';
            $data['event_name'] = str_replace("_", " ", "$event_url");
			$data['msg'] = '';
            $this->load->view('common/header',$data);
            $this->load->view('users/UtahDescription.php',$data);
            $this->load->view('users/event',$data);
            $this->load->view('common/footer',$data);
        }
        
        public function registration($type = 0,$event_id=0)
	{
           // echo "<pre>POST: ";   print_r($_POST);   echo "</pre>";
            //echo "<br>Type : ".$type;
            $data['msg'] = "";
            $data['user_added'] = "0";
			$event_detail = $this->Users_model->get_event_detail_from_id($event_id);
            //echo "<pre>event_detail: ";   print_r($event_detail);   echo "</pre>";
		//	echo "<br>Price : ".$event_detail[0]->price;
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
                
                ?>
                
                <?PHP
                
                $data['msg'] = "User registered.";
				
                $data['user_added'] = "1";
				$this->Users_model->update_fe_visibility($data['event_id']);
				
            }
            else
            {    
                $data['event_id'] = $event_id;
                $data['type'] = $type;
            } 
			$data['event_detail'] = $event_detail;   
            $this->load->view('common/header',$data);
            $this->load->view('users/add_registration',$data);
            $this->load->view('common/footer',$data);
            if($data['msg'] == "User registered.")
            {
                $return_url = base_url()."courses/success"; 
                $cancel_url = base_url()."courses/registration/".$data['type']."/".$data['event_id']; 
                
                //echo "<br>Price 2nd  : ".$this->input->post('this_event_price');
    ?>

    
	<form name="tt" id="tt" action="https://www.sandbox.paypal.com/cgi-bin/webscr">    
        <input type="hidden" name="upload" value="1">
        <input type="hidden" name="cmd" value="_cart">
        <input type="hidden" name="business" value="fowl82_1338183159_biz@hotmail.com">
        <input type="hidden" name="item_name_1" value="Event Payment">
        <input type="hidden" name="amount_1" value="<?=$this->input->post('this_event_price')?>">
        <input type="hidden" name="no_shipping" value="2">
        <input type="hidden" name="no_note" value="1">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="tax" value="0">
        <input type="hidden" name="bn" value="IC_Sample">
        <input type="hidden" name="custom" value="<?php echo $event_id?>">
        <input type="hidden" name="notify_url" value="<?php echo $return_url; ?>">
        <input type="hidden" name="cancel_return" value="<?php echo $cancel_url; ?>">
        <input type="hidden" name="return" value="<?php echo $return_url; ?>">
        <input type="hidden" name="rm" value="2">

    
    </form>

                <script language="javascript">
                   // alert("here2");
                //document.paypal_form.submit();
                document.tt.submit();
                </script>        
                
                    
                
                <?PHP
            }    
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>