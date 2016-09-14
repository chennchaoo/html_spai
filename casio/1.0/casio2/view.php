<?php
include_once('../../common.php');
define('ISJSON', TRUE);
if(!$xtgroup_uid){
    //msg(1101);
}
msg(1);
$fields = array('album_id'=>1,); 
$info = checkFields($fields);
$album_id = $info['album_id'];
$check = $_SGLOBAL['pdo']->fetOne("casio2_album","*","album_id = '$album_id'");
if(!$check){
	msg(1006);
}
if($check['status'] != 1){
	msg(1110);
}
$TK = array();
$view = $_SGLOBAL['pdo']->fetOne("casio2_view","*","member_id = '$xtgroup_uid' AND album_id = '$album_id'");
if(!$view){
	$info['member_id'] = $xtgroup_uid;
	$info['dateline'] = SYSTIME;
	$info['ip'] = IPADDRESS;
	$info['album_id'] = $album_id;
	try{
		$_SGLOBAL['pdo']->autocommit();
		if(!$_SGLOBAL['pdo']->add('casio2_view',$info)){
			msg(2003);
		}else{
			$_SGLOBAL['pdo']->update('casio2_album',"views = views + 1","album_id = '$album_id'");
		}		
		$_SGLOBAL['pdo']->commit();
	}catch (Exception $e){
		$_SGLOBAL['pdo']->rollback();
		msg(2003);
	} 
	msg(1,$TK);
}else{
	msg(1);
}

?>
