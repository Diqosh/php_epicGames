<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/EG/config/all.php";
if (validate($_POST['name'], $_POST['second-name'], $_POST['nickname'], $_POST['email'], $_POST['password'], $_POST['country'])) {

    $name =$_POST['name'];
    $second_name = $_POST['second-name'];
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $country = $_POST['country'];

    $prep = mysqli_prepare($connect, "select id from users where email=? or nickname=?");
    mysqli_stmt_bind_param($prep, "ss", $email, $nickname);
    mysqli_stmt_execute($prep);
    $query = mysqli_stmt_get_result($prep);

    if(mysqli_num_rows($query) > 0){
        header("Location: ".BASE_URL.'/pages/register.php?error=2');
        exit();
    }

    $hash = sha1($password);
    $prep1 = mysqli_prepare($connect, "insert into users(name,nickname, email,password, second_name, country) values (?, ? , ?, ?, ?, ?)");
    mysqli_stmt_bind_param($prep1, "ssssss", $name,$nickname, $email, $hash, $second_name, $country);
    mysqli_stmt_execute($prep1);



    header("Location: ".BASE_URL.'/pages/login.php');

}else{
    header("Location: ".BASE_URL.'/index.php?error=1');
}