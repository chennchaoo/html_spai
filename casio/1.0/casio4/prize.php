<?php
include_once('./common.php');
define('ISJSON', TRUE);
if(!$xtgroup_uid){
    msg(1101);
}
$member = $_SGLOBAL['pdo']->fetOne('casio4_member','*',"member_id = '$xtgroup_uid'");
$hadnums = $member['hadnums'];
if(!$member || $hadnums < TOTAL_LOVE){
    msg(1006);
}
$ptype = intval($hadnums/TOTAL_LOVE)*TOTAL_LOVE;  
$prize = 0;
$check = $_SGLOBAL['pdo']->fetOne('casio4_pinfo','*',"member_id = '$xtgroup_uid' AND ptype = '$ptype'");
if($check && $check['pid'] == 0){
    $id = $check['id'];
    $prize = mt_rand(1,4);
    if($prize == 4){
        $prize = 99;
    }
    if(!$_SGLOBAL['pdo']->update('casio4_pinfo',"pid = '$prize'","id = '$id'")){
        msg(2003);
    }
    msg(1,array('prize'=>$prize));
}else{
    msg(1113);
}
?>
