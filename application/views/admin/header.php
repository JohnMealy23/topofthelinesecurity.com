<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery.js" /></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/functions.js" /></script>
<link rel="stylesheet" media="all" href="<?php echo base_url();?>css/style.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/smoothness/jquery-ui-1.8.2.custom.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/styles.css" />
</head>
<body>
	<div id="main">
    	<div id="header">
        	<div class="main-head">Admin Panel</div>
        </div>
    	<div id="content">
        <?php 
		//if(isset($_SESSION["loggedin_user"]) && $_SESSION["loggedin_user"]!=""){?>
        	<div id="left">
            	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td class="thead" height="23"><div class="dhead"><b>Modules</b></div></td>
                    </tr>
                    <tr height="3"><td></td></tr>
                    <tr>
                    	<td style="border: 1px solid #BCBCBC">
                        <?php 
                        
                        //View Events
                        $modules_array = array("Change Password"=>"reset_password","Create Event"=>"create_event","View Events"=>"event_list");
						//if(isset($this->session->userdata['user_modules'])){
						//	foreach($this->session->userdata['user_modules'] as $moduleid=>$mod_details) { 
								
                                                if(isset($modules_array)){
							foreach($modules_array as $mod_name=>$mod_link) { ?>
						            
                                                            
                                                            
                                                                <?php
								//$mod_detail_arr = explode(",",$mod_details);
								?>
								<div class="dmenu">
                           			<img src="<?php echo base_url();?>images/dmenu.gif" width="2" height="3" border="0" alt="" align="absmiddle">&nbsp;&nbsp;
<!--                            		<a href="<?php echo base_url();?><?php //echo $mod_detail_arr[1];?>" class="damenu"><?php //echo $mod_detail_arr[0];?></a>-->
                               <a href="<?php echo base_url();?><?php echo "_index.php?admin/".$mod_link;?>" class="damenu"><?php echo $mod_name;?></a>
                            </div>
							<?php }
						}?>
                        <?php /*?><div class="dmenu"><img src="<?php echo base_url();?>images/dmenu.gif" width="2" height="3" border="0" alt="" align="absmiddle">&nbsp;&nbsp;
                            <a href="<?php echo base_url();?>support/changepw" class="damenu">Change Password</a></div><?php */?>
                           <div class="dmenu"><img src="<?php echo base_url();?>images/dmenu.gif" width="2" height="3" border="0" alt="" align="absmiddle">&nbsp;&nbsp;
                            <a href="<?php echo base_url();?>_index.php?admin/logout" class="damenu">Logout</a></div>
                            
                            
					</td></tr>
					</table>
                </div>
                <?php //}?>
				<h1 class="company_name">
                                    <?php //echo $this->session->userdata['partnerName'];?>
<!--                                    Admin Panel-->
                                </h1>