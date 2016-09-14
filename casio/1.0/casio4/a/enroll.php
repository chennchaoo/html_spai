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
	var tag=$("#yuanwang").val();
	var tag='好身材';
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
	/*if(tag=='0'){
		alert('请许下参赛愿望');
		return false;			
	}*/
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
</head>
<body>
<div class="bg_enroll" style="display:block">
	<div class="en_kong"></div>
    <div class="copy_top"></div>
    <input type="hidden" id="yuanwang" value="0">
    <input type="hidden" id="shangchuan" value="">
    <div class="en_input">
    	<div class="en_input_1"><input type="text" placeholder="姓名" id="name"></div>
        <div class="en_input_1"><input type="text" placeholder="联系电话" id="phone"></div>
        <!--<div class="en_input_1"><input type="text" placeholder="收货地址" id="address"></div>-->
    </div>
    
    <div class="en_img">
    	<div class="en_img_1" id="shang_1" onClick="shangchuan(1)"><img src="img/shangchuan.png"></div><!--
        <div class="en_img_1" id="shang_2" onClick="shangchuan(2)"><img src="img/shangchuan.png"></div>
        <div class="en_img_1" id="shang_3" onClick="shangchuan(3)"><img src="img/shangchuan.png"></div>-->
    </div>
    <div class="en_button" onClick="return baoming()"><a href="javascript:void(0)"></a></div>
</div>
<div class="bg_img" style="display:none;">
	<img id="img1" src="img/pic-qmx5.png" alt="" style="display:none">
	<img id="img2" src="img/role-ttfc.png" alt="" style="display:none">
	<img id="img3" src="img/logo.png" alt="" style="display:none">

	<div class="fuc">
		<input id="file" type="file" class="real-btn" />
		<button class="btn-take-photo" id="button_1">选择美照</button>
		<button class="btn-save" id="button_2">保存美照</button>
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
				height: 500,
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
					var strs= new Array();  
					strs=data.split(","); 
					
					var m='';
					var avatar=encodeURIComponent(strs[1]);
					//alert(avatar);
					//document.write('<img src="' + data + '"/>');
					$.ajax({
						type:"POST",
						url: 'http://api20.taskou.com/a/?m=common&a=uploadImage',
						dataType: 'json',
						data:'pics='+avatar,
						success:function(data){
							if(data.code==1){
								//alert(data.data.img_url);
								//alert(avatar);
								chuan=$("#shangchuan").val();
								//alert(chuan);
								if(chuan==1){
									$(".bg_enroll").show();
									$(".bg_img").hide();	
									$("#shang_1 img").attr("src",data.data.img_url);
								}else if(chuan==2){
									$(".bg_enroll").show();
									$(".bg_img").hide();	
									$("#shang_2 img").attr("src",data.data.img_url);	
								}else if(chuan==3){
									$(".bg_enroll").show();
									$(".bg_img").hide();	
									$("#shang_3 img").attr("src",data.data.img_url);	
								}
								
								
							}else{alert(data.msg)}
						}
					})
					
				});
			})
		});

	</script>
</div>
</body>
</html>