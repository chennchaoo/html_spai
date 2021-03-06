<!doctype html>
<html lang="zh-cn">
<head>
    <meta name="viewport" content="initial-scale=1, user-scalable=0, minimal-ui" charset="UTF-8">
    <title>S派-尝遍秋色</title>
    <link href="css/style_h.css?t=8" type="text/css" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="css/mui.min.css?t=2">
	<script src="js/public.js"></script>
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
				/*document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');*/
				document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
			}
		})();
		
		 $.ajax({
			type : "GET",
			//async : false,
			dataType : "json",
			url : publicUrl+'m/index.php?',
			success : function(d){
				
			}
		 })
		 
        </script>
</head>
<body>
<div class="bg_1" style="display: none;">
    <div class="bg_1_kong"></div>
    <div class="jianying">
        <div class="jianying_imgs"></div>
    </div>
    <div class="button_1" onclick="hiddenBg_1()"></div>
</div>
<div class="outer" style="display:block">
    
    <div class="inner">
        <div class="lists">
            <div class="bg_kong"></div>
            <div class="rule">
                <img src="img/rule.png">
            </div>
            <div class="blockFloor" style="display:none">
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
            </div>
            <div class="updown">
                <a href="javascript:void(0)"></a>
            </div>
            <!--list start-->
            <div class="voteList">
                <div class="voteList_da">
                    <div class="list_my">
                        <div class="list_left">
                            <div class="list_avatar"><img src="img/list_img.png"></div>               <div class="list_name">王二狗</div>
                        </div>
                        <div class="list_middle">
                            详情详情详情详情详情详情详情详情详情详情
                            详情详情详情详情详情详情详情详情详情详情
                            详情详情详情详情详情详情详情详情详情详情
                            详情详情详情详情详情详情详情详情详情详情
                            详情详情详情详情详情详情详情详情详情详情
                            详情详情详情详情详情详情详情详情详情详情
                            详情详情详情详情详情详情详情详情详情详情
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
                </div>
            </div>
            <!--list stop-->

        </div>
    </div>
</div>

<script src="js/zepto.min.js"></script>
<script src="js/dropload.min.js"></script>
<script src="js/mui.min.js"></script>
<script src="js/mui.zoom.js"></script>
<script src="js/mui.previewimage.js"></script>
<script>

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
		var result = '';
		for(var i = 0; i < 3; i++){
			
			result +=	'<div class="voteList_da">'
              +'<div class="list_my">'
                    +'     <div class="list_left">'
                    +'<div class="list_avatar"><img src="img/list_img.png"></div>'               +'<div class="list_name">王二狗</div>'
                    +'</div>'
                    +'<div class="list_middle">'
                    +'详情详情详情详情详情详情详情详情详情详情详情详情详情详情详情详情详情'
            +'</div>'
            +'<div class="list_right" onclick="lookBig()">'
            +'<img src="img/meinv.jpg">'
            +' </div>'
            +' </div>'
            +' <div class="list_like"><span>12</span></div>'
            +' </div>';
		}
		setTimeout(function(){
			$('.voteList').append(result);
			/*$('.xstd').before(result);*/
			me.resetload();
		},1000);
    }
});
//datas();
function datas(){
	var result = '';
		for(var i = 0; i < 3; i++){
			
			result +=	'<div class="voteList">'
                           + '<div class="list_da">'
                            +    '<div class="list_da_left">'
                             +      ' <div class="list_da_shang">'
                              +          '<div class="list_img"><img src="img/list_img.png" data-preview-src="" data-preview-group="1"></div>'
                               +         '<div class="list_zi">'
                                +            '<div class="list_zi_1">选手:二狗子哈哈</div>'
                                 +           '<div class="list_zi_1">票数：250</div>'
                                  +          '<div class="list_zi_1">排名：第13名</div>'
                                   +     '</div>'
                                    +'</div>'
                                    +'<div class="list_da_xia" onclick="dianzan()"><img src="img/myLog.png"></div>'
                                +'</div>'
                                +'<div class="list_da_left">'
                                 +   '<div class="list_da_shang">'
                                  +      '<div class="list_img"><img src="img/list_img.png" data-preview-src="" data-preview-group="1"></div>'
                                   +     '<div class="list_zi">'
                                    +        '<div class="list_zi_1">选手:二狗子</div>'
                                     +       '<div class="list_zi_1">票数：250</div>'
                                      +      '<div class="list_zi_1">排名：第13名</div>'
                                       + '</div>'
                                    +'</div>'
                                    +'<div class="list_da_xia" onclick="dianzan()"><img src="img/myLog.png"></div>'
                                +'</div>'
                            +'</div>'
                        +'</div>';
		}
		setTimeout(function(){
			/*$('.lists').append(result);*/
			/*$('.list_da').append(result);*/
			$('.xstd').before(result);
			me.resetload();
		},1000);
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
function dianzan(){
    alert('点赞成功');
}
function hiddenBg_1(){
    $(".bg_1").hide();
    $(".outer").show();
}
function lookBig(){
    $(".blockFloor").show();
}
</script>
</body>
</html>