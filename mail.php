<?php
// Проверяем тип запроса, обрабатываем только POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Получаем параметры, посланные с javascript
    $m_malina = $_POST['macaroon-malina'];
    $total1 = $_POST['total1'];
    $m_mango = $_POST['macaroon-mango'];
    $total2 = $_POST['total2'];
    $m_vanil = $_POST['macaroon-vanil'];
    $total3 = $_POST['total3'];
    $m_fistashki = $_POST['macaroon-fistashki'];
    $total4 = $_POST['total4'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $comment = $_POST['comment'];


    // создаем переменную с содержанием письма
    $content = $name . ' телефон ' . $phone . ' оставил заявку на заказ. Количество: ' . $m_malina . ' - ' . $total1 .
        ' шт. ' . $m_mango . ' - ' . $total2 . ' шт. ' . $m_vanil . ' - ' .
        $total3 . ' шт. ' . $m_fistashki . ' - ' . $total4 . ' шт.' . ' Комментарий: ' . $comment;

    //Кодировка UTF-8
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

    // Первый параметр - кому отправляем письмо, второй - тема письма, третий - содержание
    $success = mail("admin@burgerclub.com", 'Запрос на бронирование столика', $content, $headers);

    if ($success) {
        // Отдаем 200 код ответа на http запрос
        http_response_code(200);
        echo "Письмо отправлено";
    } else {
        // Отдаем ошибку с кодом 500 (internal server error).
        http_response_code(500);
        echo "Письмо не отправлено, данный ресурс с php не работает";
    }

} else {
    // Если это не POST запрос - возвращаем код 403 (действие запрещено)
    http_response_code(403);
    echo "Данный метод запроса не поддерживается сервером";
}