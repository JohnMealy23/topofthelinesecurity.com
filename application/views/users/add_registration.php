<?php 
header('Expires: Mon, 14 Oct 2002 05:00:00 GMT');              // Date in the past
header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); // always modified
header('Cache-Control: no-store, no-cache, must-revalidate');  // HTTP 1.1
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');       
?>
//echo "<pre>event_detail: ";   print_r($event_detail);   echo "</pre>";
?>

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    
        <tr>
            <td class="thead" height="23"><div class="dhead"><b>Event Registration</b></div></td>
        </tr>
        <tr height="3"><td></td></tr>
        <tr>
            <td style="border: 1px solid #BCBCBC">
               <!--
<form action="<?php echo base_url();?>support/create_user" method="post">
-->
               <?php 
               //$return_url = base_url()."index.php?courses/registration/".$type."/".$event_id;
               //echo "<br>Base url: ".$return_url;
               
              // echo form_open("".base_url()."index.php?courses/registration",array("method"=>"post","onsubmit"=>"javascript:return validate_register_values();"));
               
               
               // uncomment below with js function
               //echo form_open("https://www.sandbox.paypal.com/cgi-bin/webscr",array("method"=>"post","onsubmit"=>"javascript:return validate_register_values();"));
               
               //echo form_open("https://www.sandbox.paypal.com/cgi-bin/webscr",array("method"=>"post"));
               ?>








               
               <?PHP
               //if($update_event_id != '')
               //    echo "<input type=hidden name=event_id_to_update value=".$update_event_id.">";
               ?>

<!--                <div style="float:right; padding-right:10px;"><a href="<?php echo base_url();?>index.php/admin/event_list" class="link">View Events</a></div>-->
                <h3 style="padding-left:5px;">Event Registration</h3>
                <table width="100%" cellpadding="5">
                <?PHP
                echo form_open("".base_url()."index.php?courses/registration",array("method"=>"post","onsubmit"=>"javascript:return validate_register_values();"));
                ?>
                                
                <?php if ($msg !="") {?>
                <tr>
                        <td></td>
                        <td class="msg"><?php echo $msg;?></td>
                    </tr>
                    <?php }
                    else
                    {    
                    
                    ?>
                    
                    
                    
                    <tr>
                	<td>Name:</td>
                    <td><?=$event_detail[0]->name;?></td>
                </tr> 
                <tr>
                	<td>Description:</td>
                    <td>$<?=$event_detail[0]->description;?></td>
                </tr> 
                <tr>
                	<td>Price:</td>
                    <td>$<?=$event_detail[0]->price;?></td>
                </tr> 
                <tr>
                	<td>Date:</td>
                    <td><?=date("F d, Y",strtotime($event_detail[0]->date));?></td>
                </tr>    
                

                    
                    
                    <tr>
                        <td width="200">Class Date</td>
                        <td><input type="text" name="date" id="date" value="" size="50" class="textfield" /></td>
                    </tr>
                    <tr>
                        <td>Surname</td>
                            <td><input type="text" name="surname" id="price" value="" size="50" class="textfield" /></td>
                    </tr>
                    <tr>
                        <td>First Name*</td>
                        <td><input type="text" name="f_name" id="f_name" value="" size="50" class="textfield" /></td>
                    </tr>
                    <tr>
                        <td>Middle Name</td>
                        <td><input type="text" name="m_name" id="password" value="" size="50" class="textfield" /></td>
                    </tr>
                    <tr>
                        <td>Last Name*</td>
                        <td><input type="text" name="l_name" id="l_name" value="" size="50" class="textfield" /></td>
                    </tr>
                    
                    <tr>
                        <td>Name on Certificate</td>
                        <td><input type="text" name="name_on_certificate" id="name_on_certificate" value="" size="50" class="textfield" /></td>
                    </tr>
                    
                    
                    <tr>
                        <td>Suffix</td>
                        <td><input type="text" name="suffix" id="suffix" value="" size="50" class="textfield" /></td>
                    </tr>
                    <tr>
                        <td>Street Address*</td>
                        <td><input type="text" name="street_address" id="street_address" value="" size="50" class="textfield" /></td>
                    </tr>
                    <tr>
                        <td>City*</td>
                        <td><input type="text" name="city" id="city" value="" size="50" class="textfield" /></td>
                    </tr>
                    
                    
                    <tr>
                        <td>State*</td>
                        <td><input type="text" name="state" id="state" value="" size="50" class="textfield" /></td>
                    </tr>
                    
                    <tr>
                        <td>Zip*</td>
                        <td><input type="text" name="zip" id="zip" value="" size="50" class="textfield" /></td>
                    </tr>
                    
                    
                    <tr>
                        <td>Phone*</td>
                        <td><input type="text" name="phone" id="phone" value="" size="50" class="textfield" /></td>
                    </tr>
                    
                    <tr>
                        <td>Email*</td>
                        <td><input type="text" name="email" id="email" value="" size="50" class="textfield" /></td>
                    </tr>
                    
                    
                    <input type="hidden" name="event_id" id="event_id" value="<?php echo $event_id;?>" />
                    <input type="hidden" name="event_type" id="event_type" value="<?php echo $type;?>" />
                    <input type="hidden" name="this_event_price" id="this_event_price" value="<?php echo $event_detail[0]->price;?>" />
                    
                    
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input type="submit" name="submit" value="Submit" class="button" />&nbsp;
                        </td>
                    </tr>    
                </form>
                   
                    
                    <?PHP
                    
                    }
                    ?>

                
                
                 <?PHP
                    
                  //  echo form_open("https://www.sandbox.paypal.com/cgi-bin/webscr",array("method"=>"post","id"=>"paypal_form"));
                    ?>
                    
<!--                    <input type="hidden" name="upload" value="1">
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="business" value="fowl82_1338183159_biz@hotmail.com">
            <input type="hidden" name="item_name_1" value="Employer Invoice Payment">
            <input type="hidden" name="amount_1" value="10">
            <input type="hidden" name="no_shipping" value="2">
            <input type="hidden" name="no_note" value="1">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="tax" value="0">
            <input type="hidden" name="bn" value="IC_Sample">
            <input type="hidden" name="custom" value="<?php echo $event_id?>">
            <input type="hidden" name="notify_url" value="<?php echo $return_url; ?>">
            <input type="hidden" name="cancel_return" value="<?php echo $return_url; ?>">
            <input type="hidden" name="return" value="<?php echo $return_url; ?>">
            <input type="hidden" name="rm" value="2">

            </form>-->