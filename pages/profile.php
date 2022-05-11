<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/EG/views/header.php" ?>


<?php  ?>



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

<div class="main">
    <div class="main__products products_wrapper">
        <div class="container">
            <div class="products__header">
                <div class="products__title">
                    Новые релизы
                </div>
            </div>
            <!--            <div class="slider__wrapper">-->
            <!--                <div class="slider_big">-->
            <!--                    --><?php //$result = mysqli_query($connect, "select * from games");
            //                    while ($row = mysqli_fetch_assoc($result)): ?>
            <!--                        <div class="products__item">-->
            <!--                            <div class="product__image">-->
            <!--                                <img src="images/products_image/1.png" alt="">-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    --><?php //endwhile; ?>
            <!--                </div>-->
            <!--                <div class="products__main slider">-->
            <!--                    --><?php //$result = mysqli_query($connect, "select * from games");
            //                    while ($row = mysqli_fetch_assoc($result)): ?>
            <!--                        <div class="products__item">-->
            <!--                            <div class="product__image">-->
            <!--                                <img src="images/products_image/1.png" alt="">-->
            <!--                            </div>-->
            <!--                            <div class="product__title">-->
            <!--                                --><? //= $row["name"] ?>
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    --><?php //endwhile; ?>
            <!--                </div>-->
            <!--            </div>-->
            <div class="products__main ">
                <?php $result = mysqli_query($connect, "select * from games");
                while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="products__item">
                        <div class="product__image">
                            <img src="<?=BASE_URL?>/images/products_image/1.png" alt="">
                        </div>
                        <div class="product__text-wrapper">
                            <div class="product__title">
                                <?= $row["name"] ?>
                            </div>
                        </div>

                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>


<div class="developer-login__wrapper">

    <div href="" class="developer-login__button"><i class="fas fa-angle-left"></i></div>

    <div class="developer-login__title">
        Are u developer?
    </div>
    <form action="">
        <div class="developer-login__login">
            <input type="text" placeholder="email" name="email">
        </div>
        <div class="developer-login__password">
            <input type="password" placeholder="password" name="password">
        </div>
        <button class="developer-login__sbmt" type="submit">Login</button>
    </form>
</div>


<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/EG/views/footer.php" ?>



