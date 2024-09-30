
<?php
// Ваш API-ключ

$apiKey = "07acc40303e9bfb71a2be2676e3110d2";
// echo "rtrg";
// ID города Уфа (у OpenWeatherMap у каждого города есть свой ID)
$cityId = isset($_GET['id'])? $_GET['id']: "479561"; // ID для Уфы

// Формируем URL для запроса к API OpenWeatherMap
$url = "http://api.openweathermap.org/data/2.5/weather?id={$cityId}&units=metric&lang=ru&appid={$apiKey}";

// Выполняем запрос к API
$response = file_get_contents($url);

// Выводим полученные данные
echo $response;

?>