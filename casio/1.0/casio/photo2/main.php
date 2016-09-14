<!doctype html>
<html lang="zh-CN"><head>
<title>卡西欧</title>
<meta charset="utf-8">
<meta content="" name="description">
<meta content="" name="keywords">
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="telephone=no, address=no" name="format-detection">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<link href="css/style.css?t=8" type="text/css" rel="stylesheet" media="all" />
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/erweima.js"></script>
<script type="text/javascript" src="js/public.js"></script>
<script>

$(document).ready(function(){
	
	
});
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
</script>

</head>
<body>
<div class="bg_main">
	<div class="main_kong"></div>
    <div class="main_shang">
    	<a href="javascript:void(0)"></a>
    </div>
    <div class="main_xiangce">
    	<div class="main_xiangce_1">
        	<a href="video.php">
        	<div class="main_xiangce_img">
            	<img src="img/cr_pao_img.png">
            </div>
            <div class="main_xiangce_zi">华师大真爱相册</div>
            <div class="main_xiangce_xia">
            	<div class="main_xiangce_xia_1">4851</div>
                <div class="main_xiangce_xia_2">4851</div>
            </div>
            </a>
        </div>
        <div class="main_xiangce_1">
        	<a href="video.php">
        	<div class="main_xiangce_img">
            	<img src="img/cr_pao_img.png">
            </div>
            <div class="main_xiangce_zi">华师大真爱相册</div>
            <div class="main_xiangce_xia">
            	<div class="main_xiangce_xia_1">4851</div>
                <div class="main_xiangce_xia_2">4851</div>
            </div>
            </a>
        </div>
        <div class="main_xiangce_1" id="main_xiangce_3">
        	<a href="video.php">
        	<div class="main_xiangce_img">
            	<img src="img/cr_pao_img.png">
            </div>
            <div class="main_xiangce_zi">华师大真爱相册</div>
            <div class="main_xiangce_xia">
            	<div class="main_xiangce_xia_1">4851</div>
                <div class="main_xiangce_xia_2">4851</div>
            </div>
            </a>
        </div>
    </div>
    <div class="main_xiangqing" onClick="ShowDiv('overlay-bg','tan_1')">活动详情</div>
    <!--弹出层-->
    <div id="overlay-bg" style="display:none"></div>
    <div class="tan_1" id="tan_1" style="display:none" onClick="CloseDiv('overlay-bg','tan_1')">
    	<div class="close_tan"></div>
        <div class="wenzi"> 
        	<div class="title_1">卡西欧TR真爱相册活动细则</div>
        	<div class="wenzi_1">
1.本活动期间为2015年12月17日至2015年12月31日，面向上海的大学高校摄影社团；</br>
2.大学高校摄影社团在本活动期间内，搭建真爱摄影室，为校内同学拍摄属于他们的真爱照片，参与卡西欧TR真爱相册活动；</br>
3.任何人可登录评选页面，选取自己喜欢的真爱照片；</br>
1)活动的H5页面内，可以为自己喜欢的真爱照片点赞；</br>
2)将活动的H5页面分享到朋友圈，让更多的人为自己喜欢的真爱照片点赞；</br>
通过众多用户的评选，得出如下奖项：</br>
最具影响力奖——根据学校所在真爱相册点击量评选，获得卡西欧ZR2000相机一只；</br>
最佳人气奖——根据学校所在真爱相册内照片获赞总数评选，获得卡西欧ZR2000相机一只；</br>
最佳创意奖——根据照片创意由主办方评选，获得卡西欧ZR2000相机一只；</br>
最佳行动奖——根据完成目标任务的时间评选，获得卡西欧BG手表一只；</br>
4.获得奖品的个人须自行缴纳个人所得税；</br>
5.卡西欧（中国）贸易有限公司及上海堂口信息技术有限公司有权在中国法律法规允许的范围内修改本活动条款及细则，并于《堂口》手机平台、微信公众号或其他相关渠道公告后生效，敬请活动参与者留意。</br>

			</div>
        </div>
    </div>
    
</div>
</body>
</html>