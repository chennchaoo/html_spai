<?php
include_once('../../../common.php');
define('ISJSON', TRUE);
if(!$xtgroup_uid){
   // msg(1101);
}
//获取最新的两个列表

//$fields = $_GET['album_id']; 
$fields = array('album_id'=>$_GET['album_id'],);

$info = checkFields($fields);
$album_id = $info['album_id'];
$album = $_SGLOBAL['pdo']->fetOne("casio2_album","*","album_id = '$album_id'");
if(!$album){
	msg(1006);
}
$TK['title'] = $album['title'];
$TK['avatar'] = $album['attr_url'];
$TK['views'] = $album['views'];
$TK['votes'] = $album['votes'];

$perpage = 10;
$page = isset($_REQUEST['page'])?intval($_REQUEST['page']):1;
$page = $page >1 ?$page:1;
$total = $_SGLOBAL['pdo']->fetRowCount('casio2_photo','photo_id',"album_id = '$album_id'");
$totalpage = 0;
$list = array();
if($total > 0){
	$totalpage  = ceil($total/$perpage);
	if($page >= $totalpage){$page = $totalpage;}
	$offset = intval($perpage*($page-1));
	$sql = "SELECT * FROM ".DB_PRE."casio2_photo where status >= 0 AND album_id = '$album_id' order by displayorder ASC,dateline DESC LIMIT $offset,$perpage"; 
	$lists = $_SGLOBAL['pdo']->getAll($sql);	
}
$TK['total'] = $total;
$TK['totalpage'] = $totalpage;
$TK['page'] = $page;


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>卡西欧TR真爱相册</title>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<script type="text/javascript" src="js/iscroll.js"></script>
<script type="text/javascript" src="js/jquery-1.10.1.min.js">

