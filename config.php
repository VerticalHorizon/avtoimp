<?php
/**
 * Created by PhpStorm.
 * User: karellen
 * Date: 4/19/17
 * Time: 10:37 PM
 */


$app_name       = 'АвтоДискаунтер';
$to         = 'danny_kent@mail.ru';
$subject    = 'Новый заказ!';

//$headers = "From: " . strip_tags($_POST['req-email']) . "\r\n";
//$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$fields = [
    "car_brand" => "Марка автомобиля",
    "name"  => "Имя",
    "phone" => "Телефон",
    "email" => "E-mail",
    "new"   => "Нужны новые",
    "old"   => "Нужны б/у",
    "car_model" => "Модель",
    "car_year"  => "Год выпуска",
    "car_vin"  => "VIN",
    "description"   => "Дополнительно",
];