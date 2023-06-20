<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
 <title> New room in Easyman messenger </title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta http-equiv="Content-Language" content="ru" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            
            <meta name="keywords" content="empty, page, test">
            <meta name="description" content="test my code, clear page for test">

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

        <div class="menublock__upper-part">
            <font style="font-family: Verdana, Arial; font-size: 1.2em; color: #282828;"> 
                <b> Quickly create a new room. Please fill all the fields </b>
            </font>
        </div>

        <form name="myform_newroom" action="newroom.php" method="post">

        <div class="menublock__lower-part">
            <div class="menublock__lower-part_input"> <input type ="text" name="html_room_name" class="input_bar_register"> </div>
                <div class="menublock__lower-part_text"> room name (e.g. family, co-workes, university) <font color="#ff0000">*</font> </div>
        </div>
        <div class="menublock__lower-part">
            <div class="menublock__lower-part_input"> <input type ="text" name="html_room_key1" class="input_bar_register"> </div>
                <div class="menublock__lower-part_text"> key <font color="#ff0000">*</font> </div>
        </div>
        <div class="menublock__lower-part">
            <div class="menublock__lower-part_input"> <input type ="text" name="html_room_key2" class="input_bar_register"> </div>
                <div class="menublock__lower-part_text"> repeat key <font color="#ff0000">*</font> </div>
        </div>

        <div class="menublock__spacer"> </div>
        <div class="menublock__spacer"> </div>

            <input type="submit" name="button_generate_newroom" value="Create room">
            
        </form>
        
        <div class="menublock__spacer"> </div>

        <!-- Message window - that new room created -->
        <div class="message_newroom_ok">
            <img src="public/images/newroom/ico-new-room-key.png" width="32" class="message_newroom__language-leftimg">   
                <b> New Room created successful </b> <br>
                Your room № 123
        </div>
        
        <div class="menublock__spacer"> </div>
        <a href="/"> Go to Main page >> </a>

    </div>
</div>



<!-- =========== FOOTER ===========  -->
<div id="footer">
    <div class="wrapper">

        <div class="footer__part2-shortinfo">
            <div class="footer__info">
                Our application continually strives for excellence, so if u find bugs or if u get trouble using our app, please email us.
                <br><br>
                Partnership, support, question and help only by mail
                <font style="font-family: Verdana, Arial; font-size: 0.8em; color: #17dfd2;"> dnestrgroup@gmail.com </font>
            </div>
        </div>

    </div>
</div>


</body>
</html><?php /**PATH E:\OpenServer529\OSPanel\domains\localhost\resources\views/newroom.blade.php ENDPATH**/ ?>