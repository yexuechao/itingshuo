/**
 * Created by Administrator on 2016/2/17.
 */
    $("#select_class li").click(
        function(){
            var obj=$(".Selected");
            value1=obj.attr("value1");
            //window.alert(value);
            $("#fill_class").val(value1);
        }
    );
    $("form").submit(
        function(){
            if($("#set_password").val()!=$("#reset_password").val()){
                window.alert("两次输入的密码不一致");
                return false;
            }
            if(!$("#user_name").val()||!$("#set_password").val()||!$("#fill_class").val()){
                window.alert("注册信息错误");
                return false;
            }
        }
    )
