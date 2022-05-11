
<?php require_once  $_SERVER['DOCUMENT_ROOT'] . "/EG/views/header.php"?>


<div class="register__wrapper">
    <form action="<?=BASE_URL?>/api/user/signin.php" class="register__form" method="post">
        <div class="register__logo">
            <img src="<?=BASE_URL?>/images/header/Epic_Games_logo.png" alt="">
        </div>
        <p>Аутентификация</p>

        <div class="register__email">
            <input type="text" name="email" id="" placeholder="Email">
        </div>
        <div class="register__password">
            <input type="password" name="password" id="" placeholder="Пароль">
        </div>

        <div class="register__conditions">
            <div class="register__checkbox"><input type="checkbox" name="stay_login"></div>
            <p>Remember me</p>
        </div>
        <div class="register__button">
            <button type="submit">Login in</button>
        </div>
        <div class="signup"><a href="<?=BASE_URL?>/pages/register.php">Sign Up?</a></div>
    </form>


</div>


<?php require_once  $_SERVER['DOCUMENT_ROOT'] . "/EG/views/footer.php"?>

