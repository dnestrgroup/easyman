<?php 
//    use Session;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
 <title> Easyman eternal messenger for every day use </title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta http-equiv="Content-Language" content="ru" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            
            <meta name="keywords" content="messenger, easyman, web, reception, corporate">
            <meta name="description" content="Easyman web messenger, Stay connected anywhere in the world, use for corporate purposes without Internet connection, requires little traffic, need only browser to use, does not require updates, works on different devices and operating systems PC laptop tablet or cell phone, no phone number no email verification">

            <link rel="icon" href="public/images/favicon.ico" type="image/x-icon">
            <link rel="shortcut icon" href="public/images/favicon.ico" type="image/x-icon">

                <link rel="stylesheet" type="text/css" href="public/css/index/style-index-body.css" />
                <link rel="stylesheet" type="text/css" href="public/css/index/style-index-fonts.css" />
                <link rel="stylesheet" type="text/css" href="public/css/index/style-index-links.css" />
                <link rel="stylesheet" type="text/css" href="public/css/index/style-index-objects.css" />

</head>
<body>

<script type="text/javascript">
function toggle_show(id) {
        document.getElementById(id).style.display = document.getElementById(id).style.display == 'none' ? 'block' : 'none';
}
</script>


<!-- =========== HEADER WHITE LONG ===========  -->
<a name="anchor_header"></a>
<div id="header">
    <div class="wrapper">

        <div class="header__left-part">
            <div class="header__left-banner_align">
                <img src="public/images/index/logo-easy-fingers.png" width="200" alt="easy-fingers-logotype">
            </div>
        </div>

        <div class="header__right-part">
            <div class="header__right-language_align">
                <div class="header__link-language"> <a href="#"> RUS </a> </div>
                <div class="header__link-language"> <a href="#"> ENG </a> </div>
                <div class="header__language-rightimg"> <img src="public/images/index/globus-lang.png" width="20" alt="messenger-language"> </div>
            </div>
        </div>

    </div>
</div>



<!-- =========== MENU BLOCK LIGHT-GREY ===========  -->
<div id="menublock">
    <div class="wrapper">

        <div class="menublock__upper-part">
            <div class="menublock__menu-style"> 
                <a href="#anchor_header"> Home </a> 
                <a href="#anchor_reception"> Reception </a> 
                <a href="#anchor_howto"> HowTo </a> 
                <a href="#anchor_about"> About </a> 
            </div>
            
        </div>
        <div class="menublock__lower-part">
            <div class="menublock__submenu-description">
                <br>
                <p> <b> Stay connected anywhere in the world </b> <br>
                    Sign up once, Create different private rooms and give keys to your friends. <br>
                </p>
                <br>
            </div>
        </div>
         
    </div>
</div>



<!-- =========== BANNER BIG GREEN SLOGAN ===========  -->
<div id="bigbannerslogan">
    <div class="wrapper">

        <div class="bigbannerslogan__left-part">
                <center> <img src="public/images/index/banner-big-dude.png" width="400" alt="ETERNAL MESSENGER"> </center>
        </div>
        <div class="bigbannerslogan__right-part">
            <div class="bigbannerslogan__right-slogan_align"> 
                WELCOME TO <br>
                ETERNAL MESSENGER <br>
                &laquo;EASYMAN&raquo; <br>
                FOR EVERYDAY USE <br>
            </div>
        </div>

    </div>
</div>



