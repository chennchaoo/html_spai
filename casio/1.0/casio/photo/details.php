<!doctype html>
<html lang="zh-CN">
<head>
<title>TR-敢爱</title>
<meta charset="utf-8">
<meta content="" name="description">
<meta content="" name="keywords">
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="telephone=no, address=no" name="format-detection">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<link href="css/style.css?t=13" type="text/css" rel="stylesheet" media="all" />
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<!--<script type="text/javascript" src="js/jquery.lightbox-0.5.js">-->
</script>
<!--<script type="text/javascript" src="js/public.js"></script>-->
<!--<link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />-->
<script>
	
</script>
<script>
var photo='<?php echo $_GET['photo'];?>';
$(document).ready(function(){
	$(".photo_id").val(photo);
	$.ajax({
		type : "POST",
		dataType : "json",
		url : 'http://api20.taskou.com/c/casio2/detail_photo.php',
		data:'photo_id='+photo,
		success : function(data){
			if(data.code==1){
				if(data.data.type==0){
					$(".details_da_zhong").show();
					$(".details_da_zhong_shi").hide();
					$(".details_da_zhong img").attr("src",data.data.attr_url);
				}else{
					$(".details_da_zhong").hide();
					$(".details_da_zhong_shi").show();
					$(".details_da_zhong_shi video").attr("src",data.data.attr_url);
				}				
				
				$('.details_da_xia_zi').html(data.data.subject);
				$('.details_da_shang_left img').attr("src",data.data.avatar);
				
				$('.details_da_shang_zhong_name_1').html(data.data.nickname);
				$('.details_da_shang_zhong_time').html(data.data.day)
				$('.details_da_shang_right_2').html(data.data.votes);
				$('.details_da_zanren_shuliang').html(data.data.votes);
				
				
				//alert(data.data.type);
				var m_t='';
				for(a=0;a<data.data.lists.length;a++){
					m_t=m_t+"<div class='details_da_zanren_touxiang_1'><img src='"+data.data.lists[a].avatar+"'></div>";	
				}
				$('.details_da_zanren_touxiang').html(m_t);
				
				
				/*if(data.data.imgs.length==0){
					$(".details_da_zhong_xingdong").hide();	
				}*/
				
				
			}else{
				alert(data.msg);	
			}
		} 
	})
	$(".mytextarea").click(function(){
		var t=$(".mytextarea").text();
		if(t=='请输入你的评论'){
			$(".mytextarea").text('');		
		}
		if(t==''){
			$(".mytextarea").text('请输入你的评论');		
		}
	})
	$(".mytextarea").blur(function(){
	  var t=$(".mytextarea").text();
		if(t=='请输入你的评论'){
			$(".mytextarea").text('');		
		}
		if(t==''){
			$(".mytextarea").text('请输入你的评论');		
		}
	});
	
	
});

function getNextDay(d){
        d = new Date(d);
        d = +d + 1000*60*60*24*7;
        d = new Date(d);
        //return d;
        //格式化
        return d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
         
    }
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

