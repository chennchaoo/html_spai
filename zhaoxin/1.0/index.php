<!doctype html>
<html lang="zh-cn">
<head>
    <meta name="viewport" content="initial-scale=1, user-scalable=0, minimal-ui" charset="UTF-8">
    <title>S派</title>
    <link href="css/style_m.css?t=1" type="text/css" rel="stylesheet" media="all" />

	<script src="js/public.js"></script>
    <script src="js/jquery.min.js"></script>
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
            dataType : "json",
            url : publicUrl+'a/?m=share&a=collegeLists',
            success : function(data){
                if(data.code==1){
                    if(data.data.lists.length>0){
                        var resultSchool='';
                        for(var i=0; i<data.data.lists.length;i++){
                            resultSchool+='<option value="'+data.data.lists[i].coid+'">'+data.data.lists[i].name+'</option>';
                        }
                        $(".select_school").append(resultSchool);
                    }
                }else{
                    alert(data.msg);
                }
            }
        })
    </script>
</head>
<body>
    <div class="bg_1" style="display: block;">
        <div class="bg_1_kong"></div>
        <div class="first_word">
            挨过了斯巴达式教育、
            熬过了高考，终于来到了
            传说中可以释放天性，
            自由翱翔的大学。
        </div>
        <div class="select_school_div" onchange="collegeLists()">
            <select class="select_school" >
                <option value="0">探索你的大学</option>
            </select>
        </div>
        <div class="word_2">
            可是心中为什么会有点不舍呢，
            或许是因为再也没有一群一起
            为了同一个目标熬夜奋战的小伙伴了，
            或许自己这辈子再也不会为了一件事
            那么认真了吧。嗯？社团？

        </div>
        <div class="shetuan">
            <div class="shetuan_left">
                <span></span>社团清单
            </div>
            <div class="shetuan_right">
                <select class="shetuan_type"onchange="collegeLists()">
                    <option value="0">类型选择</option>

                </select>
            </div>
        </div>
        <div class="shetuan_list">
            <div class="shetuan_list_1">
                <div class="shetuan_name">
                    社团名称1
                </div>
                <div class="xiangqing" style="display: none">
                    <div class="xiangqing_left">
                        <div class="xiangqing_avatar"><img src=""></div>
                        <div class="shezhang_name">社长:社长名</div>
                    </div>
                    <div class="xiangqing_word">
                            详情详情详情详情详情详情详情

                    </div>
                    <div class="xiangqing_check">
                        报名<input type="checkbox" name="choiceThis" value="1">
                    </div>
                </div>
            </div>
            <div class="shetuan_list_1">
                <div class="shetuan_name">
                    社团名称2
                </div>
                <div class="xiangqing" style="display: none">
                    <div class="xiangqing_left">
                        <div class="xiangqing_avatar"><img src=""></div>
                        <div class="shezhang_name">社长:社长名</div>
                    </div>
                    <div class="xiangqing_word">
                        详情详情详情详情详情详

                    </div>
                    <div class="xiangqing_check">
                        报名<input type="checkbox" name="choiceThis" value="2">
                    </div>
                </div>
            </div>
            <div class="shetuan_list_1">
                <div class="shetuan_name">
                    社团名称3
                </div>
                <div class="xiangqing" style="display: none">
                    <div class="xiangqing_left">
                        <div class="xiangqing_avatar"><img src=""></div>
                        <div class="shezhang_name">社长:社长名</div>
                    </div>
                    <div class="xiangqing_word">
                        详情详情详情详情详情详情详情

                    </div>
                    <div class="xiangqing_check">
                        报名<input type="checkbox" name="choiceThis" value="3">
                    </div>
                </div>
            </div>
            <div class="shetuan_list_1">
                <div class="shetuan_name">
                    社团名称4
                </div>
                <div class="xiangqing" style="display: none">
                    <div class="xiangqing_left">
                        <div class="xiangqing_avatar"><img src=""></div>
                        <div class="shezhang_name">社长:社长名</div>
                    </div>
                    <div class="xiangqing_word">
                        详情详情详情详情详情详情详情

                    </div>
                    <div class="xiangqing_check">
                        报名<input type="checkbox" name="choiceThis" value="4">
                    </div>
                </div>
            </div>

            <!--详情列表 stop-->
        </div>
        <!-- 列表stop-->
        <div class="shetuan_checked">
            <div class="shetuan_checked_left">
                <div class="shetuan_checked_left_1" id="shetuan_1">1) 你所报名的社团<span></span></div>
                <div class="shetuan_checked_left_1" id="shetuan_2">2) 你所报名的社团<span></span></div>
                <div class="shetuan_checked_left_1" id="shetuan_3">3) 你所报名的社团<span></span></div>
            </div>
            <div class="button_baoming"><a href="javascript:void(0)">报名</a></div>
        </div>
    </div>
    <!-- pageOne stop-->
    <!-- pageTwo start-->
    <div class="bg_2" style="display: none">
        <div class="bg_2_kong"></div>
        <div class="bg_2_first_word">
            这好像和高中那会儿简单
            的兴趣爱好式的不一样诶，
            或许在这里我能为自己
            真正喜欢的东西奋斗！

        </div>
        <div class="shetuan_qingdan_word">
            某某大学社团清单
        </div>
        <div class="shetuan_qingdan_list">
            <div class="shetuan_qingdan_1">1) 你所报名的社团# <span></span></div>
            <div class="shetuan_qingdan_1">2) 你所报名的社团</div>
            <div class="shetuan_qingdan_1">3) 你所报名的社团</div>
        </div>
        <div class="form_user">
            <div class="form_input"><label>姓名：</label><input type="text" id="sub_truename" placeholder="请填写姓名"></div>
            <div class="form_input"><label>专业：</label><input type="text" id="sub_specialty"  placeholder="请填写专业"></div>
            <div class="form_input"><label>联系电话：</label><input type="text" id="sub_phone" placeholder="请填写电话"></div>
            <div class="form_input"><label>微信：</label><input type="text"id="sub_weixin" placeholder="请填写微信"></div>
            <div class="form_input"><label>QQ：</label><input type="text" id="sub_qq" placeholder="请填写QQ"></div>
            <div class="form_input" id="form_input">
                <label>自我介绍与特长（选填）</label></br>
                <textarea id="sub_profile">

                </textarea>
            </div>
        </div>
        <div class="button_tijiao"><a href="javascript:void(0)">提交</a></div>
    </div>
    <!-- pageTwo stop-->
    <!-- pageThree start-->
    <div class="bg_3" style="display: none;">
        <div class="bg_3_kong"></div>
        <div class="bg_logo"></div>
        <div class="bg_3_word">
            <div class="bg_word_1">
                <p>开启不一样的大学生活</p>
                <p>专属钥匙已用短信发给你了</p>
                <p>无需注册</p>
                <p>下载S派直接登录即可</p>
            </div>
            <div class="shareToFriend">
                <p>分享至朋友圈</p>
                <p>可获得幸运免费手机流量</p>
            </div>
            <div class="prize_liuliang">
                <p>1G手机流量999人</p>
                <p>500M手机流量1999人</p>
                <p>100M手机流量2999人</p>
                <p>以上手机流量覆盖移动、联通、铁通运营商</p>
            </div>
        </div>
        <div class="buttons">
            <div class="bg_3_button_1"><a href="http://a.app.qq.com/o/simple.jsp?pkgname=com.app.spire">下载S派</a></div>
            <div class="bg_3_button_2"><a href="javascript:void(0)">分享</a></div>
        </div>
    </div>
    <!-- pageThree stop-->
    <input type="hidden" value="0" class="shetuanbianhao">
    <!--分享风格1-->
    <!--<div class="share" style="display: none" onclick="shareHidden()">
        <div class="share_word">怎么分享给朋友？你猜☞</div>
    </div>-->
    <!--分享风格2-->
    <div class="share2" style="display: none" >

    </div>