<!-- =========== RECEPTION ===========  -->
<a name="anchor_reception"></a>
<div id="reception">
    <div class="wrapper">

        <div class="reception__left-part">
            <div class="reception__left-signin">
                <font class="reception__registration-blue"> Signin </font> <br><br>

                <?php
                // Подключаем PHP-код чтобы проверить условие:
                // Если пользователь авторизовался, то - выводим ему приветствие по Имени
                // Если НЕ авторизовался, то - выводим форму для авторизации
                // директиву csrf_field() вынесли из PHP-кода, потому что это 
                // директива шаблонизатора .blade самого фреймворка Laravel и без неё
                // получим ошибку, что страница просрочена
                $value = Session::get('logged_name');
                
                // Если сессия существует (он успешно авторизовался через Логин и Пароль), - то выводим приветсвие пользователю
                // Иначе - выводим форму для ввода логина и пароля
                if ( isset($value) ) {
                   echo '<font style="font-family: Verdana, Arial; font-size: 1.2em; color: #282828;"> Welcome, '.$value.'! </font>';
                   echo '<a href="/logout"> Log out &raquo; </a> ';
                } else {

                // Если при попытке входа возникла какая-то ошибка, то вынимаем её из сессии и показвыаем пользователю
                $ef = Session::get('error_flag_user');
                if ($ef!='') {echo '<font style="font-family: Verdana, Arial; font-size: 0.8em; color: #f45e83;">error: '.$ef.'</font>';}

                    echo ('
                        <form name="myform_signin" action="/signin" method="post">
                        <input type ="text" name="html_signin_login" size="12" placeholder="login" class="input_bar_login"> <br>
                        <input type ="password" name="html_signin_password" size="12" placeholder="password" class="input_bar_login">
                        <div class="button_login"> 
                            <a href="#" onclick="document.forms.myform_signin.submit(); return false">Sign in</a> 
                        </div>
                
                    ');
                }
                ?>

                {{ csrf_field() }}
                </form>

                    <div class="reception__new-account"> 
                        <a href="/newuser"> Register new account &raquo; </a> 
                    </div>
            </div>
        </div>


        <div class="reception__right-part">
            <div class="reception__right-room">
                <font class="reception__registration-blue"> Enter room </font> <br><br>

                <?php
                // Подключаем PHP-код чтобы проверить условие:
                // Если пользователь НЕ вошёл в комнату, то - выводим форму входа (и если есть - ошибку входа)
                // Если вошёл в комнтау, то - на него была создана сессия, выводим в блок данные из сессии - в какой он комнате
                // директиву @csrf вынесли из PHP-кода, потому что это 
                // директива шаблонизатора .blade самого фреймворка Laravel и без неё получим ошибку, что страница просрочена
                $value2 = Session::get('logged_roomno');

                    if ( !isset($value2) ) {
                        $efr = Session::get('error_flag_room');
                        if ( $efr!='' ) {
                            echo '<font style="font-family: Verdana, Arial; font-size: 0.8em; color: #f45e83;">error: '.$efr.'</font>';
                        }
                        echo ('
                            <form name="myform_room" action="/rm" method="post">                
                            <input type ="text" name="html_room_no" size="12" placeholder="Room №" class="input_bar_login"> <br>
                            <input type ="password" name="html_room_key" size="12" placeholder="Key" class="input_bar_login">
                            <div class="button_login"> 
                                <a href="#" onclick="document.forms.myform_room.submit(); return false">Enter</a> 
                            </div>
                        ');
                    } else {
                        echo '<font style="font-family: Verdana, Arial; font-size: 0.9em; color: #282828;"> you are in room: '.$value2.', </font>';
                        echo '<a href="/exitroom"> Exit room &raquo; </a> ';
                    }
                ?>
                @csrf
                </form>
                

                    <div class="reception__new-account"> 
                        <a href="/newroom"> Create new room &raquo; </a> 
                    </div>
            </div>
        </div>

    </div>
</div>



<!-- =========== HOW TO ===========  -->
<a name="anchor_howto"></a>
<div id="howto">
    <div class="wrapper">

        <div class="howto__upper-part">
            <div class="howto__h1">
                How To use this app
            </div>
        </div>
        <div class="howto__lower-part">
            <div class="howto__description-steps">
                <b>Step 1</b> Just sign in the system with your login and password <br>
                <b>Step 2</b> Enter any room you have the key <br>
                <b>Step 3</b> Leave a message to your room visitors <br><br>
                if you have no account, please follow the link 
                <a href="/newuser" class="reception__new-account"> Register new account &raquo; </a> <br><br>
                Also you can create as many rooms as you like using 
                <a href="/newroom" class="reception__new-account"> Create new room </a>  link <br>
                e.g. room for <font style="color: #17dfd2;">family</font>, room for <font style="color: #17dfd2;">co-workers</font>,
                room for <font style="color: #17dfd2;">best friends</font>
                <br><br>
                <div class="header__language-leftimg"> <img src="public/images/index/atnt.jpg" width="18" alt="messenger-language"> </div>
                    <font style="color: #f36523;"> You need only browser to use it </font> <br>
                <div class="header__language-leftimg"> <img src="public/images/index/atnt.jpg" width="18" alt="messenger-language"> </div>
                    <font style="color: #f36523;"> Does not require updates </font> <br>
                <div class="header__language-leftimg"> <img src="public/images/index/atnt.jpg" width="18" alt="messenger-language"> </div>
                    <font style="color: #f36523;"> Requires little traffic </font> <br>
            </div>
            <br><br>
        </div>
         
    </div>
</div>



<!-- =========== ABOUT ===========  -->
<a name="anchor_about"></a>
<div id="about">
    <div class="wrapper">

        <div class="about__upper-part">
            <div class="howto__h1">
                About this app
            </div>
        </div>
        <div class="about__lower-part">
        The idea <br><br>
            <div class="howto__description-steps">
                This is the light alloy tool for anyone to come and use. it works on different devices and operating systems (PC, laptop, tablet or cell phone) You do not need to update any software to use it, no phone number or email verification. You must have only web browser. You do not need internet connection for corporate use. <br>
            </div>
            <br><br>

        Corporate use <br><br>
            <div class="howto__description-steps">
                Easyman Messenger also can work without Internet connection in Local Area Network (LAN). It is suitable to use in a company where Internet access denied to ordinary employees. To get this messenger in open source for corporate purposes, please write to our mail.
            </div>
            <br><br>

        How long it will live <br><br>
            <div class="howto__description-steps">
                We can hear in articles on the Internet that government is going to close access to messengers with End-to-End encryption under the cover of the fight against terrorism and one day you can lose touch with your contacts. <br>
                <a onclick="toggle_show('additional_text')"> [+] Read more about encryption details .. </a>
                <div id="additional_text" style="display: none;">
                    Our messenger has no encryption algorithm for forwarded messages so there is no reason to close it. But users can be calm because account data is encrypted and even in case of leak nobody see your personal passwords. <br>
                    <a onclick="toggle_show('additional_text')"> [-] Close </a> <br><br>
                </div>
            </div>
            <br><br>
        </div>
         
    </div>
</div>



<!-- =========== FOOTER ===========  -->
<div id="footer">
    <div class="wrapper">

        <div class="footer__part1-links">
            <div class="footer__menu-style"> 
                <a href="#anchor_header"> Home </a> <br>
                <a href="#anchor_reception"> Reception </a> <br>
                <a href="#anchor_howto"> HowTo </a> <br>
                <a href="#anchor_about"> About </a> <br>
            </div>
        </div>
        <div class="footer__part2-shortinfo">
            <div class="footer__info">
                Our application continually strives for excellence, so if you find bugs or if you get trouble using our app, please email us.
                <br><br>
                Partnership, support, question and help only by mail
                <font style="font-family: Verdana, Arial; font-size: 0.8em; color: #17dfd2;"> dnestrgroup@gmail.com </font>
            </div>
        </div>
        <div class="footer__part3-copyright">
                <font style="color: #272b2e; float: right;"> dnestrgroup@gmail.com :-P </font>
        </div>

    </div>
</div>


</body>
</html>
