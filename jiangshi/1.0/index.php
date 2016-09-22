<?php
include_once('../../common.php');
$forward = get_url();
if(!$xtgroup_uid){
    header("Location:http://share.spai.me/wx_auth/auth.php?forward=".$forward);
    exit;
}
$tid = '02e1664fe83a17a8d4e77c902d0d3333';
$member_id = $xtgroup_uid;
$mid = isset($_REQUEST['mid'])?trim($_REQUEST['mid']):'';
if(!$mid){
    $id = isset($_REQUEST['id'])?trim($_REQUEST['id']):'';
    if(!$id){
        $id = '3dfe686db21785bedf735d8cf3331160';//指定一个
    }
    $log = $GLOBALS['pdo']->fetOne('h5_js','*',"id = '$id'");
    if($log['status'] == 0){
        $linfo['fid'] = $log['fid'];
        $linfo['fmid'] = $log['fmid'];
        $mid = $log['fmid'];
    }else{
        $linfo['fid'] = $log['id'];
        $mid = $log['member_id'];
    }

    #$mid = 'f68d8759f5854de10e8d3befcda558f0';
}else{
    $log['status'] = 1;//默认第一次被感染
    $linfo['fmid'] = $mid;
}
//define('ISJSON', TRUE);
/*
$fid = isset($_REQUEST['fid'])?trim($_REQUEST['fid']):'';
$log = array();
$mid = $xtgroup_uid;
if($fid){
	$log = $GLOBALS['pdo']->fetOne('h5_js','*',"fid = '$fid'");
	if(!$log){
		msg(1006);
	}
	$mid = $log['member_id'];
}else{

}*/
$user = $GLOBALS['pdo']->fetOne('member','member_id,nickname',"member_id = '$mid'");
if(!$user){
    msg(1006);
}
$log['nickname'] = $user['nickname'];
//产生记录
$linfo['id'] = productId(SYSTIME.$member_id);
$linfo['dateline'] = SYSTIME;
$linfo['member_id'] = $member_id;
$linfo['ip'] = IPADDRESS;
$GLOBALS['pdo']->add('h5_js',$linfo);
$id = $linfo['id'];
//下面是比赛详情数据

/*
$task = $GLOBALS['pdo']->fetOne("tasks",'*',"tid = '$tid'");
if(!$task){
	msg(1006);
}
if(!($task['starttime'] <= SYSTIME && $task['excetime'] > SYSTIME)){
	$status = -1;
}else{
	$status = 1;
}*/
$TK = array();
$TK = $log;
$TK['share'] = array('img'=>APP_PATH.'attachments/logo.png','title'=>'僵尸分享标题','des'=>'僵尸分享描述','shareUrl'=>'http://share.spai.me/m/jiangshi/?tid='.$tid.'&id='.$id);
?>
<!doctype html>
<html lang="zh-cn">
<head>
    <meta name="viewport" content="initial-scale=1, user-scalable=0, minimal-ui" charset="UTF-8">
    <title>S派</title>
    <link href="css/style_m.css?t=2" type="text/css" rel="stylesheet" media="all" />
	<script src="js/public.js"></script>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <style></style>
<script>
        	(function(){
			var phoneWidth = parseInt(window.screen.width),
				phoneScale = phoneWidth/640,
				ua = navigator.userAgent;
			if (/Android (\d+\.\d+)/.test(ua)){
				var version = parseFloat(RegExp.$1);
				// andriod 2.3
				if(version > 2.3){
					document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
				// andriod 2.3以上
				}else{
					document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
				}
				// 其他系统
			} else {
				/*document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');*/
				document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
			}
		})();
		
		 /*$.ajax({
			type : "GET",
			//async : false,
			dataType : "json",
			url : publicUrl+'m/index.php?',
			success : function(d){
				
			}
		 })*/
		 
        </script>
</head>
<body style="height:1029px;">
<div class="bg_1" style="display:block; height:1029px; position: relative;">
    <div class="bg_1_kong"></div>
    <div class="bg_1_wenzi"><?php echo $log['nickname'];?></div>
    <div class="bg_1_dianji"></div>
</div>
<div class="bg_2" style="display:none; height:1029px; position: relative;">
    <div class="bg_1_kong"></div>
    <div class="bg_1_wenzi"><?php echo $log['nickname'];?></div>
    <div class="bg_1_dianji"></div>
</div>
<div class="bg_3" style="display:none; height:1029px; position: relative;">
    <div class="bg_1_kong"></div>
    <div class="bg_3_1"></div>
    <div class="bg_3_2"></div>
</div>
<div class="bg_4" style="display:none; height:1029px; position: relative;">
    <div class="bg_1_kong"></div>
    <div class="bg_3_1"></div>
    <div class="bg_3_2"></div>
</div>