<script>
    $(".button_baoming").click(function(){
        if($(".shetuanbianhao").val()==0){
            alert('最少选一个社团哦！');
        }else{
            $(".bg_1").hide();
            $(".bg_3").hide();
            $(".bg_2").show();
        }
    })
    $(".bg_3_button_2").click(function(){
        $(".share2").toggle();
    })
    $(".button_tijiao").click(function(){
        var shetuanbianhao = $(".shetuanbianhao").val();
        var cids=shetuanbianhao.substring(0,shetuanbianhao.length-1);
        var truename=$("#sub_truename").val();
        var specialty=$("#sub_specialty").val();
        var phone=$("#sub_phone").val();
        var weixin=$("#sub_weixin").val();
        var qq=$("#sub_qq").val();
        var profile=$("#sub_profile").val();
        if(truename==''){ alert('姓名不能为空');}
        if(specialty==''){ alert('专业不能为空');}
        if(phone==''){ alert('手机号不能为空');}
        if(weixin==''){ alert('微信不能为空');}
        if(qq==''){ alert('QQ不能为空');}

        $.ajax({
            type : "POST",
            dataType : "json",
            url : publicUrl+'a/?m=share&a=register',
            data: 'cids='+cids+'&truename='+truename+'&specialty='+specialty+'&phone='+phone+'&weixin='+weixin+'&qq='+qq+'&profile='+profile,
            success : function(data){
                if(data.code==1){
                    alert('提交成功');
                    $(".bg_2").hide();
                    $(".bg_1").hide();
                    $(".bg_3").show();
                }else{
                    alert(data.msg);
                }
            }
        })
        /*$(".bg_2").hide();
        $(".bg_1").hide();
        $(".bg_3").show();*/
    })
    $(".bg_2").hide();
    $(".bg_1").show();
    $(".bg_3").hide();
    /*function shareHidden(){
        $(".share").hide();
    }
    $(".bg_3_button_2").click(function(){
        $(".share").show();
    })*/
    $("input[type=checkbox]").click(function(){
        if($("input[name=choiceThis]:checked").length>=4){
            $(this).removeAttr("checked");
            alert("最多选3个!");
        }else if($("input[name=choiceThis]:checked").length==0){
            var baoshetuan='<div class="shetuan_checked_left_1" ><span></span></div>';
            $(".shetuan_checked_left").html(baoshetuan);
            $(".shetuanbianhao").val(0);
        }else{
            var baoshetuan='';
            var baoshetuan2='';
            var shetuan_id=1;
            var shetuanbianhao='';
            $("input[name='choiceThis']:checkbox:checked").each(function(){
                baoshetuan+='<div class="shetuan_checked_left_1" id="shetuan_'+shetuan_id+'">'+shetuan_id+')你所报名的社团<span>'+$(this).parent().parent().parent().children('.shetuan_name').html()+'</span></div>';
                baoshetuan2+='<div class="shetuan_qingdan_1" id="shetuans_'+shetuan_id+'">'+shetuan_id+')你所报名的社团<span>'+$(this).parent().parent().parent().children('.shetuan_name').html()+'</span></div>';
                $(".shetuan_checked_left").html(baoshetuan);
                $(".shetuan_qingdan_list").html(baoshetuan);
                shetuanbianhao+=$(this).val()+',';

                $(".shetuanbianhao").val(shetuanbianhao);
                shetuan_id++;

            });
        }
    })
    function collegeLists(){
        //alert('选定后就不能更改了哦！');
        var coid=$(".select_school").find("option:selected").val();
        var school=$(".select_school").find("option:selected").text();
        if($(".shetuan_type").val()==0){
            var typeid='';
        }else{
            var typeid=$(".shetuan_type").val();
        }
        $(".shetuan_left span").html(school);
        $.ajax({
            type : "POST",
            dataType : "json",
            url : publicUrl+'a/?m=share&a=clubLists',
            data: 'coid='+coid+'&typeid='+typeid,
            success : function(data){
                if(data.code==1){
                    alert(typeid);
                    if(typeid<=0){
                        if(data.data.type_lists.length>0){
                            var resultType='<option value="0">类型选择</option>';
                            for(var iType=0; iType<data.data.type_lists.length;iType++){
                                resultType+='<option value="'+data.data.type_lists[iType].typeid+'">'+data.data.type_lists[iType].typename+'</option>';
                            }
                            $(".shetuan_type").html(resultType);
                        }
                    }
                    //alert(data.data.lists.length);
                    if(data.data.lists.length>0){
                        var resultList='';
                        for(var iList=0; iList<data.data.lists.length;iList++){
                            resultList+=
                                '<div class="shetuan_list_1">'
                                +'    <div class="shetuan_name">'
                                +data.data.lists[iList].name
                                +'   </div>'
                                +'   <div class="xiangqing" style="display: none">'
                                +'    <div class="xiangqing_left">'
                                +'    <div class="xiangqing_avatar"><img src="'+data.data.lists[iList].avatar+'"></div>'
                                +'    <div class="shezhang_name">'+data.data.lists[iList].fname+'</div>'
                                +'</div>'
                                +'<div class="xiangqing_word">'
                                +data.data.lists[iList].slogan

                                +'</div>'
                                +'<div class="xiangqing_check">'
                                +'    报名<input type="checkbox" name="choiceThis" value="'+data.data.lists[iList].cid+'">'
                                +'    </div>'
                                +'    </div>'
                                +'    </div>';
                        }
                        //alert(resultList);
                        $(".shetuan_list").html(resultList);
                        $(".shetuan_list_1").click(function(){
                            $(".xiangqing").hide();
                            $(this).children('.xiangqing').toggle();
                        })
                        $("input[type=checkbox]").click(function(){
                            if($("input[name=choiceThis]:checked").length>=4){
                                $(this).removeAttr("checked");
                                alert("最多选3个!");
                            }else if($("input[name=choiceThis]:checked").length==0){
                                var baoshetuan='<div class="shetuan_checked_left_1" ><span></span></div>';
                                $(".shetuan_checked_left").html(baoshetuan);
                                $(".shetuanbianhao").val(0);
                            }else{
                                var baoshetuan='';
                                var baoshetuan2='';
                                var shetuan_id=1;
                                var shetuanbianhao='';
                                $("input[name='choiceThis']:checkbox:checked").each(function(){
                                    baoshetuan+='<div class="shetuan_checked_left_1" id="shetuan_'+shetuan_id+'">'+shetuan_id+')你所报名的社团<span>'+$(this).parent().parent().parent().children('.shetuan_name').html()+'</span></div>';
                                    baoshetuan2+='<div class="shetuan_qingdan_1" id="shetuans_'+shetuan_id+'">'+shetuan_id+')你所报名的社团<span>'+$(this).parent().parent().parent().children('.shetuan_name').html()+'</span></div>';
                                    $(".shetuan_checked_left").html(baoshetuan);
                                    $(".shetuan_qingdan_list").html(baoshetuan);
                                    shetuanbianhao+=$(this).val()+',';
                                    $(".shetuanbianhao").val(shetuanbianhao);
                                    shetuan_id++;

                                });
                            }
                        })
                    }
                }else{
                    alert(data.msg);
                }
            }
        })
    }
    $(document).ready(function(){
        $(".shetuan_list_1").click(function(){
            $(".xiangqing").hide();
            $(this).children('.xiangqing').toggle();
        })
    })
</script>
</body>
</html>