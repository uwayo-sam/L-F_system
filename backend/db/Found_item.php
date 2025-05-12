<?php

include "conn.php";


class Found_item {
 public static function Create($looser_name,$lost_location,$lost_item_disc,$looser_phone,$lost_time,$I_id,$db){
    $sql = "INSERT INTO found_items(looser_name,lost_location, lost_item_disc, looser_phone, I_id,lost_time) VALUES ('$looser_name','$lost_location','$lost_item_disc','$looser_phone','$I_id','$lost_time')";
     
    if($db->query($sql)){
        return true;
    }else{
        return false;
        
    }
 }


 public static function All($db){
    $sql = "SELECT 
        f.*,
        i.* 
    FROM 
        found_items f
    JOIN 
        items i ON f.I_id = i.id
    ";
    $results = $db->query($sql);
    
    $rows = $results->fetch_all(MYSQLI_ASSOC);
    return $rows;
    
}

public static function Search($query, $db) {
    $sql = "SELECT 
        f.*,
        i.* 
    FROM 
        found_items f
    JOIN 
        items i ON f.I_id = i.id
    WHERE 
        LOWER(i.name) LIKE '%" . strtolower($query) . "%'
    ";
    
    $results = $db->query($sql);
    
    if ($results === false) {
        error_log("SQL Error: " . $db->error);
        return [];
    }
    
    $rows = $results->fetch_all(MYSQLI_ASSOC);
    return $rows;
}



public static function Total($db){
    $sql = "SELECT COUNT(*) AS total_found_items FROM found_items";
    $results = $db->query($sql);
    
    $rows = $results->fetch_all(MYSQLI_ASSOC);
    return $rows;
    
}


public static function Find($id,$db){
    $sql = "select * from found_items where id = '$id'";
    $results = $db->query($sql);
    
        $rows = $results->fetch_all(MYSQLI_ASSOC);
        return $rows;
}




public static function Update($looser_name,$lost_location,$lost_item_disc,$looser_phone,$id,$db){
    $sql = "UPDATE found_items 
            SET looser_name = '$looser_name',
                lost_location = '$lost_location',
                lost_item_disc = '$lost_item_disc',
                looser_phone = '$looser_phone'
            WHERE id = '$id'";


    if($db->query($sql)){
        return true;
    }else{
        return false;
        
    }
 }
public static function SetVeryfied($id,$db){
    $sql = "UPDATE found_items 
            SET veryfied = 'yes' WHERE id = '$id'";
    if($db->query($sql)){
        return true;
    }else{
        return false;
        
    }
 }

public static function Delete($id,$db){
    $sql = "DELETE FROM found_items WHERE id= '$id'";
    if( $db->query($sql)){
       
        return true;
    }else{
        die('item delete failed '.$db->error);
        
    }
}

}



