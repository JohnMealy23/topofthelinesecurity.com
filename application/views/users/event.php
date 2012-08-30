<?php 
header('Expires: Mon, 14 Oct 2002 05:00:00 GMT');              // Date in the past
header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); // always modified
header('Cache-Control: no-store, no-cache, must-revalidate');  // HTTP 1.1
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');       
?>
	<?php 
		if($event_name == 'Utah Concealed Firearm Training' ) { ?>
			<div class='BannerBorder'>
				<div class="BannerBorderOverlay"></div>
				<img src="/images/TopOfTheLineSecurity_UtahConcealedFirearms.jpg" class="BannerImgSm">
			</div>
		<?php } elseif($event_name == 'NRA Basic Firearm Training Program' ) { ?>
			<div class="BannerBorder">
				<div class="BannerBorderOverlay"></div>
				<img src="/images/TopOfTheLineSecurity_NRABanner.jpg" class="BannerImg">
			</div>
		<?php } else { ?>
			<div class="BannerBorder">
				<div class="BannerBorderOverlay"></div>
				<img src="/images/TopOfTheLineSecurity_SecurityTraining.jpg" class="BannerImg">
			</div>
		<?php }; ?>
	<div class="PageDescription">
		<h2><?php echo $event_name ?></h2>
	
                <table width="100%" cellpadding="5">
                <?php if ($msg !="") {?><div class="msg"><?php echo $msg;?><?php }?>
                <?PHP 
                    foreach($event_detail as $index)
                    {
						echo "<a href=".base_url()."training/courses/registration/".$index->event_url ."/".$index->event_id."><div class='EventInstance'>";
							echo "<h3>";
								if($index->name != '') {
									echo $index->name." - "; 
								}
								echo date("F d, Y",strtotime($index->date)); 
							echo "</h3>";
							echo "<div class='EventProp'>$".$index->price."</div>";  
							echo "<div class='EventProp'>".$index->description."</div>";   
							//echo "<div class='EventProp'>Sort Order: ".$index->sort_order."</div>";    
							echo "<div class='EventProp Register'><a href=".base_url()."training/courses/registration/".$index->event_url."/".$index->event_id.">Register Now</a></b></div>";
						echo "</div></a>";
                    }
                    ?>
                   
                </table>
	</div>