<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
 <title> Registration in Easyman messenger </title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta http-equiv="Content-Language" content="ru" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            
            <meta name="keywords" content="Free Registration, Easyman messenger">
            <meta name="description" content="Create account in free messenger without phone number and verification, Choose your funny character and avatars, quick registration at PC, laptop, tablet or cell phone">

            <link rel="icon" href="public/images/favicon.ico" type="image/x-icon">
            <link rel="shortcut icon" href="public/images/favicon.ico" type="image/x-icon">

                <link rel="stylesheet" type="text/css" href="public/css/newuser/style-registration-body.css" />
                <link rel="stylesheet" type="text/css" href="public/css/newuser/style-registration-fonts.css" />
                <link rel="stylesheet" type="text/css" href="public/css/newuser/style-registration-links.css" />
                <link rel="stylesheet" type="text/css" href="public/css/newuser/style-registration-objects.css" />

</head>
<body>



<!-- =========== HEADER WHITE LONG ===========  -->
<div id="header">
    <div class="wrapper">

        <div class="header__left-part">
            <div class="header__left-banner_align">
                <font class="header__logo-black"> Easyman // </font>
                <font class="header__logo-blue"> Registration </font>
            </div>
        </div>

    </div>
</div>



<!-- =========== MENU BLOCK LIGHT-GREY ===========  -->
<div id="menublock">
    <div class="wrapper">

<br>
<br>

