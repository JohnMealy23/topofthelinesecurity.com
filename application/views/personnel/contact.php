<?PHP

require_once("./include/fgcontactform.php");
require_once("./include/captcha-creator.php");

$formproc = new FGContactForm();
$captcha = new FGCaptchaCreator('scaptcha');

$formproc->EnableCaptcha($captcha);

//email receipient(s)
$formproc->AddRecipient('info@notiondigitalarts.com');

//security
$formproc->SetFormRandomKey('gf07a2Kt5ORGXWz');

//conditional addresses
$formproc->SetConditionalField('query_type');
$formproc->AddConditionalReceipent('Brand Identity Site','info@notiondigitalarts.com');
$formproc->AddConditionalReceipent('Ecommerce Site','info@notiondigitalarts.com');
$formproc->AddConditionalReceipent('Feature Addition','info@notiondigitalarts.com');
$formproc->AddConditionalReceipent('Product Catalog Maintenance','info@notiondigitalarts.com');
$formproc->AddConditionalReceipent('Site Maintenance','info@notiondigitalarts.com');
$formproc->AddConditionalReceipent('Social Net Integration','info@notiondigitalarts.com');
$formproc->AddConditionalReceipent('Photography / Photo Editing','info@notiondigitalarts.com');
$formproc->AddConditionalReceipent('Other','info@notiondigitalarts.com');

if(isset($_POST['submitted']))
{
   if($formproc->ProcessForm())
   {
        $formproc->RedirectToURL("contactconfirm.php");
   }
}

?>

	<?php 
		include('header.php');
	?>
	<!--End Header Div-->
          
            <div id="Content" class="Fader">
		
			  
			<!-- Form Code Start -->
			<form id='contactus' action='<?php echo $formproc->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
			<fieldset >
			<legend>Contact us</legend>

			<input type='hidden' name='submitted' id='submitted' value='1'/>
			<input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>
			<input type='text'  class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />

			<div class='short_explanation'>* required fields</div>

			<div><span class='error'><?php echo $formproc->GetErrorMessage(); ?></span></div>
			<div class='container'>
				<label for='name' >Your Full Name*: </label><br/>
				<input type='text' name='name' id='name' value='<?php echo $formproc->SafeDisplay('name') ?>' maxlength="50" /><br/>
				<span id='contactus_name_errorloc' class='error'></span>
			</div>
			<div class='container'>
				<label for='email' >Email Address*:</label><br/>
				<input type='text' name='email' id='email' value='<?php echo $formproc->SafeDisplay('email') ?>' maxlength="50" /><br/>
				<span id='contactus_email_errorloc' class='error'></span>
			</div>
			<div class='container'>
				<label for='query_type' >Query Type:</label><br/>
				<select name='query_type'>
					<option>Brand Identity Site</option>
					<option>Ecommerce Site</option>
					<option>Feature Addition</option>
					<option>Product Catalog Maintenance</option>
					<option>Site Maintenance</option>
					<option>Social Net Integration</option>
					<option>Photography / Photo Editing</option>
					<option>Other</option>
				</select>	
				<span id='contactus_email_errorloc' class='error'></span>
			</div>
			<div class='container'>
				<label for='message' >Please tell us about your project:</label><br/>
				<span id='contactus_message_errorloc' class='error'></span>
				<textarea rows="10" cols="50" name='message' id='message'><?php echo $formproc->SafeDisplay('message') ?></textarea>
			</div>
			<div class='container'>
				<div><img alt='Captcha image' src='show-captcha.php?rand=1' id='scaptcha_img' /></div>
				<label for='scaptcha' >Enter the above code here:</label>
				<input type='text' name='scaptcha' id='scaptcha' maxlength="10" /><br/>
				<span id='contactus_scaptcha_errorloc' class='error'></span>
				<div class='short_explanation'>Can't read the image?
				<a href='javascript: refresh_captcha_img();'>Click here to refresh</a>.</div>
			</div>


			<div class='container'>
				<input type='submit' name='Submit' value='Submit' />
			</div>

			</fieldset>
			</form>
		
		</div><!--End Content-->
		
	</div><!--End Container-->
	
<script type='text/javascript'>

</script>

</body></html>