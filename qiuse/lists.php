<?php
include_once('../common.php');
define('ISJSON', TRUE);
if(!$xtgroup_uid){
    msg(1101);
}
$tid = isset($_REQUEST['tid'])?trim($_REQUEST['tid']):'';
if(!$tid){
    msg(1003);
}
$member_id = $xtgroup_uid;
$task = $GLOBALS['pdo']->fetOne("tasks",'*',"tid = '$tid'");
if(!$task){
    msg(1006);
}
//s
$perpage = isset($_REQUEST['perpage'])?intval($_REQUEST['perpage']):16;
$fields = array('tid'=>1,); 
$info = checkFields($fields);
$tid = $info['tid'];
$page = isset($_REQUEST['page'])?intval($_REQUEST['page']):1;
$type = 0;
$page = $page >1 ?$page:1;
$TK = $lists = array();
$where1 = $where2 = '';
$where1 = "tid = '$tid'";
$where2 = "l.tid = '$tid'";
$total = $GLOBALS['pdo']->fetRowCount('tasks_logs','tlid',$where1);
$totalpage = 0;
if($total > 0){
    $totalpage  = ceil($total/$perpage);
    if($page >= $totalpage){$page = $totalpage;}
    $offset = intval($perpage*($page-1));
    $mc = ($page-1)*$perpage+1;
    //所有
    $sql = "SELECT m.nickname,m.member_id,m.avatar,l.tlid,l.status,l.dateline,l.vote_count,l.imgs,l.content,v.a FROM ".DB_PRE."tasks_logs l ";
    $sql .= " LEFT JOIN ".DB_PRE."member m ON l.member_id = m.member_id ";
    $sql .= " LEFT JOIN ( SELECT count(*) as a,tlid  FROM ".DB_PRE."tasks_logs_vote WHERE member_id = '$member_id' GROUP BY tlid) v ON l.tlid = v.tlid ";
    $sql .= " WHERE $where2 ORDER BY l.vote_count DESC,l.dateline ASC LIMIT $offset,$perpage";   
    #echo $sql;
    $lists = $GLOBALS['pdo']->getAll($sql);
    foreach($lists as $k=>$r){
        if(!$r['avatar']){
            $lists[$k]['avatar'] = DEFAULT_AVATAR; 
            $r['avatar'] = DEFAULT_AVATAR; 
        }
        if(!$r['nickname']){
            $r['nickname'] = 'S派用户';
        }
        $lists[$k]['is_vote'] = 0; 
        $r['is_vote'] = 0; 
        if($r['a']>0){
            $lists[$k]['is_vote'] = 1; 
            $r['is_vote'] = 1; 
        }
        //imgs
        $imgs3 = array();
        //图集
        if($r['imgs']){
            $imgs = unserialize($r['imgs']);
            foreach($imgs as $img_url){
                $imgs2['img_url'] = $img_url;
                $imgs2['img_url_thumb'] = $img_url.'.thumb200.jpg';
                $imgs3[] = $imgs2;
                unset($imgs2);
            }            
        } 
        $lists[$k]['imgs'] = $imgs3;
        $r['imgs'] = $imgs3;
        unset($imgs,$imgs3);
        $lists[$k]['datetime'] = date('Y-m-d',$r['dateline']); 
        $r['datetime'] = date('Y-m-d',$r['dateline']); 
        $r['pm'] = $mc;
        $mc++;
        $lists2[] = $r;
    }
} 
$TK['total'] = $total;
$TK['totalpage'] = $totalpage;
$TK['lists'] = $lists2;
msg(1,$TK);  
?>
