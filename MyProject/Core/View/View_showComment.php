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
require_once ROOT.'/core/models/Show_Comment.php';
 ?>

</body>
</html>
