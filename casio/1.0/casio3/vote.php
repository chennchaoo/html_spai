<?php
include_once('../../common.php');
define('ISJSON', TRUE);
if(!$xtgroup_uid){
    msg(1101);
}
$fields = array('photo_id'=>1,); 
$info = checkFields($fields);
$photo_id = $info['photo_id'];
$limit = 3;
$check = $_SGLOBAL['pdo']->fetOne("casio3_photo","*","photo_id = '$photo_id'");
if(!$check){
	msg(1006);
}
if($check['status'] < 0){
	msg(1110);
}
$TK = array();
$checkvote = $_SGLOBAL['pdo']->fetOne("casio3_vote","*","member_id = '$xtgroup_uid' AND photo_id = '$photo_id'");
if($checkvote){
	msg(1112);
}
$start =  strtotime($today);
$end = $start + 3600*24 - 1;
$vote = $_SGLOBAL['pdo']->fetOne("casio3_vote","COUNT(*) AS A","member_id = '$xtgroup_uid' AND dateline BETWEEN '$start' AND '$end'");
$album_id = $check['album_id'];
if($vote['A'] < $limit){
	$info['member_id'] = $xtgroup_uid;
	$info['dateline'] = SYSTIME;
	$info['ip'] = IPADDRESS;
	$info['photo_id'] = $photo_id;
	try{
		$_SGLOBAL['pdo']->autocommit();
		if(!$_SGLOBAL['pdo']->add('casio3_vote',$info)){
			msg(2003);
		}else{
			if($_SGLOBAL['pdo']->update('casio3_photo',"votes = votes + 1","photo_id = '$photo_id'")){
				if(!$_SGLOBAL['pdo']->update('casio3_album',"votes = votes + 1","album_id = '$album_id'")){
					msg(2003);
				}
			}else{
				msg(2003);
			}
		}		
		$_SGLOBAL['pdo']->commit();
	}catch (Exception $e){
		$_SGLOBAL['pdo']->rollback();
		msg(2003);
	} 
	$photo = $_SGLOBAL['pdo']->fetOne("casio3_photo","*","photo_id = '$photo_id'");
	$TK['votes'] = $photo['votes'];
	msg(1,$TK);
}else{
	msg(1111);
}

?>
