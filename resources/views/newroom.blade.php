<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
 <title> New room in Easyman messenger </title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta http-equiv="Content-Language" content="ru" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            
            <meta name="keywords" content="Create chatroom for free, Easyman messenger">
            <meta name="description" content="Create chatroom in free messenger without phone number, i can easy talk with my friends at PC, laptop, tablet or cell phone, You can quickly create a new room">

            <link rel="icon" href="public/images/favicon.ico" type="image/x-icon">
            <link rel="shortcut icon" href="public/images/favicon.ico" type="image/x-icon">

                <link rel="stylesheet" type="text/css" href="public/css/newroom/style-newroom-body.css" />
                <link rel="stylesheet" type="text/css" href="public/css/newroom/style-newroom-fonts.css" />
                <link rel="stylesheet" type="text/css" href="public/css/newroom/style-newroom-links.css" />
                <link rel="stylesheet" type="text/css" href="public/css/newroom/style-newroom-objects.css" />

</head>
<body>



<!-- =========== HEADER WHITE LONG ===========  -->
<div id="header">
    <div class="wrapper">

        <div class="header__left-part">
            <div class="header__left-banner_align">
                <font class="header__logo-black"> Easyman // </font>
                <font class="header__logo-blue"> New Room </font>
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
                <b> You can quickly create a new room. Please fill all the fields </b>
            </font>
        </div>

        <form name="myform_newroom" action="/newroom/store" method="post">

        <div class="menublock__lower-part">
            <div class="menublock__lower-part_input"> <input type ="text" name="html_room_name" class="input_bar_register"> </div>
                <div class="menublock__lower-part_text"> Room name (e.g. family, co-workes, university) <font color="#ff0000">*</font> </div>
        </div>
        <div class="menublock__lower-part">
            <div class="menublock__lower-part_input"> <input type ="password" name="html_room_key1" class="input_bar_register"> </div>
                <div class="menublock__lower-part_text"> Key <font color="#ff0000">*</font> </div>
        </div>
        <div class="menublock__lower-part">
            <div class="menublock__lower-part_input"> <input type ="password" name="html_room_key2" class="input_bar_register"> </div>
                <div class="menublock__lower-part_text"> Repeat key <font color="#ff0000">*</font> </div>
        </div>

        <div class="menublock__spacer"> </div>
        <div class="menublock__spacer"> </div>

            <input type="submit" name="button_generate_newroom" value="Create room">

        {{ csrf_field() }}
        <!-- Функция csrf_field() реализует защиту от межсайтовых подделок запроса -->
        <!-- Работает следующим образом -->
        <!-- создается скрытое поле типа <input type="hiden" name="_token" value="fad165f1f84984f"> -->
        <!-- Этот токен так же записывается в сессию и потом на странице, куда пришла форма -->
        <!-- сравнивается value и переменная из сесии, если они равны то всё ОК и запрос обрабатывается -->
            
        </form>

        
        <div class="menublock__spacer"> </div>
        <a href="/"> Go to Main page >> </a>

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
</html>