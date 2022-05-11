<?php
include $_SERVER["DOCUMENT_ROOT"] . '/EG/config/all.php';
$result = mysqli_query($connect, "select * from event_games left outer join games on event_games.item_id=games.id");
$img_path_arr = array();
while ($row = mysqli_fetch_assoc($result)): ?>
    <?php
    if ($row['image_path'] != NULL)
        array_push($img_path_arr, $row['image_path']);
    else
        array_push($img_path_arr, 'images/products_image/1.png');

    ?>
<?php endwhile; ?>

<?php echo json_encode($img_path_arr) ?>