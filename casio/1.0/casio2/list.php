<?php
include_once('../../common.php');
define('ISJSON', TRUE);
if(!$xtgroup_uid){
    //msg(1101);
}
//获取最新的两个列表
$pagesize = isset($_REQUEST['pagesize'])?intval($_REQUEST['pagesize']):6;
$sql = "SELECT album_id,title,views,votes,attr_url FROM ".DB_PRE."casio2_album where status = 1 order by rand() limit 0,$pagesize"; 
$lists = $_SGLOBAL['pdo']->getAll($sql);
foreach($lists as $lk=>$lr){
	
}
$TK['lists'] = $lists;
msg(1,$TK);
?>
