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
		
		<?php 
		if($event_name == 'Utah Concealed Firearm Training' ) { ?>
			<?php include('utah_description.php'); ?>
		<?php } elseif($event_name == 'NRA Basic Firearm Training Program' ) { ?>
			<?php include('nra_description.php'); ?>
		<?php } else { ?>
			<?php include('securitytraining_description.php'); ?>
		<?php }; ?>
		
		<p>Choose from the scheduled courses below, or <a href="<?php echo base_url()."training/contact/"; ?>">contact us</a> to request a private instruction session.</p>
		
		<?php if (!empty($event_detail)) { ?>
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
							echo "<div class='EventProp EventPrice'>Registration fee: $".$index->price."</div>";  
							echo "<div class='EventProp'>".$index->description."</div>";   
							//echo "<div class='EventProp'>Sort Order: ".$index->sort_order."</div>";    
							echo "<div class='EventProp Register'><a href=".base_url()."training/courses/registration/".$index->event_url."/".$index->event_id.">Register Now</a></b></div>";
						echo "</div></a>";
                    }
                    ?>
                   
                </table>
				
			<?php } else { ?>
				<?php echo "<a href=".base_url()."training/contact>"; ?>
					<div class='EventInstance'>
						<h3>No classes are currently scheduled.</h3>
						<p>Please <a href="<?php echo base_url()."training/contact/"; ?>">contact us</a> to request a class or a private instruction.</p>
						<p>Thank you.</p>
					</div>
				</a>
			<?php } ?>
	</div>