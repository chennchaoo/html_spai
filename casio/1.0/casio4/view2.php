<?php
include_once('./common.php');
define('ISJSON', TRUE);
if(!$xtgroup_uid){
    //msg(1101);
}
/*
$sql0 = "SELECT * FROM ".DB_PRE."casio4_infos where status = 1 ";
$lists = $_SGLOBAL['pdo']->getAll($sql0);
foreach($lists as $lk=>$lr){
  $ma = $lk+1;
  $_SGLOBAL['pdo']->update('casio4_infos',array('xid'=>$ma),"cid = '".$lr['cid']."'");  
}
echo '123';
exit;*/
$where2 = '';
$cid = isset($_REQUEST['cid'])?trim($_REQUEST['cid']):'';
if($cid){
    $r = $_SGLOBAL['pdo']->fetOne('casio4_infos','*',"cid = '$cid'");
    if(!$r){
        msg(1006);
    }
}else{
    $cids = array();
    if($_SCOOKIE['cids']) {
        #echo $_SCOOKIE['cids'];
        #echo '<br>';
        $ma = base64_decode($_SCOOKIE['cids']);
        $cids = unserialize($ma);
        #echo count($cids);
        $idstr = implode($cids,',');
        $where2 = " AND xid NOT IN ($idstr)";
        #echo $where2;
    }
    //随机获取一个，
    //测试的时候 获取最后一个
    $r = $_SGLOBAL['pdo']->getOne("SELECT cid,xid,truename,school,votes,tag,img1,img2,g FROM ".DB_PRE."casio4_infos where status = 1 AND member_id != '$xtgroup_uid' $where2 order by rand()  limit 0,1");
    if(!$r){
        msg(1106);
    }
    $cid = $r['xid'];   
    $cids[] = $cid;
    ssetcookie('cids', base64_encode(serialize($cids)), 3600*24*7);
    if(count($cids) > 200){
        ssetcookie('cids', base64_encode(serialize($cids)), -3600*24*7); 
    }    
}
//$sql = "SELECT cid,truename,votes,tag,imgs,g FROM ".DB_PRE."casio_infos where status = 1 order by rand() limit 0,$pagesize";
//取两个红唇印
$sql = "SELECT img2 FROM ".DB_PRE."casio4_infos where status = 1 AND cid != '$cid' AND img2 != '' order by rand()  limit 0,2"; 
$hc[] = array('url'=>$r['img2'],'status'=>1);
$lists = $_SGLOBAL['pdo']->getAll($sql);
foreach($lists as $lk=>$lr){
    $lrc['url'] = $lr['img2'];
    $lrc['status'] = 0;
    $hc[] = $lrc;
    unset($lrc);
}
shuffle($hc);
$member = array();
#$member = $_SGLOBAL['pdo']->fetOne('casio4_member','*',"member_id = '$xtgroup_uid'");
/*
if(!$member){
    $info['dateline'] = SYSTIME;
    $info['member_id'] = $xtgroup_uid;
    $_SGLOBAL['pdo']->add('casio4_member',$info);
    $member = $_SGLOBAL['pdo']->fetOne('casio4_member','*',"member_id = '$xtgroup_uid'");
}
$rows = getLenum($xtgroup_uid,$member['hadnums']);
$lenums = $rows['lenums'];
$member['lenums'] = $lenums>=0?$lenums:0;
$member['prizes'] = $rows['prizes'];*/
$TK['member'] = $member;
$TK['info'] = $r;
$TK['hc'] = $hc;

msg(1,$TK);

?>
