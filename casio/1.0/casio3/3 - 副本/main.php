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
<link href="css/style.css?t=9" type="text/css" rel="stylesheet" media="all" />
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/erweima.js"></script>
<script type="text/javascript" src="js/public.js"></script>
<script>

$(document).ready(function(){
	$.ajax({
		type:"POST",
		url: 'http://api20.taskou.com/c/casio3/list.php',
		dataType: 'json',
		success:function(data){
			if(data.code==1){
				//alert('123');
				var total=data.data.lists.length;
				
				var m1='';
				for(i=0; i<total;i++){
					if(i<20){
						m1=m1+"<div class='main_xiangce_1'><a href='video.php?album_id="+data.data.lists[i].album_id+"'><div class='main_xiangce_img'><span></span><img src='"+data.data.lists[i].attr_url+"'></div><div class='main_xiangce_zi'>"+data.data.lists[i].title+"</div><div class='main_xiangce_xia'><div class='main_xiangce_xia_1'>"+data.data.lists[i].views+"</div><div class='main_xiangce_xia_2'>"+data.data.lists[i].votes+"</div></div></a></div>";
					}
					/*if(i==2){
						m1=m1+"<div class='main_xiangce_1'  id='main_xiangce_3'><a href='video.php?album_id="+data.data.lists[i].album_id+"'><div class='main_xiangce_img'><img src='"+data.data.lists[i].attr_url+"'></div><div class='main_xiangce_zi'>"+data.data.lists[i].title+"</div><div class='main_xiangce_xia'><div class='main_xiangce_xia_1'>"+data.data.lists[i].views+"</div><div class='main_xiangce_xia_2'>"+data.data.lists[i].votes+"</div></div></a></div>";
					}else{
					m1=m1+"<div class='main_xiangce_1'><a href='video.php?album_id="+data.data.lists[i].album_id+"'><div class='main_xiangce_img'><img src='"+data.data.lists[i].attr_url+"'></div><div class='main_xiangce_zi'>"+data.data.lists[i].title+"</div><div class='main_xiangce_xia'><div class='main_xiangce_xia_1'>"+data.data.lists[i].views+"</div><div class='main_xiangce_xia_2'>"+data.data.lists[i].votes+"</div></div></a></div>";
					}*/
				}
				$(".main_xiangce").html(m1);
			}else{
				//location.href='http://api20.taskou.com/wx_auth/auth.php';
						
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
<div class="bg_main">
	<div class="main_kong"></div>
    <div style="width:0px; height:0px;overflow:hidden">
    <img src="http://api20.taskou.com/c/casio3/3/img/thumb/11.jpg">
    </div>
    <div class="main_shang">
    	<a href="http://vip.zuikuh5.com/v/328855_926838.html"></a>
    </div>
    <div class="dianerwei"  onClick="ShowDiv('overlay-bg2','erwei')">
    	<a><img src="img/erwei.png"></a>
    </div>
    <div class="main_xiangqing" onClick="ShowDiv('overlay-bg','tan_1')">活动详情</div>
    <div class="main_xiangce">
    	<div class="main_xiangce_1">
        	<a href="video.php">
        	<div class="main_xiangce_img">
            	<span></span><img src="img/222955917689876319.jpg">
            </div>
            <div class="main_xiangce_zi">亲爱的老宁，虽然在一起两年以来我们都没有机会一起过情人节和你的生日，但我知道我们还有很长的路要走，以后一定要把所有想做的事情都一起完成~爱你哟。遇到你很幸运，情人节快乐</div>
            <div class="main_xiangce_xia">
            	<div class="main_xiangce_xia_1">4851</div>
                <div class="main_xiangce_xia_2">4851</div>
            </div>
            </a>
        </div>
        <div class="main_xiangce_1">
        	<a href="video.php">
        	<div class="main_xiangce_img">
            	<span></span><img src="img/287348386414269010.jpg">
            </div>
            <div class="main_xiangce_zi">2、	你的存在让我想起世界上一切美好的事物，也让我相信一切的不美好都是可以被原谅的</div>
            <div class="main_xiangce_xia">
            	<div class="main_xiangce_xia_1">4851</div>
                <div class="main_xiangce_xia_2">4851</div>
            </div>
            </a>
        </div>
        <div class="main_xiangce_1" >
        	<a href="video.php">
        	<div class="main_xiangce_img">
            	<img src="img/632747267224522804.jpg">
            </div>
            <div class="main_xiangce_zi">3、	想说的一句话：小伙子！虽然你总是惹我生气，但是朕毕竟大度，是闯天下的人，就不和你一般计较了，只要你多给朕生几个娃，我就原谅你了
4、	执子之手,与子偕老
</div>
            <div class="main_xiangce_xia">
            	<div class="main_xiangce_xia_1">4851</div>
                <div class="main_xiangce_xia_2">4851</div>
            </div>
            </a>
        </div>
        <div class="main_xiangce_1" >
        	<a href="video.php">
        	<div class="main_xiangce_img">
            	<img src="img/708106451326864642.jpg">
            </div>
            <div class="main_xiangce_zi">华师大真爱相册</div>
            <div class="main_xiangce_xia">
            	<div class="main_xiangce_xia_1">4851</div>
                <div class="main_xiangce_xia_2">4851</div>
            </div>
            </a>
        </div>
        <div class="main_xiangce_1" >
        	<a href="video.php">
        	<div class="main_xiangce_img">
            	<img src="img/720405825303698778.jpg">
            </div>
            <div class="main_xiangce_zi">华师大真爱相册</div>
            <div class="main_xiangce_xia">
            	<div class="main_xiangce_xia_1">4851</div>
                <div class="main_xiangce_xia_2">4851</div>
            </div>
            </a>
        </div>
        <div class="main_xiangce_1" >
        	<a href="video.php">
        	<div class="main_xiangce_img">
            	<img src="img/734544907697794304.jpg">
            </div>
            <div class="main_xiangce_zi">华师大真爱相册</div>
            <div class="main_xiangce_xia">
            	<div class="main_xiangce_xia_1">4851</div>
                <div class="main_xiangce_xia_2">4851</div>
            </div>
            </a>
        </div>
    </div>
    <!--<div class="main_xiangqing" onClick="ShowDiv('overlay-bg','tan_1')">活动详情</div>-->
    <!--弹出层-->
    <div id="overlay-bg" style="display:none"></div>
    <div class="tan_1" id="tan_1" style="display:none" onClick="CloseDiv('overlay-bg','tan_1')">
    	<div class="close_tan"></div>
        <div class="wenzi"> 
        	<div class="title_1">卡西欧TR最美桃花眼活动细则</div>
        	<div class="wenzi_1">
1.本活动期间为2016年4月3日至2016年4月15日，面向上海的大学生群体；</br>
2.任何上海高校的大学生均可参与卡西欧TR最美桃花眼活动；</br>
3.参与方式：</br>
1)高校大学生生用户在活动H5页面中上传自己的面部清晰照，并将H5页面分享在朋友圈中；</br>
2)高校大学生用户引导朋友圈其他朋友打开浏览活动页面，邀请身边的朋友为自己投票评选桃花眼；</br>
3)通过众多用户的评选，获得投票数量最多的三个参赛用户可获得卡西欧TR600相机的一周试用权；</br>
4).卡西欧（中国）贸易有限公司及《后生》平台有权在中国法律法规允许的范围内修改本活动条款及细则，并于《后生》手机平台、微信公众号或其他相关渠道公告后生效，敬请活动参与者留意</br>


			</div>
        </div>
    </div>
    <div id="overlay-bg2" style="display:none" class="overlay-bg"onClick="CloseDiv('overlay-bg2','erwei')"></div>
    <div class="erwei"  id="erwei" onClick="CloseDiv('overlay-bg2','erwei')" style="display:none">
    	
    <img src="img/erweima.png">
    </div>
</div>
</body>
</html>