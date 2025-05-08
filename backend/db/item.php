<?php 

include 'conn.php';

// create resource crud for user model

class Item{
    //for creating user
    public static function Create($name,$type,$description,$image,$loacation_found,$contact_info,$db){
        $sql = "INSERT INTO items(name, type, description, image, loacation_found, contact_info) VALUES ('$name','$type','$description','$image','$loacation_found','$contact_info');";
     
        if($db->query($sql)){
            return true;
        }else{
            return false;
            
        }
    }
    //for get all user exits in database
    public static function All($db){
        $sql = "SELECT * FROM items ORDER BY created_at DESC";
        $results = $db->query($sql);
        
        $rows = $results->fetch_all(MYSQLI_ASSOC);
        return $rows;
        
    }
    public static function Total($db){
        $sql = "SELECT COUNT(*) AS total_items FROM items";
        $results = $db->query($sql);
        
        $rows = $results->fetch_all(MYSQLI_ASSOC);
        return $rows;
        
    }
    public static function TotalApproved($db){
        $sql = "SELECT COUNT(*) AS totalApproved FROM items WHERE status = 'approved'; ";
        $results = $db->query($sql);
        
        $rows = $results->fetch_all(MYSQLI_ASSOC);
        return $rows;
        
    }
    public static function TotalNoneApproved($db){
        $sql = "SELECT COUNT(*) AS totalNoneApproved FROM items WHERE status != 'approved'";
        $results = $db->query($sql);
        
        $rows = $results->fetch_all(MYSQLI_ASSOC);
        return $rows;
        
    }

   

    //find single user in database by id 
    public static function Find($id,$db){
        $sql = "select * from items where id = '$id'";
        $results = $db->query($sql);
        
            $rows = $results->fetch_all(MYSQLI_ASSOC);
            return $rows;
        
    }
    //find single user in database by id 
    public static function Search($query,$db){
        $sql = "SELECT * FROM items WHERE LOWER(name) LIKE '%$query%' ORDER BY created_at DESC;";
        $results = $db->query($sql);
        $rows = $results->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }
    //update name and password of user by id

    public static function Update($id,$name,$type,$description,$image,$loacation_found,$contact_info,$status,$db){
        $sql = "UPDATE items SET name='$name',type='$type',description='$description',image='$image',loacation_found='$loacation_found',contact_info='$contact_info',status='$status' WHERE id = '$id';";
        if( $db->query($sql)){
           
            return 'item updated';
        }else{
            die('item update failed '.$db->error);
            
        }
    }
    public static function SetStatus($id,$db){
        $sql = "UPDATE items SET status='approved' WHERE id = '$id';";
        if( $db->query($sql)){
           
            return 'item status updated';
        }else{
            die('item status update failed '.$db->error);
            
        }
    }
    //delete user by id
    public static function Delete($id,$db){
        $sql = "DELETE FROM items WHERE id= '$id'";
        if( $db->query($sql)){
           
            return 'item deleted';
        }else{
            die('item delete failed '.$db->error);
            
        }
    }
}
