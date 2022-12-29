<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Скидки</title>
    <link href="css/style.css" media="screen" rel="stylesheet">
    <link href= 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head> 
<body>
<h1>Количество дней до Вашего дня Рождения</h1>
<?php
    session_start();
    if (isset($_POST['trip-start'])) {
        $date = explode('-', $_POST['trip-start']);
        $now = time();
        $dr = mktime(00, 00, 00, $date[1], $date[2], $date[0]);
        if ($dr > $now) {
            echo floor(($dr - $now) / 60 / 60 / 24+1);
        } elseif($dr == $date[2]){
        }else {
            echo "У Вас сегодня день рожднеия!"; 
        }
    }
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <a href="/index.php">Вернуться назад </a>
    <footer>
        © <?php echo date('Y'); ?> SPA Салон. Все права защищены.
    </footer>
</body>
</html>