
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/EG/views/header.php" ?>


<header class="header">
    <div class="header__leftNav leftNav">
        <img src="<?= BASE_URL ?>/images/header/Epic_Games_logo.png" alt="logo" class="logo">
        <ul class="leftNav_menu">

            <li class="leftNav__item"><a href="">store</a></li>
            <li class="leftNav__item"><a href="">faq</a></li>
            <li class="leftNav__item"><a href="">help</a></li>
            <li class="leftNav__item"><a href="">unreal engine</a></li>


        </ul>
    </div>
    <div class="header__burger">
        <span></span>
    </div>

    <div class="header__rightNav rightNav">
        <ul class="rightNav">
            <li class="rightNav__item"><img src="<?= BASE_URL ?>/images/header/earth.svg" alt="earth"></li>
            <?php
            session_start();
            if (isset($_SESSION['user_id'])):
                ?>
                <li class="rightNav__item"><span class="rightNav__person"><img
                            src="<?= BASE_URL ?>/images/header/person.svg" alt="person"><span
                            class="person__green-circle"></span></span><a
                        href=""><?= $_SESSION['user_nickname'] ?></a>
                </li>
                <li class="rightNav__item"><a href="<?= BASE_URL ?>/api/user/signout.php"
                                              style="color: red; flex-basis: 100px">Выход</a>
                </li>
            <?php else: ?>
                <li class="rightNav__item"><span class="rightNav__person"><img
                            src="<?= BASE_URL ?>/images/header/person.svg" alt="person"><span
                            class="person__green-circle"></span></span><a href="<?= BASE_URL ?>/pages/login.php">Sign
                        in</a>
                </li>

            <?php endif; ?>
            <li class="rightNav__item"><a href="">Download</a></li>

        </ul>
    </div>


</header>



<div class="edit_wrapper container">
    <form class="edit_from" action="<?=BASE_URL?>/api/game/add.php" enctype="multipart/form-data" method="post">
        <input class="edit__name" type="text" name="name">
        <input class="edit__price" type="text" name="price">

        <input type="file" name="image">
        <button type="submit">Submit</button>
    </form>


</div>
