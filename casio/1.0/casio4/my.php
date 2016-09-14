<?php
include_once('./common.php');
define('ISJSON', TRUE);
if(!$xtgroup_uid){
    //msg(1101);
}
$r = $_SGLOBAL['pdo']->fetOne('casio4_infos','*',"member_id = '$xtgroup_uid'");
if(!$r){
    msg(1006);
}
$member = $_SGLOBAL['pdo']->fetOne('casio4_member','*',"member_id = '$xtgroup_uid'");
if(!$member){
    $info['dateline'] = SYSTIME;
    $info['member_id'] = $xtgroup_uid;
    $_SGLOBAL['pdo']->add('casio4_member',$info);
    $member = $_SGLOBAL['pdo']->fetOne('casio4_member','*',"member_id = '$xtgroup_uid'");
}
$rows = getLenum($xtgroup_uid,$member['hadnums']);
$lenums = $rows['lenums'];
$member['lenums'] = $lenums>=0?$lenums:0;
$member['prizes'] = $rows['prizes'];
$TK['member'] = $member;
$TK['info'] = $r;
msg(1,$TK);

?>
