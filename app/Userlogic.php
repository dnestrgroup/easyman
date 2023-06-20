<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// подключили фасад DB с классом для работы с Базой Данных
// иначе получим ошибку Class 'App\DB' not found
use Illuminate\Support\Facades\DB;

class Userlogic extends Model
{
    // Т.К. имя модели Userlogic не совпадает с именем таблицы - users
	// то необходимо явно указать название таблицы с которой будет работать эта модель
	protected $table = 'users';

	// Функция добавляет статью в базу
	// var1 - Login
	// var2 - Password in MD5
	// var3 - Name
	// var4 - Avatar jpg
	public static function saveNewUser($var1, $var2, $var3, $var4) {
		DB::insert('insert into users (email, password, name, avatar) values( :pmail, :ppassword_md5, :prealname, :pavatar)', 
					['pmail'=>$var1, 'ppassword_md5'=>$var2, 'prealname'=>$var3, 'pavatar'=>$var4]);
	}
}
