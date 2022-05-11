<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/EG/config/all.php";
$data = json_decode(file_get_contents('php://input'), true);
if(isset($data['basket_id']) && strlen($data['basket_id'])){
    session_start();

    if(isset($_SESSION['user_id'])){


        $id = $data['basket_id'];
        echo mysqli_query($connect, "delete from basket where id = $id");


    }else{
        echo "error1";
    }
}else{
    echo "error2";
}