</script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
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
		url: 'http://api20.taskou.com/c/casio2/view.php',
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
		url: 'http://api20.taskou.com/c/casio2/detail.php',
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
						lig=lig+"<li class='lia'><div class='datu_photo'>美颜照</div><div class='datu'><a href='details.php?photo="+data.data.lists[i].photo_id+"'><div class='datu_1'><img src='"+data.data.lists[i].attr_url+"'></div><div class='datu_2'>"+data.data.lists[i].subject+"</div></a><div class='datu_3' id='zan_"+zan+"' onclick=voteto(\'"+data.data.lists[i].photo_id+"\',\'"+zan+"\')>"+data.data.lists[i].votes+"</div></div></li>"; 
						//alert(lig);
						$("#thelist").append(lig);
						zan++;
					 }else{
						lig='';
						lig=lig+"<li id='lis' class='lia'><div class='datu_photo'>美颜视频</div><div class='datu'><div class='datu_1'><video src='"+data.data.lists[i].attr_url+"'  controls='controls' type='video/mp4'>Your browser does not support the video tag.</video></div><div class='datu_2'><a href='details.php?photo="+data.data.lists[i].photo_id+"'>"+data.data.lists[i].subject+"</a></div><div class='datu_3' id='zan_"+zan+"' onclick=voteto(\'"+data.data.lists[i].photo_id+"\',\'"+zan+"\') >"+data.data.lists[i].votes+"</div></div></li>"; 
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
//分享朋友圈
var url=encodeURIComponent(location.href.split('#')[0]);

var title='<?php echo $TK['title'] ?>';
var title_2='卡西欧';
var touxiang='<?php echo $TK['avatar'] ?>';
$.ajax(
{
	type : "GET",
	dataType : "json",
	url : "http://api20.taskou.com/api/index.php?type=getShareKey&url="+url,
	success : function(d){
		r = d.data;
		if(r.result.appId){
			wx.config({
				debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
				appId: r.result.appId, // 必填，公众号的唯一标识
				timestamp: r.result.timestamp, // 必填，生成签名的时间戳
				nonceStr: r.result.noncestr, // 必填，生成签名的随机串
				signature: r.result.signature,// 必填，签名，见附录1
				jsApiList: [
					'checkJsApi',
					'onMenuShareTimeline',
					'onMenuShareAppMessage',
					'onMenuShareQQ',
					'onMenuShareWeibo',
					'hideMenuItems',
					'showMenuItems',
					'hideAllNonBaseMenuItem',
					'showAllNonBaseMenuItem',
					'translateVoice',
					'startRecord',
					'stopRecord',
					'onRecordEnd',
					'playVoice',
					'pauseVoice',
					'stopVoice',
					'uploadVoice',
					'downloadVoice',
					'chooseImage',
					'previewImage',
					'uploadImage',
					'downloadImage',
					'getNetworkType',
					'openLocation',
					'getLocation',
					'hideOptionMenu',
					'showOptionMenu',
					'closeWindow',
					'scanQRCode',
					'chooseWXPay',
					'openProductSpecificView',
					'addCard',
					'chooseCard',
					'openCard'
				] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
			});
			wx.ready(function(){
				//alert('ok1');
				//分享到朋友圈
				wx.onMenuShareTimeline({
					title: title, // 分享标题
					link: location.href, // 分享链接
					imgUrl: touxiang, // 分享图标
					success: function () { 
						//alert('ok');
						// 用户确认分享后执行的回调函数
					},
					cancel: function () { 
						//alert('cancel');
						// 用户取消分享后执行的回调函数
					}
				});
				//分享到朋友
				wx.onMenuShareAppMessage({
					title: title_2, // 分享标题
					desc: title,//描述
					link: location.href, // 分享链接
					imgUrl: touxiang, // 分享图标
					success: function () { 
						//alert('ok');
						// 用户确认分享后执行的回调函数
					},
					cancel: function () { 
						//alert('cancel');
						// 用户取消分享后执行的回调函数
					}
				});

				//分享到QQ
				wx.onMenuShareQQ({
					title: title, // 分享标题
					desc: '',//描述
					link: location.href, // 分享链接
					imgUrl: touxiang, // 分享图标
					success: function () { 
						//alert('ok');
						// 用户确认分享后执行的回调函数
					},
					cancel: function () { 
						//alert('cancel');
						// 用户取消分享后执行的回调函数
					}
				});
				//分享到微博
				wx.onMenuShareWeibo({
					title: title, // 分享标题
					desc: '',//描述
					link: location.href, // 分享链接
					imgUrl: 'http://api20.taskou.com/c/img/logo_tangkou.png', // 分享图标
					success: function () { 
						//alert('ok');
						// 用户确认分享后执行的回调函数
					},
					cancel: function () { 
						//alert('cancel');
						// 用户取消分享后执行的回调函数
					}
				});
				// config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready函数中。
			});
			wx.error(function(res){
			
				// config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
			
			});
			//e	
			
		}else{
			//错误
			alert(r.status.msg);
		}
	} 
});
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
			url: 'http://api20.taskou.com/c/casio2/detail.php',
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
									lig=lig+"<li class='lia'><div class='datu_photo'>美颜照</div><div class='datu'><a href='details.php?photo="+data.data.lists[i].photo_id+"'><div class='datu_1'><img src='"+data.data.lists[i].attr_url+"'></div><div class='datu_2'>"+data.data.lists[i].subject+"</div></a><div class='datu_3' id='zan_"+zan+"' onclick=voteto(\'"+data.data.lists[i].photo_id+"\',\'"+zan+"\')>"+data.data.lists[i].votes+"</div></div></li>";
									zan++; 
									//alert(lig);
									//$("#thelist").append(lig);
								 }else{
									lig='';
									lig=lig+"<li id='lis' class='lia'><div class='datu_photo'>美颜视频</div><div class='datu'><div class='datu_1'><video src='"+data.data.lists[i].attr_url+"'  controls='controls' type='video/mp4'>Your browser does not support the video tag.</video></div><div class='datu_2'><a href='details.php?photo="+data.data.lists[i].photo_id+"'>"+data.data.lists[i].subject+"</a></div><div class='datu_3' id='zan_"+zan+"' onclick=voteto(\'"+data.data.lists[i].photo_id+"\',\'"+zan+"\')>"+data.data.lists[i].votes+"</div></div></li>"; 
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
									lig=lig+"<li class='lia'><div class='datu_photo'>美颜照</div><div class='datu'><a href='details.php?photo="+data.data.lists[i].photo_id+"'><div class='datu_1'><img src='"+data.data.lists[i].attr_url+"'></div><div class='datu_2'>"+data.data.lists[i].subject+"</div></a><div class='datu_3' id='zan_"+zan+"' onclick=voteto(\'"+data.data.lists[i].photo_id+"\',\'"+zan+"\')>"+data.data.lists[i].votes+"</div></div></li>"; 
									zan++;
									//alert(lig);
									//$("#thelist").append(lig);
								 }else{
									lig='';
									lig=lig+"<li id='lis' class='lia'><div class='datu_photo'>美颜视频</div><div class='datu'><div class='datu_1'><video src='"+data.data.lists[i].attr_url+"'  controls='controls' type='video/mp4'>Your browser does not support the video tag.</video></div><div class='datu_2'><a href='details.php?photo="+data.data.lists[i].photo_id+"'>"+data.data.lists[i].subject+"</a></div><div class='datu_3' id='zan_"+zan+"' onclick=voteto(\'"+data.data.lists[i].photo_id+"\',\'"+zan+"\')>"+data.data.lists[i].votes+"</div></div></li>"; 
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
		url: 'http://api20.taskou.com/c/casio2/vote.php',
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
                            <div class="liulan_1_shang" id="liulan_views">4852</div>
                        </div>
                        <div class="liulan_1">
                        	<div class="liulan_1_shang">总点赞量</div>
                            <div class="liulan_1_shang" id="liulan_votes">4852</div>
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
