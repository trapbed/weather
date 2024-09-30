<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Погода в Уфе</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    button:hover{
        background-color: pink;
    }
</style>
</head>
<body>
    <div>
        <button onclick="seek('Нефтекамске', '522942')">Нефтекамск</button>
        <button onclick="seek('Южно-Сахалинске', '3169070')">Рим</button>
        <button onclick="seek('Нью-Йорке', '5128581')">Нью-Йорк</button>
        <button onclick="seek('Дели', '1273294')">Дели</button>
        <button onclick="seek('Кирове', '548410')">Киров</button>
    </div>
<h1 id="textSeek"></h1>
<div id="weather">
<p>Загрузка данных...</p>
</div>

<script>
$.ajax({
        url: 'get_weather.php',
        type: 'GET',
        
        success: function(data) {
        var weather = JSON.parse(data);
        var html = "<p>Температура: " + weather.main.temp + "°C</p>";
        html += "<p>Описание: " + weather.weather[0].description + "</p>";
        html += "<p>Влажность: " + weather.main.humidity + "%</p>";
        $('#weather').html(html);
        
            // let city =weather.name;
            let str = 'Текущая погода в городе Уфа';
            $("#textSeek").text(str);
        },
        error: function() {
        $('#weather').html('<p>Ошибка при получении данных</p>');
        }
    });

// $(document).ready(function() {
    console.log(111);
    // Отправляем запрос на сервер для получения погоды
function seek(city, id){
    console.log(777);
    $.ajax({
        url: 'get_weather.php',
        type: 'GET',
        data: {
            id:id,
            city: city,
        },  
        success: function(data) {
            var weather = JSON.parse(data);
            console.log(weather);
            var html = "<p>Температура: " + weather.main.temp + "°C</p>";
            html += "<p>Описание: " + weather.weather[0].description + "</p>";
            html += "<p>Влажность: " + weather.main.humidity + "%</p>";
            $('#weather').html(html);
            let city =weather.name;
            let str = 'Текущая погода в городе '+weather.name;
            $("#textSeek").html(str);
            // console.log(weather.name);

        },
        error: function() {
        $('#weather').html('<p>Ошибка при получении данных</p>');
        }
    })
}

// });
</script>
</body>
</html>
