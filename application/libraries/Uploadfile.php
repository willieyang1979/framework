<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User:zhangweiwei
 * Date: 17/3/15
 * Time: 下午4:25
 */
//$type 为图片类型，$imgpath 图片存放路径相对于public/image/images为基准，，返回图片路径，与数据库路径一致
class Uploadfile{

    public function upload_files($filename,$type,$imgpath)
    {   $path = $_SERVER['DOCUMENT_ROOT'].'/public/image/uploads/'.$imgpath;
        if (! file_exists ( $path )) {
            mkdir ( "$path", 0777, true );
        }
        $filetype =substr(strrchr($filename['name'], '.'), 1);
        $newname = $type.'.'.$filetype;
        if(move_uploaded_file($filename["tmp_name"], $path. $newname)){
            return $imgpath.$newname;
        }else{
            return false;
        }
    }

}

?>

