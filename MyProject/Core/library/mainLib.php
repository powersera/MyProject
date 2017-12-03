<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 08.11.2017
 * Time: 23:50
 */


function RenderView($file, $formErrors){
    require_once 'Core/View/'.$file.'.php';


}



function resizePhoto($pathToPhoto,$ext){

    $types = ['jpeg', 'png', 'gif','bmp'];

    $TempoPath = $_FILES['photo']['tmp_name'];

  switch($ext){
      case 'jpg':
          $img = imagecreatefromjpeg($TempoPath);
          break;
      case 'png':
          $img = imagecreatefrompng($TempoPath);
          break;
      case 'bmp':
          $img = imagecreatefrombmp($TempoPath);
        break;
  }

    $size = getimagesize($TempoPath);
    $width = $size[0];
    $height = $size[1];

    $new_width = 200;
    $new_height = 200;

    $new_img = imagecreatetruecolor($new_width,$new_height);
    imagecopyresampled($new_img, $img,0,0,0,0,$new_width,$new_height,$width,$height);

    switch($ext){
        case 'jpg':
            $res = imagejpeg($new_img,'core/Photos/'.time().'.'.$ext);
            break;
        case 'png':
            $res  = imagepng($new_img,'core/Photos/'.time().'.'.$ext);
            break;
        case 'bmp':
            $res  = imagebmp($new_img,'core/Photos/'.time().'.'.$ext);
            break;

    }

    imagedestroy($img);
    imagedestroy($new_img);
    return $res;

}

function uploadPhoto($photo){

$types = ['jpg', 'png', 'gif','bmp'];

    $dest = 'D:/Server/Web/Apache/htdocs/Project_Guestbook/Core/Photos'.
        '/'.time().'.'.pathinfo($photo['name'],PATHINFO_EXTENSION);

$ext = substr(strtolower(strrchr($photo['name'],'.') ),1);
/*if ($photo['error'] == 0){
    if (in_array($ext,$types)){

        $file = move_uploaded_file($photo['tmp_name'],$dest);
        if($file) echo "Image was successfuly downloaded!";
    }else {
        echo "Error occured. Try again";
    }

    }else{
        echo 'Incorrect type of image!';
    }*/



    resizePhoto($dest,$ext);

}

function uploadFile($file){

    $ext = substr(strtolower(strrchr($file['name'],'.') ),1);
    $dest = 'core/Files/'.time().'.'.$ext;
    $res = false;
    if($file['size']< 200 and $ext = 'txt'){
        $res = move_uploaded_file($file['tmp_name'],$dest);
    }else {
        echo 'Incorrect size or type!';
    }
    return $res;

}