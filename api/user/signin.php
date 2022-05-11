<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/EG/config/all.php";
    if(validate($_POST["email"], $_POST["password"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $hash = sha1($password);

        $prep = mysqli_prepare($connect, "select * from users where email=? and password=?");
        mysqli_stmt_bind_param($prep, "ss", $email, $hash);
        mysqli_stmt_execute($prep);
        $query = mysqli_stmt_get_result($prep);
        if(mysqli_num_rows($query) != 1){
            header("Location: ".BASE_URL.'/pages/login.php?error=4');
            exit();
        }
        $row = mysqli_fetch_assoc($query);
        session_start();
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["user_nickname"] = $row["nickname"];
        $_SESSION['is_admin'] = $row["is_admin"];

        //get_name




        $_SESSION["user_name"] = $row["id"];
        header("Location: ".BASE_URL."/index.php");

    }else {
        header("Location: " . BASE_URL . '/pages/login.php?error=3');
    }

