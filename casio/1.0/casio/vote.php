<?php
include_once('../../common.php');
define('ISJSON', TRUE);
if(!$xtgroup_uid){
    //msg(1101);
}
/*$imgs = array('http://img1.taskou.com/casio/1.jpg');
//$ma = json_encode($imgs);
echo serialize($imgs);
echo '<br>';*/
$fields = array('cid'=>1,); 
$info = checkFields($fields);

$cid = isset($_POST['cid'])?trim($_POST['cid']):'1';
$check = $_SGLOBAL['pdo']->fetOne("casio_infos","*","cid = '$cid'");
if(!$check){
	msg(1006);
}
if($check['status'] != 1){
	msg(1110);
}
$TK = array();
//$vote = $_SGLOBAL['pdo']->fetOne("casio_vote","*","member_id = '$xtgroup_uid' AND cid = '$cid'");
//if(!$vote){
	$info['member_id'] = $xtgroup_uid;
	$info['dateline'] = SYSTIME;
	$info['ip'] = IPADDRESS;
	$info['cid'] = $cid;
	try{
		$_SGLOBAL['pdo']->autocommit();
		if(!$_SGLOBAL['pdo']->add('casio_vote',$info)){
			msg(2003);
		}else{
			$_SGLOBAL['pdo']->update('casio_infos',"votes = votes + 1","cid = '$cid'");
		}		
		$_SGLOBAL['pdo']->commit();
	}catch (Exception $e){
		$_SGLOBAL['pdo']->rollback();
		msg(2003);
	} 
	//获取最新的两个列表
	$pagesize = isset($_REQUEST['pagesize'])?intval($_REQUEST['pagesize']):2;
	$sql = "SELECT cid,truename,votes,tag,imgs ,g FROM ".DB_PRE."casio_infos where status = 1 order by rand() limit 0,$pagesize"; 
	$lists = $_SGLOBAL['pdo']->getAll($sql);
	foreach($lists as $lk=>$lr){
		$imgs = unserialize($lr['imgs']);     
		foreach($imgs as $img_url){
			$imgs2['img_url'] = $img_url;
			$imgs3[] = $imgs2;
			unset($imgs2);
		} 
		$lists[$lk]['imgs'] = $imgs3;
		unset($imgs3);
	}
	$TK['lists'] = $lists;
	msg(1,$TK);
//}

?>
