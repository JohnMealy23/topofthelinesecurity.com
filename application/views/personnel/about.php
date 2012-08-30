<?php 
header('Expires: Mon, 14 Oct 2002 05:00:00 GMT');              // Date in the past
header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); // always modified
header('Cache-Control: no-store, no-cache, must-revalidate');  // HTTP 1.1
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');       
?>
	<div class='BannerBorder'>
		<div class="BannerBorderOverlay"></div>
		<img src="/images/TopOfTheLineSecurity_Personnel_About.jpg" class="BannerImg">
	</div>
	<div class="PageDescription">
		<h2><?php echo $page_title; ?></h2>
		<p>Top of the Line Security, Inc. offers a wide range of security services.  Our security officers must pass an extensive background check, undergo comprehensive training, and submit to a stringent interview process before being considered for employment.<p>
		<p>Top of the Line Security, Inc. uses both armed and unarmed licensed security officers for all security services we provide. Our security personnel follow both types of security programming:  "hard" and "soft" approach of security orientation.  The hard approach utilized a police type of uniform and training historically used in the private and governmental sectors. The "soft" approach utilizes a blazer, slacks, shirt and tie which is more conducive to a cooperative and/or professional public relations posture.</p>
	</div>
