<?php
/*include_once('../../../common.php');
define('ISJSON', TRUE);
$forward = urlencode(get_url());
if(!$xtgroup_uid){
    header("Location:http://api20.taskou.com/wx_auth/auth.php?forward=".$forward);
    exit;
}*/
?>
<!doctype html>
<html lang="zh-CN"><head>
<title>卡西欧</title>
<meta charset="utf-8">
<!--<meta content="" name="description">
<meta content="" name="keywords">
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="telephone=no, address=no" name="format-detection">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />-->
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="format-detection" content="telephone=no">-->

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <meta content="email=no" name="format-detection" />

<link href="css/style.css?t=9" type="text/css" rel="stylesheet" media="all" />
<!--<link href="css/zzsc.css" type="text/css" rel="stylesheet" />-->
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/erweima.js"></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="js/shareDemo.js?t=3"></script>
<script type="text/javascript" src="http://c.taskou.com/api/index.php?type=wx&url=<?=$forward?>"></script>
<script>

$(document).ready(function(){
	
	//alert(qrcode);

});

//var urls="http://c.taskou.com/api/index.php?type=getShareKey&url="+encodeURIComponent(location.href.split('#')[0]);
	/*var urls=encodeURIComponent(location.href.split('#')[0]);
	var shareUrl=location.href.split('#')[0];
	var shareTitle='520接住我的爱';
	var shareContent='520接住我的爱';
	var shareImg='http://c.taskou.com/c/casio/img/tu.png';*/
var url=encodeURIComponent(location.href.split('#')[0]);
var title='520接住我的爱';
var touxiang='http://c.taskou.com/c/casio/img/tu.png';	
	//shareDemo(urls,shareUrl,shareTitle,shareContent,shareImg);
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
				//document.write('<meta name="viewport" content="width=640, initial-scale=0.5, maximum-scale=0.5,user-scalable=no">');
				document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
			}
		})();
//弹出层
/*function ShowDiv(bg_div,show_div){	
	if(bg_div!='')
	{
		$("#"+bg_div).show();
		var bgdiv = document.getElementById(bg_div);
		bgdiv.style.width = document.body.scrollWidth;
		$("#"+bg_div).height($(document).height());
	}
	$("#"+show_div).show();
	
	
	
};
//关闭弹出层
function CloseDiv(bg_div,show_div)
{
	if(bg_div != ''){
		$("#"+bg_div).hide();
	}
	$("#"+show_div).hide();
};*/
function ShowDiv(bg_div,show_div){	
	if(bg_div!='')
	{
		$("#"+bg_div).show();
		
	}
	$("#"+show_div).show();
	
	
	
};
//关闭弹出层
function CloseDiv(bg_div,show_div)
{
	if(bg_div != ''){
		$("#"+bg_div).hide();
	}
	$("#"+show_div).hide();
};
/*function showdiv(){
	$("#tan_1").show();	
	$("#overlay-bg").show()
}
function closediv(){
	$("#tan_1").hide();	
	$("#overlay-bg").hide()
}*/

</script>
<script>
wx.config({
	debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
	appId: app_id, // 必填，公众号的唯一标识
	timestamp: timestamp, // 必填，生成签名的时间戳
	nonceStr: noncestr, // 必填，生成签名的随机串
	signature: signature,// 必填，签名，见附录1
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
		title: title, // 分享标题
		link: location.href, // 分享链接
		imgUrl: touxiang, // 分享图标
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
		title: title, // 分享标题
		desc: title,//描述
		link: location.href, // 分享链接
		imgUrl: touxiang, // 分享图标
		success: function () { 
			//alert('ok');
			// 用户确认分享后执行的回调函数
		},
		cancel: function () { 
			//alert('cancel');
			// 用户取消分享后执行的回调函数
		}
	});
	//分享到QQ
	wx.onMenuShareQQ({
		title: title, // 分享标题
		desc: '',//描述
		link: location.href, // 分享链接
		imgUrl: touxiang, // 分享图标
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
		title: title, // 分享标题
		desc: '',//描述
		link: location.href, // 分享链接
		imgUrl: 'http://api20.taskou.com/c/img/logo_tangkou.png', // 分享图标
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

</script>
</head>
<body>
<script>
 $(document).ready(function () {
            $("body").css({"transform-origin": "0 0", "transform": "scale(" + phoneScale + ")"});
        
    })
</script>

<div class="bg_1">
	
    <div class="erwei"  id="erwei" onClick="CloseDiv('overlay-bg2','erwei')" style="display:none">
    	
    <img src="img/erweima.png">
    </div>
	<div class="bg_1_kong"></div>
    <div class="check_title"><a href="javascript:void(0)"></a></div>
    
  	
    <div class="bg_1_1">
    	<div class="bg_1_1_left"><a href="enroll.php"></a></div>
        <div class="bg_1_1_right"><a href="friendlook.php"></a></div>
    </div>
    <div class="bg_1_xize" onClick="ShowDiv('overlay-bg','tan_1')"></div>
    
    <!--弹出层-->
    <div id="overlay-bg" style="display:none"></div>
    <div class="tan_1" id="tan_1" style="display:none" onClick="CloseDiv('overlay-bg','tan_1')">
    	<div class="close_tan"></div>
        <div class="wenzi"> 
        	<div class="title_1">卡西欧TR520活动细则</div>
        	<div class="wenzi_1">1.本活动期间为2016年5月19日至2016年5月25日，面向上海大学生；<br>
2.女大学生在本活动期间内，可上传自己的头像与唇印照片，参与卡西欧TR520活动；<br>
3.任何人可登录活动页面，选择头像照片对应得唇印照片；<br>
4.如女大学生的头像与唇印被10、50、100、150人猜对选中，则可获得美宝莲唇彩奖品一支；<br>

5.被猜中选对头像与唇印最多的三位女大学生，可以获得<br>
	三等奖：卡西欧ZR55相机一部；<br>
	二等奖：卡西欧ZR3600相机一部；<br>
	一等奖：卡西欧EX-TR600相机一部；<br>
6.获得奖品的个人须自行缴纳个人所得税；<br>
7.卡西欧（中国）贸易有限公司及上海羲岳网络科技有限公司、上海市时至广告有限公司有权在中国法律法规允许的范围内修改本活动条款及细则，并于《后生》手机平台或其他相关渠道公告后生效，敬请活动参与者留意。 

			</div>
        </div>
    </div>
    <div class="anerwei" id="anerwei" onClick="ShowDiv('overlay-bg2','erwei')"></div>
    <div id="overlay-bg2" style="display:none" class="overlay-bg"onClick="CloseDiv('overlay-bg2','erwei')"></div>
    
    
</div>

</body>
</html>