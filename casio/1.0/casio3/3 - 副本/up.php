<!doctype html>
<html lang="zh-CN"><head>
<title>TR-敢爱</title>
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
<script src="js/zepto.js"></script>
<script src="js/image.js"></script>
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
function img_c(){
	//img_select();
	$(".bg_up").hide();
	$(".bg_img").show();	
	
}
</script>

</head>
<body>
<div class="bg_up">
	<div class="up_kong"></div>
    <div class="up_img">
    	<div class="up_img_0" onClick="img_c()"><img src="img/add.png"></div>
        <div class="up_img_1"></div>
    </div>
    <div class="up_message">
    	<div class="up_message_1"><input type="text" placeholder="请输入您的姓名"></div>
        <div class="up_message_1"><input type="text" placeholder="请输入您的联系电话"></div>
        <div class="up_message_1"><input type="text" placeholder="请输入您的住址"></div>
    </div>
    <div class="up_tijiao"><a href="javascript:void(0)">确认提交</a></div>
    
</div>
<div class="bg_img" style="display:none;">
	<img id="img1" src="img/pic-qmx5.png" alt="" style="display:none">
	<img id="img2" src="img/role-ttfc.png" alt="" style="display:none">
	<img id="img3" src="img/logo.png" alt="" style="display:none">
	<div class="img_back" onClick="img_back()"></div>
	<div class="fuc">
		<input id="file" type="file" class="real-btn" />
		<button class="btn-take-photo" id="button_1">选择文件</button>
		<button class="btn-save" id="button_2">保存照片</button>
	</div>
	<div id="container" class="editor"></div>
	<!--<div class="tools">
		<button class="btn-add" ontouchend="eidtor.addImage({img: document.querySelector('#img1'), disScale: true})">照片一（禁止缩放）</button>
		<button class="btn-add" ontouchend="eidtor.addImage({img: document.querySelector('#img2')})">照片二</button>
		<button class="btn-add" ontouchend="eidtor.addImage({img: document.querySelector('#img3'), 'disMove': true})">照片三（禁止拖动）</button>
	</div>-->
	
	<script>
		
		$(function(){
			eidtor = new mo.ImageEditor({
				trigger: $('#file'),
				container: $('#container'),
				width: 320,
				height: 270,
				stageX:  $('#container')[0].offsetLeft,
				iconScale: {
					url: 'img/icon.png',
					rect: [300, 300, 25, 25]
				},
				iconClose: {
					url: 'img/icon.png',
					rect: [400, 300, 25, 25]
				}
			});
			$('.btn-save').on('click', function(){
				eidtor.toDataURL(function(data){
					
					//document.write('<img src="' + data + '"/>');
					var imgs="<img src="+data+">";
					$(".up_img_1").append(imgs);
					$(".bg_up").show();
					$(".bg_img").hide();
					img_select();
				});
			})
		});
function img_select(){
	eidtor = new mo.ImageEditor({
				trigger: $('#file'),
				container: $('#container'),
				width: 320,
				height: 270,
				stageX:  $('#container')[0].offsetLeft,
				iconScale: {
					url: 'img/icon.png',
					rect: [300, 300, 25, 25]
				},
				iconClose: {
					url: 'img/icon.png',
					rect: [400, 300, 25, 25]
				}
			});
			
}
	</script>
</div>
</body>
</html>