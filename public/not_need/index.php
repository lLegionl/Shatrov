<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET" action="index.php">
    <input type="text" name="fullname">
    <input type="text" name="phone">
    <input type="text" name="email">
    <input type="submit">
    </form>
</body>
<?php 

setcookie("user[fullname]", $_GET['fullname'],time() + 3600,"/");
setcookie("user[phone]", $_GET['phone'],time() + 3600,"/");
setcookie("user[email]", $_GET['email'],time() + 3600,"/");

if (isset($_COOKIE['user']))
{
    foreach($_COOKIE['user'] as $name => $value)
    {
        echo $name . ": " . $value ."<br>";
    }
}

?>
</html>




