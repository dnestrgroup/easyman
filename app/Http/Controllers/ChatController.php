<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Подключаем класс 
// Будем из этой модели вызывать статические методы работы с БД
use App\Chatlogic;

// Session - это один из доступных псевдонимов, поэтому его можно подключать напрямую
// Подключаем фасад Session чтобы в контроллере был доступ
use Session;

class ChatController extends Controller
{
    // Функция которая отображает вид Чата, при отсутствии всевозможных ошибок
    public function show (Request $request) {
        // unset($request['html_room_no']); // Удалить переменную из массива Request

    	// П О Л У Ч А Е М   В С Е   П Е Р Е М Е Н Н Ы Е   Д Л Я   Р А Б О Т Ы
    	// в переменные proomno и pkey получаем Комнату и Ключ соответсвенно
        // которые были отправлены http POST - запросом из формы входа в комнату
    	$proomno = $request->html_room_no;
        $pkey = $request->html_room_key;
            // или через Фасад 
            // Проверяем или была передана переменная if (Request::has('html_room_no')) {}
            // $proomno = Request::input('html_room_no');
            // или ...
            // $proomno = $request->input('html_room_no');

        // В сессионые переменные получаем данные, если пользователь успешно авторизовался
        $sessname = Session::get('logged_name');

        // ДЛЯ ВХОДА В ЧАТ ДОЛЖНЫ БЫТЬ СОБЛЮДЕНЫ 3 УСЛОВИЯ
        // 1 - Пользователь должен быть авторизован по своему Логину и Паролю
        // 2 - Номер комнаты и Ключ для входа - не должны быть пустыми
        // 3 - Пользователь должен ввести корректный Номер комнаты и Ключ для входа

        // 1) Условие, елси пользователь не авторизовался, то в сессии ещё не существует (NULL)
        // а если в сессии - его имя, то он авторизацию прошёл и ошибок нет
        if ( $sessname == NULL ) {
        	Session::put('error_flag_room', 'Please Sign in');
        	return redirect('/#anchor_reception');
        } else {
        	Session::put('error_flag_room', ''); // Иначе Обнуляем сообщения об ошибке
        }

        // 2) Если пользователь НЕ ввёл Номер комнаты или Ключ, то переадресуем его опять на форму ввода
        // и в сессию записываем какая ошибка произошла
        if (($proomno=='') || ($pkey=='')) {
            Session::put('error_flag_room', 'Please input Room and Key');
            return redirect('/#anchor_reception');
        } else {
            Session::put('error_flag_room', ''); // Иначе Обнуляем сообщения об ошибке
        }

        // 3) Условие, проверка правильности Комнаты и Ключа
        // Если пара Комната+Ключ НЕ верны, то модель вернёт ошибку в сессию, которую отобразим на главной странице
        Chatlogic::checkRoom($proomno, $pkey);
    	
    	$errors_from_model = Session::get('error_flag_room');
    	$logged_room = Session::get('logged_roomno');

        // Если модель Chatlogic не вернула никаких ошибок и была создана сессия для комнаты,
        // То - можно заходить в чат
        // Иначе - пользователю опять показываем форму авторизации и ошибку
        if ( ($errors_from_model == '') && (isset($logged_room)) ) {
            Chatlogic::securityCamera(); // отправляем в комнату оповещение, что зашёл человек
            return view('chat');
        } else {
            return redirect('/#anchor_reception');
        }
	}



	// Данный метод вызывается, когда пользователь нажимает кнопку -Выйти из комнаты- [Exit Room]
    public function exroom () {
        // Удаляем переменные сессии, переменная становится типа NULL (не существует)
        Session::forget('logged_roomno');
        Session::forget('logged_roomname');

        // Обнуляем сообщения об ошибках, чтобы не портить внешний вид страницы красными надписями
        Session::put('error_flag_user', '');
        Session::put('error_flag_room', '');

        // переходим на reception с пустыми полями
        return redirect('/#anchor_reception');
    }



