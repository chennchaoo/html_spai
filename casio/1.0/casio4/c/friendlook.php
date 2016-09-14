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
<link href="css/style.css?t=11" type="text/css" rel="stylesheet" media="all" />
<!--<link href="css/zzsc.css" type="text/css" rel="stylesheet" />-->
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/base_64.js"></script>
<script src="js/zepto.js"></script>
<script src="js/image.js"></script>
<script type="text/javascript" src="js/erweima.js"></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

<script>

$(document).ready(function(){
	$("#yuanwang").val(0);
	$(".chun").val(0);
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
		url: 'http://api20.taskou.com/c/casio4/view.php',
		dataType: 'json',
		success:function(data){
			if(data.code==1){
				//alert('123');
				$("#mylovea").attr("src",data.data.info.img1);
				$(".my_title_1 span").html(data.data.info.truename);
				$(".cid").val(data.data.info.cid);
				/*$("#bq_1 img").attr("src",data.data.hc[0].url);
				$("#bq_2 img").attr("src",data.data.hc[1].url);
				$("#bq_3 img").attr("src",data.data.hc[2].url);*/
				var j=1*1;
				for(i=0;i<3;i++){
					$("#bq_"+j+" img").attr("src",data.data.hc[i].url);					j++;
					if(data.data.hc[i].status==1){
						$(".hong_img").val(data.data.hc[i].url);	
					}
				}
				$("#hadnums").html(data.data.member.hadnums);
				$("#lenums").html(data.data.member.lenums);
			}else{
				//alert('456');
				//location.href='login.php';
				if(data.code==1101){
					alert(data.msg);	
					location.href="http://api20.taskou.com/c/casio4/index.php";
				}else{
					alert(data.msg);	
				}
					
			}
		}
	});
		
	
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
	//'好身材','谈恋爱','去旅行','做学霸'
	$(".chun").val(e);
	if(e==1){
		$(".hong_img_2").val($("#bq_1 img").attr("src"));
		
		/*$(".dongxiao").addClass("yes");
		$(".yes").show();
		setTimeout(function(){
			//$(".dongxiao").removeClass('yes');
			$(".dongxiao").hide('yes');		
		},2000);*/
		//$(".yes").hide();
	}else if(e==2){
		$(".hong_img_2").val($("#bq_2 img").attr("src"));
	}else if(e==3){
		$(".hong_img_2").val($("#bq_3 img").attr("src"));
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
function vote(){
	//location.href="mylove.php";
	var hong_img=$(".hong_img").val();
	var hong_img_2=$(".hong_img_2").val();
	var chun=$(".chun").val();
	if(hong_img_2==hong_img){
		var cid=$(".cid").val();
		$.ajax({
			type:"POST",
			url: 'http://api20.taskou.com/c/casio4/vote.php',
			dataType: 'json',
			data:'cid='+cid,
			success:function(data){
				if(data.code==1){
					
					$("#hadnums").html(data.data.hadnums);
					$("#lenums").html(data.data.lenums);
					//alert('猜对了，是真爱！');
					dayes(chun);
					//history.go(0);
				}else{
					//alert(data.msg);
					dan(chun);
					//location.href='login.php';		
				}
			}
		});	
	}else{
		dano(chun);
		
		
	}
		
}
function dayes(chun){
	if(chun==1){
		$(".dongxiaoy").addClass("yes1");
		$(".dongxiaoy").show();
		setTimeout(function(){
			$(".dongxiaoy").removeClass('yes1');
			$(".dongxiaoy").hide();
			history.go(0);
		},800);
	}else if(chun==2){
		$(".dongxiaoy").addClass("yes2");
		$(".dongxiaoy").show();
		setTimeout(function(){
			$(".dongxiaoy").removeClass('yes2');
			$(".dongxiaoy").hide();
			history.go(0);
		},800);
	}else if(chun==3){
		$(".dongxiaoy").addClass("yes3");
		$(".dongxiaoy").show();
		setTimeout(function(){
			$(".dongxiaoy").removeClass('yes3');
			$(".dongxiaoy").hide();
			history.go(0);
		},800);
	}else{
		alert('请选择一个');	
	}	
}
function dano(chun){
	if(chun==1){
		$(".dongxiaon").addClass("yes1");
		$(".dongxiaon").show();
		setTimeout(function(){
			$(".dongxiaon").removeClass('yes1');
			$(".dongxiaon").hide();
			history.go(0);
		},800);
	}else if(chun==2){
		$(".dongxiaon").addClass("yes2");
		$(".dongxiaon").show();
		setTimeout(function(){
			$(".dongxiaon").removeClass('yes2');
			$(".dongxiaon").hide();
			history.go(0);
		},800);
	}else if(chun==3){
		$(".dongxiaon").addClass("yes3");
		$(".dongxiaon").show();
		setTimeout(function(){
			$(".dongxiaon").removeClass('yes3');
			$(".dongxiaon").hide();
			history.go(0);
		},800);
	}else{
		alert('请选择一个');	
	}	
}
</script>

</head>
<body>
<div class="bg_mylove" style="display:block">
	<div class="my_kong_2"></div>
    <div class="my_title">
    	<div class="my_title_1"><span></span></div>
    </div>
    <input type="hidden" class="cid">
    <input type="hidden" class="hong_img" value="1">
    <input type="hidden" class="hong_img_2" value="0">
    <input type="hidden" class="chun" value="0">
    <div class="mylove_img">
    	<div class="mylove_img_1"><img src="" id="mylovea" alt="加载中..."></div>
        <div class="mylove_img_1" style="display:none"><img src="img/bg_3_a.jpg"></div>
    </div>
    <div class="en_bq">
        <div class="en_bq_1" id="bq_1" onClick="yuanwang(1)">
        	<img src="img/f_1.jpg">
        	
        </div>
        <div class="en_bq_1" id="bq_2" onClick="yuanwang(2)">
        <img src="img/f_2.jpg">
       
        </div>
        <div class="en_bq_1" id="bq_3" onClick="yuanwang(3)">
        <img src="img/f_3.jpg">
        
        </div>
        <div class="dongxiaoy" style="display:none"><img src="img/y.png"></div>
        <div class="dongxiaon" style="display:none"><img src="img/n.png"></div>
    </div>
    <div class="love_button" onclick="vote()"><a href="javascript:void(0)"></a></div>
    <div class="mylove_zi">
    	<!--<div class="mylove_zi_1">你的爱已经被<span id="hadnums">1300</span>人接受了，</div>
        <div class="mylove_zi_1">再有<span id="lenums">200</span>人就可以获得<span>幸运</span>奖品。</div>-->
    </div>
</div>
</body>
</html>