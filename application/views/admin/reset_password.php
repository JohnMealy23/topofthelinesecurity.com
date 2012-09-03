<script language="javascript">
function check_pws()
{
	
	var pw1 = document.getElementById('new_pw1').value;
	var pw2 = document.getElementById('new_pw2').value;
	if(pw1 != '' && pw1 == pw2)
		return true;
	else
	{
		alert("New Password and confirm password don't match.");
		return false;
	}	
	
}
</script>
<div class="AdminContainer">
<div id="right">
	<h2>Reset Password</h2>
               <?php 
               echo form_open("".base_url()."index.php?admin/reset_password",array("method"=>"post","onsubmit"=>"return check_pws();"));
               ?>
                <table width="100%" cellpadding="5">
                <?php if ($msg !="") {?>
                <tr>
                        <td></td>
                        <td class="msg"><?php echo $msg;?></td>
                    </tr>
                    <?php }?>
                
                   <tr>
                    <td width="100">New Password: </td>
                    <td><input type="password" name="new_pw1" id="new_pw1" value="" class="textfield"  onkeypress="return FilterInput(event)"  /></td>
                  </tr>
                
                <tr>
                    <td width="100">Confirm Password: </td>
                    <td><input type="password" name="new_pw2" id="new_pw2" value="" class="textfield"  onkeypress="return FilterInput(event)"  /></td>
                  </tr>
                
                
<!--                  <tr>
                    <td>Retype New Password: </td>
                    <td><input type="password" name="new_pw2" id="new_pw2" value="" class="textfield"  onkeypress="return FilterInput(event)"  /></td>
                  </tr>-->
                
                  <tr>
                    <td></td>
                    <?php $btn_val = "Reset";?>
<!--                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />-->
                    <td><input type="submit" name="submit" id="submit" value="<?php echo $btn_val?>" class="button" /></td>
                  </tr>   
                    
                    
                </table>
                
                
                </form>
                
	</div>
</div>  
