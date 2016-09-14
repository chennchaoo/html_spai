<!doctype html>
<html lang="zh-CN">
<head>
<title>卡西欧</title>
<meta charset="utf-8">
<!--<meta content="" name="description">
<meta content="" name="keywords">
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="telephone=no, address=no" name="format-detection">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="viewport" content="initial-scale=1.0, minimum-scale=0.1, maximum-scale=2.0, user-scalable=yes\">-->
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <meta content="email=no" name="format-detection" />-->
<link href="css/style.css?t=7" type="text/css" rel="stylesheet" media="all" />
<!--<link href="css/zzsc.css" type="text/css" rel="stylesheet" />-->
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/erweima.js"></script>
<script type="text/javascript">
        //页面类型
        var phoneWidth = parseInt(window.screen.width);
        var phoneScale = phoneWidth / 640;
        var ua = navigator.userAgent;
        if (/Android (\d+\.\d+)/.test(ua)) {
            var version = parseFloat(RegExp.$1);
            if (version > 2.3) {
                document.write('<meta name="viewport" content="width=640, minimum-scale = ' + phoneScale + ', maximum-scale = ' + phoneScale + ', target-densitydpi=device-dpi">');
            } else {
                document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
            }
        } else {
            document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi, minimal-ui">');
        }
    </script>
<script>

$(document).ready(function(){
	
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
	
	
	$.ajax({
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
	});
	
});
/*(function(){
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
		})();*/
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

</script>

</head>
<body>
<script>
/* $(document).ready(function () {
            $("body").css({"transform-origin": "0 0", "transform": "scale(" + phoneScale + ")"});
       
    })*/
</script>
<div class="bg_1">
	<div class="bg_1_kong"></div>
    <div class="bg_1_xize" onClick="ShowDiv('overlay-bg','tan_1')">活动细则</div>
    <div class="bg_1_1">
    	<div class="bg_1_1_left"><a href="check.php"></a></div>
        <div class="bg_1_1_right"><a href="enroll.php"></a></div>
    </div>
    <!--弹出层-->
    <div id="overlay-bg" style="display:none"></div>
    <div class="tan_1" id="tan_1" style="display:none" onClick="CloseDiv('overlay-bg','tan_1')">
    	<div class="close_tan"></div>
        <div class="wenzi">
        	<div class="title_1">卡西欧TR宝贝大学生选美比赛活动细则</div>
        	<div class="wenzi_1">1.本活动期间为2015年1月23日至2015年11月30日，面向上海的女大学生；<br>
2.女大学生在本活动期间内，可上传自己的照片，参与卡西欧TR-Tri宝的评选；<br>
3.任何人可登录评选页面，选取自己喜欢的女生照片；<br>
1)每个页面出现两张女生照片，可根据自己的喜好进行二选一；<br>

2)二选一提交后，页面会刷新出现新的女生照片，可根据自己的喜好再次二选一；<br>

通过众多用户的刷选，系统会得到选票最高的女生名单，前1,2,3人可获得如下奖品：<br>
一等奖TR550一个，二等奖ZR3500一个，三等奖ZR2000一个<br>   

4.获得奖品的个人须自行缴纳个人所得税；<br>
5.卡西欧（中国）贸易有限公司及上海羲岳网络科技有限公司、上海市时至广告有限公司有权在中国法律法规允许的范围内修改本活动条款及细则，并于《后生》手机平台或其他相关渠道公告后生效，敬请活动参与者留意。
			</div>
        </div>
    </div>
</div>
</body>
</html>