<div id="right">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr height="3"><td></td></tr>
        <tr>
            <td>
               
                <div id="login">
                	<form name="loginForm" id="loginForm" method="post" action="">
                        <table width="100%" border="0" align="center">
                         <tr><td colspan="2" class="err-msg" align="center">
							 <?php
							    echo $error;
							?>
                            </td>
                            </tr>
                          <tr>
                            <td><label>User Name</label></td>
                            <td><input type="text" name="username" id="username" class="textfield" /> </td>
                          </tr>
                          <tr>
                            <td><label>Password</label></td>
                            <td><input type="password" name="password" id="password" class="textfield" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="submit" id="submit" value="Submit" /></td>    
                          </tr>
                        </table>
                        </form>
                </div>
                
        </td></tr>
        </table>
</div>  