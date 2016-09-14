<?php
include_once('./common.php');
if(!$xtgroup_uid){
    ssetcookie('forward', APP_PATH.'c/casio4/', 3600*24);
    #header("Location:".APP_PATH.'wx_auth/auth.php');
	//不要授权啦啦啦
}
?>