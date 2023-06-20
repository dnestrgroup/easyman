<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// подключили фасад DB с классом для работы с Базой Данных
// иначе получим ошибку Class 'App\DB' not found
use Illuminate\Support\Facades\DB;

class Roomlogic extends Model
{
    // Т.К. имя модели Roomlogic не совпадает с именем таблицы - rooms
	// то необходимо явно указать название таблицы с которой будет работать эта модель
	protected $table = 'rooms';

	// Функция сохраняет сгенерированную новую комнату в базу
	// из модели получаем 2 переменные: var1 - Room name, var2 - Key
	public static function saveNewRoom($var1, $var2) {
		$proomname = $var1; // Имя комнаты (e.g. family, co-workes, university)
		$pkey_md5 = md5($var2); // Ключ от комнаты храним в зашифрованом виде
		
		// Записываем в БД новую комнату, её имя и ключ
		DB::insert('insert into rooms (room_number, room_key, room_name) 
					values( :rnum, :key, :rname)', 
					[':rnum'=>NULL, ':key'=>$pkey_md5, 'rname'=>$proomname]);
		
		// В данную переменную получаем Id записи, только что вставленной в таблицу
		$current_id = DB::connection()->getPdo()->lastInsertId();
		// Генерируем номер комнаты, которую только что сохранили в базу
		// (Генератор доделать, чтобы не совпадал с Id комнаты)
		$independ_rn = $current_id + 127;
		// Обновляем запись в таблице, меняем номер комнаты с NULL - на Сгенерированный
		DB::table('rooms')->where('id', $current_id)->update(['room_number' => $independ_rn]);

		// возвращаем номер комнаты, который потом покажем пользователю на экран
		return $independ_rn;
	}
}
