<?php
include_once('../../common.php');
define('ISJSON', TRUE);
if(!$xtgroup_uid){
   // msg(1101);
}
$fields = array('photo_id'=>1,); 
$info = checkFields($fields);
$photo_id = $info['photo_id'];
$photo = $_SGLOBAL['pdo']->fetOne("casio2_photo","*","photo_id = '$photo_id'");
if(!$photo){
	msg(1006);
}
$TK = $photo;
$TK['nickname'] = '小马哥';
$TK['avatar'] = 'http://img1.taskou.com/casio/1.jpg';
$TK['day'] = '2015-12-24';
//点赞列表
$sql = "SELECT m.nickname,m.avatar,v.dateline FROM ".DB_PRE."casio2_vote v ";
$sql .= "LEFT JOIN ".DB_PRE."member m ON m.member_id = v.member_id WHERE v.photo_id = '$photo_id' ORDER BY v.dateline DESC LIMIT 0,6";
$lists = $_SGLOBAL['pdo']->getAll($sql);
$TK['lists'] = $lists;
msg(1,$TK);
?>
