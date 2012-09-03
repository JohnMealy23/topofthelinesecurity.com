<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="For all your security needs.">
<meta name="keywords" content="Top of the Line Security, Top of the Line Security Training, Security Personnel, Yonkers Security">
<title><?php echo $sitesection; ?></title>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.1.min.js" /></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/functions.js" /></script>
<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:700,600,500' rel='stylesheet' type='text/css'>
<link rel="stylesheet" media="all" href="<?php echo base_url();?>css/style.css">
<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">

<script>
	$(document).ready(function(){		
		$(".Extrude").each(
			function() {
				x = $(this).html();
				$(this).attr('title',x);
		})
	});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34503311-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
	<div id="main">
    	<div id="header">
			<!--<div class="main-head">Admin Panel</div>-->
			<a href="<?php echo base_url(); ?>">
				<div id="Logo"></div>
			</a>
			<div id="SiteSection">
				<h1><?php echo $sitesection; ?></h1>
			</div>
			<div class="TopNavShadowControl">
				<div id="TopNav">
					
					 <?php       
				//if(isset($this->session->userdata['user_modules'])){
				//	foreach($this->session->userdata['user_modules'] as $moduleid=>$mod_details) { 

				if(isset($navlinks))
				{
					foreach($navlinks as $mod_name=>$mod_link)
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
  
            
        <?php //}?>