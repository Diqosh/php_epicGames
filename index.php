<?php require_once dirname(__FILE__) . "/views/header.php"; ?>

<?php

$limit = 10;

$sql = "select games.* , d.name as game_name from games left join developer d on games.developer = d.id ";
$sql_count = "select ceil(count(*)/$limit) as total from games left join developer d on games.developer = d.id ";

//get games by profile

if (isset($_GET['gameDev'])) {
    $dev_id = $_GET['gameDev'];
    $sql .= "where games.developer = $dev_id";
    $sql_count .= "where games.developer = $dev_id";
}

$page = 1;
if (isset($_GET['page']) && intval($_GET['page'])) {
    $skip = ($_GET['page'] - 1) * $limit;
    $sql .= " limit $skip, $limit";
    $page = $_GET['page'];
} else {
    $sql .= " limit $limit";
}


$query_count = mysqli_query($connect, $sql_count);
$count = mysqli_fetch_assoc($query_count);


?>


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
<div class="primaryNavigation container">

    <div class="primaryNavigation__left">
        <div class="primaryNavigation__search ">
            <div class="primaryNavigation__search-img"><img src="images/primaryNavigation/search.svg" alt=""></div>
            <input type="text" placeholder="Search">
        </div>
        <div class="primaryNavigation__discover">Discover</div>
        <div class="primaryNavigation__browse">Browse</div>
        <div class="primaryNavigation__news">News</div>
    </div>
    <div class="primaryNavigation__right">
        <div class="primaryNavigation__wishlist"><a href="pages/add_game.php">add game</a></div>
        <div class="primaryNavigation__wishlist"><a href="pages/wishlist.php">Wishlist</a></div>
        <div class="primaryNavigation__cart">Cart</div>
    </div>

</div>

<?php include  dirname(__FILE__) . '/pages/slider.php'?>

<div class="main">
    <div class="main__products products_wrapper">
        <div class="container">
            <?php $result = mysqli_query($connect, $sql); ?>
            <div class="products__header">
                <div class="products__title">

                    <?php if (isset($_GET['gameDev']) && mysqli_num_rows($result)): ?>
                        <a href="?">Back</a>
                        <?php $row = mysqli_fetch_assoc($result);
                        echo $row['game_name'] ?>

                    <?php else: ?>
                        Новые релизы
                    <?php endif; ?>

                </div>
            </div>

            <div class="products__main ">

                <?php $result = mysqli_query($connect, $sql);
                while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="products__item">
                        <div class="product__image">
                            <?php if($row['image_path'] == NULL):?>
                                <img src="images/products_image/1.png" alt="">
                            <?php else:?>
                                <img src="<?=$row['image_path']?>" alt="">
                            <?php endif;?>
                            <button class="add_basket" onclick="add_wishlist(<?= $row['id'] ?>)"><img
                                        src="images/header/plus-solid.svg" alt=""></button>

                        </div>

                        <div class="product__text-wrapper">
                           <div class="product__title">
                                <?= $row["name"] ?>
                            </div>
                            <div class="product__dev">

                                <a href="?gameDev=<?= $row["developer"] ?>"><?= $row["game_name"] ?></a>
                            </div>
                        </div>
                        <div class="product__settings-wrapper">

                            <span><?= $row["price"] ?> $</span>
                            <div class="product__dots">
                                <img src="<?= BASE_URL ?>/images/products_image/dots.svg" alt="">



                                <div class="product__settings">
                                    <div class="product__edit">
                                        <a href="<?=BASE_URL?>/pages/edit_game.php?id=<?=$row["id"]?>">Edit</a>
                                    </div>
                                    <div class="product__delete">
                                        <a href="">Delete</a>
                                    </div>
                                </div>



                            </div>


                        </div>

                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>


<div class="pagination" style="margin-top: 40px;">
    <?php for ($i = 1; $i <= $count['total']; $i++): ?>

        <form action="" class="<?php  if(isset($_GET['page']) and $i == $_GET['page']){echo 'active';}?>">
            <?php if (isset($_GET['gameDev'])): ?>
                <input type="hidden" name="gameDev" value="<?= $_GET['gameDev'] ?>">
            <?php endif; ?>

            <button type="submit" name="page" value="<?= $i ?>"><?= $i ?></button>


        </form>
    <?php endfor; ?>
</div>



<script src="js/wishlist.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.0/axios.min.js"
        integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/EG/views/footer.php" ?>

