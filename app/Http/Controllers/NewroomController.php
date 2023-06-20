<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Подключаем класс 
// Будем из этой модели вызывать статические методы работы с БД
use App\Roomlogic;

class NewroomController extends Controller
{
    // RU :: Показываем форму с полями для описания новой комнаты
    // EN :: Show form to describe new room
    public function showformroom () {
    	return view('newroom');
	}



	// RU :: Метод сохраняет данные новой комнаты в базу
    // EN :: Method saves fields data to DataBase
	public function store (Request $request) {
		// Массив правил валидации
        $rules = [
            'html_room_name' => 'required',
            'html_room_key1' => 'required|min:4',
            'html_room_key2' => 'required|min:4|same:html_room_key1'
        ];

        // Массив собственных сообщений об ошибке
        $messages_en = [
            'html_room_name.required' => 'The [Room name] field is required',

            'html_room_key1.required' => 'The [Key] field is required',
                'html_room_key1.min' => 'The [Key] field must be at least :min characters',
            'html_room_key2.required' => 'The [Repeat key] field is required',
                'html_room_key2.min' => 'Поле [Repeat key] must be at least :min characters',
                    'html_room_key2.same' => 'The [Key] and [Repeat key] must match'
        ];

        // Метод валидации ведённых данных, 1арг - глобальный массив, 2арг - набор правил, 3арг - сообщения об ошибках
        // Если метод validate отработал успешно, то - скрипт выполняется дальше, иначе -Laravel делает редирект на ту страничку,
        // откуда пришёл запрос, при этом передаёт на ту же страничку глобальную переменную с ошибками
        $this->validate($request, $rules, $messages_en);

        // Из POST-запроса выбираем значения полей input, которые передались с формой
        $hroomname = $request->input('html_room_name');
        $hroomkey1 = $request->input('html_room_key1');
        $hroomkey2 = $request->input('html_room_key2');

        // Вызываем статичный метод saveNewRoom из класса модели Roomlogic
        // Данный метод сохраняет в Базу сгенерированную комнату и возвращает её номер
        $returned_room_no = Roomlogic::saveNewRoom($hroomname, $hroomkey1);

        // После того как сохранили новую комнату в базу, возвращаем представление с сообщением
        // об успешной операции и передаём в представление сгенерированный в моделе номер комнаты, чтобы показать пользователю
        return view('newroom-registered')->with(['vroomnumber' => $returned_room_no]);
	}



	// RU :: Показываем окно с сообщением об успешной регистрации
    // EN :: Show window with the message successful registration
    public function registered () {
        return view('newroom-registered');
    }

}
