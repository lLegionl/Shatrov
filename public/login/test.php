<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .info-container {
            display: flex;
            flex-direction: column; /* Выравниваем поля по вертикали */
            width: 300px; /* Ширина контейнера */
            margin: 20px auto; /* Центрирование по горизонтали */
            padding: 20px;
            border-radius: 5px;
            background-color: #f5f5f5; /* Светло-серый фон */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Тень */
        }
        .info-field {
            margin-bottom: 10px; /* Отступ между полями */
        }
        .info-label {
            font-weight: bold;
            margin-bottom: 5px; /* Отступ перед значением */
        }
        .info-value {
            color: #333; /* Темно-серый цвет значения */
        }
    </style>
</head>
<body>

    <div class="info-container">
        <div class="info-field">
            <span class="info-label">Имя:</span>
            <span class="info-value">Иван</span>
        </div>
        <div class="info-field">
            <span class="info-label">Email:</span>
            <span class="info-value">ivan@example.com</span>
        </div>
        <div class="info-field">
            <span class="info-label">Телефон:</span>
            <span class="info-value">+7 (999) 123-45-67</span>
        </div>
        <div class="info-field">
            <span class="info-label">Город:</span>
            <span class="info-value">Москва</span>
        </div>
    </div>

</body>
</html>