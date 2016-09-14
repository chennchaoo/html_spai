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

<link href="css/style.css?t=8" type="text/css" rel="stylesheet" media="all" />
<!--<link href="css/zzsc.css" type="text/css" rel="stylesheet" />-->
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/erweima.js"></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="js/shareDemo.js?t=3"></script>
<script>

$(document).ready(function(){
	
	//alert(qrcode);

});
var urls="http://c.taskou.com/api/index.php?type=getShareKey&url="+encodeURIComponent(location.href.split('#')[0]);
	var shareUrl=location.href.split('#')[0];
	var shareTitle='卡西欧TR最美桃花眼评选';
	var shareContent='3月桃花开，春色出墙来；卡西欧携最新自拍神器EX-TR600，在上海的女大学生中发起最美桃花眼活动；是否命犯桃花？是否桃花缠身？让大家为你投票！';
	var shareImg='http://c.taskou.com/c/casio/img/tu.png';
	
	shareDemo(urls,shareUrl,shareTitle,shareContent,shareImg);
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
    <div class="check_title"><a href="http://m.v.qq.com/play/play.html?coverid=&vid=n0191trulr1">321卡西欧自拍盛典</a></div>
    
  	
    <div class="bg_1_1">
    	<div class="bg_1_1_left"><a href="check.php"></a></div>
        <div class="bg_1_1_right"><a href="enroll.php"></a></div>
    </div>
    <div class="bg_1_xize" onClick="ShowDiv('overlay-bg','tan_1')"></div>
    
    <!--弹出层-->
    <div id="overlay-bg" style="display:none"></div>
    <div class="tan_1" id="tan_1" style="display:none" onClick="CloseDiv('overlay-bg','tan_1')">
    	<div class="close_tan"></div>
        <div class="wenzi"> 
        	<div class="title_1">卡西欧TR最美桃花眼比赛活动细则</div>
        	<div class="wenzi_1">1.本活动期间为2016年4月11日至2016年4月18日，面向上海的女大学生；<br>
2.女大学生在本活动期间内，可上传自己的照片，参与卡西欧最美桃花眼的评选；<br>
3.任何人可登录评选页面，选取自己喜欢的女生照片；<br>
1)每个页面出现两张女生照片，可根据自己的喜好进行二选一；<br>

2)二选一提交后，页面会刷新出现新的女生照片，可根据自己的喜好再次二选一；<br>


4.大学生可通过分享按钮，将活动页面分享至朋友圈中扩散；
通过众多用户的刷选，系统会得到选票最高的女生名单，可获得TR600一周的免费试用；<br>
5.卡西欧（中国）贸易有限公司及上海羲岳网络科技有限公司、上海市时至广告有限公司有权在中国法律法规允许的范围内修改本活动条款及细则，并于《后生》手机平台或其他相关渠道公告后生效，敬请活动参与者留意。

			</div>
        </div>
    </div>
    <div class="anerwei" id="anerwei" onClick="ShowDiv('overlay-bg2','erwei')"></div>
    <div id="overlay-bg2" style="display:none" class="overlay-bg"onClick="CloseDiv('overlay-bg2','erwei')"></div>
    
    
</div>

</body>
</html>