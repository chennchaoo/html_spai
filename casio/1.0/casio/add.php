<?php
include_once('../../common.php');
define('ISJSON', TRUE);
if(!$xtgroup_uid){
    //msg(1101);
}
$tags = array('好身材','谈恋爱','去旅行','做学霸');
$fields = array('phone'=>1,'truename'=>1,'address'=>1,'imgs'=>1,'tag'=>1); 
$info = checkFields($fields);
//该用户是否发过同姓名的信息
$check = $GLOBALS['pdo']->fetOne('casio_infos','*',"member_id = '".$xtgroup_uid."' AND truename ='".$info['truename']."'");
if($check){
	msg(1107);
}
if(!in_array($info['tag'],$tags)){
	msg(1109);
}
$info['cid'] = productId($xtgroup_uid);
$info['member_id'] = $xtgroup_uid;
$info['dateline'] = SYSTIME;
$info['ip'] = IPADDRESS;
$info['votes'] = 0;
$imgs = json_decode(base64_decode($info['imgs']),true);
if(is_array($imgs)){
	$info['imgs'] = serialize($imgs);
}else{
	msg(1108);
}
if(!$GLOBALS['pdo']->add('casio_infos',$info)){
	msg(2003);
} 
msg(1);
?>
