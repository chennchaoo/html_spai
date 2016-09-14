<?php
include_once('./common.php');
define('ISJSON', TRUE);
if(!$xtgroup_uid){
    //msg(1101);
}
$cid = isset($_REQUEST['cid'])?trim($_REQUEST['cid']):'1';
$check = $_SGLOBAL['pdo']->fetOne("casio5_infos","*","cid = '$cid'");
if(!$check){
    msg(1006);
}
if($check['status'] != 1){
    msg(1110);
}
$TK = array();
//$vote = $_SGLOBAL['pdo']->fetOne("casio5_vote","*","member_id = '$xtgroup_uid' AND cid = '$cid'");
#$member = $_SGLOBAL['pdo']->fetOne('casio5_member','*',"member_id = '$xtgroup_uid'");

$cookie_id = 'c_'.$cid;
$vote = $_SCOOKIE[$cookie_id ];
//if(!$vote){
	#$info['member_id'] = $xtgroup_uid;
	$info['dateline'] = SYSTIME;
	$info['ip'] = IPADDRESS;
	$info['cid'] = $cid;
	try{
            $_SGLOBAL['pdo']->autocommit();
            if(!$_SGLOBAL['pdo']->add('casio5_vote',$info)){
                msg(2003);
            }
            if(!$_SGLOBAL['pdo']->update('casio5_infos',"votes = votes + 1","cid = '$cid'")){
                msg(2003);
            }          
            //自己数据
            /*
            if(!$_SGLOBAL['pdo']->update('casio5_member',"hadnums = hadnums + 1","member_id = '$xtgroup_uid'")){
                msg(2003);
            }*/
            $_SGLOBAL['pdo']->commit();
	}catch (Exception $e){
            $_SGLOBAL['pdo']->rollback();
            msg(2003);
	} 
        $vote2 = $_SGLOBAL['pdo']->fetOne('casio5_infos','*',"cid = '$cid'");
        #$rows = getLenum($xtgroup_uid,$member['hadnums']);
        #$lenums = $rows['lenums'];
        #$TK['hadnums'] = $member['hadnums'];
        #$TK['lenums'] = $lenums>=0?$lenums:0;

        $TK['votes'] = $vote2['votes'];
        ssetcookie('c_'.$cid, $cid, 3600*24*7);
		msg(1,$TK);
//}else{
    /*
    $member = $_SGLOBAL['pdo']->fetOne('casio5_member','*',"member_id = '$xtgroup_uid'");
    $rows = getLenum($xtgroup_uid,$member['hadnums']);
    $lenums = $rows['lenums'];
    $TK['hadnums'] = $member['hadnums'];
    $TK['lenums'] = $lenums>=0?$lenums:0;
    $TK['prizes'] = $rows['prizes'];
     * 
     */
    //$TK['hadnums'] = 0;
   // $TK['lenums'] = 0;
    //$TK['prizes'] = 0;
    //msg(1,$TK);
//}

?>
