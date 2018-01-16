<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 16.01.2018
 * Time: 12:05
 */

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $browser = get_browser(null,true);
    $formData = [
        'user_name' => getSaveData(htmlspecialchars(trim($_POST['user_name']))),
        'email' => getSaveData(trim($_POST['email']))
    ];

    $rules = [
        'user_name'=> ['user_name','required'],
        'email' => ['required','email']
    ];

    $errors = validateForm($rules,$formData);
    if(empty($errors)){
        $sql = "INSERT INTO user (user_name, email,user_browser, user_ip) VALUES
('{$_POST['user_name']}','{$_POST['email']}','{$browser['browser']}','{$_SERVER['REMOTE_ADDR']}')";

        if( $id = insertDeleteUpdate($sql) ) {
            $query = "SELECT id FROM user WHERE id = $id";
            $sql_2 = "INSERT INTO post(author_id,title,comment) VALUES ( {$id},'{$_POST['title']}','{$_POST['comment']}')";
            if (insertDeleteUpdate($sql_2)) {
                echo 'Thank you. Your comment was added';

            }

        }else{
            echo 'Sorry, try again';

        }

    }else {
        RenderView('View_errors',$errors);
    }

    if (($_FILES['photo']['size'])>0 and ($_FILES['file']['size'])>0){
        echo "Choose only one option!!";
    }
    if(($_FILES['photo']['error'] == 0)){
        $func = uploadPhoto($_FILES['photo']);

    }elseif(($_FILES['file']['error']== 0)){
        $func = uploadFile($_FILES['file']);

    }




}
