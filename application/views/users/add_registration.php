	<div class="SpacerDiv"></div>
	<div class="PageDescription">
	<h2><?php echo $event_name; ?> Registration</h2>
		<?PHP
	echo form_open(base_url()."training/courses/registration",array("method"=>"post","onsubmit"=>"javascript:return validate_register_values()"));
	?>
	<table width="100%" cellpadding="5">					
	<?php if ($msg !="") {?>
	<tr>
			<td></td>
			<td class="msg"><?php echo $msg;?></td>
		</tr>
		<?php }
		else
		{    
		
		?>
	
	<?php
		if($event_detail[0]->name != '') { ?>	
		<tr>
		<td>Name:</td>
		<td><?=$event_detail[0]->name;?></td>
		</tr> 
	<?php } ?>
	<?php
		if($event_detail[0]->description != '') { ?>	
	<tr>
		<td>Description:</td>
		<td><?=$event_detail[0]->description;?></td>
	</tr> 
	<?php } ?>
	<tr>
		<td>Price:</td>
		<td>$<?=$event_detail[0]->price;?></td>
	</tr> 
	<tr>
		<td>Date:</td>
		<td><?=date("F d, Y",strtotime($event_detail[0]->date));?></td>
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
			<td>Suffix</td>
			<td><input type="text" name="suffix" id="suffix" value="" size="50" class="textfield" /></td>
		</tr>
		
		<tr>
			<td>Name on Certificate</td>
			<td><input type="text" name="name_on_certificate" id="name_on_certificate" value="" size="50" class="textfield" /></td>
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
		</table>
	</form>
	   
		
		<?PHP
		
		}
		?>

</div>