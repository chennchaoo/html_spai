<?php
include_once('../../common.php');
define('ISJSON', TRUE);
if(!$xtgroup_uid){
    //msg(1101);
}
//获取最新的两个列表
$pagesize = isset($_REQUEST['pagesize'])?intval($_REQUEST['pagesize']):6;
$page = isset($_REQUEST['page'])?intval($_REQUEST['page']):1;
$page = $page >1 ?$page:1;
//$sql = "SELECT cid,truename,votes,tag,imgs,g FROM ".DB_PRE."casio_infos where status = 1 order by rand() limit 0,$pagesize";
$total = $_SGLOBAL['pdo']->fetRowCount('casio5_infos','cid',"status=1");
$totalpage = 0;
if($total > 0){
	$totalpage  = ceil($total/$pagesize);
	if($page >= $totalpage){$page = $totalpage;}
	$offset = intval($pagesize*($page-1));
	$sql = "SELECT cid,votes,img1 FROM ".DB_PRE."casio5_infos where status = 1 order by dateline DESC LIMIT $offset,$pagesize";  
	$lists = $_SGLOBAL['pdo']->getAll($sql);
	foreach($lists as $lk=>$lr){
		$cid = $lr['cid'];
	/*	$imgs = unserialize($lr['imgs']);     
		foreach($imgs as $img_url){
			$imgs2['img_url'] = $img_url;
			$imgs3[] = $imgs2;
			unset($imgs2);
		} 
		$lists[$lk]['imgs'] = $imgs3;*/
		//随机加30~90票
		/*$rand = mt_rand(30,90);
		$_SGLOBAL['pdo']->update('casio_infos',"votes = votes + $rand","cid = '$cid'");
		unset($imgs3);*/
	}
}
$TK['total'] = $total;
$TK['page'] = $page;
$TK['totalpage'] = $totalpage;
$TK['lists'] = $lists;

msg(1,$TK);
?>
