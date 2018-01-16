<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 09.11.2017
 * Time: 15:34
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
        .active {
            outline: 0.5px solid red;
        }
        #errors {
            color: crimson;
            position: relative;
            top:60%;
        }

    </style>
</head>
<body>

<h1>Тут можна залишити свій відгук про мій сайт</h1>

<form action="" method = "POST" enctype="multipart/form-data">
    Username:<input type="text" name = "user_name" required value = "<?= (isset($_POST['user_name']))
        ? htmlspecialchars($_POST['user_name'] ): '' ?>"
                    class = "<?= (isset($formErrors['user_name'])) ? 'active' : ''?>"
    ><br><br>
    Email:<input type="email" name = "email" required value="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ?>"
    class = "<?= isset($formErrors['email']) ? 'active' : '' ?>"
    ><br><br>
    Title: <input type="text" name = "title" value = "<?= isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '' ?>">
    <div id = "file">
        Upload photo:<input type="file" name = "photo">
        Upload file:<input type="file" name = "file">
    </div>
    <br>Leave your comment:
        <div><textarea name="comment" id="" cols="60" rows="15"></textarea></div>
    <br><br>
    <button>Submit</button>
</form>



</body>
</html>







