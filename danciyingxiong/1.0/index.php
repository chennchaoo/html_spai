<?php
include_once('../common.php');
$forward = get_url();
if(!$xtgroup_uid){
    header("Location:http://share.spai.me/wx_auth/auth.php?forward=".$forward);
    exit;
}
//define('ISJSON', TRUE);
$tid = isset($_REQUEST['tid'])?trim($_REQUEST['tid']):'';
if(!$tid){
    msg(1003);
}
$task = $GLOBALS['pdo']->fetOne('tasks','*',"tid = '$tid'");
if(!$task){
    msg(1006);
}
if($tid == '02e1664fe83a17a8d4e77c902d0d8604'){
    //特殊
    header("Location:http://api20.taskou.com/c/casio/2/index.php");
}elseif($tid == '02e1664fe83a17a8d4e77c902d0d8605'){
    header("Location:http://c.taskou.com/c/casio/index.php");
}else{
    //下面是比赛详情数据
    $member_id = $xtgroup_uid;
    $task = $GLOBALS['pdo']->fetOne("tasks",'*',"tid = '$tid'");
    //$task = $GLOBALS['pdo']->getOne("SELECT t.*,b.nickname,b.avatar FROM ".DB_PRE."tasks t LEFT JOIN ".DB_PRE."brand b ON t.bid = b.bid WHERE t.tid = '$tid'");
    if(!$task){
        msg(1006);
    }
    if(!($task['starttime'] <= SYSTIME && $task['excetime'] > SYSTIME)){
        $status = -1;
    }else{
        $status = 1;
    }
    $TK = array();
    $TK['tid'] = $task['tid'];
    $TK['subject'] = $task['subject'];
    $TK['xsubject'] = $task['xsubject'];
    $TK['description'] = $task['description'];
    $TK['banner'] = $task['banner'];
    $TK['starttime'] = date('Y-m-d',$task['starttime']);
    $TK['excetime'] = date('Y-m-d',$task['excetime']);
    $TK['follow_count'] = $task['follow_count'];
    $TK['answer_count'] = $task['answer_count'];
    $TK['share'] = array('img'=>APP_PATH.'attachments/logo.png','title'=>$task['subject'],'des'=>cut_str($task['description'],100),'shareUrl'=>'http://share.spai.me/m/?tid='.$tid);

}
?>
<!doctype html>
<html lang="zh-cn">
<head>
    <meta name="viewport" content="initial-scale=1, user-scalable=0, minimal-ui" charset="UTF-8">
    <title>s派-单词英雄</title>
    <link href="css/style_h.css?t=1" type="text/css" rel="stylesheet" media="all" />
	<script src="js/public.js"></script>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script src="js/jquery.min.js"></script>
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
<body>
	<div class="bg_1">
    	<div class="bg_1_kong"></div>
    	<div class="musicList">
        	<div class="music_div" id="music_div_1" onClick="music_div(1)"style="display:none"><img src="img/music_1.png"></div>
            <div class="music_div" id="music_div_h_1" onClick="music_div(1)" ><img src="img/music_1.png"></div>
            
            <div class="music_div" id="music_div_2" onClick="music_div(2)"><img src="img/music_2.png"></div>
            <div class="music_div" id="music_div_h_2" onClick="music_div(2)" style="display:none"><img src="img/qinjian.png" id="qinjian1"><img src="img/qinjian.png" id="qinjian2"></div>
            
            <div class="music_div" id="music_div_3" onClick="music_div(3)"><img src="img/music_3.png"></div>
            <div class="music_div" id="music_div_h_3" onClick="music_div(3)" style="display:none"><img src="img/music_3.png"></div>
            
            <div class="music_div" id="music_div_4" onClick="music_div(4)"><img src="img/music_4.png"></div>
            <div class="music_div" id="music_div_h_4" onClick="music_div(4)" style="display:none"><img src="img/music_4.png"></div>
            
                <div class="music_div" id="music_div_5" onClick="music_div(5)"><img src="img/music_5b.png"></div>
            <div class="music_div" id="music_div_h_5" onClick="music_div(5)" style="display:none"><img src="img/chui_1.png" id="chui_1"><img src="img/chui_2.png" id="chui_2"></div>

            <!--<div class="music_div" id="music_div_6" onClick="music_div(6)"><img src="img/music_6.png"></div>
            <div class="music_div" id="music_div_h_6" onClick="music_div(6)"style="display:none"><img src="img/music_6.png"></div>

            <div class="music_div" id="music_div_7" onClick="music_div(7)"><img src="img/music_7.png"></div>
            <div class="music_div" id="music_div_h_7" onClick="music_div(7)" style="display:none"><img src="img/music_7.png"></div>

            <div class="music_div" id="music_div_8" onClick="music_div(8)"><img src="img/music_8.png"></div>
            <div class="music_div" id="music_div_h_8" onClick="music_div(8)"style="display:none"><img src="img/music_8.png"></div>-->
        </div>
        <div class="prize">
        	<img src="img/prize.png">
        </div>
        <!--<audio id="music_1" src="mp3/3.mp3" autoplay="autoplay" loop="loop">你的浏览器不支持audio标签。</audio>-->
        <audio id="music_1" src="mp3/1.mp3" autoplay="autoplay" loop="loop">你的浏览器不支持audio标签。</audio>
        <audio id="music_2" src="mp3/2.mp3"  loop="loop">你的浏览器不支持audio标签。</audio> 
        <audio id="music_3" src="mp3/3.mp3"  loop="loop">你的浏览器不支持audio标签。</audio>
        <audio id="music_4" src="mp3/4.mp3"  loop="loop">你的浏览器不支持audio标签。</audio>
        <audio id="music_5" src="mp3/5.mp3"  loop="loop">你的浏览器不支持audio标签。</audio>
        <audio id="music_6" src="mp3/6.mp3"  loop="loop">你的浏览器不支持audio标签。</audio>
        <audio id="music_7" src="mp3/7.mp3"  loop="loop">你的浏览器不支持audio标签。</audio>
        <audio id="music_8" src="mp3/8.mp3"  loop="loop">你的浏览器不支持audio标签。</audio>
    </div>
    <div class="bg_2">
    	<div class="bg_2_kong"></div>
    	<div class="spai_url"><a href="http://a.app.qq.com/o/simple.jsp?pkgname=com.app.spire" ></a></div>
    </div>
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