<div style="display:none;width:640px; height:1029px;margin: 0 auto; background: black;" id="gameDiv">
    <div class="g_kong"></div>
    <div style="text-align:center;margin:20px; ">
        <div class="explain">20个僵尸来袭，赶紧点20下打倒他们</div>
        <span id="timer" style="color:#fff;font-size:20px;">
            10.00 秒
        </span>
    </div>
    <button id="button" class="button red" style="margin-top: 40px;width: 160px;height:160px;border-radius:80px;font-size:18px;font-weight:bold;margin-left:240px;">
        点我点我
    </button>
    <div style="margin:20px;text-align:center;">
        <div id="result" style="color:#fff;font-size:30px;">0 次</div>
        <div id="best" style="margin-top:20px;color:#fff;font-size:20px;"></div>
    </div>

</div>
<input type="hidden" class="total" value="0">
<div class="shareTo" style="display: none;">
    <div class="shareTo_kong"></div>
    <div class="shareTo_word">点击右上角分享给朋友</br>
        查看自己是否被感染</div>
</div>
<input type="hidden" class="tid" value="<?php echo $id?>">
<input type="hidden" class="shareUrl" value="<?php echo $TK['share']['shareUrl']?>">
<input type="hidden" class="shareTitle" value="<?php echo $TK['share']['title']?>">
<input type="hidden" class="shareContent" value="<?php echo $TK['share']['des']?>">
<input type="hidden" class="shareImg" value="<?php echo $TK['share']['img']?>">
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
    var initial = 200;
    var count = initial;
    var counter; //10 will  run it every 100th of a second
    var state = 0;
    var total = 0;

    if (localStorage.max) {
        /*$('#best').html( '最好成绩：' + localStorage.max + ' 次');*/
    }

    function timer() {
        if (count <= 0) {
            clearInterval(counter);
            state = 0;
            //showDiv(3);
            $(".total").val(total);
            $(".shareTo").show();
            /*$('#result_panel').show();*/

            if ( !localStorage.max || parseInt(localStorage.max) < total) {
                localStorage.max = total;
                /*$('#best').html( '最好成绩：' + localStorage.max + ' 次');*/
            }

            localStorage.max = parseInt(localStorage.max) > total ? localStorage.max: total;
            return;
        }
        count--;
        displayCount(count);
    }

    function displayCount(count) {
        var res = count / 100;
        document.getElementById("timer").innerHTML = res.toPrecision(count.toString().length) + " 秒";
    }

    /*$(document).on('touchmove', function(e) {
        e.preventDefault();
    })*/

    $('#button').on('touchstart', function () {

        if (!state) {
            state = 1;
            counter = setInterval(timer, 10);
        }

        this.classList.add('active');
    });

    $('#button').on('touchend', function () {
        if (state) {
            total++;
            $('#result').html(total + ' 次');
        }
        this.classList.remove('active');
    });

    // $('#stop').on('click', function () {
    //     clearInterval(counter);
    // });

    function reset() {
        count = initial;
        total = 0;
        state = 0;
        $('#result').html(total + ' 次');
        $('#timer').html(10 + ' 秒');
    }

    $('#reset').on('touchend', function () {
        reset();
        $('#result_panel').hide();
    });

    $('#doShare').on('touchend', function () {
        dp_share(total);
        $('#result_panel').hide();
        reset();
    });
    displayCount(initial);
</script>
<script>
    $(document).ready(function(){
        $(".bg_1_dianji").click(function(){
            $(".bg_1").hide();
            $(".bg_2").hide();
            $(".bg_3").hide();
            $(".bg_4").hide();
            $("#gameDiv").show();
        })

        $(".bg_3_1").click(function(){
            //location.href='';
            alert('跳转到报名链接，暂时木有');
        })
        $(".bg_3_2").click(function(){
            location.href='http://a.app.qq.com/o/simple.jsp?pkgname=com.app.spire';
        })
        /*$(".shareTo").click(function(){
            $(".shareTo").hide();
        })*/
    })
    function showDiv(e){
        $(".bg_1").hide();
        $(".bg_2").hide();
        $(".bg_3").hide();
        $(".bg_4").hide();
        $("#gameDiv").hide();
        $(".shareTo").hide();
        $(".bg_"+e).show();
    }
    function isJiangshi(){
        var total= $(".total").val();
        var tid=$(".tid").val();
        //alert(total);
        if(total>=20){
            $.ajax({
                type : "GET",
                //async : false,
                dataType : "json",
                url : 'http://share.spai.me/m/jiangshi/updateStatus.php?id='+tid,
                data: 'status=2',
                success : function(data){

                    if(data.code!=1){
                        alert(data.msg);
                    }
                }
            })
            showDiv(4);
        }else{
            $.ajax({
                type : "GET",
                //async : false,
                dataType : "json",
                url : 'http://share.spai.me/m/jiangshi/updateStatus.php?id='+tid,
                data: 'status=1',
                success : function(data){
                    if(data.code!=1){
                        alert(data.msg);
                    }
                }
            })
            showDiv(3);
        }
    }
