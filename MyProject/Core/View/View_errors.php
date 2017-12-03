<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 19.11.2017
 * Time: 19:05
 */

//foreach ($formErrors as $error){
//    var_dump($formErrors);
//
//}

//var_dump($formErrors);

function error_required(){
    echo 'Red fields are required!';

}
function error_user_name(){
    echo 'Username must contains at least 3 characters';

}
function error_email(){
    echo 'Email must contains at least 5 characters';

}


$validators = ['required','user_name','email'];

if(isset($formErrors)){
    foreach ($formErrors as $errors) {
        foreach ($errors as $one_error) {


            foreach ($validators as $one_valid) {
                if ($one_error == $one_valid) {
                    $function = 'error_' . $one_error;

                    if (function_exists($function)) {
                        ?>
                        <ul>
                        <li id = "errors"> <?=$function() ?>
                        </li>
                        </ul>
<?php
                    }

                }

            }

        }
    }

}

?>