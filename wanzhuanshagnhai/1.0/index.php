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
if($tid == '02e1664fe83a17a8d4e77c902d0d8901'){
    //特殊
    header("Location:http://share.spai.me/m/cc/danciyingxiong");
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
    <title>S派-尝遍秋色</title>
    <link href="css/style_h.css?t=2" type="text/css" rel="stylesheet" media="all" />
    <!--<link rel="stylesheet" href="css/mui.min.css?t=2">-->
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
					document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
				// andriod 2.3以上
				}else{
					document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
				}
				// 其他系统
			} else {
				document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
				/*document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');*/
			}
		})();

		 
        </script>
</head>
<body>
<!--<div class="bg_1" style="display: block;">

</div>-->
<div class="outer" style="display:block">
    <div class="bg_1">
        <div class="bg_1_kong"></div>
        <div class="jianying">
            <div class="jianying_imgs"></div>
        </div>
        <!--<div class="button_1" onclick="hiddenBg_1()"></div>-->
    </div>

    <div class="inner">
        <div class="lists">
            <div class="bg_kong"></div>
            <div class="rule">
                <img src="img/rule.png">
            </div>
            <!--<div class="blockFloor" style="display:none">
                <div class="blueFloor">
                    <div class="closeBlock">X</div>
                    <div class="block_xiangqing">
                        <div class="block_word">
                            balabalabalabalabalabalabalabalabalabalabalabalabalabalabalabala
                        </div>
                    </div>
                    <div class="block_img">
                        <img src="img/meinv.jpg">
                        <img src="img/meinv2.jpg">
                        <img src="img/meinv.jpg">
                    </div>
                </div>
            </div>-->
            <div class="updown" onclick="updown()">
                <a href="http://a.app.qq.com/o/simple.jsp?pkgname=com.app.spire"></a>
            </div>
            <div class="xstd">向上拖动加载更多</div>
            <!--list start-->
            <div class="voteList">
                <!--<div class="voteList_da">
                    <div class="list_my">
                        <div class="list_left">
                            <div class="list_avatar"><img src="img/list_img.png"></div>               <div class="list_name">王二狗</div>
                        </div>
                        <div class="list_middle">
                            详情详情详情详情详情详情详情详情详情详情
                        </div>
                        <div class="list_right" onclick="lookBig()">
                            <img src="img/meinv.jpg">
                        </div>
                    </div>
                    <div class="list_like"><span>12</span></div>
                </div>
                <div class="voteList_da">
                    <div class="list_my">
                        <div class="list_left">
                            <div class="list_avatar"><img src="img/list_img.png"></div>               <div class="list_name">王二狗</div>
                        </div>
                        <div class="list_middle">
                            详情详情详情详情详情详情详情详情详情详情
                        </div>
                        <div class="list_right">
                            <img src="img/meinv.jpg">
                        </div>
                    </div>
                    <div class="list_like"><span>12</span></div>
                </div>-->
            </div>
            <!--list stop-->

        </div>
    </div>
    <input type="hidden" class="shareUrl" value="<?php echo $TK['share']['shareUrl']?>">
    <input type="hidden" class="shareTitle" value="<?php echo $TK['share']['title']?>">
    <input type="hidden" class="shareContent" value="<?php echo $TK['share']['des']?>">
    <input type="hidden" class="shareImg" value="<?php echo $TK['share']['img']?>">
</div>

