/**
 * Created by Administrator on 2016/2/17.
 */
    $(".select p").click(function(e){
        $(".select").toggleClass('open');
        e.stopPropagation();
    });
    $(".content .select ul li").click(function(e){
        var _this=$(this);
        $(".select > p").text(_this.attr('data-value'));
        _this.addClass("Selected").siblings().removeClass("Selected");
        $(".select").removeClass("open");
        e.stopPropagation();
    });

    //$(document).on('click',function(){
    //    $(".select").removeClass("open");
    //});

    $("#select_class li").click(
        function(){
            var obj=$(".Selected");
            value1=obj.attr("value1");
            //window.alert(value);
            $("#fill_class").val(value1);
        }
    );

    $("#submit_info").click(function(){
        //获取姓名 原密码 新密码 class_id
        var user_name=$("#name").val();
        var before_password=$("#before_password").val();
        var set_password=$("#set_password").val();
        var reset_password=$("#reset_password").val();
        var class_id=$("#fill_class").val();
        if(set_password!=reset_password){
            window.alert("两次新密码输入不一致");
            return false;
        }
        if(set_password.length<4&&!set_password){
            window.alert("新密码位数太少");
            return false;
        }
        if(!before_password){
            alert("请输入原密码");
            return false;
        }
        //window.alert(user_name+"--"+before_password+"--"+set_password+"--"+reset_password+"--"+class_id);
        $.ajax({
            type: 'POST',
            url: "../Index/alterInfo",
            data: {user_name:user_name,before_password:before_password,set_password:set_password,class_id:class_id},
            success:
                function(status) {
                    if(status==1){
                        alert("成功修改");
                    }else if(status==0){
                        alert("修改失败");
                    }

                }
        });

    });