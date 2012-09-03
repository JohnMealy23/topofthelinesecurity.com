<script language="javascript">
function check_empty()
{
	//alert("HERE");
	//var date = document.getElementById('date').value;
	//alert(date);
	var name = document.getElementById('name').value;
	var description = document.getElementById('description').value;	
	var price = document.getElementById('price').value;
	var sort_order = document.getElementById('sort_order').value;
	var fe_visibility = document.getElementById('fe_visibility').value;
	var no_registrants = document.getElementById('no_registrants').value;
	var event_type = document.getElementById('event_type').value;
	if(price == '' || sort_order == '' || fe_visibility == '' || no_registrants == '' || event_type == '')
	{
		alert("Please fill in all required fields.");
		return false;
	}
	else
	{
		//alert("New Password and confirm password don't match.");
		return true;
	}	
}
</script>


<?PHP

function date_dropdown($year_limit = 10){
        $html_output = '    <div id="date_select" >'."\n";
        //$html_output .= '        <label for="date_day">Date of birth:</label>'."\n";

        
        /*months*/
        $html_output .= '           <select name="date_month" id="month_select" >'."\n";
        $months = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
            for ($month = 1; $month <= 12; $month++) {
                //if(strlen($month) == 1) $month_up = "0".$month;
                //else    $month_up = $month;
                $html_output .= '               <option value="' . $month . '">' . $months[$month] . '</option>'."\n";
            }
        $html_output .= '           </select>'."\n";

        /*days*/
        $html_output .= '           <select name="date_day" id="day_select">'."\n";
            for ($day = 1; $day <= 31; $day++) {
                //if(strlen($day) == 1) $day = "0".$day;
                $html_output .= '               <option>' . $day . '</option>'."\n";
            }
        $html_output .= '           </select>'."\n";

        
        
        /*years*/
        $html_output .= '<select name="date_year" id="year_select">'."\n";
            for ($year = date("Y"); $year <= (date("Y") + $year_limit); $year++) {
                $html_output .= '               <option>' . $year . '</option>'."\n";
            }
        $html_output .= '           </select>'."\n";

        $html_output .= '   </div>'."\n";
    return $html_output;
}

?>
<div class='AdminContainer'>
<div id="right">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">

        <tr height="3"><td></td></tr>
        <tr>
            <td>

               <?php echo form_open(base_url()."admin/create_event",array("method"=>"post","onsubmit"=>"return check_empty()"));?>
               
               <?PHP
               if($update_event_id != '')
                   echo "<input type=hidden name=event_id_to_update value=".$update_event_id.">";
               ?>

                <table width="100%" cellpadding="5">
                <?php if ($msg !="") {?>
                <tr>
                        <td></td>
                        <td class="msg"><?php echo $msg;?></td>
                    </tr>
                    <?php }?>
                    
                    
                    <tr>
                        <td>Event Name</td>
                        <td><input type="text" name="name" id="name" value="<?php echo $name;?>" size="50" class="textfield" /></td>
                    </tr>
                    
                    <tr>
                        <td style="vertical-align:top;">Event Description</td>
                        <td><textarea name="description" id="description" class="textfield" cols="47" rows="8"><?php echo $description;?></textarea></td>
                    </tr>
                    
                    <!--yyyy-mm-dd-->
                    <tr>
                        <td width="200">Date*</td>
                        <td>
                            <?PHP
                            echo date_dropdown();
                            ?>
                            
                            
<!--                            <input type="text" name="date" id="date" value="<?php echo $date;?>" size="50" class="textfield" />&nbsp;(Format = mm-dd-yyyy)</td>-->
                    </tr>
                    <tr>
                        <td>Price*</td>
                        <td><input type="text" name="price" id="price" value="<?php echo $price;?>" size="50" class="textfield" /></td>
                    </tr>
                    <tr>
                        <td>Sort Order*</td>
                        <td><input type="sort_order" name="sort_order" id="sort_order" value="<?php echo $sort_order;?>" size="50" class="textfield" /></td>
                    </tr>
                    <tr>
                        <td>Front-end Visibility*</td>
                        <td>
<!--                            <input type="text" name="fe_visibility" id="fe_visibility" value="<?php echo $fe_visibility;?>" size="50" class="textfield" />-->
                            <select name="fe_visibility" id="fe_visibility">
                                <option <? if($fe_visibility == '1') echo "selected"; else echo "";?> value="1">Yes</option>
                                <option <? if($event_type == '0') echo "selected"; else echo "";?> value="0">No</option>
                            </select> 
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Maximum Number of Registrants*</td>
                        <td><input type="text" name="no_registrants" id="no_registrants" value="<?php echo $no_registrants;?>" size="50" class="textfield" /></td>
                    </tr>
                    
                    <tr>
                        <td>Event Type*</td>
                        <td>
<!--                            <input type="text" name="phone" id="phone" value="<?php echo $phone;?>" size="50" class="textfield"  onkeypress="return isNumberKey(event)" onkeyup="return limitlength(this, 16)" /></td>-->
                            <select name="event_type" id="event_type">
                                <option <? if($event_type == 'Security Guard Training') echo "selected"; else echo "";?> value="Security Guard Training">Security Guard Training</option>
                                <option <? if($event_type == 'Utah Concealed Firearm Training') echo "selected"; else echo "";?> value="Utah Concealed Firearm Training">Utah Concealed Firearm Training</option>
                                <option <? if($event_type == 'NRA Basic Firearm Training Program') echo "selected"; else echo "";?> value="NRA Basic Firearm Training Program">NRA Basic Firearm Training Program</option>
                                <!--
								<option <? if($event_type == 'D') echo "selected"; else echo "";?> value="D">D</option>
								-->
                            </select>    
                    </tr>
                   
                    
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Submit" class="button" />&nbsp;
                            <input type="reset" name="reset" value="Reset" class="button" />
                        </td>
                    </tr>
                    
                </table>
                
                
                </form>
                
                
        </td></tr>
        </table>
</div>  
</div>