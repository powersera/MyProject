<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 16.01.2018
 * Time: 11:54
 */

$q="SELECT count(*) FROM post";
$res=select($q);
$row=mysqli_fetch_row($res);
$total_rows=$row[0]; //22
$per_page = 10;
$num_pages = ceil($total_rows/$per_page);
$page = (isset($_GET['page'])) ? $_GET['page']-1 : 0;
$start = abs($page*$per_page);


for($i=1;$i<=$num_pages;$i++) {
    echo '<a href="?page='.$i.'">'.$i."</a>\n";
}

$sql = "SELECT author_id, title, comment, pub_date FROM post ORDER BY id DESC LIMIT $start,$per_page";

$comments = (mysqli_fetch_all(select($sql)));

foreach ($comments as $key => $value){
    $sql2 = "SELECT * FROM guestbook.user WHERE id = $value[0]";
    $user = mysqli_fetch_assoc(select($sql2));

    ?>

    <div id = "user">
        <?=$user['user_name'].'<br>';?>


    </div>
    <div id = "title">
        <?= $value[1].'<br>';?>


    </div>

    <div id = "comment">
        <?=$value[2].'<br>';?>
    </div>
    <div id = "date">
        <?=$value[3].'<br>';?>

    </div>
<?php }?>