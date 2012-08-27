<?php include("header.php");?>
    <div id="right">
<?php $heading = "Reset Password";  ?>
<form method="post" onsubmit="return validate_reset_password_form();">
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td class="thead" height="23">
              <div class="dhead">
                <b><?php echo $heading?></b>
              </div>
          </td>
        </tr>
        <tr>
          <td style="border: 1px solid #BCBCBC"><div style=" padding-left:5px;">
            <h3>
              <?php echo $heading?>
            </h3>
            <?php //echo form_open('',array("id"=>"reset_password","name"=>"reset_password", "method"=>"post"))?>
                        
            <table cellpadding="5" cellpadding="0" border="0">
                <?php if( $msg != "" ) {?>
                
                  <tr>
                    <td colspan="2" class="msg"><?php echo $msg;?></td>
                  </tr>
                  <?php }?>
                
                  <tr>
                    <td>New Password: </td>
                    <td><input type="password" name="new_pw1" id="new_pw1" value="" class="textfield"  onkeypress="return FilterInput(event)"  /></td>
                  </tr>
                
                  <tr>
                    <td>Retype New Password: </td>
                    <td><input type="password" name="new_pw2" id="new_pw2" value="" class="textfield"  onkeypress="return FilterInput(event)"  /></td>
                  </tr>
                
                  <tr>
                    <td></td>
                    <?php $btn_val = "Reset";?>
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />
                    <td><input type="submit" name="submit" id="submit" value="<?php echo $btn_val?>" class="button" /></td>
                  </tr>
            </table>
      
    </div>
    <br>
    </td>
    </tr>
    </table>
    </form>    
  </div>
  <?php include("footer.php");?>