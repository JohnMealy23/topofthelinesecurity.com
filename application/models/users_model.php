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

class Users_model extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
        
        
    }
	
	
	
	
	
    // check for allowed region
    //public function add_event($new_user_vals , $arrgroup)
    public function add_registration($new_user_vals)
    {
        //echo "<pre>POST in model: ";   print_r($new_user_vals);   echo "</pre>"; die();
        //$user_chk = $this->db->query("SELECT Username FROM supportpanel_users WHERE Username='".$new_user_vals['username']."'");
        //if($user_chk->num_rows > 0)
        // {
                //return 2;
        //}
        //else
        //{
            $insert_q = "INSERT INTO registered_users (class_date , surname , first_name , last_name , suffix , street_address,city,state,zip,phone,middle_name,name_on_certificate,email,event_id,event_type) 
                        VALUES (".$this->db->escape($new_user_vals['date'])." , ".$this->db->escape($new_user_vals['surname'])." ,
                        ".$this->db->escape($new_user_vals['f_name'])." , ".$this->db->escape($new_user_vals['l_name'])." ,
                        ".$this->db->escape($new_user_vals['suffix'])." , ".$this->db->escape($new_user_vals['street_address'])." ,
                        ".$this->db->escape($new_user_vals['city'])." , ".$this->db->escape($new_user_vals['state'])." ,
                        ".$this->db->escape($new_user_vals['zip'])." , ".$this->db->escape($new_user_vals['phone'])." ,
                        ".$this->db->escape($new_user_vals['m_name'])." , ".$this->db->escape($new_user_vals['name_on_certificate'])." ,    
                        ".$this->db->escape($new_user_vals['email'])." , 
                        ".$this->db->escape($new_user_vals['event_id'])." , ".$this->db->escape($new_user_vals['event_type']).")";
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


    public function get_events_list()
    {
        // $get_events_q = "SELECT count( * ) , `event_type`
        //            FROM `registered_users`
        //          GROUP BY `event_type`";

        $get_events_q = "SELECT group_concat( DISTINCT event_type ) as events FROM  events where fo_visibility = 1";


        $query = $this->db->query($get_events_q);
        if( $query->num_rows() > 0 ) {
        return $query->result();
        } else {
            return array();
        }
    }


    public function get_event_detail($event_type)
    {
        $event_detail_q = "SELECT * FROM events where event_type = '".$event_type."' and fo_visibility = 1 order by sort_order asc";
        $query = $this->db->query($event_detail_q);
        if( $query->num_rows() > 0 ) 
        {
            return $query->result();
        } 
        else 
        {
            return array();
        }
    }
	
	
	public function get_event_detail_from_id($event_id)
    {
        $event_detail_q = "SELECT * FROM events where event_id = '".$event_id."'";
        $query = $this->db->query($event_detail_q);
        if( $query->num_rows() > 0 ) 
        {
            return $query->result();
        } 
        else 
        {
            return array();
        }
    }
	
	
	public function update_fe_visibility($event_id)
    { //echo "<br>Partner 2 : ".$partner;
		
		
		$registered_users_q = "SELECT count(*) as registered_users_count FROM registered_users where event_id = '".$event_id."'";
        $query = $this->db->query($registered_users_q);
        if( $query->num_rows() > 0 ) 
        {
            $registered_users_res = $query->result();
			//echo "<pre>registered_users_res: ";   print_r($registered_users_res);   echo "</pre>";
			$registered_users_count = $registered_users_res[0]->registered_users_count;
        } 
		
		// Working on
		$event_users_limit_q = "SELECT * FROM events where event_id = '".$event_id."'";
        $query = $this->db->query($event_users_limit_q);
        if( $query->num_rows() > 0 ) 
        {
            $event_users_limit = $query->result();
			//echo "<pre>registered_users_res: ";   print_r($registered_users_res);   echo "</pre>";
			$max_num_of_registrants = $event_users_limit[0]->max_num_of_registrants;
        } 
		
	//echo "<br>Registered users count : ".$registered_users_count;
        //echo "<br>User limit in event : ".$max_num_of_registrants;
		
		// =>
		if($max_num_of_registrants <= $registered_users_count)
		{
                   // echo "<br>Updating";
			$data = array(
                        'fo_visibility' => 0
                    );
		  $this->db->where('event_id', $event_id);
		  $this->db->update('events', $data); 
		 // echo $this->db->last_query();
		  return 1;
		}
	}
	
	
}
?>