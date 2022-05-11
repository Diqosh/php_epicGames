<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/EG/config/all.php";

if(isset($_POST['game_name'], $_POST['price'], $_POST['game_id'])){
    $game_name = $_POST['game_name'];
    $price = $_POST['price'];
    $game_id = $_POST['game_id'];
    if (isset($_FILES['image'], $_FILES['image']['name']) && strlen($_FILES['image']['name'] > 0)) {
        $query = mysqli_query($connect, "select image_path from games where id=$game_id");
        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            $old_path = __DIR__  . "/../../". $row['img'];
            if(file_exists($old_path)){
                unlink($old_path);
            }
        }


        $array = explode(".", $_FILES['image']['name']);
        $ext = end($array);
        $image_name = time() . '.' . $ext;

        $path = "images/products_image/" . $image_name;

        move_uploaded_file($_FILES['image']['tmp_name'], "../../images/products_image/$image_name");

        $prep = mysqli_prepare($connect, "update games set name=?, developer=1, price=?, image_path=? where id=?");
        mysqli_stmt_bind_param($prep, "sisi", $game_name, $price, $path, $game_id);
        mysqli_stmt_execute($prep);
        header('Location:' . BASE_URL . '/index.php');

    }else{
        $prep = mysqli_prepare($connect, "update games set name=?, developer=1, price=? where id=?");
        mysqli_stmt_bind_param($prep, "sii", $game_name, $price, $game_id);
        mysqli_stmt_execute($prep);
        header('Location:' . BASE_URL . '/index.php');

    }


}else{
    header('Location:' . BASE_URL . '/index.php?error=1');
}
