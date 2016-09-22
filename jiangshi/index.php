<?php
include_once('../../common.php');
$forward = get_url();
if(!$xtgroup_uid){
    header("Location:http://share.spai.me/wx_auth/auth.php?forward=".$forward);
    exit;
}
$member_id = $xtgroup_uid;
$mid = isset($_REQUEST['mid'])?trim($_REQUEST['mid']):'';
if(!$mid){
	$id = isset($_REQUEST['id'])?trim($_REQUEST['id']):'';
	if(!$id){
		$id = '3dfe686db21785bedf735d8cf3331160';//指定一个
	}	
	$log = $GLOBALS['pdo']->fetOne('h5_js','*',"id = '$id'");
	if($log['status'] == 0){
		$linfo['fid'] = $log['fid'];	
		$linfo['fmid'] = $log['fmid'];	
		$mid = $log['fmid'];
	}else{
		$linfo['fid'] = $log['id'];	
		$mid = $log['member_id'];		
	}
	
	#$mid = 'f68d8759f5854de10e8d3befcda558f0';
}else{
	$log['status'] = 1;//默认第一次被感染
	$linfo['fmid'] = $mid;
}
//define('ISJSON', TRUE);
/*
$fid = isset($_REQUEST['fid'])?trim($_REQUEST['fid']):'';
$log = array();
$mid = $xtgroup_uid;
if($fid){
	$log = $GLOBALS['pdo']->fetOne('h5_js','*',"fid = '$fid'");
	if(!$log){
		msg(1006);
	}
	$mid = $log['member_id'];
}else{
	
}*/
$user = $GLOBALS['pdo']->fetOne('member','member_id,nickname',"member_id = '$mid'");
if(!$user){
	msg(1006);
}
$log['nickname'] = $user['nickname'];
//产生记录
$linfo['id'] = productId(SYSTIME.$member_id);
$linfo['dateline'] = SYSTIME;
$linfo['member_id'] = $member_id;
$linfo['ip'] = IPADDRESS;
$GLOBALS['pdo']->add('h5_js',$linfo);
$id = $linfo['id'];
//下面是比赛详情数据

/*
$task = $GLOBALS['pdo']->fetOne("tasks",'*',"tid = '$tid'");
if(!$task){
	msg(1006);
}
if(!($task['starttime'] <= SYSTIME && $task['excetime'] > SYSTIME)){
	$status = -1;
}else{
	$status = 1;
}*/
$TK = array();
$TK = $log;
$TK['share'] = array('img'=>APP_PATH.'attachments/logo.png','title'=>'僵尸分享标题','des'=>'僵尸分享描述','shareUrl'=>'http://share.spai.me/m/jiangshi/?tid='.$tid.'&id='.$id);
print_r($TK);
?>
<!doctype html>
<html lang="zh-cn">
<head>
    <meta name="viewport" content="initial-scale=1, user-scalable=0, minimal-ui" charset="UTF-8">
    <title>S派</title>
    <link href="css/style_h.css?t=4" type="text/css" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="css/mui.min.css?t=4">
	<script src="js/public.js"></script>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    
    </head>
    <body>
    下面放入H5页面
</body>
</html>