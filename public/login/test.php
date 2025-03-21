<?php session_start();
include "db.php"; ?>
<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.input_reg {
  border: 1px solid #ccc;
  padding: 20px;
  border-radius: 5px;
  width: 300px; /* Устанавливаем максимальную ширину */
  max-width: 300px; /* Устанавливаем максимальную ширину */
}

.input_wrapper {
  list-style: none;
  padding: 0;
  margin: 0;
}

.input_wrapper li {
  margin-bottom: 10px;
}

.input_wrapper li label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

.input_style {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
  box-sizing: border-box;
}

.edit_btn {
  background-color: #4CAF50; /* Зеленый цвет */
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  border-radius: 4px;
  cursor: pointer;
}

.edit_btn:hover {
  background-color: #3e8e41; /* Более темный зеленый при наведении */
}</style>
<body>
<div class="input_reg">
            <form action="registration.php" method="POST">            
                <ul class="input_wrapper">
                Login
                <li><input type="text" class="input_style" name="login"></li>
                Name
                <li><input type="text" class="input_style" name="name"></li>
                Surname
                <li><input type="text" class="input_style" name="surname"></li>
                phone_number
                <li><input type="text" class="input_style" name="phone"></li>
                password
                <li><input type="text" class="input_style" name="password"></li>
                <li><input class="edit_btn" type="submit" value="send"></li>
            </ul>
            </form>
        </div>';

</body>
</html>