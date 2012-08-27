<?php 
header('Expires: Mon, 14 Oct 2002 05:00:00 GMT');              // Date in the past
header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); // always modified
header('Cache-Control: no-store, no-cache, must-revalidate');  // HTTP 1.1
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');       
?>
<?php include("header.php");?>
<script type="text/JavaScript">
 
function confirmDelete(){
var agree=CONFIRM("Are you sure you want to delete this event?");
if(agree)
     return true;
else
     return false;
}
</script>
<div id="right">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    
        <tr>
            <td class="thead" height="23"><div class="dhead"><b>Add Event </b></div></td>
        </tr>
        <tr height="3"><td></td></tr>
        <tr>
            <td style="border: 1px solid #BCBCBC">
               <!--
<form action="<?php echo base_url();?>support/create_user" method="post">
-->
               <?php echo form_open("".base_url()."_index.php?admin/create_event",array("method"=>"post","onsubmit"=>"javascript:return check_pw_length('password');"));?>
               

                <div style="float:right; padding-right:10px;">
<!--                    <a href="<?php echo base_url().$csv_filepath;?>" class="link">Events In CSV</a>-->
                </div>
                <h3 style="padding-left:5px;">Creating Event</h3>
                <table width="100%" cellpadding="5" border="0">
                <?php if ($msg !="") {?>
                <tr>
                    <td colspan="7" class="msg"><?php echo $msg;?></td>
                </tr>
                <?php }?>
                
                
                <tr>
                    <th  align="left" width="10">Date</th>
                    <th width="145">Price</th>
                    <th width="100">Sort Order</th>
                    <th>Front End Visibility</th>
                    <th>Max. Registrants</th>
                    <th>Event Type</th>
                    <th align="left">Action</th>
                </tr>
                
                <?PHP
                //echo "<pre>events: ";   print_r($users);   echo "</pre>";
                //die();
                foreach($users as $user)
                {
					$user->name = str_replace(" ","_",$user->name);
                    echo "<tr>";
                    echo "<td>".$user->date."</td>";
                    echo "<td align=center>".$user->price."</td>";
                    echo "<td align=center>".$user->sort_order."</td>";
                    echo "<td align=center>".$user->fo_visibility."</td>";
                    echo "<td align=center>".$user->max_num_of_registrants."</td>";
                    echo "<td align=center>".$user->event_type."</td>";
                    echo "<td>
                            <a href=".base_url()."_index.php?admin/create_event/".$user->event_id.">Edit</a>&nbsp;&nbsp;
                            <a onclick=\"return confirm('Are you sure you want to delete this event?')\"  href=".base_url()."_index.php?admin/event_list/".$user->event_id.">Delete</a>&nbsp;&nbsp;
                            <a href=".base_url()."$user->name"."_event_$user->event_id.csv>CSV</a>    
                        </td>";
                    echo "</tr>";
                    
                ?>
                
                <?PHP
                }
                ?>
                </table>
                
                
                </form>
                
                
        </td></tr>
        </table>
</div>  
<?php include("footer.php");?>