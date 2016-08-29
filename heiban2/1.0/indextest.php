<?php
include_once('../common.php');
$forward = get_url();
if(!$xtgroup_uid){
    header("Location:http://share.spai.me/wx_auth/auth.php?forward=".$forward);
    exit;
}
//define('ISJSON', TRUE);
$tid = isset($_REQUEST['tid'])?trim($_REQUEST['tid']):'';
if(!$tid){
    msg(1003);
}
$task = $GLOBALS['pdo']->fetOne('tasks','*',"tid = '$tid'");
if(!$task){
    msg(1006);
}
if($tid == '02e1664fe83a17a8d4e77c902d0d8604'){
    //特殊
    header("Location:http://api20.taskou.com/c/casio/2/index.php");
}elseif($tid == '02e1664fe83a17a8d4e77c902d0d8605'){
    header("Location:http://c.taskou.com/c/casio/index.php");
}else{
    //下面是比赛详情数据
    $member_id = $xtgroup_uid;
    $task = $GLOBALS['pdo']->fetOne("tasks",'*',"tid = '$tid'");
    //$task = $GLOBALS['pdo']->getOne("SELECT t.*,b.nickname,b.avatar FROM ".DB_PRE."tasks t LEFT JOIN ".DB_PRE."brand b ON t.bid = b.bid WHERE t.tid = '$tid'");
    if(!$task){
        msg(1006);
    }
    if(!($task['starttime'] <= SYSTIME && $task['excetime'] > SYSTIME)){
        $status = -1;
    }else{
        $status = 1;
    }
    $TK = array();
    $TK['tid'] = $task['tid'];
    $TK['subject'] = $task['subject'];
    $TK['xsubject'] = $task['xsubject'];
    $TK['description'] = $task['description'];
    $TK['banner'] = $task['banner'];
    $TK['starttime'] = date('Y-m-d',$task['starttime']);  
    $TK['excetime'] = date('Y-m-d',$task['excetime']);   
    $TK['follow_count'] = $task['follow_count'];
    $TK['answer_count'] = $task['answer_count'];
    $TK['share'] = array('img'=>APP_PATH.'attachments/logo.png','title'=>$task['subject'],'des'=>cut_str($task['description'],100),'shareUrl'=>'http://share.spai.me/m/?tid='.$tid);
   
}
?>
<!doctype html>
<html lang="zh-cn">
<head>
    <meta name="viewport" content="initial-scale=1, user-scalable=0, minimal-ui" charset="UTF-8">
    <title>S派</title>
    <link href="css/style_h.css?t=3" type="text/css" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="css/mui.min.css?t=4">
	<script src="js/public.js"></script>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    
    
<script>
        	(function(){
			var phoneWidth = parseInt(window.screen.width),
				phoneScale = phoneWidth/640,
				ua = navigator.userAgent;
			if (/Android (\d+\.\d+)/.test(ua)){
				var version = parseFloat(RegExp.$1);
				// andriod 2.3
				if(version > 2.3){
					//document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
					document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+',initial-scale=1,user-scalable=0" target-densitydpi=device-dpi">');
				// andriod 2.3以上
				}else{
					document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
				}
				// 其他系统
			} else {
				/*document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');*/
				//document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
				document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+',initial-scale=1,user-scalable=0" target-densitydpi=device-dpi">');
			}
		})();
		
		 
        </script>
        
        
</head>
<body>
<div class="outer">
    
    <div class="inner">
        <div class="lists">
            <div class="bg_kong"></div>
            <!--<div class="hand_img">
            	<div class="hand_img_kong"></div>
            	<div class="hand_img_div"><img src="<?php echo $TK['banner'];?>"></div>
                
            </div>-->
            <div class="hand_img">
            	<div class="hand_img_kong"></div>
                
            	<div class="hand_img_div"><img src="img/test.jpg"></div>
                <div class="hand_img_da"><img src="img/hand_img.png"></div>
                
            </div>
            <div class="title_img">
                <img src="img/title_img.png">
            </div>
            <div class="wenzi">
                <div class="wenzi_1">
                    <?php echo $TK['description'];?>
                </div>
                
            </div>
            <div class="jinxingshi">
                <img src="img/jinxingshi.png">
            </div>
            <div class="xstd">向上拖动加载更多</div>
            <div class="jinxing_over"><img src="img/jinxing_over.png"></div>
