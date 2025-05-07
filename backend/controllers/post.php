<?php

include "../utils.php";
include "../db/item.php";
include "../db/conn.php";

$name;
$type;
$location_found;
$description;
$file;
$contact_info;

if(isset($_POST["name"]) && isset($_POST["type"]) && isset($_POST["location_found"])&&isset($_POST["contact_info"]) &&isset($_POST["description"]) && isset($_FILES["file"])){

    $name = $_POST["name"];
    $type = $_POST["type"];
    $location_found = $_POST["location_found"];
    $description = $_POST["description"];
    $fileName = upload($_FILES["file"]);
    $contact_info = $_POST["contact_info"];
    if($fileName != 0){
       $file =  $fileName;

       if(Item::Create($name,$type,$description,$file,$location_found,$contact_info,$conn)){
         redirect("../../views/search.php");
       }
  }else{
        redirect("../views/post.php");
}



}