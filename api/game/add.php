<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/EG/config/all.php";

if(isset($_POST['name'], $_POST['price'])){
    $game_name = $_POST['name'];
    $price = $_POST['price'];

    if (isset($_FILES['image'], $_FILES['image']['name']) && strlen($_FILES['image']['name'] > 0)) {
        $array = explode(".", $_FILES['image']['name']);
        $ext = end($array);
        $image_name = time() . '.' . $ext;

        $path = "images/products_image/" . $image_name;

        move_uploaded_file($_FILES['image']['tmp_name'], "../../images/products_image/$image_name");

        $prep = mysqli_prepare($connect, "insert into games( name, developer, price, image_path) values (?, 1 , ?, ?)  ");
        mysqli_stmt_bind_param($prep, "sis", $game_name, $price, $path);
        mysqli_stmt_execute($prep);
        header('Location:' . BASE_URL . '/index.php');

    }else{
        $prep = mysqli_prepare($connect, "insert into games( name, developer, price) values (?, 1 , ?)  ");
        mysqli_stmt_bind_param($prep, "si", $game_name, $price);
        mysqli_stmt_execute($prep);
        header('Location:' . BASE_URL . '/index.php');

    }


}else{
    header('Location:' . BASE_URL . '/index.php?error=1');
}
