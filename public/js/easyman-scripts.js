/* AJAX функция, которая передает текст сообщения на сервер без перезагрузки страницы */
/* Срабатывает, когда пользователь нажимает в чате на кнопку [Отправить смс] */
function SendRequest(){
 $.ajax({
  /*updInterval: 13000,*/
  type: "GET",
  url: "/ajaxsendsms",
  data: "variable_with_smstext="+$('#data_1').val()
  /* Закоментировали это событие - строку success, потому что в случае УСПЕШНОЙ отправки сообщения в базу, */
  /* вызывалась данная функция и блокировала окно чата, пока функция show() не отправляла туда сообщения */
  /* success: function(vovan_server_response){ $('#content_chat').html(vovan_server_response); } */
 });
 document.getElementById('data_1').value=""; /* строка, куда пишем сообщение - становится пустой */
};

/* AJAX функция, которая делает запрос информации с серверной части */
/* и помещает эту информацию на этой страничке в блок #content_chat */
function show()   
{   
 $.ajax({
  type: "GET",
  url: "/ajaxgetsms",   
  cache: false,
  /* в случае успешного выполнения скрипта в блок #content_chat передаем данные */
  /* которые вернул php-метод после выборки информации */
  success: function(var_html){   
   $("#content_chat").html(var_html);   
  }   
 });            
 document.getElementById('content_chat').scrollTop = 9999; /* .. и прокручиваем бегунок чата вниз */
}   

/* Данная конструкция обеспечивает автоматическое обновление информации в чате каждые 3 сек. */
/* Когда страничка загрузилась, эта конструкция через каждые 3 секунды вызывает функцию show() */
$(document).ready(function(){   
 show();
 setInterval('show()', 3000);           
});