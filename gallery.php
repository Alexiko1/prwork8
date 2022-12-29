<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Загрузка фотографии</title>
    <link href="css/style.css" media="screen" rel="stylesheet">
    <link href= 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head> 
<body>
		<h1>Ваши фотографии для получения скидки</h1>
		<h2>Скидка действует 1 раз в сезон</h2>
<?php
    session_start();
    $timer = 86400 - (time() - $_SESSION['time']);
    if($timer > 0){
    echo "До конца акции осталось   ".$timer."  секунд";
    }else{
    ?><a href="?start=true">Начать акцию</a><?
    }
    //запускаем таймер
    if(@$_GET['start'] && $timer <=0){
    $_SESSION['time'] = time();
    }else{
    }
?>
<?php
    $list = scandir(__DIR__ . '/images');
    $list = array_diff($list, ['.', '..']);
    // Выводим в браузер изображения из папки images
        foreach ($list as $img) {
            ?>
            <img src="/images/<?php echo $img; ?>" height="30%">
            <?php
        }
        ?>
        <br>
        <br>
        <a href="/index.php">Вернуться назад </a>
    <footer>
        © <?php echo date('Y'); ?> SPA Салон. Все права защищены.
    </footer>
</body>
</html>