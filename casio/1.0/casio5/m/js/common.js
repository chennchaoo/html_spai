//返回表单提交的数据(object)，若对象中包含数组，则返回array
//format='attr'，则数组返回多个属性   如：name[0]
$.fn.getFormData = function (format) {
    var tags = this.find('input[type!=radio][type!=checkbox][name],textarea[name],input[type=radio]:checked,input[type=checkbox]:checked');
    var formData = {};
    if (tags.length > 0) {
        tags.each(function (i, e) {
            var t = $(this);
            var name = t.attr("name");
            var value = t.val();

            if (t.attr('type') == 'checkbox') {
                if (t.attr('value') == 'boolean' || t.attr('value') == 'bool') {
                    value = t.prop('checked');
                } else {
                    value = t.val();
                }
            }

            if (formData[name] === undefined) {
                formData[name] = value;
            } else {
                //name已存在，转为数组
                if (formData[name] instanceof Array) {
                    formData[name].push(value);
                } else {
                    var arr = new Array();
                    arr.push(value);
                    arr.push(formData[name]);
                    formData[name] = arr;
                }
            }

        })
    }
    if (format == 'attr') {
        for (var i in formData) {
            if (formData[i] instanceof Array) {
                for (var j = 0; j < formData[i].length; j++) {
                    formData[i + '[' + j + ']'] = formData[i][j];
                }
                delete formData[i];
            }
        }
    }
    return formData;
}