<?php 
// $DOC_ROOT = $_SERVER['DOCUMENT_ROOT'].'cyberfront'; // Dev URL
$DOC_ROOT = 'http://'.$_SERVER['HTTP_HOST'].'/cyberfront';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo $DOC_ROOT?>/assets/css/app.css">
    <link rel="stylesheet" href="<?php echo $DOC_ROOT?>/assets/css/main.min.css">
    <title>Document</title>
</head>
<body>

<header class="header">
    <nav class="nav">
        <ul class="nav--ul">
            <li class="nav--li"><a href="#" class="nav--a"></a></li>
            <li class="nav--li"><a href="<?php echo $DOC_ROOT?>/pages/login" class="nav--a" data-target-popup="registration">Авторизация</a></li>
            <li class="nav--li"><a href="<?php echo $DOC_ROOT?>/pages/registration" class="nav--a" data-target-popup="registration">Регистрация</a></li>
        </ul>
    </nav>
</header>
    