
<?php require_once  $_SERVER['DOCUMENT_ROOT'] . "/EG/views/header.php"?>


<div class="register__wrapper">
    <form action="<?=BASE_URL?>/api/user/signup.php" class="register__form" method="post">
        <div class="register__logo">
            <img src="<?=BASE_URL?>/images/header/Epic_Games_logo.png" alt="">
        </div>
        <p>Зарегестрироваться</p>

        <div class="register__country">
            <input type="text" name="country" id="" placeholder="Страна">
        </div>
        <div class="register__full-name">
            <div class="register__name">
                <input type="text" name="name" id="" placeholder="Имя">
            </div>
            <div class="register__second-name">
                <input type="text" name="second-name" id="" placeholder="Фамилия">
            </div>
        </div>
        <div class="register__nickname">
            <input type="text" name="nickname" id="" placeholder="Никнейм">
        </div>
        <div class="register__email">
            <input type="text" name="email" id="" placeholder="Email">
        </div>
        <div class="register__password">
            <input type="password" name="password" id="" placeholder="Пароль">
        </div>
        <div class="register__special-mail">
            <div class="register__checkbox"><input type="checkbox"></div>

            <p>I would like to receive news, surveys and special offers from Epic Games.</p>
        </div>
        <div class="register__conditions">
            <div class="register__checkbox"><input type="checkbox"></div>
            <p>I have read and agree to the </p>
        </div>
        <div class="register__button">
            <button type="submit">Sign Up</button>
        </div>
        <div class="signup"><a href="<?=BASE_URL?>/pages/login.php">Sign In?</a></div>
    </form>


</div>


<?php require_once  $_SERVER['DOCUMENT_ROOT'] . "/EG/views/footer.php"?>

