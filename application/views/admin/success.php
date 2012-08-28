<?php 
header('Expires: Mon, 14 Oct 2002 05:00:00 GMT');              // Date in the past
header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); // always modified
header('Cache-Control: no-store, no-cache, must-revalidate');  // HTTP 1.1
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');       
?>

<div id="right">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    
        <tr>
            <td class="thead" height="23"><div class="dhead"><b>Event </b></div></td>
        </tr>
        <tr height="3"><td></td></tr>
        <tr>
            <td style="border: 1px solid #BCBCBC">
                <h3 style="padding-left:5px;">Creating Event</h3>
                <table width="100%" cellpadding="5">
                <?php if ($msg !="") {?>
                <tr>
                        <td></td>
                        <td class="msg"><?php echo $msg;?></td>
                    </tr>
                    <?php }?>
                </table>
        </td></tr>
        </table>
</div>