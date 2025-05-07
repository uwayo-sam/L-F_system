<?php 

include 'conn.php';

// create resource crud for user model

class User{
    //for creating user
    public static function Create($name,$email,$password,$db){
        $sql = "INSERT INTO users(name, email, password) VALUES ('$name','$email','$password');";
     
        if($db->query($sql)){
            return true;
        }else{
            return false;
            
        }
    }
    //for get all user exits in database
    public static function All($db){
        $sql = "select id,name,email from users";
        $results = $db->query($sql);
        if($results->num_rows > 0){
            $rows = $results->fetch_assoc();
            return $rows;
        }else{
            die('fetch users failed '.$db->error);
            
        }
    }
    //find single user in database by id 
    public static function Find($id,$db){
        $sql = "select id,name,email from users where id = '$id'";
        $results = $db->query($sql);
        if($results->num_rows > 0){
            $rows = $results->fetch_assoc();
            return $rows;
        }else{
            die('find user failed '.$db->error);
            
        }
    }
    public static function FindByEmail($email,$db){
        $sql = "select * from users where email = '$email'";
        $results = $db->query($sql);
        if($results->num_rows > 0){
            $rows = $results->fetch_assoc();
            return $rows;
        }else{
            return false;
        }

        if($db->error){
            die('find user failed '.$db->error);
            
        }
    }
    //update name and password of user by id
    public static function Update($id,$name,$password,$db){
        $sql = "UPDATE users SET name='$name',password='$password' WHERE id ='$id';";
        if( $db->query($sql)){
           
            return 'user updated';
        }else{
            die('user update failed '.$db->error);
            
        }
    }
    //delete user by id
    public static function Delete($id,$db){
        $sql = "DELETE FROM users WHERE id= '$id'";
        if( $db->query($sql)){
           
            return 'user deleted';
        }else{
            die('user delete failed '.$db->error);
            
        }
    }
}