<script src="js/zepto.min.js"></script>
<script src="js/dropload.min.js"></script>
<!--
<script src="js/mui.min.js"></script>
<script src="js/mui.zoom.js"></script>
<script src="js/mui.previewimage.js"></script>-->
<script>
var p=1;
var perpage=3;
var tid="<?php echo $tid;?>";
var publicUrl='http://114.55.132.100:8082/';
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
        $.ajax({
            type: "GET",
            dataType: "json",
            url: publicUrl + 'm/lists.php?tid=' + tid,
            data: 'page=' + p + '&perpage=' + perpage,
            success: function (data) {
                if(data.code==1) {
                    if (data.data.lists.length > 0 && p <= data.data.totalpage) {
                        var result = '';
                        var result2 = '';
                        for (var i = 0; i < data.data.lists.length; i++) {

                            result += '<div class="voteList_da">'
                                + '<div class="list_my">'
                                + '     <div class="list_left">'
                                + '<div class="list_avatar"><img src="' + data.data.lists[i].avatar + '"></div>' + '<div class="list_name">' + data.data.lists[i].nickname + '</div>'
                                + '</div>'
                                + '<div class="list_middle">'
                                + data.data.lists[i].content
                                + '</div>'
                                + '<div class="list_right" onclick="lookBig(\''+data.data.lists[i].member_id+'\')">'
                                + '<img src="' + data.data.lists[i].imgs[0].img_url + '">'
                                + ' </div>'
                                + ' </div>'
                                + ' <div class="list_like"  onclick="dianzan(\''+data.data.lists[i].tlid+'\')"><span></span></div>'
                                + ' </div>';
                            result2+='<div class="blockFloor" style="display:none" id="'+data.data.lists[i].member_id+'" onclick="CloseBig(\''+data.data.lists[i].member_id+'\')">'
                                +'<div class="blueFloor">'
                                +'<div class="closeBlock" onclick="CloseBig(\''+data.data.lists[i].member_id+'\')">X</div>'
                                +'<div class="block_xiangqing">'
                                +'<div class="block_word">'
                                +data.data.lists[i].content
                                +'</div>'
                                +'</div>'
                                +'<div class="block_img">';
                            if(data.data.lists[i].imgs.length>0){
                                for(var j=0; j<data.data.lists[i].imgs.length;j++){
                                    result2+='<img src="' + data.data.lists[i].imgs[j].img_url + '">';
                                }
                            }

                            result2+='</div>'
                                +'</div>'
                                +'</div>';

                        }
                        setTimeout(function () {
                            $('.voteList').append(result);
                            $('.rule').after(result2);
                            /*$('.xstd').before(result);*/
                            me.resetload();
                        }, 1000);
                    }else{
                        var wu='';
                        $(".xstd").hide();
                        setTimeout(function(){
                            $('.voteList').append(wu);

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
    //alert(publicUrl);
    //alert('http://114.55.132.100:8082/m/lists.php?tid='+tid);
    $.ajax({
        type: "GET",
        dataType: "json",
        url: publicUrl + 'm/lists.php?tid=' + tid,
        data: 'page=1&perpage=' + perpage,
        success: function (data) {
            var result = '';
            var result2 = '';
            for (var i = 0; i < 3; i++) {

                result += '<div class="voteList_da">'
                    + '<div class="list_my">'
                    + '     <div class="list_left">'
                    + '<div class="list_avatar"><img src="' + data.data.lists[i].avatar + '"></div>' + '<div class="list_name">' + data.data.lists[i].nickname + '</div>'
                    + '</div>'
                    + '<div class="list_middle">'
                    + data.data.lists[i].content
                    + '</div>'
                    + '<div class="list_right" onclick="lookBig(\''+data.data.lists[i].member_id+'\')">'
                    + '<img src="' + data.data.lists[i].imgs[0].img_url + '">'
                    + ' </div>'
                    + ' </div>'
                    + ' <div class="list_like" onclick="dianzan(\''+data.data.lists[i].tlid+'\')"><span></span></div>'
                    + ' </div>';
                result2+='<div class="blockFloor" style="display:none" id="'+data.data.lists[i].member_id+'" onclick="CloseBig(\''+data.data.lists[i].member_id+'\')">'
                    +'<div class="blueFloor">'
                    +'<div class="closeBlock" onclick="CloseBig(\''+data.data.lists[i].member_id+'\')">X</div>'
                    +'<div class="block_xiangqing">'
                    +'<div class="block_word">'
                    +data.data.lists[i].content
                    +'</div>'
                    +'</div>'
                    +'<div class="block_img">';
                    if(data.data.lists[i].imgs.length>0){
                        for(var j=0; j<data.data.lists[i].imgs.length;j++){
                            result2+='<img src="' + data.data.lists[i].imgs[j].img_url + '">';
                        }
                    }

                    result2+='</div>'
                    +'</div>'
                    +'</div>';

            }
            setTimeout(function () {
                $('.voteList').append(result);
                $('.rule').after(result2);
                /*$('.xstd').before(result);*/
                me.resetload();
            }, 1000);
        }
    })

    /**/
}

</script>
<script>

mui.previewImage();
$(".closeBlock").click(function(){
    $(".blockFloor").hide();
})
$(".blockFloor").click(function(){
    $(".blockFloor").hide();
})
function dianzan(tlid){
    $.ajax({
        type : "GET",
        dataType : "json",
        url : publicUrl+'m/vote.php?tlid='+tlid,
        success : function(data){
            if(data.code==1){
                alert('点赞成功');
            }else{
                alert(data.msg);
            }
        }
    })
}
function hiddenBg_1(){
    /*$(".bg_1").hide();
    $(".outer").show();*/
}
function lookBig(member_id){
    $(".blockFloor").hide();
    $("#"+member_id).show();
}
function CloseBig(member_id){
    $("#"+member_id).hide();
}
function updown(){
    location.href='http://a.app.qq.com/o/simple.jsp?pkgname=com.app.spire';
}
</script>
<script>
    var urls="http://share.spai.me/api/index.php?type=getShareKey&url="+encodeURIComponent(location.href.split('#')[0]);
    //var urls='http://share.spai.me/api/index.php?type=getShareKey&url=<?php //echo $TK['share']['shareUrl'] ?>';
    //var shareUrl=location.href.split('#')[0];
    var shareUrl=$(".shareUrl").val();
    var shareTitle=$(".shareTitle").val();
    var shareContent=$(".shareContent").val();
    var shareImg=$(".shareImg").val();
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
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?ff652de7c3fcac2e33a7bdc5ea62d3e1";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>