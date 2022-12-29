<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="utf-8">
    <title> Регистрация и авторизация пользователей</title>
    <link href="css/style.css" media="screen" rel="stylesheet">
   <link href= 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head> 
<body>
    
<?php
    session_start();
    include_once __DIR__ . '/functions.php';
    if ( null !== getCurrentUser() ) {
?>

<?php
    $date_today = date("d.m.y"); 
    $today[1] = date("H:i:s"); 
    echo("Дата: $date_today Время: $today[1]");
    $count = $_SESSION['count'] ?? 0;
    $count++;
    $_SESSION['count'] = $count;
?>
     Счетчик посещений: <?= $count ?>  
    <p>Здравствуйте, <?php echo getCurrentUser(); ?>.</p>
    <h1>SPA салон</h1>

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
    <p>Введите дату рождения для получения скидки 5%</p>
    <!--Ввод даты рождения-->
    <form action="/hbdate.php" method="post" enctype="multipart/form-data">
        <label for="start">Введите дату:</label>
        <input type="date" value="<?php echo date('Y-m-d'); ?>" required name="trip-start"><br>
        <br>
        <button type="submit">Добавить</button>
    </form>

    <p>Для получения скидки 50% по акции "Романтический вечер на двоих" добавьте фото Вашей пары.<br>
       Загрузка изображений в формате JPEG, JPG, PNG. Имя файла - Ваш номер телефона или Ваше имя.<br>
    </p>
    <!-- Форма загрузки нового изображения в папку images-->
    <form action="/upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="myimage">
        <button type="submit">Добавить</button>
    </form>
    <br>
    <a href="/gallery.php">Перейти в мою фотогалерею</a>
    <br>
    <br>
    <a href="/logout.php">Выход</a>
    <br>
    <footer>
        © <?php echo date('Y'); ?> SPA Салон. Все права защищены.
    </footer>
</body>
</html>
<?php
    }else {
    header('Location: /login.php');
    }
?>