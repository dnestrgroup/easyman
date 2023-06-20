<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// подключили фасад DB с классом для работы с Базой Данных
// иначе получим ошибку Class 'App\DB' not found
use Illuminate\Support\Facades\DB;

// Session - это один из доступных псевдонимов, поэтому его можно подключать напрямую
// Подключаем фасад Session чтобы в контроллере был доступ
use Session;

class Indexlogic extends Model
{
	// Т.К. имя модели Userlogic не совпадает с именем таблицы - users
	// то необходимо явно указать название таблицы с которой будет работать эта модель
	protected $table = 'users';


	// в var1 - получили из контроллера введённый логин
	// в var2 - получили из контроллера введённый пароль
	public static function checkUser($var1, $var2) {
		// Т.к. в Базе Данных хранится md5-хеш пароля, то 
        // проверяем введённый пароль и хранимый, сравнивая их хеш-суммы
        $plogin1 = $var1;
        $ppasword_md5 = md5($var2);
		
		// Выбираем из базы Хеш-пароль чтобы сравнить его с введённым паролем
		// В переменную selected_row - получили запись из таблицы по логину
		$selected_row = DB::table('users')->where('email', 'like', $plogin1)->get()->first();
		// Т.к. метод выборки вернул нам объект класса, то чтобы получить значение столбца password из таблицы Users
		// необходимо обратится к переменной selected_row как [объект класса -> поле класса]
		// Так в переменную selected_password поместили md5-хеш-пароля пользователя из базы

		// Если запрос вернул каую-то строку, то можно работать с данными
		if (isset($selected_row)) {
			$selected_id = $selected_row->id;
			$selected_email = $selected_row->email;
			$selected_password = $selected_row->password;
			$selected_name = $selected_row->name;
			$selected_avatar = $selected_row->avatar;

			// Сравниваем Пароль который ввёл пользователь и Пароль выбранный из базы
			// Если пароль введен верный, то создаем сессионную переменную с логином пользователя
			
			// Иначе, если Логин или Пароль неверны, то никаких сессионных переменных не создаём
			// поэтому пользователю на главной странице опять выведем форму ввода логина и пароля
			// а так же передаём в сессии имя ошибки, чтобы отобразить на главной страничке
			if ($ppasword_md5 == $selected_password) {
				Session::put('logged_id', $selected_id);
				Session::put('logged_name', $selected_name);
				Session::put('logged_ava', $selected_avatar);
					Session::put('error_flag_user', ''); // Обнуляем сообщения об ошибке
			} else {
				Session::put('error_flag_user', 'password is incorrect');
			}
		} else {
			Session::put('error_flag_user', 'User does not exist');
		}
	}


}