<div class="erweima" ><img src="img/erweima_ma.png"></div>
  </div>
    <input type="hidden" class="shareUrl" value="<?php echo $TK['share']['shareUrl']?>">
    <input type="hidden" class="shareTitle" value="<?php echo $TK['share']['title']?>">
    <input type="hidden" class="shareContent" value="<?php echo $TK['share']['des']?>">
    <input type="hidden" class="shareImg" value="<?php echo $TK['share']['img']?>">
</div>

<script src="js/zepto.min.js"></script>
<script src="js/dropload.min.js"></script>

<script src="js/mui.min.js"></script>
	<script src="js/mui.zoom.js"></script>
	<script src="js/mui.previewimage.js"></script>
<script>
var p=1;
var perpage=3;
// dropload
var dropload = $('.inner').dropload({
    domUp : {
        domClass   : 'dropload-up',
        domRefresh : '<div class="dropload-refresh">↓下拉刷新</div>',
        domUpdate  : '<div class="dropload-update">↑释放更新</div>',
        domLoad    : '<div class="dropload-load"><span class="loading"></span>加载中...</div>'
    },
    domDown : {
        domClass   : 'dropload-down',
        domRefresh : '<div class="dropload-refresh">↑上拉加载更多</div>',
        domUpdate  : '<div class="dropload-update">↓释放加载</div>',
        domLoad    : '<div class="dropload-load"><span class="loading"></span>加载中...</div>'
    },
    loadDownFn : function(me){
		p++;
		var result = '';
		var tid="<?php echo $tid;?>";
	$.ajax({
		type : "GET",
		dataType : "json",
		url : publicUrl+'m/lists.php?tid='+tid,
		data:'page='+p+'&perpage='+perpage,
		success : function(data){
			if(data.code==1){
				if(data.data.lists.length>0 && p<=data.data.totalpage){
					for(var i = 0; i < data.data.lists.length; i++){
						result +='<div class="voteList">'
									+'<div class="list_da">'
								+	'	<div class="list_da_left">'
								+	'		<div class="list_da_shang">'
								+	'			<div class="list_img"><img src="'+data.data.lists[i].avatar+'"></div>'
								+	'			<div class="list_zi">'
								+	'				<div class="list_zi_1">选手:'+data.data.lists[i].nickname+'</div>'
								+	'				<div class="list_zi_1">票数：'+data.data.lists[i].vote_count+'</div>'
								+	'				<div class="list_zi_1">排名：第'+data.data.lists[i].pm+'名</div>'
								+	'			</div>'
								+	'		</div>'
								+	'	</div>'
								+	'	<div class="list_da_left">'
								+	'		<div class="list_da_shang">'
								+	'			<div class="list_zi_2">投票</div>'
								+	'			<div class="list_da_xia" onclick="dianzan('+data.data.lists[i].tlid+')"><img src="img/myLog.png"></div>'
								+	'		</div>'
								+	'	</div>'
								+	'</div>'
								+	'<div class="imgs_works">';
								for(j=0;j<data.data.lists[i].imgs.length;j++){	
									result+=	'	<div class="imgs_works_1"><img src="'+data.data.lists[i].imgs[j].img_url+'" data-preview-src="" data-preview-group="1"></div>';
								}
								result+=	'</div>'
								+'</div>';
					}
					setTimeout(function(){
							/*$('.lists').append(result);*/
							$('.xstd').before(result);
							me.resetload();
					},1000);
				}else{
					var wu='';
					$(".xstd").hide();
					setTimeout(function(){
					$('.xstd').before(wu);
					me.resetload();
					},1000);
				}
			}else{
				alert(data.msg);	
			}
		}
	 })
    }
});
datas();
function datas(){
	var result = '';
	var tid="<?php echo $tid;?>";
	$.ajax({
		type : "GET",
		dataType : "json",
		url : publicUrl+'m/lists.php?tid='+tid,
		data:'page='+p+'&perpage='+perpage,
		success : function(data){
			if(data.code==1){
				if(data.data.total>0){
					for(var i = 0; i < data.data.lists.length; i++){
						result +='<div class="voteList">'
									+'<div class="list_da">'
								+	'	<div class="list_da_left">'
								+	'		<div class="list_da_shang">'
								+	'			<div class="list_img"><img src="'+data.data.lists[i].avatar+'"></div>'
								+	'			<div class="list_zi">'
								+	'				<div class="list_zi_1">选手:'+data.data.lists[i].nickname+'</div>'
								+	'				<div class="list_zi_1">票数：'+data.data.lists[i].vote_count+'</div>'
								+	'				<div class="list_zi_1">排名：第'+data.data.lists[i].pm+'名</div>'
								+	'			</div>'
								+	'		</div>'
								+	'	</div>'
								+	'	<div class="list_da_left">'
								+	'		<div class="list_da_shang">'
								+	'			<div class="list_zi_2">投票</div>'
								+	'			<div class="list_da_xia" onclick="dianzan('+data.data.lists[i].tlid+')"><img src="img/myLog.png"></div>'
								+	'		</div>'
								+	'	</div>'
								+	'</div>'
								+	'<div class="imgs_works">';
								for(j=0;j<data.data.lists[i].imgs.length;j++){	
									result+=	'	<div class="imgs_works_1"><img src="'+data.data.lists[i].imgs[j].img_url+'" data-preview-src="" data-preview-group="1"></div>';
								}
								result+=	'</div>'
								+'</div>';
					}
					setTimeout(function(){
							/*$('.lists').append(result);*/
							$('.xstd').before(result);
							me.resetload();
					},1000);
				}else{
					alert('暂无投票');
                    var wu='';
                    $(".xstd").hide();
                    setTimeout(function(){
                        $('.xstd').before(wu);
                        me.resetload();
                    },1000);
				}
			}else{
				alert(data.msg);	
			}
		}
	 })
}
</script>

