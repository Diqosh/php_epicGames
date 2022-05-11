<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/EG/views/header.php";
session_start();
$user_id = $_SESSION['user_id'];
 ?>
<header class="header" >
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
<div class="primaryNavigation container">

    <div class="primaryNavigation__left">
        <div class="primaryNavigation__search ">
            <div class="primaryNavigation__search-img"><img src="<?=BASE_URL?>/images/primaryNavigation/search.svg" alt=""></div>
            <input type="text" placeholder="Search">
        </div>
        <div class="primaryNavigation__discover">Discover</div>
        <div class="primaryNavigation__browse">Browse</div>
        <div class="primaryNavigation__news">News</div>
    </div>
    <div class="primaryNavigation__right">
        <div class="primaryNavigation__wishlist"><a href="">Wishlist</a></div>
        <div class="primaryNavigation__cart">Cart</div>
    </div>

</div>
<?php if(isset($user_id)):?>

<div class="main container">
    <div class="main__content content">
        <div class="content__title">Wishlist</div>
        <div class="content__wrapper">
            <?php $result = mysqli_query($connect, "select basket.*, g.name as name, g.price as price from basket  join games g on basket.item_id = g.id  where user_id = $user_id");
             if( mysqli_num_rows($result)):?>

                 <?php while ($row = mysqli_fetch_assoc($result)): ?>

                    <div class="game">
                        <div class="game__content">
                            <div class="game__image"><img src="<?=BASE_URL?>/images/products_image/1.png" alt=""></div>
                            <div class="game__content-left">
                                <div class="game__title-wrapper">
                                    <div class="game__base">base game</div>
                                    <div class="game__title"><?=$row['name']?></div>
                                </div>
                                <div class="game__platform">
                                    <img src="<?=BASE_URL?>/images/wishlist/windows-brands.svg" alt="">
                                </div>

                            </div>
                            <div class="game__content-right">
                                <div class="game_price">$ <?=$row['price']?></div>
                                <div class="game__btns">
                                    <div class="game__remove" onclick="remove_wishlist(event, <?=$row['id']?>)">Remove</div>
                                    <div class="game__addToCart">add to cart</div>
                                </div>
                            </div>
                        </div>
                    </div>

                 <?php endwhile; ?>

             <?php endif;?>




        </div>
    </div>
    <div class="main__filter"></div>
</div>
<?php else:?>
<div class="main container" style="margin-top: 50px; font-size: 32px">Please login</div>


<?php endif;?>
<script src="<?=BASE_URL?>/js/wishlist.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.0/axios.min.js"
        integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/EG/views/footer.php" ?>
