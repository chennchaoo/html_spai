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
				//document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
				document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
			}
		})();
function fuzhi(){
	alert('您的手机暂时不支持，请长按链接选择复制！');	
}

</script>
</head>
<body>
<div class="bg_copy" style="display:block">
	<div class="copy_kong"></div>
    <div class="copy_top"></div>
    <div class="copy_content">
    	<div class="copy_content_1"></div>
        <div class="copy_content_2"><a href="javascript:void(0)">http://baron.laiwang.com/s/pyNwt?tm=571fbf 喵口令</a></div>
        <div class="copy_button" onClick="fuzhi()">一键复制天猫口令</div>
    </div>
    
</div>
</body>
</html>