<script>
mui.previewImage();
	function dianzan(tlid){
		$.ajax({
			type : "GET",
			dataType : "json",
			url : publicUrl+'m/vote.php?tlid='+tlid,
			success : function(data){
				if(data.code==1){
					alert('投票成功');
				}else{
					alert(data.msg);	
				}
			}
		})
	}
</script>
<script>
	var urls="http://share.spai.me/api/index.php?type=getShareKey&url="+encodeURIComponent(location.href.split('#')[0]);
	var shareUrl=$(".shareUrl").val();
	var shareTitle=$(".shareTitle").val();
	var shareContent=$(".shareContent").val();
	var shareImg=$(".shareImg").val();
	alert('123');
	alert(shareUrl);
$.ajax(
{
	type : "GET",
	//async : false,
	dataType : "json",
	url : urls,
	success : function(d){
		
		r = d.data;
		//alert(r.result.appId);
		//alert(r.result.timestamp);
		//alert(r.result.noncestr);
		//alert(r.result.signature);
		if(r.result.appId){
			//console.log(result)
			wx.config({
				debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
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
					title: shareContent, // 分享标题
					link: shareUrl, // 分享链接
					imgUrl: shareImg, // 分享图标
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
					title: shareTitle, // 分享标题
					desc: shareContent,//描述
					link: shareUrl, // 分享链接
					imgUrl: shareImg, // 分享图标
					success: function () { 
						//alert('ok');
						// 用户确认分享后执行的回调函数
					},
					cancel: function () { 
						//alert('cancel');
						// 用户取消分享后执行的回调函数
					}
				});
/*				wx.getLocation({
					success: function (res) {
						var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
						alert(latitude);
						var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
						var speed = res.speed; // 速度，以米/每秒计
						var accuracy = res.accuracy; // 位置精度
					}
});*/
				//分享到QQ
				wx.onMenuShareQQ({
					title: shareTitle, // 分享标题
					desc: shareContent,//描述
					link: shareUrl, // 分享链接
					imgUrl: shareImg, // 分享图标
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
					title: shareTitle, // 分享标题
					desc:shareContent,//描述
					link: shareUrl, // 分享链接
					imgUrl: shareImg, // 分享图标
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
        </script>
</body>
</html>