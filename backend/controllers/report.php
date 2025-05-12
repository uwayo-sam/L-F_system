<?php 
session_start();

include "../db/conn.php";
include "../db/Found_item.php";
include "../utils.php";

if(isset($_POST['location']) && isset($_POST['time']) && isset($_POST['phone']) && isset($_POST['description'])){
    if(!empty($_POST['location']) && !empty($_POST['time']) && !empty($_POST['phone']) && !empty($_POST['description'])){

        $name = $_SESSION['name'];
        $phone = $_POST['phone'];
        $lost_time = $_POST['time'];
        $location = $_POST['location'];
        $description = $_POST['description'];
        $item_Id = $_SESSION['I_id'];


        Found_item::Create($name,$location,$description,$phone,$lost_time,$item_Id,$conn);
        redirect('../../views/search');
    }
}