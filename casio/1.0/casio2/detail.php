<?php
include_once('../../common.php');
define('ISJSON', TRUE);
if(!$xtgroup_uid){
    //msg(1101);
}
//获取最新的两个列表
$fields = array('album_id'=>1,); 
$info = checkFields($fields);
$album_id = $info['album_id'];
$album = $_SGLOBAL['pdo']->fetOne("casio2_album","*","album_id = '$album_id'");
if(!$album){
	msg(1006);
}
$TK['title'] = $album['title'];
$TK['avatar'] = $album['attr_url'];
$TK['views'] = $album['views'];
$TK['votes'] = $album['votes'];

$perpage = 10;
$page = isset($_REQUEST['page'])?intval($_REQUEST['page']):1;
$page = $page >1 ?$page:1;
$total = $_SGLOBAL['pdo']->fetRowCount('casio2_photo','photo_id',"album_id = '$album_id'");
$totalpage = 0;
$list = array();
if($total > 0){
	$totalpage  = ceil($total/$perpage);
	if($page >= $totalpage){$page = $totalpage;}
	$offset = intval($perpage*($page-1));
	$sql = "SELECT * FROM ".DB_PRE."casio2_photo where status >= 0 AND album_id = '$album_id' order by displayorder ASC,dateline DESC LIMIT $offset,$perpage"; 
	$lists = $_SGLOBAL['pdo']->getAll($sql);	
}
$TK['total'] = $total;
$TK['totalpage'] = $totalpage;
$TK['page'] = $page;
//
$TK['lists'] = $lists;
msg(1,$TK);
?>
