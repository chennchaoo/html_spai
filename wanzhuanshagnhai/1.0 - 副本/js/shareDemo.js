
function shareDemo(urls,shareUrl,shareTitle,shareContent,shareImg){
	
alert(urls);
alert(shareUrl);
alert(shareTitle);
alert(shareContent);
alert(shareImg);
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
}