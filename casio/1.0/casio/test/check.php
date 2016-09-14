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
<script type="text/javascript" src="js/erweima.js"></script>
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
	
	$("#piao").val(0);
	$.ajax({
		type:"POST",
		url: 'http://api20.taskou.com/c/casio/list.php',
		dataType: 'json',
		success:function(data){
			if(data.code==1){
				$("#img_1").attr("src",data.data.lists[0].imgs[0].img_url);
				$("#img_2").attr("src",data.data.lists[1].imgs[0].img_url);
				$("#name_1").html(data.data.lists[0].truename);
				$("#name_2").html(data.data.lists[1].truename);
				$("#piao_1 span").html(data.data.lists[0].votes);
				$("#piao_2 span").html(data.data.lists[1].votes);
				$("#yuan_1 span").html(data.data.lists[0].tag);
				$("#yuan_2 span").html(data.data.lists[1].tag);
				$("#cid_1").val(data.data.lists[0].cid);
				$("#cid_2").val(data.data.lists[1].cid);
				if(data.data.lists[0].g==2){
					$(".bg_2_0_left").show();	
				}else{
					$(".bg_2_0_left").hide();	
				}
				if(data.data.lists[1].g==2){
					$(".bg_2_0_right").show();	
				}else{
					$(".bg_2_0_right").hide();		
				}
				//alert('123');
			}else{
				alert(data.msg);
				//location.href='login.php';		
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
	$(".bg_2_1_left").css({
	/*"border":"5px solid",	
	"border-color":"#FAE8ED",
	"border-radius":"5px",*/
	"box-shadow":"0 0 15px red, 0 0 5px blue",
	});	 
	$(".bg_2_1_right").css({
	"border":"5px solid",	
	"border-color":"#FAE8ED",
	"border-radius":"5px",
	"box-shadow":"none",
	});	 
	$("#piao").val(1);
	$("#cid").val($("#cid_1").val());
				

}
function right_img(){
	$(".bg_2_1_left").css({
	"border":"5px solid",	
	"border-color":"#FAE8ED",
	"border-radius":"5px",
	"box-shadow":"none",
	});	 
	$(".bg_2_1_right").css({
	"box-shadow":"0 0 15px red, 0 0 5px blue",
	});	
	$("#piao").val(2); 
	$("#cid").val($("#cid_2").val());
}
function toupiao(){
	var piao=$("#piao").val();
	var cid=$("#cid").val();
	//alert(piao);
	//alert(cid);
	if(piao==0){
		alert('请选择一人进行投票');
		return false;
	}
	$.ajax({
		type:"POST",
		url: 'http://api20.taskou.com/c/casio/vote.php',
		dataType: 'json',
		data:'cid='+cid,
		success:function(data){
			if(data.code==1){
				//alert('投票成功');
				$("#piao").val(0);
				$(".bg_2_1_left").css({
					"box-shadow":"none",
				});
				$(".bg_2_1_right").css({
					"box-shadow":"none",
				});		 
				$("#img_1").attr("src",data.data.lists[0].imgs[0].img_url);
				$("#img_2").attr("src",data.data.lists[1].imgs[0].img_url);
				$("#name_1").html(data.data.lists[0].truename);
				$("#name_2").html(data.data.lists[1].truename);
				$("#piao_1 span").html(data.data.lists[0].votes);
				$("#piao_2 span").html(data.data.lists[1].votes);
				$("#yuan_1 span").html(data.data.lists[0].tag);
				$("#yuan_2 span").html(data.data.lists[1].tag);
				if(data.data.lists[0].g==2){
					$(".bg_2_0_left").show();	
				}else{
					$(".bg_2_0_left").hide();	
				}
				if(data.data.lists[1].g==2){
					$(".bg_2_0_right").show();	
				}else{
					$(".bg_2_0_right").hide();		
				}
				//alert('123');
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
<div class="bg_2">
	<div class="bg_2_kong"></div>
    <input type="hidden" id="piao" value="0">
    <input type="hidden" id="cid" value="0">
    <input type="hidden" id="cid_1" value="0">
    <input type="hidden" id="cid_2" value="0">
    <div class="bg_2_0">
    	<div class="bg_2_0_left" style="display:none">参赛照片使用卡西欧TR系列产品拍摄</div>
        <div class="bg_2_0_right" style="display:none">参赛照片使用卡西欧TR系列产品拍摄</div>
    </div>
    <div class="bg_2_1">
    	<div class="bg_2_1_left" onClick="left_img()"><img src="img/img.png" id="img_1"></div>
        <div class="bg_2_1_right" onClick="right_img()"><img src="img/img.png" id="img_2"></div>
    </div>
   	<div class="bg_2_2">
    	<div class="bg_2_name_1">
        	<div class="bg_2_name_1_left" id="name_1">王子娇</div>
            <div class="bg_2_name_1_right" id="piao_1"><span>12393</span>票</div>
        </div>
        <div class="bg_2_name_1" id="bg_2_name_2">
        	<div class="bg_2_name_1_left" id="name_2">李丽</div>
            <div class="bg_2_name_1_right" id="piao_2"><span>12393</span>票</div>
        </div>
    </div>
    <div class="bg_2_3">
    	<div class="bg_2_dram_1">
        	<div class="bg_2_dram_1_left" id="yuan_1">愿望：<span>旅行</span></div>
            
        </div>
        <div class="bg_2_dram_1">
        	<div class="bg_2_dram_1_left" id="yuan_2">愿望：<span>旅行</span></div>
        </div>
    </div>
    <div class="toupiao" onClick="return toupiao()"><a href="javascript:void(0)"></a></div>
    <div class="tri"><a href="enroll.php"></a></div>
</div>
</body>
</html>