<!doctype html>
<html>
 <head>
	<meta charset="UTF-8">
	<meta name="Generator" content="EditPlus®">
	<meta name="Author" content="">
	<meta name="Keywords" content="">
	<meta name="Description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE"> 
	<meta name="renderer" content="webkit">
	<title>用户注册</title>
    <link rel="shortcut icon" type="image/x-icon" href="theme/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="theme/css/base.css">
	<link rel="stylesheet" type="text/css" href="theme/css/login.css">
    <script type="text/javascript" src="/theme/js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="/theme/js/jquery-3.1.1.min.js"></script>
    <style>
    .msgs{display:inline-block;width:104px;color:#fff;font-size:12px;border:1px solid #0697DA;text-align:center;height:40px;line-height:40px;background:#0697DA;cursor:pointer;}
    </style> 
    <meta name="csrf-token" content="{{ csrf_token() }}">
 </head>
 <body>

<!--- header begin-->
<header id="pc-header">
    <div class="login-header" style="padding-bottom:0">
        <div><h1><a href="index.html"><img src="theme/icon/logo.png"></a></h1></div>
    </div>
</header>
<style>
    #name{font-size:15px;color:red;position:absolute;right:300px;top:240px;}
    #pwd{font-size:15px;color:red;position:absolute;right:470px;top:300px;}
    #repwd{font-size:15px;color:red;position:absolute;right:470px;top:360px;}
    #eamil{font-size:15px;color:red;position:absolute;right:463px;top:420px;}
    #phone{font-size:15px;color:red;position:absolute;right:360px;top:485px;}
    #code{font-size:15px;color:red;position:absolute;right:650px;top:550px;}
</style>
<!-- header End -->



<section id="login-content">
    <div class="login-centre">
        <div class="login-switch clearfix">
            <p class="fr">我已经注册，现在就<a href="/homelogin">登录</a></p>
        </div>
        <div class="login-back">
            <div class="H-over">
                <form action="/homeregCheck" method="post" onsubmit="return checkAll();">
                    {{csrf_field()}}
                    <div class="login-input">
                        <label><i class="heart">*</i>用户名：</label>
                        <input type="text" class="list-input1" id="username" name="user_name" placeholder="请输入用户名" onblur="checkUsername('username', 'usernameInfo')" onfocus="clearInfo('usernameInfo')" style="width:300px;">
                    </div>
                    <div id="name">
                        <span id="usernameInfo"></span>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>请设置密码：</label>
                        <input type="password" class="list-input" id="pass" name="user_pwd" placeholder="请输入密码" onblur="checkPassword('pass', 'passwordInfo')" onfocus="clearInfo('passwordInfo')" style="width:300px;">
                    </div>
                    <div id="pwd">
                        <span id="passwordInfo"></span>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>请确认密码：</label>
                        <input type="password" class="list-input" id="passwordAgain" name="user_repwd" placeholder="请再次输入密码" onblur="checkPasswordAgain('pass', 'passwordAgain', 'passwordAgainInfo')" onfocus="clearInfo('passwordAgainInfo')"  style="width:300px;">
                    </div>
                    <div id="repwd">
                        <span id="passwordAgainInfo"></span>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>请确认邮箱：</label>
                        <input type="email" class="list-input" id="email" name="user_email" placeholder="请输入邮箱" onblur="checkEmail('email', 'emailInfo')" onfocus="clearInfo('emailInfo')"  style="width:300px;">
                    </div>
                    <div id="eamil">
                        <span id="emailInfo"></span>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>手机号：</label>
                        <input type="phone" class="list-input" id="tel" name="user_phone" placeholder="请输入手机号" onblur="checkTel('tel', 'telInfo')" onfocus="clearInfo('telInfo')"  style="width:300px;">
                       <a href="javascript:;" class="msgs">获取短信验证码</a>
                    </div>
                    <div id="phone">
                        <span id="telInfo"></span>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>短信验证码：</label>
                        <input type="text" class="list-notes" id="message" name="code" placeholder="" onblur="checkCode('message', 'codeInfo')" onfocus="clearInfo('codeInfo')" >
                    </div>

                     <div id="code">
                        <span id="codeInfo"></span>
                    </div>

                    <div class="item-ifo">
                        <input type="checkbox" onClick="agreeonProtocol();" id="agreement"  class="checkbox">
                        <label for="protocol">我已阅读并同意<a id="protocol" class="blue" href="#">《悦商城用户协议》</a></label>
                        <span class="clr"></span>
                    </div>
                    <div class="login-button">
                        <!-- <a href="#">立即注册</a> -->
                        <input type="submit" value="立即注册" style="width:300px;height:50px;font-size:19px;background:#ccc;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!--- footer begin-->
<footer id="footer">
    <div class="containers">
        <div class="w" style="padding-top:30px">
            <div id="footer-2013">
                <div class="links">
                    <a href="">关于我们</a>
                    |
                    <a href="">联系我们</a>
                    |
                    <a href="">人才招聘</a>
                    |
                    <a href="">商家入驻</a>
                    |
                    <a href="">广告服务</a>
                    |
                    <a href="">手机京东</a>
                    |
                    <a href="">友情链接</a>
                    |
                    <a href="">销售联盟</a>
                    |
                    <a href="">English site</a>
                </div>
                <div style="padding-left:10px">
                    <p style="padding-top:10px; padding-bottom:10px; color:#999">网络文化经营许可证：浙网文[2013]0268-027号| 增值电信业务经营许可证：浙B2-20080224-1</p>
                    <p style="padding-bottom:10px; color:#999">信息网络传播视听节目许可证：1109364号 | 互联网违法和不良信息举报电话:0571-81683755</p>
                </div>
            </div>
        </div>

    </div>
</footer>
<!-- footer End -->
</body>
</html>
<script type="text/javascript">
        $.ajaxSetup({ headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});
    /*
         账号：6~10位字母、数字、下划线，第一个字符必须是字母
             /^[a-zA-Z][\w]{5,9}$/
         密码：6~10位数字
             /^[\d]{6,10}$/
     * */
    //验证用户名
    function checkUsername(id, infoId){
        var reg = /^[a-zA-Z][\w]{5,9}$/;
        var txtUsername= document.getElementById(id).value;
        if(!reg.test(txtUsername)){
            setInfo(infoId,'用户名必须为6-10位字母数字，首位必须字母');
            return false;
        }else if(reg.test(txtUsername)){
            // 获取文本框
            var obj = $('#username');
            var userName = obj.val();
            // alert(userName);
            $.get('/homeregCheckName',{userName:userName},function(data){
                if(data == 0){
                    setInfo(infoId,'用户名已存在');
                    window.a = false;
                }else{
                    window.a = true;
                }
            })
        }
        return true;
    }

    //设置提示信息
    function setInfo(id, info){
        document.getElementById(id).innerText=info;
    }
    
    //验证密码
    function checkPassword(id, infoId) {
        var reg = /^[a-zA-Z\d_]{8,}$/;
        var txtPassword = document.getElementById(id).value;
        if(!reg.test(txtPassword)) {
            setInfo(infoId,'密码必须为8位以上');
            return false;
        }
        return true;
    }
    //重复密码
    function checkPasswordAgain(pwd1, pwd2, infoId){
        var txtPwd1 = document.getElementById(pwd1).value;
        var txtPwd2 = document.getElementById(pwd2).value;
        if(txtPwd1!= txtPwd2){
            setInfo(infoId, "两次密码输入不一致");
            return false;
        }
        var reg =  /^[a-zA-Z\d_]{8,}$/;
        if(!reg.test(txtPwd2)) {
            setInfo(infoId,'密码必须为8位以上');
            return false;
        }
        return true;
    }
    
    
    //电子邮箱
    function checkEmail(id, infoId) {
        var reg = "/^[\w!#$%&'*+/=?^_`{|}~-]+(?:\.[\w!#$%&'*+/=?^_`{|}~-]+)*@(?:[\w](?:[\w-]*[\w])?\.)+[\w](?:[\w-]*[\w])?$/";
        var txtEmail = document.getElementById(id).value;
        if(!reg.test(txtEmail)) {
            setInfo(infoId, '请输入正确邮箱地址');
            return false;
        }
        return true;
    }
        
    //电话号码
    function checkTel(id, infoId) {
        var reg = /^[1][0-9]{10}$/;
        var txtTel = document.getElementById(id).value;
        if(!reg.test(txtTel)) {
            setInfo(infoId,'请输入正确手机号');
            return false;
        }
        return true;
    }
        //清除信息
    function clearInfo(id) {
        document.getElementById(id).innerText=" ";
    }
    
    //校验所有表单元素的内容
    function checkAll() {
        if(checkUsername('username','usernameInfo')&checkPassword('pass', 'passwordInfo')&checkPasswordAgain('pass', 'passwordAgain', 'passwordAgainInfo')&checkEmail('email', 'emailInfo')&checkTel('tel', 'telInfo') && window.a && window.b && window.c) {
            return true;
        }
            return false;
    }
    // 验证码
    $(function  () {
    //获取短信验证码
    var validCode=true;
        $(".msgs").click (function  () {
            // 获取手机号
            var phone = $(".msgs").prev();
            var phonere = phone.val();

            if(!checkTel('tel','telInfo')){
                return false;
            }
            var time=60;
            var code=$(this);
            if (validCode) {
                validCode=false;
                code.addClass("msgs1");
                // alert(phonere);
                $.get('/homeregPhone',{phonere:phonere},function(){
                });
            var t=setInterval(function  () {
                time--;
                code.html(time+"秒");
                if (time==0) {
                    clearInterval(t);
                code.html("重新获取");
                    validCode=true;
                code.removeClass("msgs1");
                }
            },1000)
            }
        })
    })
    function checkCode(id, infoId){
    // 校验码检测
    $("input[name='code']").blur(function(){
        // 获取输入的校验码
        code = $(this).val();
        // ajax验证
        $.get('/homeregCode',{code:code},function(data){
            // alert(data);
            if(data == 1){
                window.b = true;
            }else{
                window.b = false;
                setInfo(infoId,'请输入正确的验证码');
            }
        });
    });
}
    // 协议
    function agreeonProtocol(){
        if(document.getElementById("agreement").checked == false){
            window.c = false;
        }else{
            window.c = true;

        }
    }
</script>
<script>

</script>
