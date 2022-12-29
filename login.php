<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Авторизация пользователей</title>
    <link href="css/style.css" media="screen" rel="stylesheet">
    <link href= 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head> 
<h1>SPA салон</h1>
<body>
    <div class="container mlogin">
    <?php
        session_start();
        include_once __DIR__ . '/functions.php'; //подключаем файл с функциями
        if ( null !== getCurrentUser() ) { //Если пользователь вошёл, то редирект на главную страницу
        header('Location: /index.php');
        exit;
        }
        if ( isset( $_POST['login'] ) ) {
            if ( isset( $_POST['password'] ) ) { //Если  данные введены в форму входа
                if ( checkPassword( $_POST['login'], $_POST['password'] ) ) { //проверяем введённые данные
                    $_SESSION['username'] = $_POST['login']; //делаем метку клиента
                    header('Location: /index.php'); //перенапрявляем на главную страницу
                exit;
                }
            }
        }
    ?>
    <h4>Авторизация</h4>
    <!--Форма входа на сайт-->
    <form action="/login.php" method="post">
    Логин:  <input type="text" name="login"><br>
    <br>
    Пароль: <input type="password" name="password"><br>
    <br>
    <button type="submit">Войти</button>
    </form>  
</div>
<div>
    <form action="uslugi.php" method="post"><br>
    <button type="submit">Услуги</button><br>
    </form>
    <form action="sale.php" method="post"><br>
    <button type="submit">Акции</button><br>
    </form>
    <form action="/salon.php" method="post"><br>
    <button type="submit">Фото салона</button><br>
    </form>
    <form action="/adres.php" method="post"><br>
    <button type="submit">Адрес</button><br>
    </form>
    <br>
    <br>
    <br>
</div>
    <a href="/gallery.php">Мои фотографии для акции</a>
    <footer>
        © <?php echo date('Y'); ?> SPA Салон. Все права защищены.
    </footer>
</body>
</html>