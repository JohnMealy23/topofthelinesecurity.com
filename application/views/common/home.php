<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Events</title>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery.js" /></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/functions.js" /></script>
<link rel="stylesheet" media="all" href="<?php echo base_url();?>css/style.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/smoothness/jquery-ui-1.8.2.custom.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/styles.css" />
</head>
<body>
	<div id="main">
		<img src="../images/Topofthelinesecurity_logo_lg.png" class="HomeLogo">
		<div class="HomePanel">
			<div class="HomeBannerLeft">
				<h1>Security<br>Detail</h1>
			</div>
			<div id="HomeContentLeft">
				<img src="../images/Topofthelinesecurity_HomeSecurityDetail.jpg">
			</div>
		</div>
		<div class="HomePanel">
			<div class="HomeBannerRight">
				<h1>Security<br>Training</h1>
			</div>
						<div id="HomeContentLeft">
				<img src="../images/Topofthelinesecurity_Home_SecurityTraining.jpg">
				<?PHP
				if($events_list[0]->events != '')
				{  
					$events_arr = explode(",",$events_list[0]->events);
					$total_events = count($events_arr);
					for($i=0;$i<$total_events;$i++)
					{    
						//echo "<br>Events: ".$events_list[0]->events;
						echo "<div class='CourseInstance'><a href=".base_url()."index.php?courses/event/".$events_arr[$i].">Events ".$events_arr[$i]."</a></div>";
					}
				}    
				?>
				</div>
			</div>
			<div class="HomeClear"></div>
		</div>

<?php include("footer.php");?>