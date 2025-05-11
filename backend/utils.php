<?php
use PHPMailer\PHPMailer\PHPMailer;

include "../vendor/autoload.php";



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


function SendEmail($isfounder){
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'live.smtp.mailtrap.io'; // Your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'api';
        $mail->Password   = '2e52c2a4391fbe2b08e1aa8b5e1b7606';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
    
        // Recipients
        $mail->setFrom('admin@demomailtrap.co', 'Lost and Found Hub Admin');
        $mail->addAddress('samueluwayo17@gmail.com', 'user');
        
        // Content

        if($isfounder){
            
        $mail->isHTML(true);
        $mail->Subject = 'ITEM YOU FOUND IT GET OWNER';
        $mail->Body    = "
            <h1 style='color:green;'>the owner is</h1>
            <div>
            <h1>name: <b style='color: green;'>names</b></h1>
            <br>
            <hr>
            <h1 style='color: green;'>contact info</h1>
            <p>contact info</p>
            </div>
        ";

        }else{
            
        $mail->isHTML(true);
        $mail->Subject = 'YOUR ITEM IS FOUND';
        $mail->Body    = "
            <h1 style='color:green;'>the founder is</h1>
            <div>
            <h1>name: <b style='color: green;'>names</b></h1>
            <br>
            <hr>
            <h1 style='color: green;'>contact info</h1>
            <p>contact info</p>
            </div>
        ";

        }
  
    
        $mail->send();
        echo 'Message has been sent succesful';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
