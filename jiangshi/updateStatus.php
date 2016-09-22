<?php
include_once('../../common.php');
define('ISJSON', TRUE);
if(!$xtgroup_uid){
	msg(1011);
}
$id = isset($_REQUEST['id'])?trim($_REQUEST['id']):'';
if(!$id){
	msg(1003);
}
$member_id = $xtgroup_uid;
$log = $GLOBALS['pdo']->fetOne('h5_js','*',"id = '$id'");
if(!$log || $log['member_id'] != $member_id || $log['status'] > 0){
	msg(1006);
}
$status = isset($_REQUEST['status'])?intval($_REQUEST['status']):0;
if($status != 1 && $status != 2){
	msg(1003);
}
$GLOBALS['pdo']->update('h5_js',array('status'=>$status),"id = '$id'");
$TK['id'] = $id;
$TK['stauts'] = $status;
msg(1,$TK);
?>