 		<script language="javascript">
			function check_empty()
			{
				var name = document.getElementById('name').value;
				var email = document.getElementById('email').value;	
				var query_type = document.getElementById('query_type').value;
				var message = document.getElementById('message').value;
				var confirmCaptcha = document.getElementById('confirmCaptcha').value;
				if(confirmCaptcha == '' || name == '' || email == '' || query_type == '' || message == "")
				{
					alert("Please fill in all required fields.");
					return false;
				}
				else
				{
					return true;
				}	
			}
		</script>
		
		<?php if($msg != '') { ?>			
			<div class='msg'><?php echo $msg; ?></div>
		<?php } ?>

		<?php echo form_open(base_url()."personnel/contact",array("id"=>"form1","method"=>"post","onsubmit"=>"return check_empty()"));?>  
		<fieldset >
			<legend><?php echo $page_title; ?></legend>
			<div class='short_explanation'>* required fields</div>
			<div class='container FloatLeft'>
				<label for='name' >Full Name*: </label><br/>
				<input type='text' name='name' id='name' value='' maxlength="50" /><br/>
				<span id='contactus_name_errorloc' class='error'></span>
			</div>
			<div class='container'>
				<label for='email' >Email Address*:</label><br/>
				<input type='text' name='email' id='email' value='' maxlength="50" /><br/>
				<span id='contactus_email_errorloc' class='error'></span>
			</div>
			<div class='container'>
				<label for='query_type' >Subject:*</label><br/>
				<input type='text' name='query_type' id='query_type' value='' maxlength="100" /><br/>
				<!--<select name='query_type'>
					<option></option>
					<option></option>
				</select>	-->
				<span id='contactus_email_errorloc' class='error'></span>
			</div>
			<div class='container'>
				<label for='message' >Please tell us about your needs:*</label><br/>
				<span id='contactus_message_errorloc' class='error'></span>
				<textarea rows="10" cols="50" name='message' id='message'></textarea>
			</div>
			<div class='container'>
				<?php echo $captcha['image']; ?>
			</div>
			<div class="container">
				<label for='confirmCaptcha' >Enter the above code here:*</label><br>
				<input size="19" type="text" name="confirmCaptcha" id="confirmCaptcha" value="" maxlength="10" /><br/>
			</div>


			<div class='container'>
				<input type='submit' class='button' name='Submit' value='Submit' />
			</div>

			</fieldset>
		</form>
		
				
		<div class="ContactInfo">
			<h2>Contact Info</h2>
			<p>P: 914.376.7400<br>
			<p>F: 914.376.7401</p>
			<p>Top of the Line Security, Inc.<br>
			34 Prospect St. -- #B-3-8<br>
			Yonkers, NY  10701</p>
		</div>
		
