<?php 
    include 'include/themplate/header.php';
        if($_SESSION['id']=="")
            {
?>
<script type="text/javascript" language="javascript">
    function auth() {
      var msg   = $('#auth').serialize();
        $.ajax({
          type: 'POST',
          url: '/function/auth.php',
          data: msg,
          success: function(data) {
            $('#result_auth').html(data);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

    }
</script>
</head>
<body>
<div id="topNav">
    <div class="fixed">
        <div class="wrapper">
            <div class="backTo"><a href="#" title=""><img src="images/icons/topnav/mainWebsite.png" alt="" /><span>Вернуться на сайт</span></a></div>
            <div class="userNav">
                <ul>
                    <li><a href="#" title=""><img src="images/icons/topnav/contactAdmin.png" alt="" /><span>Помощь</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="loginWrapper">
	<div class="loginLogo"><img src="images/loginLogo.png" alt="" /></div>
    <div class="loginPanel">
        <div class="head"><h5 class="iUser">Авторизация</h5></div>
        <form  method="POST" id="auth" action="javascript:void(null);" onsubmit="auth()" class="mainForm">
            <fieldset>
                <div class="loginRow noborder">
                    <label for="req1">Логин:</label>
                    <div class="loginInput"><input type="text" name="login" class="validate[required]" id="req1" /></div>
                </div>
                <div class="loginRow">
                    <label for="req2">Пароль:</label>
                    <div class="loginInput"><input type="password" name="password" class="validate[required]" id="req2" /></div>
                </div>
                <div class="loginRow">
                    <div class="submitForm"><input type="submit" value="Войти" class="redBtn" /></div>
                </div>
				<div id="result_auth"></div>
            </fieldset>
        </form>
    </div>
</div>
<?php 
include 'include/themplate/footer.php';
        }
    else
        {
            echo '<script language="JavaScript"> window.location.href = "/home.php"</script>';
        }
?>