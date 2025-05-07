<?php

function redirect($url) {
    header("Location: $url");
}

function logout() {
    if(isset($_SESSION["email"]) && isset($_SESSION["name"]) && isset($_SESSION["id"])){

       session_destroy();
       
    }
}


function upload($file) {
    $fileName = $file["name"];
    $fileSize = $file["size"];
    $fileTmp_name = $file["tmp_name"];
    $fileError = $file["error"];
    $NewFileName = uniqid("", true);

    // Extract file extension correctly
    $fileExt = explode(".", $fileName);
    $fileExt = strtolower(end($fileExt));
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/L-F_system/uploads/';

    if ($fileError === UPLOAD_ERR_OK && $fileSize < 10240000) {
        $destination = $uploadDir . $NewFileName . "." . $fileExt;
        if (move_uploaded_file($fileTmp_name, $destination)) {
            echo "File uploaded";
            return $NewFileName . "." . $fileExt;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


