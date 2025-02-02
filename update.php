<?php
include_once('models/accounts.php');

$new_data = new Accounts();
$id = $_GET['id'];
$new_data->setId($id);

if(isset($_POST['update'])) {
    $new_data->setFirstName($_POST['first_name']);
    $new_data->setLastName($_POST['last_name']);
    $new_data->setEmail($_POST['email']);
    $new_data->setCompany($_POST['company']);
    $new_data->setPosition($_POST['position']);
    $new_data->setPhone1($_POST['phone1']);
    $new_data->setPhone2($_POST['phone2']);
    $new_data->setPhone3($_POST['phone3']);

    $new_data->updateData();
    header("Location: list.php?updated=true");
    exit;  
}
$updatedData = $new_data->fetchOneAcc();
$value=$updatedData[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
<p><a href="list.php">Все аккаунты</a></p>

    <form method="post">
        <input type="text" name="first_name" value="<?php echo $value['first_name'];?>" placeholder="Имя" required>
        <input type="text" name="last_name" value="<?php echo $value['last_name'];?>" placeholder="Фамилия" required>
        <input type="email" name="email" value="<?php echo $value['email'];?>" placeholder="Email" required>
        <input type="text" name="company" value="<?php echo $value['company'];?>" placeholder="Компания">
        <input type="text" name="position" value="<?php echo $value['position'];?>" placeholder="Должность">
        <input type="tel" name="phone1" value="<?php echo $value['phone1'];?>" placeholder="Телефон 1">
        <input type="tel" name="phone2" value="<?php echo $value['phone2'];?>" placeholder="Телефон 2">
        <input type="tel" name="phone3" value="<?php echo $value['phone3'];?>" placeholder="Телефон 3">
        <input type="submit" name="update" value="Редактировать">
    </form> 
</body>
</html>
