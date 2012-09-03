<?PHP
class Admin extends CI_Controller 
{
	public $params;
	public $CI;
 	
	public function __construct()
	{ 	                                  // HTTP 1.0
		parent::__construct();	
		$this->params = $this->input->get();
		///$this->load->library('api');
		$this->CI =&get_instance();
		$this->load->library('session');
		$this->load->model('Admin_model');
		//$this->load->model('Users_model');
                $this->load->helper('form');
		
		//$this->login_check();
	}
	


	public function index()
	{ //echo "HERE"; die();
		$data["error"] = "";
		if( $this->input->post('submit') ) 
		{
		  if ( $this->input->post('username') == "" || $this->input->post('password') == "" )
		  {
			  $data["error"] = "A field is empty.";
		  }
		  else
		  {
			  $login_vals['username'] = $this->input->post('username');
			  //$this->load->model('Users_model');
			  //$enc_password = $this->Users_model->_prep_password($this->input->post('password'));
			  $enc_password = $this->input->post('password');
			  //echo '<pre>Password: '.$enc_password.'</pre>';
			  //echo '<pre>Password: '.$login_vals['password'].'</pre>';
			  $login_vals['password'] = $enc_password;
			  $val = $this->Admin_model->login_check($login_vals);
			  if( $val > 0)
			  {
				  //print_r($data['query'],true);
				  //exit;
				  redirect(base_url().'_index.php?admin/page', 'refresh');
			  }
			  else
			  {
				  $data["error"] = "Invalid Username or Password.";
			  }
		  }
		}
		$this->load->view('admin/login' , $data);		
	}
	
	public function page()
	{ 
		$this->login_check();
		$this->load->view('admin/default');	
	}
	
	
	public function login_check(){
		 if(!isset($this->session->userdata['logged_in']) || $this->session->userdata['logged_in'] != 1)
			redirect('support', 'refresh');
	}
	
	
	public function reset_password(){
       //error_reporting(E_ALL);
      // print_r($_REQUEST);
       //exit;
       //$uri_segments = $this->uri->segment_array();
	  // $data['user_id'] = $uri_segments[3];
	   $data['msg'] = '';
	   
	   if ( $this->input->post('submit') ) 
	   {
			
                //$this->load->model('Users_model');

                //$enc_password_new = $this->Users_model->_prep_password($this->input->post('new_pw1'));
                $val = $this->Admin_model->update_password($this->input->post('new_pw1')) ;
                if( $val == 1 )
                {
                    //$data['msg'] = "Password has been reset successfully for ".$uri_segments[4].".";
                    $data['msg'] = "Password has been reset successfully";
                    //redirect('support/user_list/'.$uri_segments[4].'/'.$uri_segments[5].'/'.$uri_segments[6].'?msg=1');
                }
                else
                {
                    $data['msg'] = "Unable to update password. Please try again";
                }

	   }
	  
	   $this->load->view('admin/reset_password' , $data);
	  // exit;		
	}
	
	
	public function create_event($id = 0)
	{   
		$this->login_check(); 
		//$this->validate_url(array("Admin","Manager"));
		$data['msg'] = "";
		$data['update_event_id'] = "";
		$data['name'] = $this->input->post('name');
		$data['description'] = $this->input->post('description');
		//echo "<br>date before : ".$this->input->post('date');
		
                //if($this->input->post('date') != '')
                //{    
                 //   $parts = explode('-',$this->input->post('date'));
                 //   $data['date'] = $parts[2] . '-' . $parts[0] . '-' . $parts[1];
               // }
               // else
               //     $data['date'] = '';
                
                $data['date'] = $this->input->post('date_year').'-'.$this->input->post('date_month').'-'.$this->input->post('date_day');
                
                
		
		//$data['date'] = date("Y-m-d",strtotime($this->input->post('date')));
		//echo "<br>date after : ".$data['date'];
		
		$data['price'] = $this->input->post('price');
		$data['sort_order'] = $this->input->post('sort_order');
		$data['fe_visibility'] = $this->input->post('fe_visibility');
		$data['no_registrants'] = $this->input->post('no_registrants');
		$data['event_type'] = $this->input->post('event_type');
                //echo "<pre>POST in controller: ";   print_r($this->input->post());   echo "</pre>";
		if($id > 0)
		{
			
			$event_details = $this->Admin_model->getEventDetails($id);
			//echo "<pre>event_details: ";   print_r($event_details);   echo "</pre>";
			$data['name'] = $event_details[0]->name;
			$data['description'] = $event_details[0]->description;
			$data['date'] = $event_details[0]->date;
			$data['price'] = $event_details[0]->price;
			$data['sort_order'] = $event_details[0]->sort_order;
			$data['fe_visibility'] = $event_details[0]->fo_visibility;
			$data['no_registrants'] = $event_details[0]->max_num_of_registrants;
			$data['event_type'] = $event_details[0]->event_type;
			$data['update_event_id'] = $event_details[0]->event_id;
		}    
		elseif($this->input->post('submit'))
		{
			//$data['fe_visibility'] = $this->input->post('fe_visibility');
			//echo "<br>Event id to update: ".$this->input->post('event_id_to_update');
			//die();
			//if(isset($this->input->post('event_id_to_update')) && $this->input->post('event_id_to_update') > 0)
			if($this->input->post('event_id_to_update') > 0)    
			{
				//echo "<br>In update case";    
				$data['event_id_to_update'] = $this->input->post('event_id_to_update');
				$message = $this->Admin_model->update_event($data);
				$data['update_event_id'] = $this->input->post('event_id_to_update');
				$data['msg'] = "Event Updated.";
			}    
			else
			{
				$message = $this->Admin_model->add_event($data);
//                    if ($message == 2)
//                    {
//                            $data['msg'] = "Username already exist.";
//                            $data['password'] = $this->input->post('password');
//                    }
//                    else
//                    {
		
			   // redirect("admin/create_event/success", 'refresh');
			//}
				$data['name'] = "";
				$data['description'] = "";
				
				$data['date'] = "";
				$data['price'] = "";
				$data['sort_order'] = "";
				$data['fe_visibility'] = "";
				$data['no_registrants'] = "";
				$data['sort_order'] = "";
				$data['event_type'] = "";
				$data['msg'] = "Event Added.";
				$this->load->view('admin/success' , $data);
			}    
			
		}
		else
		{
			   
		}
		if($data['msg'] != 'Event Added.')
			$this->load->view('admin/create_event' , $data);
	}
	