<?php
// Вывод ошибок валидации через глобоальную переменную PHP
// Переменная $errors - это объект в свойствах котрого располагаются ошибки
// Если в массиве ошибок > 0, то выводим их
// метод all() возвращает в виде массива все сообщения об ошибках
if (count($errors)>0) {
    foreach ($errors->all() as $er) {
        echo "<font style='font-family: Verdana, Arial; font-size: 0.8em; color: #f45e83;'> ".$er." </font> <br>";
    }
}
?>


        <div class="menublock__upper-part">
            <font style="font-family: Verdana, Arial; font-size: 1.2em; color: #282828;"> 
                <b> Registration form. Please fill all the fields </b>
            </font>
        </div>

        <form name="myform_registration" action="/newuser/store" method="post">

        <div class="menublock__lower-part">
            <div class="menublock__lower-part_input"> <input type ="text" name="html_reg_login" class="input_bar_register"> </div>
                <div class="menublock__lower-part_text"> Email (your login) <font color="#ff0000">*</font> </div>
        </div>
        <div class="menublock__lower-part">
            <div class="menublock__lower-part_input"> <input type ="password" name="html_reg_password1" class="input_bar_register"> </div>
                <div class="menublock__lower-part_text"> Password <font color="#ff0000">*</font> </div>
        </div>
        <div class="menublock__lower-part">
            <div class="menublock__lower-part_input"> <input type ="password" name="html_reg_password2" class="input_bar_register"> </div>
                <div class="menublock__lower-part_text"> Repeat password <font color="#ff0000">*</font> </div>
        </div>
        <div class="menublock__lower-part">
            <div class="menublock__lower-part_input"> <input type ="text" name="html_reg_realname" class="input_bar_register"> </div>
                <div class="menublock__lower-part_text"> Name (Your real name, how friends will see you in chat) <font color="#ff0000">*</font> </div>
        </div>


        <div class="menublock__spacer"> </div>
        
        <div class="menublock__lower-part_text"> Choose your funny character <font color="#ff0000">*</font> </div>

        <div class="menublock__lower-part">
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/101.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="101.gif"> Thin
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/102.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="102.gif"> Aveman
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/103.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="103.gif"> Strongboy
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/104.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="104.gif"> Realblond
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/105.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="105.gif"> Bru
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/106.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="106.gif"> Pompon
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/107.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="107.gif"> Wavebru
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/108.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="108.gif"> Gamer
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/109.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="109.gif"> Foxy
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/110.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="110.gif"> Mustache
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/111.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="111.gif"> Redribbo
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/112.png" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="112.png"> Shirt
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/113.png" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="113.png"> Hat
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/114.png" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="114.png"> Rudepup
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/115.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="115.gif"> Blueye
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/116.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="116.gif"> Rufous
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/117.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="117.gif"> Blond
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/118.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="118.gif"> Elton
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/119.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="119.gif"> Bearded
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/120.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="120.gif"> Agent-J
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/121.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="121.gif"> Moby
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/122.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="122.gif"> Miscuzy
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/123.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="123.gif"> Jamie
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/124.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="124.gif"> Shaggy
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/125.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="125.gif"> Seal
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/126.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="126.gif"> Bluemoon
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/127.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="127.gif"> Biathlete
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/128.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="128.gif"> Magic
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/129.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="129.gif"> Poland
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/130.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="130.gif"> Realman
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/131.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="131.gif"> Batman
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/132.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="132.gif"> Chaplin
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/133.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="133.gif"> Airhosts
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/134.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="134.gif"> Cop
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/135.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="135.gif"> Clerk
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/136.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="136.gif"> Support
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/137.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="137.gif"> Engineer
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/138.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="138.gif"> Doc
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/139.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="139.gif"> Father
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/140.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="140.gif"> Spy
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/141.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="141.gif"> Outlaw
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/142.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="142.gif"> Fireman
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/143.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="143.gif"> Oil
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/144.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="144.gif"> Modesty
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/145.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="145.gif"> Sheik
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/146.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="146.gif"> King
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/147.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="147.gif"> Queen
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/148.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="148.gif"> Princess
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/149.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="149.gif"> Grandpa
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/150.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="150.gif"> Grandma
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/151.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="151.gif" checked> Cat
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/152.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="152.gif"> Dog
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/153.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="153.gif"> Rabbit
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/154.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="154.gif"> Fox
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/155.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="155.gif"> Gorilla
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/156.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="156.gif"> Lion
            </div>
            <div class="menublock__lower-part_avatarframe"> 
                <img src="public/images/newuser/faces/157.gif" width="72"> <br> 
                 <input type="radio" name="html_radio_avatar" value="157.gif"> Tiger
            </div>
        </div>


        <div class="menublock__spacer"> </div>
        <div class="menublock__spacer"> </div>

            <input type="submit" name="button_save_user" value="Save me">
            <font style="font-family: Verdana, Arial; font-size: 0.9em; color: #f45e83;"> 
             Notice! after saving you can not change your personal data 
            </font>

        <?php echo e(csrf_field()); ?>

        <!-- Функция csrf_field() реализует защиту от межсайтовых подделок запроса -->
        <!-- Работает следующим образом -->
        <!-- создается скрытое поле типа <input type="hiden" name="_token" value="fad165f1f84984f"> -->
        <!-- Этот токен так же записывается в сессию и потом на странице, куда пришла форма -->
        <!-- сравнивается value и переменная из сесии, если они равны то всё ОК и запрос обрабатывается -->

        </form>
        
        <div class="menublock__spacer"> </div>
        <a href="/"> Go to Main page >> </a>
        <div class="menublock__spacer"> </div>

    </div>
</div>



<!-- =========== FOOTER ===========  -->
<div id="footer">
    <div class="wrapper">

        <div class="footer__part2-shortinfo">
            <div class="footer__info">
                Our application continually strives for excellence, so if you find bugs or if you get trouble using our app, please email us.
                <br><br>
                Partnership, support, question and help only by mail
                <font style="font-family: Verdana, Arial; font-size: 0.8em; color: #17dfd2;"> dnestrgroup@gmail.com </font>
            </div>
        </div>

    </div>
</div>


</body>
</html><?php /**PATH E:\OpenServer529premium\OSPanel\domains\localhost\resources\views/newuser.blade.php ENDPATH**/ ?>