<?php
include_once('../../common.php');
#define('ISJSON', TRUE);
define('TOTAL_LOVE',10);
function getLenum($member_id,$hadnums){
    global $_SGLOBAL;
    $row = array();
    $prizes = 0;
    if($hadnums < TOTAL_LOVE){
        $lenums = TOTAL_LOVE - $hadnums;
    }else{
        $ptype = intval($hadnums/TOTAL_LOVE)*TOTAL_LOVE;        
        $check = $_SGLOBAL['pdo']->fetOne('casio4_pinfo','*',"member_id = '$member_id' AND ptype = '$ptype'");
        if(!$check){
            $pinfo['dateline'] = SYSTIME;
            $pinfo['ptype'] = $ptype;
            $pinfo['pid'] = 0;
            $pinfo['member_id'] = $member_id;
            $_SGLOBAL['pdo']->add('casio4_pinfo',$pinfo);
            $check = $pinfo;
        }
        if($check && $check['pid'] == 0){
            $prizes = 1;
        }
        $lenums = (intval($hadnums/TOTAL_LOVE)+1)*TOTAL_LOVE - $hadnums;
    }    
    $row['lenums'] = $lenums;
    $row['prizes'] = $prizes;
    return $row;
}
?>
