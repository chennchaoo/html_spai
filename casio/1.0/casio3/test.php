<?php
include_once('../../common.php');
define('ISJSON', TRUE);
if(!$xtgroup_uid){
    //msg(1101);
}
//获取最新的两个列表
$pagesize = isset($_REQUEST['pagesize'])?intval($_REQUEST['pagesize']):6;
$sql = "SELECT * FROM ".DB_PRE."casio22_photo where 1"; 
$lists = $_SGLOBAL['pdo']->getAll($sql);
foreach($lists as $lk=>$lr){
	$photo_id = $lr['photo_id'];
	$photo = $_SGLOBAL['pdo']->fetOne("casio3_photo","*","photo_id = '$photo_id'");	
	if($photo){
		$votes = $photo['votes'];
		$_SGLOBAL['pdo']->update('casio22_photo',"votes = '$votes'","photo_id = '$photo_id'");
	}
	
}
echo 'ok';
?>
