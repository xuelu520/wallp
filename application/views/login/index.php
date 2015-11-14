
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>哇扑-后台登陆</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://libs.useso.com/js/font-awesome/4.0.3/css/font-awesome.min.css" />

    <style>
        body{
            font-family: 'microsoft yahei',Arial,sans-serif;
            background-color: #222;
            background:url("/public/image/login-back.jpg");
            background-repeat:no-repeat;
        }

        .row {
            padding: 20px 0px;
        }


        .loginpanel {
            text-align: center;
            width: 300px;
            border-radius: 0.5rem;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 200px auto;
            background-color: #555;
            padding: 20px;
        }

        input {
            width: 100%;
            margin-bottom: 17px;
            padding: 15px;
            background-color: #ECF4F4;
            border-radius: 2px;
            border: none;
        }

        h2 {
            margin-bottom: 20px;
            font-weight: normal;
            color: #EFEFEF;
        }

        .btn {
            border-radius: 2px;
            padding: 10px;
        }

        .btn span {
            font-size: 27px;
            color: white;
        }

        .buttonwrapper{
            position:relative;
            overflow:hidden;
            height:50px;
        }



        .loginbutton {
            background-color: #09f087;
            width: 100%;
            -webkit-border-top-right-radius: 0;
            -webkit-border-bottom-right-radius: 0;
            -moz-border-radius-topright: 0;
            -moz-border-radius-bottomright: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            left: 0px;
            border-radius: 0.3rem;
            position:absolute;
            top:0;
        }
    </style>
</head>
<body>

<!-- Interactive Login - START -->
<div class="container-fluid">
    <div class="row">
        <div class="loginpanel" >
            <h2>
                <span class="fa fa-quote-left "></span> 哇扑-管理员 <span class="fa fa-quote-right "></span>
            </h2>
            <div>
                <input id="username" type="text" placeholder="管理员账号呐，这都不知道？" >
                <input id="pwd" type="password" placeholder="密码密码密码，重要的说三遍！！！">
                <div class="buttonwrapper">
                    <button id="loginbtn" class="btn btn-primary loginbutton">
                        登入
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $('#loginbtn').bind('click',function(){
            $(this).disabled = true;
            var username = $('#username').val() || "";
            var pwd = $('#pwd').val() || "";
            $.ajax({
                url:'/login/login_action',
                type:'POST',
                dataType:'json',
                data:{'username':username,'pwd':pwd}
            }).done(function(res){
                if(res.status == '1001'){
                    //登录成功
                    window.location.href = "/wall";
                }else{
                    $('#loginbtn').disabled = false;
//                    console.log('账号密码错误！');
                    alert('账号密码错误！');
                }
            }).fail(function(res){
                $('#loginbtn').disabled = false;
//                console.log('账号密码错误！');
                alert('账号密码错误！');

            });
        });
    });
</script>
</body>
</html>