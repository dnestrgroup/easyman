<?php

// пространство имён указывает путь, где расположен файл
namespace App\Http\Controllers;

// доступ к классу Request, который представляет собой
// абстракцию отправляемого запроса пользователям
use Illuminate\Http\Request;

// Подключаем класс 
// Будем из этой модели вызывать статические методы работы с БД
use App\Indexlogic;

// Session - это один из доступных псевдонимов, поэтому его можно подключать напрямую
// Подключаем фасад Session чтобы в контроллере был доступ
use Session;

class IndexController extends Controller
{
    // Создаем метод index контроллера IndexController
    public function index () {
    	// Данный экшн возвращает представление(макет/вьюшку) главной страницы сайта
    	return view('index');
	}



    // Данный метод вызывается, когда пользователь нажимает кнопку -Авторизоваться- (Sign in)
	public function auth (Request $request) {
        // в переменные plogin и ppasword получаем логин и пароль соответсвенно
        // которые были отправлены из формы POST-запросом
    	$plogin = $request->html_signin_login;
        $ppasword = $request->html_signin_password;
    	
        // Если пользователь НЕ ввёл Логин или Пароль, то переадресуем его опять на форму ввода
        // и в сессию записываем какая ошибка произошла
        if (($plogin=='') || ($ppasword=='')) {
            Session::put('error_flag_user', 'empty login or password');
            return redirect('/#anchor_reception');
        } else {
            Session::put('error_flag_user', ''); // Обнуляем сообщения об ошибке
        }

        // Вызываем статичный метод saveNewUser из класса модели Userlogic
        // Если пару - Логин и Пароль пользователь ввёл верно, то создаём сессионную переменную на его имя
        Indexlogic::checkUser($plogin, $ppasword);

        // Далее переходим на главную страницу уже авторизованным пользователем
        // или сообщаем об ошибке авторизации
        return redirect('/#anchor_reception');
	}



    // Данный метод вызывается, когда пользователь нажимает кнопку -Выйти- (Log out)
    // Убиваем сессионные переменные как для Пользователя, так и для Комнаты
    // потому что Неавторизованый пользователь не может находится в Комнате
    public function lgout () {
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
}
