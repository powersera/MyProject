<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 18.11.2017
 * Time: 15:34
 */

function required($data){
    return !empty($data);

}

function user_name($data){
    if (strlen($data) < 3  ){
        return false;
    }else{
        return true;
    }

}

function email($data){
    if (strlen($data) < 5 ){
        return false;
    }else{
        return true;
    }
}


function validateForm($dataWithRules,$data){
        $errorForms = [];
    $fields = array_keys($dataWithRules);

    foreach ($fields as $fieldName){
        $fieldData = $data[$fieldName];
        $rules = $dataWithRules[$fieldName];
        foreach ($rules as $ruleName){
            if (!$ruleName($fieldData)){
                $errorForms[$fieldName][] = $ruleName;
            }

        }

    }

    return $errorForms;
}