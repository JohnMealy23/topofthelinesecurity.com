<?php
/*
------------------------------------------------
-		USER MODEL 1.0						   -
-		Developed By: Ghulam Farid			   -
-		List of Functions					   -
-			1- determineusercountry            -
-			2- checkservicecountry             -
-			3- _prep_password                  -
-			4- insert_user                     -
-			5- return_user                     -
-			6- userchangepassword			   -
-			7- userforgotpassword	           -
-           8- userasignpackage                -
-           9- checkavailableuname             -
-           9- get_user_phone                  -
-           9- get_user_name                   -
------------------------------------------------
*/

class Admin_model extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
        
        
    }
	
	
	public function login_check($form_vals)
    {
		$query = "SELECT * 
                  FROM supportpanel_users su 
                  WHERE su.`Username` = '".$form_vals['username']."' AND su.`Password` = '".md5($form_vals['password'])."'";
		//echo '<pre>Query: '.$query.'</pre>';
		
		$result = $this->db->query($query);
		//echo '<pre>Query: '.print_r($result->result_array(),true).'</pre>';
		//exit;
		if ( $result->num_rows() > 0 ) {	
		   
			$row = $result->result_array();
			 
			$this->session->set_userdata('ID' , $row[0]['ID']);
			$this->session->set_userdata('Username' , $row[0]['Username']);
			
			$this->session->set_userdata('logged_in' , 1);
			return $row[0]['ID'];
		}
		else
		{
			return 0;
		}
    }
	
	
	
	
	// check for allowed region
        //public function add_event($new_user_vals , $arrgroup)
	public function add_event($new_user_vals)
	{
            //echo "<pre>POST in model: ";   print_r($new_user_vals);   echo "</pre>";
            //$user_chk = $this->db->query("SELECT Username FROM supportpanel_users WHERE Username='".$new_user_vals['username']."'");
            //if($user_chk->num_rows > 0)
           // {
                    //return 2;
	   //}
	   //else
	   //{
							$insert_q = "INSERT INTO events (name,description,date , price , sort_order , fo_visibility , max_num_of_registrants , event_type , event_url ) 
                            VALUES (".$this->db->escape($new_user_vals['name']).",".$this->db->escape($new_user_vals['description']).",".$this->db->escape($new_user_vals['date'])." , ".$this->db->escape($new_user_vals['price'])." ,
                            ".$this->db->escape($new_user_vals['sort_order'])." , ".$this->db->escape($new_user_vals['fe_visibility'])." ,
                            ".$this->db->escape($new_user_vals['no_registrants'])." , ".$this->db->escape($new_user_vals['event_type'])." , ".$this->db->escape($new_user_vals['event_url']).")";
							
							
							
							
							
              //echo "<br>insert_q : ".$insert_q;
              //die();
              $query = $this->db->query($insert_q);
                return 1;                         
            //$uid = $this->db->insert_id();	
            //$member = $this->db->query("SELECT ID FROM supportpanel_usergroups WHERE Name='Member'");
            //echo 'Query: '.$this->db->last_query();
            //$member_group = $member->row_array();
            //print_r($arrgroup);
            //exit;
	   //}
	}
        
        public function update_event($new_user_vals)
	{
            
            $data = array(
			'name' => $new_user_vals['name'],
			'description' => $new_user_vals['description'],
            'date' => $new_user_vals['date'],
            'price' => $new_user_vals['price'],
            'sort_order' => $new_user_vals['sort_order'],
            'fo_visibility' => $new_user_vals['fe_visibility'],
            'max_num_of_registrants' => $new_user_vals['no_registrants'],
            'event_type' => $new_user_vals['event_type']
            );
            $this->db->where('event_id', $new_user_vals['event_id_to_update']);
            $this->db->update('events', $data); 

        }
        
	
	// FA
	//public function update_password($pw,$userid)
        public function update_password($pw)
    { //echo "<br>Partner 2 : ".$partner;
		$data = array(
               'Password' => md5($pw)
			   
            );

	  //$this->db->where('ID', $userid);
	  $this->db->update('supportpanel_users', $data); 
	 // echo $this->db->last_query();
	  return 1;
	}
        
        
        public function getEventsList()
        {
            $where = ' 1=1 ';
            $users = array();
            //if($partner_id > 0)
            //    $this->db->where(array('supportpanel_users.PartnerID_FK'=> $partner_id));
            //$this->db->select("*")->from('supportpanel_users')->limit($limit,$offset);
            $this->db->select("*")->from('events');
            $query = $this->db->get();
            //echo $this->db->last_query();
            if( $query->num_rows() > 0 ) 
            {
                return $query->result();
            } 
            else 
            {
                return array();
            }
	}
        
        public function deleteEvent($id)
        {
            $this->db->delete( 'events', array( 'event_id' => $id ) );
        }
        
        
        public function getEventDetails($id) {
        //get all records from users table
        //$query = $this->db->get( $this->db->user_db.''.'.territory_countries' );
        
            
        //$this->db->select('*');
        //    $this->db->from('.latest_musics_albums');
        //    $this->db->where('AlbumID_FK',$albumID);
          
        //    $query = $this->db->get();    
            
            
        $this->db->where(array('event_id'=> $id));
        $this->db->select("*")->from('events');
        $query = $this->db->get();
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } 
    
    
    public function get_event_registrants($id) {
        //get all records from users table
        //$query = $this->db->get( $this->db->user_db.''.'.territory_countries' );
        
            
        //$this->db->select('*');
        //    $this->db->from('.latest_musics_albums');
        //    $this->db->where('AlbumID_FK',$albumID);
          
        //    $query = $this->db->get();    
            
            
        $this->db->where(array('event_id'=> $id));
        $this->db->select("*")->from('registered_users');
        $query = $this->db->get();
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } 
    
    
    
    
    
        
}
?>