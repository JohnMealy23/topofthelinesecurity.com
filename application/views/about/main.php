<?php 
header('Expires: Mon, 14 Oct 2002 05:00:00 GMT');              // Date in the past
header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); // always modified
header('Cache-Control: no-store, no-cache, must-revalidate');  // HTTP 1.1
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');       
?>
<?php include("header.php");?>

    <div class="PageTitle"><h2>Courses</h2></div>
	<div class="PageDescription">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.</div>
           <!--<form action="<?php echo base_url();?>support/create_user" method="post">-->
               

<!--<div style="float:right; padding-right:10px;"><a href="<?php echo base_url();?>index.php/admin/event_list" class="link">View Events</a></div>-->
	<div class="PageContent"><?php if ($msg !="") {?>
   <div class='msg'><?php echo $msg;?></div>
		<?php }?>
		
		
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
<?php include("footer.php");?>