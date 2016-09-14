/*
1. $("form").submitForm( options )
      url : (string)请求地址
      data : (object)请求数据，除表单外的其他自定义数据
      jquery : (boolean) 默认false，true：强制使用jquery ajax 发送请求，false：优先使用 XMLHttpRequest Level 2，不支持的浏览器使用 jquery ajax；
      submitBtn : (string) 
      beforeSend : (function)
      success : (function)
      complete : (function)
      progress: (function)
2. $("form").GetPostData( [data] )      获取表单数据，data：除表单外的其他自定义数据
*/

!function ($) {
    "use strict";

    var postType = {
        jquery: 'jQuery Ajax',
        xhr2: 'XMLHTTPRequest2'
    }

    $.fn.submitForm2 = function (options) {
        if (!this.is('form')) {
            console && console.error('is not a form');
            return;
        }
        var request = new xhr(this, options);
    }

    var xhr = function (form, options) {
        if (typeof options !== "object") {
            console && console.error('options is not a object');
        }

        var defaultOptions = {
            url: null,
            data: null,
            submitBtn: null,
            beforeSend: null,
            success: null,
            complete: null,
            progress: null,
            jquery: false,
            debug: false
        }
        this.$form = form;
        this.options = $.extend({}, defaultOptions, options);
        var $submitBtn = $(this.options.submitBtn);
        this.$submitBtn = $submitBtn.length > 0 ? $submitBtn : null;
        this.submitBtnText = null;
        this.submitBtnLoadingText = null;
        if (this.$submitBtn) {
            this.submitBtnLoadingText = this.$submitBtn.data('loadingText');
            if (this.$submitBtn.is('button')) {
                this.submitBtnText = this.$submitBtn.text();
            }
            else if (this.$submitBtn.is('input')) {
                this.submitBtnText = this.$submitBtn.val();
            }
        }

        var sendHtml5Ajax = function (xhr, formData) {
            var xhrRequest = new XMLHttpRequest();
            xhrRequest.onloadstart = function () { xhr.onbeforeSend(); }
            xhrRequest.onload = function () { xhr.onsuccess(JSON.parse(xhrRequest.responseText)); }
            xhrRequest.onerror = function () { xhr.onerror(); }
            xhrRequest.onloadend = function () { xhr.oncomplete(); }
            xhrRequest.onabort = function () { xhr.onabort(); }
            xhrRequest.ontimeout = function () { xhr.ontimeout(); }
            xhrRequest.upload.addEventListener("progress", function (evt) { xhr.onprogress(evt); }, false);
            xhrRequest.open('post', xhr.options.url, true);
            xhrRequest.send(formData);
        }
        var sendJqueryAjax = function (xhr, postData) {
            $.ajax({
                url: xhr.options.url,
                data: postData,
                dataType: "json",
                type: "post",
                beforeSend: function () { xhr.onbeforeSend(); },
                success: function (d) { xhr.onsuccess(d); },
                complete: function () { xhr.oncomplete(); }
            });
        }

        if (this.options.jquery || typeof window.FormData === 'undefined') {
            this.postType = postType.jquery;
            var postData = this.$form.GetPostData(this.options.data);
            postData = $.extend({}, postData, this.options.data);
            sendJqueryAjax(this, postData);
        } else {
            this.postType = postType.xhr2;
            var formData = this.$form.GetFormData(this.options.data);
            formData.append('file', this.options.blob);
            sendHtml5Ajax(this, formData);
        }
    }

    xhr.prototype = {
        onbeforeSend: function () {
            this.options.debug && console.debug(this.postType + ':request start');
            this._setSubmitBtnDisabled(true);
            this._setSubmitBtnText(this.submitBtnLoadingText);
            typeof this.options.beforeSend === 'function' && this.options.beforeSend.call(this);
        },
        onsuccess: function (data) {
            this.options.debug && console.debug(this.postType + ':request success ' + 'data : ' + JSON.stringify(data));
            this.options.debug && console.debug(data);
            typeof this.options.success === 'function' && this.options.success.call(this, data);
        },
        onerror: function () {
            this.options.debug && console.debug(this.postType + ':request error');
        },
        oncomplete: function () {
            this.options.debug && console.debug(this.postType + ':request complate');
            this._setSubmitBtnDisabled(false);
            this._setSubmitBtnText(this.submitBtnText);
            typeof this.options.complete === 'function' && this.options.complete.call(this);
        },
        onabort: function () {
            this.options.debug && console.debug(this.postType + ':request abort');
        },
        ontimeout: function () {
            this.options.debug && console.debug(this.postType + ':request timeout');
        },
        onprogress: function (evt) {
            if (evt.lengthComputable) {
                var uploadPercent = Math.round(evt.loaded * 100 / evt.total);
                typeof this.options.progress === 'function' && this.options.progress.call(this, uploadPercent.toString());
            }
        },
        _setSubmitBtnDisabled: function (bool) {
            if (this.$submitBtn && this.$submitBtn.length > 0) {
                this.$submitBtn.prop('disabled', bool);
            }
        },
        _setSubmitBtnText: function (text) {
            if (this.$submitBtn && this.$submitBtn.is('button')) {
                this.$submitBtn.text(text);
            }
            else if (this.$submitBtn && this.$submitBtn.is('input')) {
                this.$submitBtn.val(text);
            }
        }
    }

    $.fn.GetFormData = function (data) {
        if (!this.is('form')) {
            console && console.error('is not a from');
            return null;
        }
        var formData = new FormData(this[0]);
        if (data) {
            for (var i in data) {
                if (data[i] instanceof Array) {
                    for (var j = 0; j < data[i].length; j++) {
                        formData.append(i, data[i][j]);
                    }
                }
                else {
                    formData.append(i, data[i]);
                }
            }
        }
        return formData;
    }
    $.fn.GetPostData = function (data) {
        if (!this.is('form')) {
            console && console.error('is not a from');
            return null;
        }
        var postData = {};
        var tags = this.find('input[type!=radio][name],textarea[name],input[type=radio]:checked');
        if (tags.length > 0) {
            tags.each(function (i, e) {
                var t = $(this);
                var name = t.attr("name");
                var value = t.val();
                if (postData[name] === undefined) {
                    postData[name] = value;
                } else {
                    //name已存在，转为数组
                    if (postData[name] instanceof Array) {
                        postData[name].push(value);
                    } else {
                        var arr = new Array();
                        arr.push(postData[name]);
                        arr.push(value);
                        postData[name] = arr;
                    }
                }
            })
        }
        if (data) {
            postData = $.extend({}, postData, data);
        }
        return postData;
    }

}(window.jQuery)