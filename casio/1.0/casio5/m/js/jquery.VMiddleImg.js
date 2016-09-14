/*
*  costa
*/
(function ($) {
    $.fn.VMiddleImg = function (options) {
        var defaults = {
            "width": null,
            "height": null
        };
        var opts = $.extend({}, defaults, options);
        return $(this).each(function () {
            var $this = $(this);
            var parentHeight = opts.height || $this.parent().height(); //图片父容器高度
            var parentWidth = opts.width || $this.parent().width(); //图片父容器宽度
            var objHeight = $this.height() == 0 ? ($this.width() / $this[0].width) * $this[0].height : $this.height(); //图片高度
            var objWidth = $this.width(); //图片宽度

            var objRatio = objHeight / objWidth;
            var parentRatio = parentHeight / parentWidth;
            if (parentRatio > objRatio) {
                $this.height(parentHeight);
                $this.width(parentHeight / objRatio);
                if (isAbsolute($this)) {
                    $this.css("left", (parentWidth - $this.width()) / 2);
                }
                else {
                    $this.css("margin-left", (parentWidth - $this.width()) / 2);
                }
            }
            else {
                $this.width(parentWidth);
                $this.height(parentWidth * objRatio);
                if (isAbsolute($this)) {
                    $this.css("top", (parentHeight - $this.height()) / 2);
                }
                else {
                    $this.css("margin-top", (parentHeight - $this.height()) / 2);
                }
            }
        });
    };
    function isAbsolute(obj) {
        return obj.css("position") == "absolute";
    }
})(jQuery);
