<?php 
header('Expires: Mon, 14 Oct 2002 05:00:00 GMT');              // Date in the past
header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); // always modified
header('Cache-Control: no-store, no-cache, must-revalidate');  // HTTP 1.1
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');       
?>
<style>
 #msg{ font-size:16px; font-weight:bold;border:solid 1px #FF8040; background-color: #FFFFB3; color: green; padding:10px; margin:10px;}
 #err{ font-size:16px; font-weight:bold;border:solid 1px #FF8040; background-color: #FFFFB3; color: red; padding:10px; margin:10px;}
</style>
<?php include("header.php");?>
    <div id="right">
      <?php //if($this->input->get('msg') != ''){
          if($this->input->get('msg') == 1){
             echo '<h1 id="msg">Password has been modified successfully!</h1>';
          }
          
          if($this->input->get('msg') == 2){
             echo '<h1 id="msg">User has been disabled successfully!</h1>';
          }
          if($this->input->get('msg') == -2){
             echo '<h1 id="err">User has not been disabled. Please try again</h1>';
          }
          if($this->input->get('msg') == 3){
             echo '<h1 id="msg">User has been deleted successfully!</h1>';
          }
          
          if($this->input->get('msg') == -3){
             echo '<h1 id="err">User has not been deleted. Please try again</h1>';
          }
          
          if($this->input->get('msg') == 4){
             echo '<h1 id="msg">User has been enabled successfully!</h1>';
          }
          
          if($this->input->get('err') == -4){
             echo '<h1 id="err">User has not been enabled. Please try again</h1>';
          }
          //echo '<pre>Error:'.$this->input->get('err').'</pre>';
          if($this->input->get('err') == '-6'){
             echo '<h1 id="err">You cannot delete your own user.</h1>';
          }
          
          if($this->input->get('err') == '-5'){
             echo '<h1 id="err">You cannot disable your own user.</h1>';
          }
     // }
      ?>
      <div id="Searching">
        
        
        <fieldset>
          <table id="records">
            <tr>
              <th width="10">ID</th>
              <th width="175">Name</th>
              <th width="200">Email</th>
              <th id="80">UserName</th>
              <th>Action</th>
            </tr>
            <?php if(isset($users) && count($users)>0):?>
            <?php
	$counter = 1; 
	foreach($users as $user): ?>
            <tr>
                <td><?php echo $user->ID;?></td>
                <td><?php echo $user->Name;?></td>
                <td><?php echo $user->Email;?></td>
                <td><?php echo $user->Username;?></td>
                <td>
                    <a href="<?php echo base_url();?>support/reset_password/<?php echo $user->ID?><?php echo ($keys != '') ?  '/'.$keys : ''?>"  onclick="return confirm('Do you want to reset this password?')">Reset Password</a>
                    <?php if($user->ID != $this->session->userdata('ID')){ ?>
                    &nbsp;|&nbsp;
                    <a href="<?php echo base_url();?>support/<?php echo ($user->isDisabled != 1) ?  'disable_user' : 'enable_user'?>/<?php echo $user->ID?><?php echo ($keys != '') ?  '/'.$keys : ''?>" <?php echo ($user->isDisabled != 1) ?  'onclick="return confirm(\'Do you want to disable this user?\')"' : 'onclick="return confirm(\'Do you want to enable this user?\')"'?>><?php echo ($user->isDisabled == 1)? 'Enable' : 'Disable' ?></a>&nbsp;|&nbsp;
                    <a href="<?php echo base_url();?>support/delete_user/<?php echo $user->ID?><?php echo ($keys != '') ? '/'.$keys : ''?>" onclick="return confirm('Do you want to delete this user?')">Delete</a>
                    <?php } ?>
                </td>
            </tr>
            <?php
	$counter = $counter+1; 
	endforeach; ?>
            <?php else: ?>
            <tr>
              <td colspan="9"><div id="no_message">Sorry! No Data Available</div></td>
            </tr>
            <?php endif; ?>
          </table>
        </fieldset>
      </div>
        <?php //if(isset($paging_link) && $paging_link !='') { ?>
<!--  <div class="paging" align="center">
      <?php //echo $this->pagination->create_links(); ?>
  </div>-->

    </div>
    <script type="text/javascript">
$('#records th').css({'text-align':'left','background-color':'#396D00','padding-left':'5px','color':'#fff','height':'30px'});

</script>
	<?php include("footer.php");?>