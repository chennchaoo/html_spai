<?php
include_once('../../../common.php');
define('ISJSON', TRUE);
$forward = urlencode(get_url());
if(!$xtgroup_uid){
    header("Location:http://api20.taskou.com/wx_auth/auth.php?forward=".$forward);
    exit;
}
?>
<!doctype html>
<html lang="zh-CN">
<head>
<title>卡西欧</title>
<meta charset="utf-8">
<meta content="" name="description">
<meta content="" name="keywords">
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="telephone=no, address=no" name="format-detection">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<link href="css/style.css?t=7" type="text/css" rel="stylesheet" media="all" />
<!--<link href="css/zzsc.css" type="text/css" rel="stylesheet" />-->
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/base_64.js"></script>
<script src="js/zepto.js"></script>
<script src="js/image.js"></script>
<script type="text/javascript" src="js/erweima.js"></script>
<script>

$(document).ready(function(){
	$("#yuanwang").val(0);
	//alert(qrcode);
	$(".main_di_1 a").css("color","#E5C057");
	$(".main_di_1").click(function(){
		$(".main_di_1 a").css("color","#E5C057");
		$(".main_di_2 a").css("color","#8C8C8C");
	})
	$(".main_di_2").click(function(){
		$(".main_di_2 a").css("color","#E5C057");
		$(".main_di_1 a").css("color","#8C8C8C");
	})
	$(".en_bq_1").click(function(){
		$(".en_bq_1").css("box-shadow","none");
		$(this).css("box-shadow","0 0 15px red, 0 0 5px blue");
	})
	
	$.ajax({
		type:"POST",
		url: 'http://api20.taskou.com/c/casio4/my.php',
		dataType: 'json',
		success:function(data){
			if(data.code==1){
				//alert('123');
				$("#mylovea").attr("src",data.data.info.img1);
				$(".my_title_1 span").html(data.data.info.truename);
				$(".cid").val(data.data.info.cid);
				$("#bq_1 img").attr("src",data.data.hc[0].url);
				$("#bq_2 img").attr("src",data.data.hc[1].url);
				$("#bq_3 img").attr("src",data.data.hc[2].url);
				$("#hadnums").html(data.data.member.hadnums);
				$("#lenums").html(data.data.member.lenums);
			}else{
				//alert('456');
				location.href='login.php';		
			}
		}
	});
	/*$.ajax({
		type:"POST",
		url: 'http://boss.taskou.com/api/index.php?type=islogin',
		dataType: 'json',
		success:function(data){
			if(data.code==1){
				//alert('123');
			}else{
				//alert('456');
				location.href='login.php';		
			}
		}
	});*/
	
});
var url=encodeURIComponent(location.href.split('#')[0]);
var title='520接住我的爱';
var touxiang='http://c.taskou.com/c/casio/img/tu.png';	
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
				document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
			}
		})();
//弹出层
function ShowDiv(bg_div,show_div){	
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
};
function left_img(){
	$(".bg_2_1_left img").css({
	"border":"15px solid",	
	"border-color":"#FAE8ED",
	"border-radius":"5px",
	});	 
	$(".bg_2_1_right img").css({
	"border":"5px solid",	
	"border-color":"#FAE8ED",
	"border-radius":"5px",
	});	 

}
function right_img(){
	$(".bg_2_1_left img").css({
	"border":"5px solid",	
	"border-color":"#FAE8ED",
	"border-radius":"5px",
	});	 
	$(".bg_2_1_right img").css({
	"border":"15px solid",	
	"border-color":"#FAE8ED",
	"border-radius":"5px",
	});	 
}
function yuanwang(e){
	'好身材','谈恋爱','去旅行','做学霸'
	if(e==1){
		$("#yuanwang").val('好身材');
	}else if(e==2){
		$("#yuanwang").val('谈恋爱');
	}else if(e==3){
		$("#yuanwang").val('去旅行');
	}else if(e==4){
		$("#yuanwang").val('做学霸');
	}
	//$("#yuanwang").val(e);
	//alert(e);
	 
}
function shangchuan(e){
	//alert(e);
	$(".bg_enroll").hide();
	$(".bg_img").show();
	$("#shangchuan").val(e);
}
function baoming(){
	var name=$("#name").val();
	var phone=$("#phone").val();
	var address=$("#address").val();
	//var tag=$("#yuanwang").val();
	var tag='1';
	if(name==''){
		alert('请输入姓名');	
		return false;	
	}
	if(phone==''){
		alert('请输入姓名');	
		return false;		
	}
	if(address==''){
		alert('请输入地址');
		return false;	
	}
	if(tag=='0'){
		alert('请许下参赛愿望');
		return false;			
	}
	var imgs='';	
	var img_1=$("#shang_1 img").attr("src");
	var img_2=$("#shang_2 img").attr("src");
	var img_3=$("#shang_3 img").attr("src");
	
	if(img_1!='img/shangchuan.png' && img_2!='img/shangchuan.png' && img_3!='img/shangchuan.png'){
		imgs='["'+img_1+'","'+img_2+'","'+img_3+'"]';	
	}else if(img_1!='img/shangchuan.png' && img_2!='img/shangchuan.png'){
		imgs='["'+img_1+'","'+img_2+'"]';	
	}else if(img_1!='img/shangchuan.png' && img_2!='img/shangchuan.png'){
		imgs='["'+img_1+'","'+img_3+'"]';	
	}else if(img_2!='img/shangchuan.png' && img_3!='img/shangchuan.png'){
		imgs='["'+img_2+'","'+img_3+'"]';	
	}else if(img_1!='img/shangchuan.png' && img_3!='img/shangchuan.png'){
		imgs='["'+img_1+'","'+img_3+'"]';	
	}else if(img_1!='img/shangchuan.png'){
		imgs='["'+img_1+'"]';	
	}else if(img_2!='img/shangchuan.png'){
		imgs='["'+img_2+'"]';	
	}else if(img_3!='img/shangchuan.png'){
		imgs='["'+img_3+'"]';	
	}else {
		alert('请上传美照');	
		return false;
	}
	imgs=base64encode(imgs);
	//alert(imgs);
	$.ajax({
		type:"POST",
		url: 'http://api20.taskou.com/c/casio/add.php',
		dataType: 'json',
		data:'phone='+phone+'&truename='+name+'&address='+address+'&tag='+tag+'&imgs='+imgs,
		success:function(data){
			if(data.code==1){
				alert('报名成功');
			}else{
				alert(data.msg);
				//location.href='login.php';		
			}
		}
	});	
	
	
}
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
<div class="bg_mylove" style="display:block">
	<div class="my_kong"></div>
    <div class="my_title">
    	<div class="my_title_1">我的爱</div>
    </div>
    <div class="mylove_img">
    	<div class="mylove_img_1"><img src="img/bg_3_a.jpg"></div>
        <div class="mylove_img_1" style="display:none"><img src="img/bg_3_a.jpg"></div>
        <div class="mylove_img_2" style="display:none"> 红唇头像</div>
        <div class="mylove_img_2"> 红唇印</div>
    </div>
    <div class="mylove_zi">
    	<div class="mylove_zi_1">你的爱已经被<span id="hadnums">1300</span>人接受了，</div>
        <div class="mylove_zi_1">再有<span id="lenums">200</span>人就可以获得<span>幸运</span>奖品。</div>
    </div>
</div>
</body>
</html>