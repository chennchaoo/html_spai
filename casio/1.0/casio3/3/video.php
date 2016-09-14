<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>TR-敢爱</title>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<script type="text/javascript" src="js/iscroll.js"></script>
<script type="text/javascript" src="js/jquery-1.10.1.min.js">
</script>
<!--<script src="http://html5media.googlecode.com/svn/trunk/src/html5media.min.js">--></script>
<script type="text/javascript">
	


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
var album_id='<?php echo $_GET['album_id'] ?>';
var page = 2;
var zan=0;
	var lis='';
	var lig='';
	$.ajax({
		type:"POST",
		url: 'http://api20.taskou.com/c/casio3/view.php',
		dataType: 'json',
		data:'album_id='+album_id,
		success:function(data){
			if(data.code==1){
					
			}else{
				alert(data.msg);	
			}	
		}
	})
	$.ajax({
		type:"POST",
		url: 'http://api20.taskou.com/c/casio3/detail.php',
		dataType: 'json',
		data:'album_id='+album_id,
		success:function(data){
			if(data.code==1){
				 $("#liulan_views").html(data.data.views);
				 $("#liulan_votes").html(data.data.votes);
				 $(".xiangce_title").html(data.data.title);		
				 var total=data.data.lists.length;
				 
				 for(i=0;i<total;i++){
					 if(data.data.lists[i].type==0){
						lig='';
						lig=lig+"<li class='lia'><div class='datu_photo'></div><div class='datu'><a href='details.php?photo="+data.data.lists[i].photo_id+"'><div class='datu_1'><img src='"+data.data.lists[i].attr_url+"'></div><div class='datu_2'>"+data.data.lists[i].subject+"</div></a></div></li>"; 
						//alert(lig);
						$("#thelist").append(lig);
						zan++;
					 }else{
						lig='';
						lig=lig+"<li id='lis' class='lia'><div class='datu_photo'>美颜视频</div><div class='datu'><div class='datu_1'><video src='"+data.data.lists[i].attr_url+"'  controls='controls' type='video/mp4'>Your browser does not support the video tag.</video></div><div class='datu_2'><a href='details.php?photo="+data.data.lists[i].photo_id+"'>"+data.data.lists[i].subject+"</a></div></div></li>"; 
						//alert(lig);
						$("#thelist").append(lig);
						zan++;
					 }
				 }
			}else{
				alert(data.msg);	
			}	
		}
	})
var myScroll,
	
	pullUpEl, pullUpOffset,
	generatedCount = 0;



function pullUpAction () {
	setTimeout(function () {	// <-- Simulate network congestion, remove setTimeout from production!
		var el, li, i;
		el = document.getElementById('thelist');
		var fireyes=window.navigator.userAgent.toLowerCase().indexOf("firefox");
		//alert(page);
		$.ajax({
			type:"POST",
			url: 'http://api20.taskou.com/c/casio3/detail.php',
			dataType: 'json',
			data:'album_id='+album_id+'&page='+page,
			success:function(data){
				
				if(data.code==1){
					//alert(generatedCount);
					var total=data.data.lists.length;
					var ptotal=data.data.totalpage;
					//alert(page);
					//alert(ptotal);
					if(ptotal<page){
						//alert('已无太多妹纸');
						myScroll.refresh();	
					}else{
					var m1 = '';
					page++;
					if(total>0){
						//alert(fireyes);
						if(fireyes!=-1){
							for(i=0;i<total;i++){
								li = document.createElement('li');
								if(data.data.lists[i].type==0){
									lig='';
									lig=lig+"<li class='lia'><div class='datu_photo'>美颜照</div><div class='datu'><a href='details.php?photo="+data.data.lists[i].photo_id+"'><div class='datu_1'><img src='"+data.data.lists[i].attr_url+"'></div><div class='datu_2'>"+data.data.lists[i].subject+"</div></a><div class='datu_3' >"+data.data.lists[i].votes+"</div></div></li>";
									zan++; 
									//alert(lig);
									//$("#thelist").append(lig);
								 }else{
									lig='';
									lig=lig+"<li id='lis' class='lia'><div class='datu_photo'>美颜视频</div><div class='datu'><div class='datu_1'><video src='"+data.data.lists[i].attr_url+"'  controls='controls' type='video/mp4'>Your browser does not support the video tag.</video></div><div class='datu_2'><a href='details.php?photo="+data.data.lists[i].photo_id+"'>"+data.data.lists[i].subject+"</a></div><div class='datu_3' >"+data.data.lists[i].votes+"</div></div></li>"; 
									zan++;
									//alert(lig);
									//$("#thelist").append(lig);
								 }
								li.innerHTML = lig;
								el.appendChild(li, el.childNodes[0]); 	
							}
						}else{
							for(i=0;i<total;i++){
								li = document.createElement('li');
								if(data.data.lists[i].type==0){
									lig='';
									lig=lig+"<li class='lia'><div class='datu_photo'>美颜照</div><div class='datu'><a href='details.php?photo="+data.data.lists[i].photo_id+"'><div class='datu_1'><img src='"+data.data.lists[i].attr_url+"'></div><div class='datu_2'>"+data.data.lists[i].subject+"</div></a><div class='datu_3' >"+data.data.lists[i].votes+"</div></div></li>"; 
									zan++;
									//alert(lig);
									//$("#thelist").append(lig);
								 }else{
									lig='';
									lig=lig+"<li id='lis' class='lia'><div class='datu_photo'>美颜视频</div><div class='datu'><div class='datu_1'><video src='"+data.data.lists[i].attr_url+"'  controls='controls' type='video/mp4'>Your browser does not support the video tag.</video></div><div class='datu_2'><a href='details.php?photo="+data.data.lists[i].photo_id+"'>"+data.data.lists[i].subject+"</a></div><div class='datu_3' >"+data.data.lists[i].votes+"</div></div></li>"; 
									zan++;
									//alert(lig);
									//$("#thelist").append(lig);
								 }
								//li.innerText = lig;
								li.innerHTML = lig;
								el.appendChild(li, el.childNodes[0]); 		
								
							}	
							
						}
						
					}
					}
					
				}
				//$(".main_renwu").html(m1);
					
			}
		})
		
		myScroll.refresh();		// Remember to refresh when contents are loaded (ie: on ajax completion)
	}, 1000);	// <-- Simulate network congestion, remove setTimeout from production!
}