function answer_shaixuan_1(){
	
	$("#answer_shaixuan_1 a").css({
		"color":"#d1bc75",
		"border-bottom-color":"#d1bc75",
		"border-style":"solid",
		"border-width":"0px 0px 3px 0px",
		//"background":"url(img/answer_shaixuan_shang.png) right no-repeat",
	});
	$("#answer_shaixuan_2 a").css({
		"color":"#757575",
		"border-bottom-color":"#ffffff",
		
	});
	$("#answer_shaixuan_3 a").css({
		"color":"#757575",
		"border-bottom-color":"#ffffff",
		
	});	
}
function answer_shaixuan_2(){
	$("#answer_shaixuan_2 a").css({
		"color":"#d1bc75",
		"border-bottom-color":"#d1bc75",
		"border-style":"solid",
		"border-width":"0px 0px 3px 0px"
	});
	$("#answer_shaixuan_1 a").css({
		"color":"#757575",
		"border-bottom-color":"#ffffff",
		
	});
	$("#answer_shaixuan_3 a").css({
		"color":"#757575",
		"border-bottom-color":"#ffffff",
		
	});	
}
function answer_shaixuan_3(){
	$("#answer_shaixuan_3 a").css({
		"color":"#d1bc75",
		"border-bottom-color":"#d1bc75",
		"border-style":"solid",
		"border-width":"0px 0px 3px 0px"
	});
	$("#answer_shaixuan_2 a").css({
		"color":"#757575",
		"border-bottom-color":"#ffffff",
		
	});
	$("#answer_shaixuan_1 a").css({
		"color":"#757575",
		"border-bottom-color":"#ffffff",
		
	});	
}
function  answer_fenxili_1(){
	
	$(".answer_fenxili_xia_1 a").css({
		"color":"#ffffff",
		"background-color":"#d5ad3c",
	});
	$(".answer_fenxili_xia_2 a").css({
		"color":"#d5ad3c",
		"background-color":"#ffffff",
	});
}
function  answer_fenxili_2(){
	
	$(".answer_fenxili_xia_2 a").css({
		"color":"#ffffff",
		"background-color":"#d5ad3c",
	});
	$(".answer_fenxili_xia_1 a").css({
		"color":"#d5ad3c",
		"background-color":"#ffffff",
	});
}
function dianping(){
	var qlid=$(".qlid").val();
	$.ajax({
		type : "POST",
		dataType : "json",
		url : url_public+"/a/?m=boss&a=questionAnswerDetail",
		data:'qlid='+qlid,
		success : function(data){
			if(data.code==1){
				if(data.data.hadview==1){
					
				}else{
					$('.details_da_dianping').hide();
					$(".bg_details").hide();
					$(".bg_details_dianping").show();
				}
			}else{
				alert(data.msg);	
			}
		} 
	})	
}
function qinding(){
	var qlid=$(".qlid").val();
	$.ajax({
		type : "POST",
		dataType : "json",
		url : url_public+"/a/?m=boss&a=questionDoVote",
		data:'qlid='+qlid,
		success : function(data){
			if(data.code==1){
				$('.details_da_shang_right_1').show();
				$('.details_da_shang_right_1_no').hide();
				$('.details_da_shang_zhong_name_2').show();
				$(".details_da_shang_right_2").html(data.data.vote_count);
				//setTimeout('clo()',2000);
				
				
			}else{
				alert(data.msg);	
			}
		} 
	})		
}
function clo(){
	CloseDiv('','details_tan');
}
function fabudianping(){
	var qlid=$(".qlid").val();
	var content=$(".details_pinglun_1_left textarea").val();
	$.ajax({
		type : "POST",
		//async : false,
		dataType : "json",
		url : url_public+"/a/?m=boss2&a=questionDoComment",
		data:'qlid='+qlid+'&content='+content,
		success : function(data){
			if(data.code==1){
				history.go(0);
			}else{alert(data.msg);}
		}
	})
}
/*function voteto(){
	$(".details_da_zanren_shuliang").hide();
	$(".details_da_zanren_shuliang_2").show();
	alert('234');
	var photo_id=$(".photo_id").val();
	$.ajax({
		type:"POST",
		url: 'http://api20.taskou.com/c/casio2/vote.php',
		dataType: 'json',
		data:'photo_id='+photo_id,
		success:function(data){
			if(data.code==1){
				//alert('123');
				//$(this).html(data.data.votes);
				$('.details_da_shang_right_2').html(data.data.votes);
				$('#details_da_shang_right_2').html(data.data.votes);
			}else{
				alert(data.msg);
				//location.href='login.php';		
			}
		}
	});	
}*/
</script>

