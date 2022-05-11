<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/EG/config/all.php";
$data = json_decode(file_get_contents('php://input'), true);
if(isset($data['item_id']) && strlen($data['item_id'])){
    session_start();

    if(isset($_SESSION['user_id'])){

        $user = $_SESSION['user_id'];
        $item = $data['item_id'];
        $result = mysqli_query($connect, "insert into basket(user_id, item_id) values ($user, $item)");


    }else{
        header("Location: ".BASE_URL.'/index.php?error=2');
    }
}else{
    header("Location: ".BASE_URL.'/index.php?error=2');
}