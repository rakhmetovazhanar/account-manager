<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Управление аккаунтами</title>
</head>
<body>
<?php
include_once('models/accounts.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $new_account = new Accounts();

    $new_account->setFirstName($_POST['first_name']);
    $new_account->setLastName($_POST['last_name']);
    $new_account->setEmail($_POST['email']);
    $new_account->setCompany($_POST['company']);
    $new_account->setPosition($_POST['position']);
    $new_account->setPhone1($_POST['phone1']);
    $new_account->setPhone2($_POST['phone2']);
    $new_account->setPhone3($_POST['phone3']);

    $new_account->insertData();
    echo "Аккаунт удачно создан";
}
?>

    <p><a href="list.php">Все аккаунты</a></p>

    <form method="post">
        <input type="text" name="first_name" placeholder="Имя" required>
        <input type="text" name="last_name" placeholder="Фамилия" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="company" placeholder="Компания">
        <input type="text" name="position" placeholder="Должность">
        <input type="tel" name="phone1" placeholder="Телефон 1">
        <input type="tel" name="phone2" placeholder="Телефон 2">
        <input type="tel" name="phone3" placeholder="Телефон 3">
        <input type="submit" name="create" value="Создать">
</div>
</body>
</html>
