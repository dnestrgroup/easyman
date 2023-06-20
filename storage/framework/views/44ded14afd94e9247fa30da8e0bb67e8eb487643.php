<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
 <title> Easyman messenger Chatroom </title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta http-equiv="Content-Language" content="ru" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            
            <meta name="keywords" content="chatroom, messenger">
            <meta name="description" content="private room, leave message">

            <link rel="icon" href="public/images/favicon.ico" type="image/x-icon">
            <link rel="shortcut icon" href="public/images/favicon.ico" type="image/x-icon">

                <link rel="stylesheet" type="text/css" href="public/css/chat/style-chatroom-body.css" />
                <link rel="stylesheet" type="text/css" href="public/css/chat/style-chatroom-fonts.css" />
                <link rel="stylesheet" type="text/css" href="public/css/chat/style-chatroom-links.css" />
                <link rel="stylesheet" type="text/css" href="public/css/chat/style-chatroom-objects.css" />

                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
                <script type="text/javascript" src="public/js/jquery.min.js"></script>
                <script type="text/javascript" src="public/js/easyman-scripts.js"></script>

</head>
<body>


<script type="text/javascript">
/* Конструкия прокрутивает сообщения чата вверх для просмотра свежих смс */
window.onload = function() {
 document.getElementById('content_chat').scrollTop = 9999;
}
</script>

<?php
    // Извлекаем сессионные переменные, которые были созданы в моделе Chatlogic
    $room_number = Session::get('logged_roomno'); // Номер комнаты в которой находится пользователь
    $room_name = Session::get('logged_roomname'); // Имя комнаты в которой находится пользователь
?>

<!-- =========== HEADER WHITE LONG ===========  -->
<div id="header">
    <div class="wrapper">

        <div class="header__menu-long">
            <div class="header__menu-long_room"> 
                <font class="header__font-light"> <?php echo 'Room № '.$room_number.' ['.$room_name.']'; ?> </font>
            </div>
            <div class="header__menu-long_help"> <div class="header__helplog-link"> <a href="#"> [Help] </a> </div> </div>
            <div class="header__menu-long_close"> <div class="header__helplog-link"> <a href="/exitroom"> [Exit Room] </a> </div> </div>
            <div class="header__menu-long_logout"> <div class="header__helplog-link"> <a href="/logoutsystem"> [Log out system] </a> </div> </div>
        </div>

    </div>
</div>
<!-- 
    HELP - in new window
    1. If u press Close, the website will remember your account and u can enter any room without log and pass
    2. If u press Exit, u are going to sign in the systen again to chat
    3. new messeges are in the top of chat (the experemental feature, because people privilki read from top to down the page)
-->

<!-- =========== MENU BLOCK LIGHT-GREY ===========  -->
<div id="chatblock">
    <div class="wrapper">

        <div id="content_chat"> 
            <!-- В этот блок AJAX помещает информацию через функцию show() -->
        </div>

    </div>
</div>



<!-- =========== FOOTER ===========  -->
<div id="sendersms">
    <div class="wrapper">

        <div class="sendersms__field-text-and-button">
            <div class="sendersms__field-text">
                <input type ="text" name="html_user_message" size="18" placeholder="sms text" class="input_bar_sms" id="data_1" />
            </div>
            <div class="sendersms__field-button">
                <div class="button_send_sms">
                    <a href="#" onclick="SendRequest(); return false"> send &#10004; </a>
                </div>
            </div>
        </div>

    </div>
</div>


</body>
</html><?php /**PATH E:\OpenServer529premium\OSPanel\domains\localhost\resources\views/chat.blade.php ENDPATH**/ ?>