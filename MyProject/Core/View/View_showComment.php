<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 15.11.2017
 * Time: 3:12
 */

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>

        #title{
            text-align: center;
            width:15%;
            margin:5px;
            padding:10px;
            border: 3px solid red;
            position:relative;
            left: 18%;
            font-family: Calibri;
        }

        #comment{
            width:50%;
            border: 3px solid blueviolet;
            margin:5px;
            text-align: center;
            padding:15px;
            font-size:1.3em;
            font-family: Verdana;

        }
        #user{
            margin: 5px;
            font-size: 1.3em;
            font-weight: bold;
            border: 5px solid gold;
            width: 30%;
            text-align: center;


        }

    </style>
</head>
<body>


        <?php

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

?>



<?php

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

</body>
</html>
