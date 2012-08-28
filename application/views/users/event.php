<?php 
header('Expires: Mon, 14 Oct 2002 05:00:00 GMT');              // Date in the past
header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); // always modified
header('Cache-Control: no-store, no-cache, must-revalidate');  // HTTP 1.1
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');       
?>

	<div class="ContentImage">
		<img src="/images/CoursesBackground.png">
	</div>
    <div class="PageTitle"><h2><?php echo $event_name ?></h2></div>
	<div class="PageDescription">
		<?php
		/*
			echo "Event Name: ".$event_name."<br>";
			if($event_name = 'NRA Basic Firearm Training Program') {
				echo 'NRA Desc';
			} elseif ($event_name = 'Utah Concealed Firearm Training') {
				include('UtahDescription.php');
			} else {
				echo "";
			}
			*/
		?>
	</div>
	
                <table width="100%" cellpadding="5">
                <?php if ($msg !="") {?>
                <tr>
                        
                        <td colspan="2" class="msg"><?php echo $msg;?></td>
                    </tr>
                    <?php }?>
                    
                    
                    <?PHP
                    
                    //echo "<pre>events_detail in view: ";   print_r($event_detail);   echo "</pre>";
                    
                    foreach($event_detail as $index)
                    {
						echo "<div class='EventInstance'>";
							echo "<h3>";
								if($index->name != '') {
									echo "<div class='EventTitle'><a href=".base_url()."training/courses/registration/".$index->event_url ."/".$index->event_id.">".$index->name."</a>: </div>"; 
								}
								echo "<div class='EventDate'>".date("F d, Y",strtotime($index->date))."</div>"; 
							echo "</h3>";
							echo "<div class='EventProp'>".$index->description."</div>"; 
							echo "<div class='EventProp'>$".$index->price."</div>";    
							//echo "<div class='EventProp'>Sort Order: ".$index->sort_order."</div>";    
							echo "<div class='EventProp'><a href=".base_url()."training/courses/registration/".$index->event_url."/".$index->event_id.">Register</a></b></div>";
						echo "</div>";
                    }
                    ?>
                   
                </table>
