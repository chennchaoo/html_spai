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
<link href="css/style.css?t=7" type="text/css" rel="stylesheet" media="all" />
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/erweima.js"></script>
<script type="text/javascript" src="js/public.js"></script>
<script>
if(registration_id!=''){
	//alert(registration_id);	
}
$(document).ready(function(){

	$.ajax({
		type:"POST",
		url: url_islogin,
		dataType: 'json',
		success:function(data){
			if(data.code==1){
				//alert('123');
			}else{
				location.href='login.php';		
			}
		}
	});
	
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
<div class="bg_up">
	<div class="up_kong"></div>
    <div class="up_img">
    	<div class="up_img_0"><img src="img/add.png"></div>
        <div class="up_img_1"><img src="img/cr_pao_img.png"></div>
    </div>
    <div class="up_message">
    	<div class="up_message_1"><input type="text" placeholder="请输入您的姓名"></div>
        <div class="up_message_1"><input type="text" placeholder="请输入您的联系电话"></div>
        <div class="up_message_1"><input type="text" placeholder="请输入您的住址"></div>
    </div>
    <div class="up_tijiao"><a href="javascript:void(0)">确认提交</a></div>
    
</div>
</body>
</html>