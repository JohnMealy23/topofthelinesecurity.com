<script type="text/JavaScript">
 
function confirmDelete(){
var agree=CONFIRM("Are you sure you want to delete this event?");
if(agree)
     return true;
else
     return false;
}
</script>
<div class="AdminContainer">
				   
               <?php echo form_open("".base_url()."admin/create_event",array("method"=>"post","onsubmit"=>"javascript:return check_pw_length('password');"));?>
                <table width="100%" cellpadding="5" border="0">
                <?php if ($msg !="") {?>
                <tr>
                    <td colspan="7" class="msg"><?php echo $msg;?></td>
                </tr>
                <?php }?>
                
                
                <tr>
                    <th width="100">Date</th>
                    <th width="150">Name</th>
                    <th>Price</th>
                    <th>Sort Order</th>
                    <th>Front End Visibility</th>
                    <th>Max. Registrants</th>
                    <th width="150">Event Type</th>
                    <th>Action</th>
                </tr>
                
                <?PHP
                //echo "<pre>events: ";   print_r($users);   echo "</pre>";
                //die();
                foreach($users as $user)
                {
                    echo "<tr>";
                    echo "<td>".$user->date."</td>";
                    echo "<td>".$user->name."</td>";
                    echo "<td align=center>".$user->price."</td>";
                    echo "<td align=center>".$user->sort_order."</td>";
					if(($user->fo_visibility) == 1){
						echo "<td align=center>Yes</td>";
					} else {
						echo "<td align=center>No</td>";
					}
                    echo "<td align=center>".$user->max_num_of_registrants."</td>";
                    echo "<td align=center>".$user->event_type."</td>";
					
					$user->name = str_replace(" ","_",$user->name);
                    echo "<td>
                            <a href=".base_url()."admin/create_event/".$user->event_id.">Edit</a>&nbsp;&nbsp;
                            <a onclick=\"return confirm('Are you sure you want to delete this event?')\"  href=".base_url()."admin/event_list/".$user->event_id.">Delete</a>&nbsp;&nbsp;
                            <a href=".base_url()."tmp/csv/".$user->name."_event_$user->event_id.csv>CSV</a>    
                        </td>";
                    echo "</tr>";
                    
                ?>
                
                <?PHP
                }
                ?>
                </table>
                
                
        </form>  
</div>