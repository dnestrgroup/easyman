<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Подключаем класс 
// Будем из этой модели вызывать статические методы работы с БД
use App\Userlogic;

class NewuserController extends Controller
{

    // RU :: Показываем форму с полями для заполнения для создания нового пользователя
    // EN :: Show form to fill to create new user
	public function showformuser () {
    	return view('newuser');
	}



	// RU :: Метод сохраняет данные пользователя из формы в базу данных
    // EN :: Method saves fields data to DataBase
	public function store (Request $request) {
    	//dump($request->all());
    	//--------------------------------- ВАЛИДАЦИЯ ДАННЫХ ----------------------------
		// Сначала через паттерн регулярного выражения проверяем нет ли спецсимволов в логине

    	// Массив правил валидации
    	// имя свойства объекта Request => валидация по набору правил
    	// 1. Поле html_reg_login - должно быть вида email, обязательно к заполнению, и уникально в таблице Users в столбце email
    	// 2. Поле html_reg_password1 - обязательно к заполнению, содержать минимум 4 символа
    	// 3. Поле html_reg_password2 - обязательно к заполнению, содержать минимум 4 символа и совпадать с полем html_reg_password1
    	// 4. Поле html_reg_realname - обязательно к заполнению
        $rules = [
            'html_reg_login' => 'email|required|unique:users,email',
            'html_reg_password1' => 'required|min:4',
            'html_reg_password2' => 'required|min:4|same:html_reg_password1',
            'html_reg_realname' => 'required'
        ];


        // Массив собственных сообщений об ошибке
        // Если правило не срабатывает - выдаём свой текст ошибки на русском вместо стандартной английской
        /*
        $messages_ru = [
        	'html_reg_login.email' => 'Email указан неверно',
            	'html_reg_login.unique' => 'такой Email уже существует',
            		'html_reg_login.required' => 'Поле [Email] необходимо к заполнению',

            'html_reg_password1.required' => 'Поле [Password] необходимо к заполнению',
            	'html_reg_password1.min' => 'Поле [Password] должно содержать минимум :min символа',
            'html_reg_password2.required' => 'Поле [Repeat password] необходимо к заполнению',
            	'html_reg_password2.min' => 'Поле [Repeat password] должно содержать минимум :min символа',
            		'html_reg_password2.same' => 'Поле [Repeat password] должно совпадать с полем [Password]',
            'html_reg_realname.required' => 'Поле [Name] необходимо к заполнению'
        ];
        */

        $messages_en = [
            'html_reg_login.email' => 'Field [Email] must be a valid email address',
                'html_reg_login.unique' => 'This login has already been taken',
                    'html_reg_login.required' => 'The [Email] field is required',

            'html_reg_password1.required' => 'The [Password] field is required',
                'html_reg_password1.min' => 'The [Password] field must be at least :min characters',
            'html_reg_password2.required' => 'The [Repeat password] field is required',
                'html_reg_password2.min' => 'Поле [Repeat password] must be at least :min characters',
                    'html_reg_password2.same' => 'The [Password] and [Repeat password] must match',
            'html_reg_realname.required' => 'The [Name] field is required'
        ];
        

        // Метод валидации ведённых данных, 1арг - глобальный массив, 2арг - набор правил, 3арг - сообщения об ошибках
        $this->validate($request, $rules, $messages_en);
        // $this->validate($request, $rules);

        // Если при валидации произошла ошибка, то Laravel делает редирект на ту страничку,
        // откуда пришёл запрос, при этом передаёт на ту же страничку глобальную переменную с ошибками
        // Если метод validate отработал успешно, то - скрипт выполняется дальше, иначе - метод сгенерит ошибку (в логи/шаблоны)
        // и скрипт далее обрабатывать запрос не будет, и будет редирект на страницу для повторного ввода данных


        //---------------------------------- ЗАПИСЬ ВАЛИДИРОВАННЫХ ДАННЫХ В БАЗУ ---------------------------
        // Из формы запроса, которая пришла со вьюшки с заполненными пользователем полями,
        // выбираем данные по названиям полей и присваиваем переменным, далее эти переменные
        // передаём в модель Userlogic.php и там эти переменные записываем в таблицу в соответсвующие поля

        // $hmail = $request->input('email');
        // $hname = $request->input('name');

        // ... или
        $hmail = $request->html_reg_login;
        $hpassword1 = $request->html_reg_password1;
        $hpassword2 = $request->html_reg_password2;
        $hrealname = $request->html_reg_realname;
        $havatar = $request->html_radio_avatar;

        // Конвертируем пароль в 128-битный хеш
        // и в Базе Данных храним пароль не в открытом виде, а его хеш
        $password_md5 = md5($hpassword1);

        // Вызываем статичный метод saveNewUser из класса модели Userlogic
        // Данный метод сохраняет нового пользователя в Базу и выдаёт сообщение об этом
        Userlogic::saveNewUser($hmail, $password_md5, $hrealname, $havatar);

        return redirect('/newuser/registered');
	}



    // RU :: Показываем окно с сообщением об успешной регистрации
    // EN :: Show window with the message successful registration
    public function registered () {
        return view('newuser-registered');
    }

}