</head>
<body>
<div class="bg_details" style="display:block">
	<div class="details_kong"></div>
    <input type="hidden" class="photo_id">
    <div class="details_da">
    	<!--上-->
    	<!--<div class="details_da_shang">
        	<div class="details_da_shang_left">
            	<a href="up.php"><img src="img/ceo_img.jpg" alt="加载中..."></a>
            </div>
            <div class="details_da_shang_zhong">
            	<div class="details_da_shang_zhong_1">
                	<div class="details_da_shang_zhong_name_1">张晓明</div>
                    <div class="details_da_shang_zhong_name_2" style="display:none"></div>
                    <div class="details_da_shang_zhong_name_3" style="display:none"></div>
                </div>
                <div class="details_da_shang_zhong_2">
                	<div class="details_da_shang_zhong_time">2015-12-12</div>
                </div>
            </div>
            <div class="details_da_shang_right">
            	<div class="details_da_shang_right_1" style="display:none"></div>
            	<div class="details_da_shang_right_1_no"style="display:block" onClick="voteto()"></div>
                <div class="details_da_shang_right_2">0</div>
            </div>
        </div>-->
        <!--<div class="details_da_shang_kong"></div>-->
        <!--中-->
        <div class="details_da_zhong" style="display:block" id="details_da_zhong_1">
        	<img src="" alt="加载中...">
        </div>
        <div class="details_da_zhong_shi" style="display:none" id="details_da_zhong_2">
        	<!--<video src="http://videohy.tc.qq.com/vhot2.qqvideo.tc.qq.com/p0165ndlsg0.m701.mp4?vkey=05875BFA566D390DF6B49ACC00AE89CA5A45425B68F61241A0F1245A153B0339EB1CEFE0C9719E559D870F4072471E1917BAE3D8083DD9884B466522CE4E5CE405E894D867CC681BA77C1F013FADF4286E2A6F8F73FBBF4C&br=28&platform=2&fmt=auto&level=40&sdtfrom=v3010&ocid=3508871084"  controls="controls" type="video/mp4">
               Your browser does not support the video tag.
            </video>-->
        </div>
        <!--下 行动-->
        <div class="details_da_xia_xingdong" style="display:block">
        	<div class="details_da_xia_zi"></div>
        </div>
        
        <!--赞的人数-->
        <div class="details_da_zanren">
        	<div class="details_da_zanren_touxiang">
            	<!--<div class="details_da_zanren_touxiang_1"><img src="img/ceo_img.jpg"></div>
                <div class="details_da_zanren_touxiang_1"><img src="img/ceo_img.jpg"></div>
                <div class="details_da_zanren_touxiang_1"><img src="img/ceo_img.jpg"></div>
                <div class="details_da_zanren_touxiang_1"><img src="img/ceo_img.jpg"></div>
                <div class="details_da_zanren_touxiang_1"><img src="img/ceo_img.jpg"></div>
                <div class="details_da_zanren_touxiang_1"><img src="img/ceo_img.jpg"></div>-->
            </div>
            <div class="details_da_zanren_shuliang" style="display:block;" onClick="voteto()" id="details_da_shang_right_2">0</div>
            <div class="details_da_zanren_shuliang_2" style="display:none;" id="details_da_shang_right_3">0</div>
        </div>
        
        
        
		<div class="details_da_xia_kong"></div>
    </div>
</div>
<script>
function votetos(){
	
	//alert('234');
	var photo_id=$(".photo_id").val();
	$.ajax({
		type:"POST",
		url: 'http://api20.taskou.com/c/casio2/vote.php',
		dataType: 'json',
		data:'photo_id='+photo_id,
		success:function(data){
			if(data.code==1){
				//alert('123');
				//$(this).html(data.data.votes);
				$(".details_da_zanren_shuliang").hide();
				$(".details_da_zanren_shuliang_2").show();
				$('.details_da_shang_right_2').html(data.data.votes);
				$('#details_da_shang_right_2').html(data.data.votes);
				$('#details_da_shang_right_3').html(data.data.votes);
			}else{
				alert(data.msg);
				//location.href='login.php';		
			}
		}
	});	
}
</script>

</body>
</html>