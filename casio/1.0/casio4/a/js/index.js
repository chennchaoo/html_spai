window.onerror = function (errMsg, scriptURI, lineNumber, columnNumber, errorObj) {
    setTimeout(function () {
        var rst = {
            "错误信息：": errMsg,
            "出错文件：": scriptURI,
            "出错行号：": lineNumber,
            "出错列号：": columnNumber,
            "错误详情：": errorObj
        };

        //alert('出错了，下一步将显示错误信息');
        //alert(JSON.stringify(rst, null, 10));
    });
};


[].forEach.call(document.querySelectorAll('[data-src]'), function (el) {
    (function (el) {
        el.addEventListener('click', function () {
            el.src = 'img/loading.gif';

            lrz(el.dataset.src)
                .then(function (rst) {
                    el.src = rst.base64;


                    return rst;
                });
        });

        fireEvent(el, 'click');
    })(el);
});


document.querySelector('input').addEventListener('change', function () {
    var that = this;

    lrz(that.files[0], {
        width: 1024
    })
        .then(function (rst) {
            var img        = new Image(),
                div        = document.createElement('div'),
                p          = document.createElement('p'),
                sourceSize = toFixed2(that.files[0].size / 1024),
                resultSize = toFixed2(rst.fileLen / 1024),
                scale      = parseInt(100 - (resultSize / sourceSize * 100));

            /* ==================================================== */
            // 原生ajax上传代码，所以看起来特别多 ╮(╯_╰)╭，但绝对能用
            // 其他框架，例如ajax处理formData略有不同，请自行google，baidu。
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/upload');

            xhr.onload = function () {
                if (xhr.status === 200) {
                    // 上传成功
                } else {
                    // 处理其他情况
                }
            };

            xhr.onerror = function () {
                // 处理错误
            };

            xhr.upload.onprogress = function (e) {
                // 上传进度
                var percentComplete = ((e.loaded / e.total) || 0) * 100;
            };

            // 添加参数和触发上传
            rst.formData.append('a', '我是参数');
            xhr.send(rst.formData);
            /* ==================================================== */

            console.info('这里有一段ajax请求，看见出错是正常的');

            p.style.fontSize = 13 + 'px';
            /*p.innerHTML      = '源文件：<span class="text-danger">' +
                sourceSize + 'KB' +
                '</span> <br />' +
                '压缩后传输大小：<span class="text-success">' +
                resultSize + 'KB (省' + scale + '%)' +
                '</span> ';*/

            div.className = 'col-sm-6';
            div.appendChild(img);
            div.appendChild(p);

            img.onload = function () {
                that.parentNode.appendChild(div);
            };

            img.src = rst.base64;
			/*avatar=base64encode(img.src);
			alert(avatar);
			$.ajax({
				type:"POST",
				url: 'http://boss.taskou.com/a/?m=common&a=uploadImage',
				dataType: 'json',
				data:'pics='+avatar,
				success:function(data){
					if(data.code==1){
						alert(data.data.img_url);
						$(".img_2").val(data.data.img_url);
						//var avatar_2=data.data.img_url;
					}else{alert(data.msg)}
				}
			})*/
            return rst;
        });
});

document.querySelector('#version').innerHTML = lrz.version;
document.querySelector('.UA').innerHTML      = 'UA: ' + navigator.userAgent;

function toFixed2 (num) {
    return parseFloat(+num.toFixed(2));
}

/**
 * 替换字符串 !{}
 * @param obj
 * @returns {String}
 * @example
 * '我是!{str}'.render({str: '测试'});
 */
String.prototype.render = function (obj) {
    var str = this, reg;

    Object.keys(obj).forEach(function (v) {
        reg = new RegExp('\\!\\{' + v + '\\}', 'g');
        str = str.replace(reg, obj[v]);
    });

    return str;
};

/**
 * 触发事件 - 只是为了兼容演示demo而已
 * @param element
 * @param event
 * @returns {boolean}
 */
