<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

// СИНТАКСИС: Имя класса Контроллера @ имя метода этого класса (контроллер @ экшн)

// RU :: Роут на главную страницу сайта
// EN :: Route to website main page
Route::get('/','IndexController@index'); // Главная страница сайта
Route::post('/signin','IndexController@auth'); // Маршрут для обработки момента авторизации
Route::get('/logout','IndexController@lgout'); // Маршрут для обработки нажатия ссылки - Выйти из учетной записи (Log out)

// RU :: Роут на страницу создания нового пользователя
// EN :: Route to page to create new User
Route::get('/newuser', 'NewuserController@showformuser'); // страница отображает форму для заполнения данных пользователя
Route::post('/newuser/store','NewuserController@store'); // маршрут обработает запрос на сохранение статьи из формы выше
Route::get('/newuser/registered','NewuserController@registered'); // маршрут отобразит представление с сообщением об успешной регистрации

// RU :: Роут на страницу создания новой комнаты
// EN :: Route to page to create new chat Room
Route::get('/newroom', 'NewroomController@showformroom'); // страница отображает форму для заполнения данных комнаты
Route::post('/newroom/store','NewroomController@store'); // маршрут обработает запрос на сохранение комнаты из формы выше
Route::get('/newroom/registered','NewroomController@registered'); // маршрут отобразит представление с сообщением об успешном создании комнаты

// RU :: Роут на Чат
// EN :: Route to page with Chat
Route::post('/rm','ChatController@show');
Route::get('/exitroom','ChatController@exroom'); // Маршрут для обработки нажатия ссылки в окне чата - Выйти из комнаты (Exit Room)
Route::get('/logoutsystem','ChatController@logoutsys'); // Маршрут для обработки нажатия ссылки в окне чата - Выйти из системы (Log out system)

// Данные маршруты предназначены для AJAX методов
Route::get('/ajaxsendsms','ChatController@ajaxstoresms'); // Ajax метод по этому маршруту передает sms text в функцию сохранения в базу
Route::get('/ajaxgetsms','ChatController@ajaxgetsms'); // Ajax метод по этому маршруту получает запрос на выбор сообщений из базы