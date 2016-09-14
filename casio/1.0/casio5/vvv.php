<?php
include_once('../../common.php');
define('ISJSON', TRUE);
if($_GET['ma'] != '15000367181'){
	exit('error');
}

if(!$xtgroup_uid){
    //msg(1101);
}

	$sql = "SELECT * FROM ".DB_PRE."casio5_infos where status = 1  order by dateline DESC ";  
	$lists = $_SGLOBAL['pdo']->getAll($sql);
	foreach($lists as $lk=>$lr){
		$cid = $lr['cid'];
		$rand = mt_rand(0,300);
		$_SGLOBAL['pdo']->update('casio5_infos',"votes = votes + $rand","cid = '$cid'");
		unset($imgs3);
	}
echo 'ok';
?>
