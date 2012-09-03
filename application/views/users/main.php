	<div class="BannerBorder">
		<div class="BannerBorderOverlay"></div>
		<img src="/images/TopOfTheLineSecurity_Training_Courses.jpg" class="BannerImg">
	</div>
	<div class="PageDescription">
		<h2><?php echo $page_title; ?></h2>
		<p>We offer comprehensive courses to get you the knowledge and certification you need to jumpstart your career.  Pick from the choices below, and let's get started.</p>
	</div>
           <!--<form action="<?php echo base_url();?>support/create_user" method="post">-->
               

<!--<div style="float:right; padding-right:10px;"><a href="<?php echo base_url();?>admin/event_list" class="link">View Events</a></div>-->
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
				$EventURL = str_replace(" ", "_", "$events_arr[$i]");
				//echo "<br>Events: ".$events_list[0]->events;
				echo "<div class='CourseInstance'><a href=".base_url()."training/courses/event/".$EventURL.">".$events_arr[$i]."</a></div>";
			}
		}    
		?>
		<div class="CourseInstance">
			<a href="<?php echo base_url()."training/contact/"; ?>">Private Instruction</a>
		</div>
	</div>