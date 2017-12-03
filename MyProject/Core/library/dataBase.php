<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 09.11.2017
 * Time: 15:48
 */

function connectToDb()
{
    $config = require 'core/config/db_config.php';

    $link = mysqli_connect($config ['host'], $config ['login'], $config ['password'], $config['db_name']);

    if (!$link) {
        echo 'Connection Error!!';
        die();

    }
    return $link;
}

function selectData($sql) {
    $link = connectToDb();
    $res = mysqli_query($link,$sql);

    if (!$res){
        die(mysqli_error($link));

    }
    return $res;




}

function insertDeleteUpdate($sql){
    $link = connectToDb();
    $res = mysqli_query($link,$sql);

    if(!$res){
        die(mysqli_error($link));
    }
    return mysqli_insert_id($link);

}

/**
 * @param $str
 * @return mixed
 */
function getSaveData($str){
    $link = connectToDb();
    $res = mysqli_real_escape_string($link,$str);
    return $str;

}

function select($sql){
    $link = connectToDb();
    $res = mysqli_query($link,$sql);

    if(!$res) {
        die(mysqli_error($link));
    }

    return $res;

}