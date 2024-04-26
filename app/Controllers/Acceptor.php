<?php

namespace App\Controllers;

// use App\Models\CategoriesModel;
// use App\Models\ContentModel;
// use App\Models\UserModel;
// use App\Models\ArtistaModel;

class Acceptor extends BaseController
{
    public function Acceptor()
    {
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
/***************************************************
 * Only these origins are allowed to upload images *
 ***************************************************/
$accepted_origins = array("http://localhost", "http://192.168.1.1", "http://127.0.0.1:8000", "http://127.0.0.1");

/*********************************************
 * Change this line to set the upload folder *
 *********************************************/

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
            header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            header("HTTP/1.1 200 OK");
            return;
        } else {
            header("HTTP/1.1 403 Origin Denied");
            return;
        }
    }
} elseif ($method == 'POST') {
    $imageFolder = "images/";
    reset($_FILES);
    $temp = current($_FILES);
    if (is_uploaded_file($temp['tmp_name'])) {
        header('CUS_MSG1: hello');
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            // same-origin requests won't set an origin. If the origin is set, it must be valid.
            if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
                header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            } else {
                header("HTTP/1.1 403 Origin Denied");
                return;
            }
        }

        /*
    If your script needs to receive cookies, set images_upload_credentials : true in
    the configuration and enable the following two headers.
     */
        // header('Access-Control-Allow-Credentials: true');
        // header('P3P: CP="There is no P3P policy."');

        // Sanitize input
        if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
            header("HTTP/1.1 400 Invalid file name.");
            return;
        }

        // Verify extension
        if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
            header("HTTP/1.1 400 Invalid extension.");
            return;
        }

        // Accept upload if there was no origin, or if it is an accepted origin
        $filetowrite = $imageFolder . $temp['name'];
        move_uploaded_file($temp['tmp_name'], $filetowrite);

        // Respond to the successful upload with JSON.
        // Use a location key to specify the path to the saved image resource.
        // { location : '/your/uploaded/image/file'}
        echo json_encode(array('location' => 'http://' . $_SERVER['SERVER_NAME'] . '/' . $filetowrite));
    } else {
        // Notify editor that the upload failed
        header("HTTP/1.1 500 Server Error");
    }
} else {
    // Notify editor that the upload failed
    header("HTTP/1.1 500 Server Error");
}
}
}
