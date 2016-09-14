<?php
include_once('./common.php');
define('ISJSON', TRUE);
if(!$xtgroup_uid){
    //msg(1101);
}
//$str = 'WyJodHRwOlwvXC9hcGkyMC50YXNrb3UuY29tXC9hdHRhY2htZW50c1wvMjAxNTA4XC83XC81NDI0ODhfMTQzODkyMjc0NDMzODUucG5nIiwiaHR0cDpcL1wvYXBpMjAudGFza291LmNvbVwvYXR0YWNobWVudHNcLzIwMTUwOFwvN1wvNjQyNDg4XzE0Mzg5MjI3NDQzMzg1LnBuZyIsImh0dHA6XC9cL2FwaTIwLnRhc2tvdS5jb21cL2F0dGFjaG1lbnRzXC8yMDE1MDhcLzdcLzc0MjQ4OF8xNDM4OTIyNzQ0MzM4NS5wbmciXQ';
$fields = array('phone'=>1,'school'=>1,'truename'=>1,'address'=>1,'imgs'=>1,); 
$info = checkFields($fields);
//该用户是否发过同姓名的信息
//$check = $GLOBALS['pdo']->fetOne('casio4_infos','*',"member_id = '$xtgroup_uid'");
/*
if($check){
    msg(1107);
}*/
$info['cid'] = productId(SYSTIME);
#$info['member_id'] = $xtgroup_uid;
$info['dateline'] = SYSTIME;
$info['ip'] = IPADDRESS;
$info['votes'] = 0;
$imgs = json_decode(base64_decode($info['imgs']),true);
if(is_array($imgs)){
    unset($info['imgs']);
    $info['img1'] = $imgs[0];
    $info['img2'] = $imgs[2];
}else{
    msg(1108);
}
try{
    $_SGLOBAL['pdo']->autocommit();
    /*
    $member = $_SGLOBAL['pdo']->fetOne('casio4_member','*',"member_id = '$xtgroup_uid'");
    if(!$member){
        $infom['dateline'] = SYSTIME;
        $infom['member_id'] = $xtgroup_uid;
        if(!$_SGLOBAL['pdo']->add('casio4_member',$infom)){
            msg(2003);
        }        
    }*/
    if(!$GLOBALS['pdo']->add('casio4_infos',$info)){
        msg(2003);
    } 
    $_SGLOBAL['pdo']->commit();
}catch (Exception $e){
    $_SGLOBAL['pdo']->rollback();
    msg(2003);
} 
msg(1);
?>
