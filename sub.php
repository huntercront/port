<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cront</title>
    <link rel="icon" href="img/fav.png" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- main css -->
    <link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <!-- modernizr -->
    <script src="js/modernizr.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
 
/* Задаем переменные */
$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$object = htmlspecialchars($_POST["object"]);
$message = htmlspecialchars($_POST["message"]);
$bezspama = htmlspecialchars($_POST["bezspama"]);
 
/* Ваш адрес и тема сообщения */
$address = "huntercront@yandex.ru";
$sub = "Сообщение с сайта crontfolio.ru";
 
/* Формат письма */
$mes = "Сообщение с сайта crontfolio.ru.\n
Имя отправителя: $name 
Электронный адрес отправителя: $email
Тема сообщения: $object
Текст сообщения:
$message";
 
if (empty($name) or empty($message))
{
	 header('Refresh: 5; index.html');
 echo '<section class="box-intro">
            <div class="table-cell">
                <h1 class="box-headline letters rotate-2">
		        </h1>
		        <span class="fa-stack fa-lg fa-5x">
  <i class="fas fa-envelope fa-stack-1x" style="color: #ffbf00"></i>
  <i class="fa fa-ban fa-stack-2x"></i>
</span>
                <h5>Сожалею письмо</h5>
                <a class="btn btn-box">НЕ отправлено</a>
            </div>
        </section>';}
else
{
if (empty($bezspama)) /* Оценка поля bezspama - должно быть пустым*/
{
/* Отправляем сообщение, используя mail() функцию */
$from  = "From: $name <$email> \r\n Reply-To: $email \r\n";
if (mail($address, $sub, $mes, $from)) {
 header('Refresh: 3; index.html');
 echo '<section class="box-intro">
            <div class="table-cell">
                <h1 class="box-headline letters rotate-2">
		        </h1>
		        <i class="fas fa-envelope fa-5x" style="color: #ffbf00"></i>
                <h5>Поздравляю письмо</h5>
                  <div class="col-md-12">
                        <a class="btn btn-box">Отправлено</a>
                    </div>
            </div>
        </section>';}
else {
 header('Refresh: 3; index.html');
 echo '<section class="box-intro">
            <div class="table-cell">
                <h1 class="box-headline letters rotate-2">
		        </h1>
		        <span class="fa-stack fa-lg fa-5x">
  <i class="fas fa-envelope fa-stack-1x" style="color: #ffbf00"></i>
  <i class="fa fa-ban fa-stack-2x"></i>
</span>
                <h5>Сожалею письмо</h5>
                <a class="btn btn-box">НЕ отправлено</a>
            </div>
        </section>';}
}
}
exit; /* Выход без сообщения, если поле bezspama заполнено спам ботами */

?>
</body>
    <!-- jQuery -->
    <script src="js/jquery-2.1.1.js"></script>
    <!--  plugins -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/animated-headline.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>


    <!--  custom script -->
    <script src="js/custom.js"></script>
</html>