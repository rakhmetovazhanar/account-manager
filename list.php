<?php
include_once('config/DBConnection.php');
include_once('models/accounts.php');
include_once('delete.php');

$page = isset($_GET['page-num']) && is_numeric($_GET['page-num']) ? (int)$_GET['page-num'] : 1;
$data_list = $data->fetchAllData($page);
$totalPages = $data->numOfPages();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<p><a class="account" href="index.php">Создать аккаунт</a></p>
    <!-- вывод данных аккаунтов -->
<?php
foreach($data_list as $key => $value) { 
?>

    <div class="card">
        <p class="name" name="first_name">ФИО: <?=$value['first_name']?></p>   
        <p class="name" name="last_name"><?=$value['last_name']?></p> 
        <p class="email" name="email">Электронная почта: <?=$value['email']?></p> 
        <p name="company">Компания: <?=$value['company']?></p>
        <p name="position">Позиция: <?=$value['position']?></p>
        <p name="phone1">Телефон 1: <?=$value['phone1']?></p>
        <p name="phone2">Телефон 2: <?=$value['phone2']?></p>
        <p name="phone3">Телефон 3: <?=$value['phone3']?></p>
        <p class="btn"><a href="delete.php?id=<?=$value['id']?>&req=delete">Удалить</a></p>
        <p class="btn2"><a href="update.php?id=<?=$value['id']?>">Редактировать</a></p>
    </div>
<?php
}
?>
    <!-- alert после удаление и редактирования аккаунта -->
<?php
if (isset($_GET['deleted']) && $_GET['deleted'] == 'true') {
    echo "<script>alert('Аккаунт успешно удален');</script>";
}

if (isset($_GET['updated']) && $_GET['updated'] == 'true') {
    echo "<script>alert('Аккаунт успешно редактирован');</script>";
}

?>

    <!-- pagination -->
<div class="pages">Страница 1 от <?php echo $totalPages ?></div>
<div class="pagination">
    <!-- начало начинается с первой стр -->
    <a href="?page-num=1">Начало</a>

    <!-- Если на странице после 1, отнимаем 1, чтобы попасть в previous page -->
    <?php if($page > 1) { ?>
        <a href="?page-num=<?php echo $page - 1 ?>">Назад</a>
    <?php } ?>

    <!-- цифры страниц -->
    <?php for($counter=1; $counter<=$totalPages; $counter++){ ?>
        <a href="?page-num=<?php echo $counter ?>" 
           class="<?php echo ($counter == $page) ? 'active' : ''; ?>">
            <?php echo $counter ?>
        </a>
    <?php } ?>

    <!-- вперед, если не последняя страница -->
    <?php if($page < $totalPages) { ?>
        <a href="?page-num=<?php echo $page + 1 ?>">Вперед</a>
    <?php } ?>

    <!-- последняя страница -->
    <a href="?page-num=<?php echo $totalPages ?>">Конец</a>
</div>

    </div>
</body>
</html>