    // Данный метод вызывается, когда пользователь нажимает кнопку -Выйти из системы- [Log out system]
    // Убиваем сессионные переменные как для Пользователя, так и для Комнаты
    // потому что Неавторизованый пользователь не может находится в Комнате
    public function logoutsys () {
        // Удаляем переменные сессии, переменная становится типа NULL (не существует)
        Session::forget('logged_id');
        Session::forget('logged_name');
        Session::forget('logged_ava');

        Session::forget('logged_roomno');
        Session::forget('logged_roomname');

        // Обнуляем сообщения об ошибках, чтобы не портить внешний вид страницы красными надписями
        Session::put('error_flag_user', '');
        Session::put('error_flag_room', '');

        // переходим на reception с пустыми полями
        return redirect('/#anchor_reception');
    }



    // Данный метод сохраняет в базу данных сообщение, 
    // которое было передано Ajax-ом с html-страницы чата
    public function ajaxstoresms (Request $request) {
        // в переменную $sms извлекаем из глобального массива сообщение,
        // которое было передано Ajax-ом через запрос типа GET
        // dump($request);
        $sms=$request->variable_with_smstext;
        
        // Извлекаем сессионные переменные, которые были созданы в моделе Indexlogic
        $ses_user_id = Session::get('logged_id'); // Id пользователя
        // Извлекаем сессионные переменные, которые были созданы в моделе Chatlogic
        $ses_room_number = Session::get('logged_roomno'); // Номер комнаты в которой находится пользователь
        // Формируем строку с удобно читаемой Датой, когда было послано сообщение
        $message_date=date("d").".".date("m").".".date("Y").' '.date("H").':'.date("i").':'.date("s");
        
        // Вызываем метод, который работает с базой и записывает туда SMS
        Chatlogic::saveSms($ses_room_number, $ses_user_id, $message_date, $sms);

        // После сохранения сообщения в базу в строке выше
        // вызываем метод текущего класса, который отобразит сообщения в окне чата 
        // не дожидаясь Ajax таймера интервала обновления
        // return self::ajaxgetsms();
    }



    // Данный метод извлекает из базы 16 последних сообщений,
    // которые по средствам Ajax запрашиваются 1 раз / 3 сек. и передаются в html окно чата
    // все данные, которые распечатает этот метод передадуться строкой через http-запрос в окно чата
    public function ajaxgetsms (Request $request) {
        // Извлекаем сессионные переменные, которые были созданы в моделе Chatlogic
        $ses_room_number = Session::get('logged_roomno'); // Номер комнаты в которой находится пользователь

        // Метод getSmss в переменную selected_sms_messages возвращает массив объектов
        // каждый объект - это связка сообщение с иноформацией кто и когда его отправил
        $selected_sms_messages = Chatlogic::getSmss($ses_room_number);
        // dump($ses_room_number);

        // развоварчивам массив сообщений наоборот,
        // т.к. метод выбираем последние 16 сообщений с конца таблицы, поэтому они получаются в обратном порядке
        // а в окне чата сообщения необходимо отобразить в такой очерёдности по дате как они сохранялись в базу
        $selected_sms_messages_reversed = array_reverse($selected_sms_messages);

        // разбираем массив объектов по элементам
        // далее обращаемся к полям каждого элемента, в которых хранятся данные сообщения и пользователя
        foreach ($selected_sms_messages_reversed as $sm) {
            $sms_avatar = $sm->avatar;
            $sms_name = $sm->name;
            $sms_date = $sm->messagedate;
            $sms_text = $sm->messagetext;
            echo ('
                <div class="chatblock__sms">
                <div class="chatblock__sms-avatar"> <img src="public/images/newuser/faces/'.$sms_avatar.'" alt="avatar" > </div>
                <div class="chatblock__sms-text"> 
                    '.$sms_name.' <br>
                    <font size=1> <i> '.$sms_date.' </i> </font> <br>
                    '.$sms_text.'
                </div>
                </div>
            ');
        }
    }


}