</script>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?ff652de7c3fcac2e33a7bdc5ea62d3e1";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<script>
    var urls="http://share.spai.me/api/index.php?type=getShareKey&url="+encodeURIComponent(location.href.split('#')[0]);
    //var urls='http://share.spai.me/api/index.php?type=getShareKey&url=<?php //echo $TK['share']['shareUrl'] ?>';
    //var shareUrl=location.href.split('#')[0];
    var shareUrl=$(".shareUrl").val();
    var shareTitle=$(".shareTitle").val();
    var shareContent=$(".shareContent").val();
    var shareImg=$(".shareImg").val();
    $.ajax(
        {
            type : "GET",
            //async : false,
            dataType : "json",
            url : urls,
            success : function(d){

                r = d.data;
                //alert(r.result.appId);
                //alert(r.result.timestamp);
                //alert(r.result.noncestr);
                //alert(r.result.signature);
                if(r.result.appId){
                    //console.log(result)
                    wx.config({
                        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
                        appId: r.result.appId, // 必填，公众号的唯一标识
                        timestamp: r.result.timestamp, // 必填，生成签名的时间戳
                        nonceStr: r.result.noncestr, // 必填，生成签名的随机串
                        signature: r.result.signature,// 必填，签名，见附录1
                        jsApiList: [
                            'checkJsApi',
                            'onMenuShareTimeline',
                            'onMenuShareAppMessage',
                            'onMenuShareQQ',
                            'onMenuShareWeibo',
                            'hideMenuItems',
                            'showMenuItems',
                            'hideAllNonBaseMenuItem',
                            'showAllNonBaseMenuItem',
                            'translateVoice',
                            'startRecord',
                            'stopRecord',
                            'onRecordEnd',
                            'playVoice',
                            'pauseVoice',
                            'stopVoice',
                            'uploadVoice',
                            'downloadVoice',
                            'chooseImage',
                            'previewImage',
                            'uploadImage',
                            'downloadImage',
                            'getNetworkType',
                            'openLocation',
                            'getLocation',
                            'hideOptionMenu',
                            'showOptionMenu',
                            'closeWindow',
                            'scanQRCode',
                            'chooseWXPay',
                            'openProductSpecificView',
                            'addCard',
                            'chooseCard',
                            'openCard'
                        ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
                    });
                    wx.ready(function(){
                        //alert('ok1');
                        //分享到朋友圈
                        wx.onMenuShareTimeline({
                            title: shareContent, // 分享标题
                            link: shareUrl, // 分享链接
                            imgUrl: shareImg, // 分享图标
                            success: function () {
                                //alert('ok');
                                // 用户确认分享后执行的回调函数
                                var total=$(".total").val();
                                if(total>0){
                                    isJiangshi();
                                }

                            },
                            cancel: function () {
                                //alert('cancel');
                                // 用户取消分享后执行的回调函数
                            }
                        });
                        //分享到朋友
                        wx.onMenuShareAppMessage({
                            title: shareTitle, // 分享标题
                            desc: shareContent,//描述
                            link: shareUrl, // 分享链接
                            imgUrl: shareImg, // 分享图标
                            success: function () {
                                //alert('ok');
                                // 用户确认分享后执行的回调函数
                                var total=$(".total").val();
                                if(total>0){
                                    isJiangshi();
                                }
                            },
                            cancel: function () {
                                //alert('cancel');
                                // 用户取消分享后执行的回调函数
                            }
                        });
                        /*				wx.getLocation({
                         success: function (res) {
                         var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                         alert(latitude);
                         var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                         var speed = res.speed; // 速度，以米/每秒计
                         var accuracy = res.accuracy; // 位置精度
                         }
                         });*/
                        //分享到QQ
                        wx.onMenuShareQQ({
                            title: shareTitle, // 分享标题
                            desc: shareContent,//描述
                            link: shareUrl, // 分享链接
                            imgUrl: shareImg, // 分享图标
                            success: function () {
                                //alert('ok');
                                // 用户确认分享后执行的回调函数
                            },
                            cancel: function () {
                                //alert('cancel');
                                // 用户取消分享后执行的回调函数
                            }
                        });
                        //分享到微博
                        wx.onMenuShareWeibo({
                            title: shareTitle, // 分享标题
                            desc:shareContent,//描述
                            link: shareUrl, // 分享链接
                            imgUrl: shareImg, // 分享图标
                            success: function () {
                                //alert('ok');
                                // 用户确认分享后执行的回调函数
                            },
                            cancel: function () {
                                //alert('cancel');
                                // 用户取消分享后执行的回调函数
                            }
                        });
                        // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready函数中。
                    });
                    wx.error(function(res){

                        // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。

                    });
                    //e

                }else{
                    //错误
                    alert(r.status.msg);
                }
            }
        });
</script>
</body>
</html>