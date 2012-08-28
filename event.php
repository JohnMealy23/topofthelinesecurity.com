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
            <td class="thead" height="23"><div class="dhead"><b>Event Details</b></div></td>
        </tr>
        <tr height="3"><td></td></tr>
        <tr>
            <td style="border: 1px solid #BCBCBC">
               <!--
<form action="<?php echo base_url();?>support/create_user" method="post">
-->
               
               
<!--                <div style="float:right; padding-right:10px;"><a href="<?php echo base_url();?>index.php/admin/event_list" class="link">View Events</a></div>-->
                <h3 style="padding-left:5px;">Event Details</h3>
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
						echo "<tr><td width=90><b>Name: </b></td><td><a href=".base_url()."_index.php?courses/registration/".$index->event_type."/".$index->event_id.">".$index->name."</a></td></tr>"; 
						echo "<tr><td width=90><b>Description: </b></td><td>".$index->description."</td></tr>"; 
                        echo "<tr><td width=90><b>Event Date: </b></td><td>".date("F d, Y",strtotime($index->date))."</td></tr>";    
                        echo "<tr><td width=90><b>Price: </b></td><td>$".$index->price."</td></tr>";    
                        echo "<tr><td width=90><b>Sort Order: </b></td><td>".$index->sort_order."</td></tr>";    
                        echo "<tr><td colspan=2><b><a href=".base_url()."_index.php?courses/registration/".$index->event_type."/".$index->event_id.">Get Registered</a></b></td></tr>";    
                        echo "<tr><td height=30></td></tr>";
                        //echo "<tr><td><b>Event Date: </b></td><td>".$event_detail[0]->date."</td></tr>";    
                    }
                    ?>
                    
                   
                    
                    
                </table>
                
                
        </td></tr>
        </table>
  
<?php include("footer.php");?>