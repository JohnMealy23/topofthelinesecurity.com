<?php 
header('Expires: Mon, 14 Oct 2002 05:00:00 GMT');              // Date in the past
header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); // always modified
header('Cache-Control: no-store, no-cache, must-revalidate');  // HTTP 1.1
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');       
?>
<?php include("header.php");?>

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    
        <tr>
            <td class="thead" height="23"><div class="dhead"><b>Events</b></div></td>
        </tr>
        <tr height="3"><td></td></tr>
        <tr>
            <td style="border: 1px solid #BCBCBC">
               <!--
<form action="<?php echo base_url();?>support/create_user" method="post">
-->
               
               
<!--                <div style="float:right; padding-right:10px;"><a href="<?php echo base_url();?>index.php/admin/event_list" class="link">View Events</a></div>-->
                <h3 style="padding-left:5px;">Events</h3>
                <table width="100%" cellpadding="5">
                <?php if ($msg !="") {?>
                <tr>
                        
                        <td class="msg"><?php echo $msg;?></td>
                    </tr>
                    <?php }?>
                    
                    
                    <?PHP
                    if($events_list[0]->events != '')
                    {  
                        $events_arr = explode(",",$events_list[0]->events);
                        $total_events = count($events_arr);
                        for($i=0;$i<$total_events;$i++)
                        {    
                            //echo "<br>Events: ".$events_list[0]->events;
                            echo "<tr><td><a href=".base_url()."_index.php?courses/event/".$events_arr[$i].">Events ".$events_arr[$i]."</a></td></tr>";
                        }
                    }    
                    ?>
                    
                   
                    
                    
                </table>
                
                
        </td></tr>
        </table>
  
<?php include("footer.php");?>