function loaded() {
	pullDownEl = document.getElementById('pullDown');
	pullDownOffset = pullDownEl.offsetHeight;
	pullUpEl = document.getElementById('pullUp');	
	pullUpOffset = pullUpEl.offsetHeight;
	
	myScroll = new iScroll('wrapper', {
		useTransition: true,
		topOffset: pullDownOffset,
		onRefresh: function () {
			if (pullUpEl.className.match('loading')) {
				pullUpEl.className = '';
				pullUpEl.querySelector('.pullUpLabel').innerHTML = 'Pull up to load more...';
			}
		},
		onScrollMove: function () {
			if (this.y < (this.maxScrollY - 5) && !pullUpEl.className.match('flip')) {
				pullUpEl.className = 'flip';
				pullUpEl.querySelector('.pullUpLabel').innerHTML = 'Release to refresh...';
				this.maxScrollY = this.maxScrollY;
			} else if (this.y > (this.maxScrollY + 5) && pullUpEl.className.match('flip')) {
				pullUpEl.className = '';
				pullUpEl.querySelector('.pullUpLabel').innerHTML = 'Pull up to load more...';
				this.maxScrollY = pullUpOffset;
			}
		},
		onScrollEnd: function () {
			if (pullUpEl.className.match('flip')) {
				pullUpEl.className = 'loading';
				pullUpEl.querySelector('.pullUpLabel').innerHTML = 'Loading...';				
				pullUpAction();	// Execute custom function (ajax call?)
			}
		}
	});
	
	setTimeout(function () { document.getElementById('wrapper').style.left = '0'; }, 800);
}

document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);

document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded, 200); }, false);
function voteto(e,n){
	
	$.ajax({
		type:"POST",
		url: 'http://api20.taskou.com/c/casio3/vote.php',
		dataType: 'json',
		data:'photo_id='+e,
		success:function(data){
			if(data.code==1){
				//alert('123');
				$("#zan_"+n).html(data.data.votes);
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

<!--<div id="header"><a href="http://cubiq.org/iscroll">iScroll</a></div>-->
<div class="bg_video">
	<div style="width:0px; height:0px;overflow:hidden">
    <img src="http://api20.taskou.com/c/casio3/3/img/thumb/11.jpg">
    </div>
    <div id="wrapper">
        <div id="scroller">
            <div id="pullDown">
                <span class="pullDownIcon"></span><span class="pullDownLabel">Pull down to refresh...</span>
            </div>
    		
            <ul id="thelist">
            	<li>
                	<div class="xiangce_title"></div>
                </li>
            	<li>
                    <div class="liulan">
                        <div class="liulan_1">
                        	<div class="liulan_1_shang">总浏览量</div>
                            <div class="liulan_1_shang" id="liulan_views">0</div>
                        </div>
                        <div class="liulan_1">
                        	<div class="liulan_1_shang">总点赞量</div>
                            <div class="liulan_1_shang" id="liulan_votes">0</div>
                        </div>
                    </div>
                </li>
                <!--<li id="lis" class="lia">
                	<div class="datu_photo">美颜视频</div>
                    <div class="datu">
                        <div class="datu_1">
     
                                <video src="http://videohy.tc.qq.com/vhot2.qqvideo.tc.qq.com/p0165ndlsg0.m701.mp4?vkey=05875BFA566D390DF6B49ACC00AE89CA5A45425B68F61241A0F1245A153B0339EB1CEFE0C9719E559D870F4072471E1917BAE3D8083DD9884B466522CE4E5CE405E894D867CC681BA77C1F013FADF4286E2A6F8F73FBBF4C&br=28&platform=2&fmt=auto&level=40&sdtfrom=v3010&ocid=3508871084"  controls="controls" type="video/mp4">
                                Your browser does not support the video tag.
                                </video>
                        </div>
                        <div class="datu_2"><a href="details.php">打击的思考了房间的思考付款拉的屎</a></div>
                        <div class="datu_3">22</div>
                    </div>
                </li>
                <li id="lig" class="lia">
                	<div class="datu_photo">美颜照片</div>
                    
                    <div class="datu">
                    	<a href="details.php" >
                        <div class="datu_1"><img src="img/cr_pao_img.png"></div>
                        <div class="datu_2">打击的思考了房间的思考付款拉的屎</div>
                        </a>
                        <div class="datu_3">22</div>
                    </div>
                    
                </li>-->
                
                
                
            </ul>
            <div id="pullUp">
                <span class="pullUpIcon"></span><span class="pullUpLabel">Pull up to refresh...</span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