	public function event_list($id = 0)
	{
            //echo "HERE";
            $data['msg'] = "";
            
            if($id > 0)
            {
                $this->Admin_model->deleteEvent($id);
                $data['msg'] = "Event deleted.";
            }    
            
            
            /**** Creating CSV file start ********/
            //echo "<br>Cwd: ".getcwd(); //die();
            $front_path = 'events.csv';
            $file1Location = $front_path;
            $fh = fopen( $file1Location, 'w') or die("can't open file"); 
           
            $type_array = array('Date'=>'Date','Price'=>'Price','Number of paid users'=>'paid_user_type_count','Total number of stations created'=>'stations_created','Total number of playlists created'=>'playlist_created','Total number of likes'=>'likes_count','Total number of dislikes'=>'dislikes_count');
            $counter = 1;
            
            //$csv_array[$counter][0] = array("0"=>"11","1"=>"22");
			$csv_array[$counter][0] = "Name";
			$csv_array[$counter][1] = "Description";
            $csv_array[$counter][2] = "Date";
            $csv_array[$counter][3] = "Price";
            $csv_array[$counter][4] = "Sort Order";
            $csv_array[$counter][5] = "Front End Visibility";
            $csv_array[$counter][6] = "Max. Number of Registrants";
            $csv_array[$counter][7] = "Event Type";
            
            $all_events = $this->Admin_model->getEventsList();
            //echo "<pre>ALL events:  "; print_r($all_events);echo "</pre>";
            foreach($all_events as $index)
            {
                $counter++;
				$csv_array[$counter][0] = $index->name;
				$csv_array[$counter][1] = $index->description;
                $csv_array[$counter][2] = $index->date;
                $csv_array[$counter][3] = $index->price;
                $csv_array[$counter][4] = $index->sort_order;
                $csv_array[$counter][5] = $index->fo_visibility;
                $csv_array[$counter][6] = $index->max_num_of_registrants;
                $csv_array[$counter][7] = $index->event_type;
            }
            
            //echo "<pre>csv arr "; print_r($csv_array);echo "</pre>";
            $this->csvDump($csv_array,$fh);
            $data['csv_filepath'] = $front_path;

            /**** Creating CSV file end   ********/
            
            
            
            
            //$data['users'] = $this->Support_model->getUserList($search_by, $keyword,  $this->uri->segment(5),$config['per_page']);
            $data['users'] = $this->Admin_model->getEventsList();
            
            
            foreach($data['users'] as $event_index)
            {
                $event_id = $event_index->event_id;
                //echo "<br>Event ID : ".$event_id;
                $event_registrants = $this->Admin_model->get_event_registrants($event_id);
                //echo "<pre>event_index:  "; print_r($event_index);echo "</pre>";
				$event_name = $event_index->name;
                //echo "<br>Event name : ".$event_name;
                /****** each event cvs file starts ***/
				$this_event_name = str_replace(" ","_",$event_name);
                $this_front_path = $this_event_name.'_event_'.$event_id.'.csv';
                $this_file1Location = $this_front_path;
                $fh = fopen( $this_file1Location, 'w') or die("can't open file"); 
                
                $csv_array = array(); 
                $csv_array[$counter][0] = "Class Date";
                $csv_array[$counter][1] = "Surname";
                $csv_array[$counter][2] = "First Name";
                $csv_array[$counter][3] = "Middle Name";
                $csv_array[$counter][4] = "Last Name";
                $csv_array[$counter][5] = "Name on Certificate";
                $csv_array[$counter][6] = "Suffix";
                $csv_array[$counter][7] = "Street Address";
                $csv_array[$counter][8] = "City";
                $csv_array[$counter][9] = "State";
                $csv_array[$counter][10] = "Zip";
                $csv_array[$counter][11] = "Phone";
                $csv_array[$counter][12] = "Email";
                $csv_array[$counter][13] = "Event Type";
                $this->csvDump($csv_array,$fh);
				$csv_array = array();
                $this_counter = 1;
                foreach($event_registrants as $this_event)
                {
                    $this_counter++;
                    $csv_array[$this_counter][0] = $this_event->class_date;
                    $csv_array[$this_counter][1] = $this_event->surname;
                    $csv_array[$this_counter][2] = $this_event->first_name;
                    $csv_array[$this_counter][3] = $this_event->middle_name;
                    $csv_array[$this_counter][4] = $this_event->last_name;
                    $csv_array[$this_counter][5] = $this_event->name_on_certificate;
                    $csv_array[$this_counter][6] = $this_event->suffix;
                    $csv_array[$this_counter][7] = $this_event->street_address;
                    $csv_array[$this_counter][8] = $this_event->city;
                    $csv_array[$this_counter][9] = $this_event->state;
                    $csv_array[$this_counter][10] = $this_event->zip;
                    $csv_array[$this_counter][11] = $this_event->phone;
                    $csv_array[$this_counter][12] = $this_event->email;
                    $csv_array[$this_counter][13] = $this_event->event_type;
                    
                } 
                $this->csvDump($csv_array,$fh);
				//echo "<br>Event name : ".$event_name;
				//echo "<br>this_front_path : ".$this_front_path;
                $data[$event_name.'_csv_filepath_'.$event_id] = $this_front_path;
                /****** each event cvs file ends ***/
                
                
                
            }    
            //echo "<pre>Data : ";   print_r($data);   echo "</pre>";
            $this->load->view('admin/events_list' , $data);
        }
	
        
        public function logout() {
		$this->session->set_userdata('logged_in' , 0);
		redirect('http://topofthelinesecurity.com/_index.php?admin');
		//$data['error'] = '';
		//$this->load->view('admin/login' , $data);	
	}
        
        
        public function events_in_csv()
        {
            //echo "<br>Cwd: ".getcwd(); //die();
            $front_path = 'events.csv';
            $file1Location = $front_path;
            $fh = fopen( $file1Location, 'w') or die("can't open file"); 
           
            $type_array = array('Date'=>'Date','Price'=>'Price','Number of paid users'=>'paid_user_type_count','Total number of stations created'=>'stations_created','Total number of playlists created'=>'playlist_created','Total number of likes'=>'likes_count','Total number of dislikes'=>'dislikes_count');
            $counter = 1;
            
            //$csv_array[$counter][0] = array("0"=>"11","1"=>"22");
            $csv_array[$counter][0] = "Date";
            $csv_array[$counter][1] = "Price";
            $csv_array[$counter][2] = "Sort Order";
            $csv_array[$counter][3] = "Front End Visibility";
            $csv_array[$counter][4] = "Max. Number of Registrants";
            $csv_array[$counter][5] = "Event Type";
            
            $all_events = $this->Admin_model->getEventsList();
            //echo "<pre>ALL events:  "; print_r($all_events);echo "</pre>";
            foreach($all_events as $index)
            {
                $counter++;
                $csv_array[$counter][0] = $index->date;
                $csv_array[$counter][1] = $index->price;
                $csv_array[$counter][2] = $index->sort_order;
                $csv_array[$counter][3] = $index->fo_visibility;
                $csv_array[$counter][4] = $index->max_num_of_registrants;
                $csv_array[$counter][5] = $index->event_type;
            }
            
            //echo "<pre>csv arr "; print_r($csv_array);echo "</pre>";
            $this->csvDump($csv_array,$fh);
            $data['csv_filepath'] = $front_path;
            $this->load->view('admin/events_list' , $data);
        }
        
        public function csvDump(array $fileData, $fileHandle)
        {
           $this->login_check();
           if ( count ($fileData) < 1 ) {
	    return 1;
	  }
	  
	  //fputcsv($fileHandle, array_keys( $fileData[0] ));  // dump out all keys
	  if (count ($fileData) > 0) {
	    foreach($fileData AS $row) {
	      fputcsv($fileHandle,$row);
	    }
	  }
        }
        
        
        
}	
?>