<?php
include_once('../common.php');
$forward = get_url();
if(!$xtgroup_uid){
    header("Location:http://share.spai.me/wx_auth/auth.php?forward=".$forward);
    exit;
}
define('ISJSON', TRUE);
$tid = isset($_REQUEST['tid'])?trim($_REQUEST['tid']):'';
if(!$tid){
    msg(1003);
}
$task = $GLOBALS['pdo']->fetOne('tasks','*',"tid = '$tid'");
if(!$task){
    msg(1006);
}
if($tid == '02e1664fe83a17a8d4e77c902d0d8604'){
    //特殊
    header("Location:http://api20.taskou.com/c/casio/2/index.php");
}elseif($tid == '02e1664fe83a17a8d4e77c902d0d8605'){
    header("Location:http://c.taskou.com/c/casio/index.php");
}else{
    //下面是比赛详情数据
    $member_id = $xtgroup_uid;
    $task = $GLOBALS['pdo']->fetOne("tasks",'*',"tid = '$tid'");
    //$task = $GLOBALS['pdo']->getOne("SELECT t.*,b.nickname,b.avatar FROM ".DB_PRE."tasks t LEFT JOIN ".DB_PRE."brand b ON t.bid = b.bid WHERE t.tid = '$tid'");
    if(!$task){
        msg(1006);
    }
    if(!($task['starttime'] <= SYSTIME && $task['excetime'] > SYSTIME)){
        $status = -1;
    }else{
        $status = 1;
    }
    $TK = array();
    $TK['tid'] = $task['tid'];
    $TK['subject'] = $task['subject'];
    $TK['xsubject'] = $task['xsubject'];
    $TK['description'] = $task['description'];
    $TK['banner'] = $task['banner'];
    $TK['starttime'] = date('Y-m-d',$task['starttime']);  
    $TK['excetime'] = date('Y-m-d',$task['excetime']);   
    $TK['follow_count'] = $task['follow_count'];
    $TK['answer_count'] = $task['answer_count'];
    $TK['share'] = array('img'=>APP_PATH.'attachments/logo.png','title'=>$task['subject'],'des'=>cut_str($task['description'],100),'shareUrl'=>'http://share.spai.me/m/?tid='.$tid);
    msg(1,$TK);
}
?>
