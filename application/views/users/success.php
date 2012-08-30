<?php 
header('Expires: Mon, 14 Oct 2002 05:00:00 GMT');              // Date in the past
header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); // always modified
header('Cache-Control: no-store, no-cache, must-revalidate');  // HTTP 1.1
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');       
?>
	<div class="SpacerDiv"></div>
    <div class="PageTitle"><h2><?php echo $page_title; ?></h2></div>
	<div class="PageDescription">
		<p>Your registration is complete.</p>
	</div>
