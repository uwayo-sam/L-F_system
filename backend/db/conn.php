<?php
$host ='localhost';
$user= 'root';
$password='';
$db= 'lost_found';

$conn = new mysqli($host,$user,$password,$db);

if (!$conn) {
    
    die('connection error');
    # code...
}





