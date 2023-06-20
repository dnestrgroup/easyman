<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// подключили фасад DB с классом для работы с Базой Данных
// иначе получим ошибку Class 'App\DB' not found
use Illuminate\Support\Facades\DB;

// Session - это один из доступных псевдонимов, поэтому его можно подключать напрямую
// Подключаем фасад Session чтобы в контроллере был доступ
use Session;

class Chatlogic extends Model
{
    // в var1 - получили из контроллера введённую Комнату
	// в var2 - получили из контроллера введённый Ключ
	public static function checkRoom($var1, $var2) {
		// Т.к. в Базе Данных хранится md5-хеш Ключа от комнаты, то 
        // проверяем введённый Ключ и хранимый, сравнивая их хеш-суммы
        $proomno1 = $var1;
        $pkey_md5 = md5($var2);

        // Выбираем из базы Хеш-Ключ чтобы сравнить его с введённым Ключем
		// В переменную selected_row - получили запись из таблицы по Номеру Комнаты
		$selected_row = DB::table('rooms')->where('room_number', '=', $proomno1)->get()->first();

		// Если запрос вернул каую-то строку, то можно работать с данными
		// Иначе пользователь допустил ошибку в Номере комнаты и такой не существует
		if (isset($selected_row)) {
			$selected_rkey = $selected_row->room_key;
			$selected_rname = $selected_row->room_name;

			// Сравниваем Ключи от комнаты: который ввёл пользователь и который в базе
			// Если Ключ верный - то создаем сессионную переменную с данными комнаты
			// Иначе - в сессионную переменную записываем ошибку чтобы отобразить на главной страничке
			if ($pkey_md5 == $selected_rkey) {
				Session::put('logged_roomno', $proomno1);
				Session::put('logged_roomname', $selected_rname);
					Session::put('error_flag_room', ''); // Обнуляем сообщения об ошибке
			} else {
				Session::put('error_flag_room', 'password is incorrect');
			}
		} else {
			Session::put('error_flag_room', 'Room does not exist');
		}
	}



	// Функция добавляет статью в базу
	// var1 - номер комнаты, которой принадлежит сообщение
	// var2 - Id пользователя который написал эту SMS-ку
	// var3 - Дата когда была написана SMS
	// var4 - SMS text
	public static function saveSms($var1, $var2, $var3, $var4) {
		DB::insert('insert into messages (chatroomno, fromuserid, messagedate, messagetext, servertime) 
					values( :pchatroomno, :pfromuserid, :pmessagedate, :pmessagetext, now())', 
					['pchatroomno'=>$var1, 'pfromuserid'=>$var2, 'pmessagedate'=>$var3, 'pmessagetext'=>$var4]);
	}	


	// Метод выбирает из базы ПОСЛЕДНИЕ 16 СООБЩЕНИЙ в конкретной комнате и данные по пользователям,
	// которые отпраляли эти сообщения
	// Выборка происходит из 2х таблиц: Сообщения messages и Пользователи users
	// var1 - номер комнаты для которой выбираем сообщения
	public static function getSmss($var1) {
		$sms_messages = DB::select('SELECT m.id, m.fromuserid, m.messagedate, m.messagetext, m.servertime, u.id, u.name, u.avatar 
									FROM messages m, users u 
									WHERE m.fromuserid=u.id AND m.chatroomno=:nomerok 
									ORDER BY m.servertime DESC LIMIT 16', 
									['nomerok' => $var1]);
		return $sms_messages;
	}



	// Метод записывает в базу сообщение - кто только что вошёл в комнату, от имени Камеры наблюдения
	// Для этого вызываем метод текущего класса, который сохраняет сообщение пользователя в базу
	// и в качестве сообщения подствляем данные которые нам нужны, а имеено инфа по пользователю
	public static function securityCamera() {
		$srm = Session::get('logged_roomno');
		$sid = 1;
		$smd = date("d").".".date("m").".".date("Y").' '.date("H").':'.date("i").':'.date("s");
		$sst = "[".Session::get('logged_name')."] just enter the room";
		self::saveSms($srm, $sid, $smd, $sst);
	}	

}