function fireEvent (element, event) {
    var evt;

    if (document.createEventObject) {
        // IE浏览器支持fireEvent方法
        evt = document.createEventObject();
        return element.fireEvent('on' + event, evt)
    }
    else {
        // 其他标准浏览器使用dispatchEvent方法
        evt = document.createEvent('HTMLEvents');
        // initEvent接受3个参数：
        // 事件类型，是否冒泡，是否阻止浏览器的默认行为
        evt.initEvent(event, true, true);
        return !element.dispatchEvent(evt);
    }
}

//base64
var base64encodechars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
var base64decodechars = new Array(
-1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
-1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
-1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 62, -1, -1, -1, 63,
52, 53, 54, 55, 56, 57, 58, 59, 60, 61, -1, -1, -1, -1, -1, -1,
-1, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14,
15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, -1, -1, -1, -1, -1,
-1, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40,
41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, -1, -1, -1, -1, -1);

function base64encode(str) {
var out, i, len;
var c1, c2, c3;
len = str.length;
i = 0;
out = "";
while (i < len) {
c1 = str.charCodeAt(i++) & 0xff;
if (i == len) {
out += base64encodechars.charAt(c1 >> 2);
out += base64encodechars.charAt((c1 & 0x3) << 4);
out += "==";
break;
}
c2 = str.charCodeAt(i++);
if (i == len) {
out += base64encodechars.charAt(c1 >> 2);
out += base64encodechars.charAt(((c1 & 0x3) << 4) | ((c2 & 0xf0) >> 4));
out += base64encodechars.charAt((c2 & 0xf) << 2);
out += "=";
break;
}
c3 = str.charCodeAt(i++);
out += base64encodechars.charAt(c1 >> 2);
out += base64encodechars.charAt(((c1 & 0x3) << 4) | ((c2 & 0xf0) >> 4));
out += base64encodechars.charAt(((c2 & 0xf) << 2) | ((c3 & 0xc0) >> 6));
out += base64encodechars.charAt(c3 & 0x3f);
}
return out;
}

function base64decode(str) {
var c1, c2, c3, c4;
var i, len, out;

len = str.length;n

i = 0;
out = "";
while (i < len) {

do {
c1 = base64decodechars[str.charCodeAt(i++) & 0xff];
} while (i < len && c1 == -1);
if (c1 == -1)
break;

do {
c2 = base64decodechars[str.charCodeAt(i++) & 0xff];
} while (i < len && c2 == -1);
if (c2 == -1)
break;

out += String.fromCharCode((c1 << 2) | ((c2 & 0x30) >> 4));

do {
c3 = str.charCodeAt(i++) & 0xff;
if (c3 == 61)
return out;
c3 = base64decodechars[c3];
} while (i < len && c3 == -1);
if (c3 == -1)
break;

out += String.fromCharCode(((c2 & 0xf) << 4) | ((c3 & 0x3c) >> 2));

do {
c4 = str.charCodeAt(i++) & 0xff;
if (c4 == 61)
return out;
c4 = base64decodechars[c4];
} while (i < len && c4 == -1);
if (c4 == -1)
break;
out += String.fromCharCode(((c3 & 0x03) << 6) | c4);
}
return out;
}
//base64
/**
 *
 * 　　　┏┓　　　┏┓
 * 　　┏┛┻━━━┛┻┓
 * 　　┃　　　　　　　┃
 * 　　┃　　　━　　　┃
 * 　　┃　┳┛　┗┳　┃
 * 　　┃　　　　　　　┃
 * 　　┃　　　┻　　　┃
 * 　　┃　　　　　　　┃
 * 　　┗━┓　　　┏━┛Code is far away from bug with the animal protecting
 * 　　　　┃　　　┃    神兽保佑,代码无bug
 * 　　　　┃　　　┃
 * 　　　　┃　　　┗━━━┓
 * 　　　　┃　　　　　 ┣┓
 * 　　　　┃　　　　 ┏┛
 * 　　　　┗┓┓┏━┳┓┏┛
 * 　　　　　┃┫┫　┃┫┫
 * 　　　　　┗┻┛　┗┻┛
 *
 */
