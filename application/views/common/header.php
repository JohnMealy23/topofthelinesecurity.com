<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Top of the Line Security Training - <?php echo $page_title; ?></title>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery.js" /></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/functions.js" /></script>
<link rel="stylesheet" media="all" href="<?php echo base_url();?>css/style.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/smoothness/jquery-ui-1.8.2.custom.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/styles.css" />
</head>
<body>
	<div id="main">
    	<div id="header">
			<!--<div class="main-head">Admin Panel</div>-->
			<div id="Logo">
			</div>
			<div id="SiteSection" class="Extrude">
				<h1>Top of the Line Security Training</h1>
			</div>
			<div class="TopNavShadowControl">
				<div id="TopNav">
					
					 <?php            
				//View Events
				$modules_array = array("Home"=>"home","Courses"=>"training/courses","About"=>"training/about","Contact"=>"training/about");
				//if(isset($this->session->userdata['user_modules'])){
				//	foreach($this->session->userdata['user_modules'] as $moduleid=>$mod_details) { 

				if(isset($modules_array))
				{
					foreach($modules_array as $mod_name=>$mod_link)
					{ ?>
							<a class="FrontEndNav" href="<?php echo base_url();?><?php echo $mod_link;?>" class="NavLink" title="<?php echo $mod_name;?>"><?php echo $mod_name;?></a>

				<?php }
				}?>
				</div>
			</div>
        </div>
    	<div id="content">
        <?php 
		//if(isset($_SESSION["loggedin_user"]) && $_SESSION["loggedin_user"]!=""){?>
        	
           	<!--table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom:10px;">
                    
                    <tr height="3"><td></td></tr>
                    <tr>
                    	<td height="50" style="border: 1px solid #BCBCBC">
                       
                        </td></tr>
            </table> -->
            
        <?php //}?>
<!--                <h1 class="company_name">
                </h1>-->