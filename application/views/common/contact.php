 		<?php if($msg != '') { ?>			
			<div class='msg'><?php echo $msg; ?></div>
		<?php } ?>
		<form id="form1" method="POST" action="<?php echo base_url().'training/contact'; ?>">   
		<fieldset >
			<legend>Contact us</legend>
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
				<label for='message' >Please tell us about your project:*</label><br/>
				<span id='contactus_message_errorloc' class='error'></span>
				<textarea rows="10" cols="50" name='message' id='message'></textarea>
			</div>
			<div class='container'>
				<?php echo $captcha['image']; ?>
			</div>
			<div class="container">
				<label for='confirmCaptcha' >Enter the above code here:</label><br>
				<input size="19" type="text" name="confirmCaptcha" id="confirmCaptcha" value="" maxlength="10" /><br/>
			</div>


			<div class='container'>
				<input type='submit' class='button' name='Submit' value='Submit' />
			</div>

			</fieldset>
		</form>
