<?php 
header('Expires: Mon, 14 Oct 2002 05:00:00 GMT');              // Date in the past
header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); // always modified
header('Cache-Control: no-store, no-cache, must-revalidate');  // HTTP 1.1
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');       
?>
<?php include("header.php");?>
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
<div id="right">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    
        <tr>
            <td class="thead" height="23"><div class="dhead"><b>Reset Password </b></div></td>
        </tr>
        <tr height="3"><td></td></tr>
        <tr>
            <td style="border: 1px solid #BCBCBC">
               <!--
<form action="<?php echo base_url();?>support/create_user" method="post">
-->
               <?php 
               //echo form_open("admin/reset_password",array("method"=>"post","onsubmit"=>"javascript:return check_pw_length('password');"));
               echo form_open("".base_url()."_index.php?admin/reset_password",array("method"=>"post","onsubmit"=>"return check_pws();"));
               ?>
               
               

                
                <h3 style="padding-left:5px;">Reset Password</h3>
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
                
                
        </td></tr>
        </table>
</div>  
<?php include("footer.php");?>