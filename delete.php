<?php
include_once('models/accounts.php');


$data = new Accounts();

if(isset($_GET['id']) && isset($_GET['req'])) {
    if($_GET['req'] == 'delete'){
        $data->setId($_GET['id']);
        $data->deleteData();
        header("Location: list.php?deleted=true");
        exit;     }
}
?>