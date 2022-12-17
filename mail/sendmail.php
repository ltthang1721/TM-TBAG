<?php
include "PHPMailer-master/src/PHPMailer.php";
include "PHPMailer-master/src/Exception.php";
// include "PHPMailer-master/src/OAuth.php";
include "PHPMailer-master/src/POP3.php";
include "PHPMailer-master/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Mailer{  
    public function dathangmail($tieude,$noidung,$maildathang){
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';

        try {

            $mail->SMTPDebug = 0;                                 
            $mail->isSMTP();                                     
            $mail->Host = 'smtp.gmail.com';  
            $mail->SMTPAuth = true;                               
            $mail->Username = 'larose7ad@gmail.com';             
            $mail->Password = 'bjsjnvqfvlxgvmgh';                        
            $mail->SMTPSecure = 'tls';                           
            $mail->Port = 587;                                   
        
            $mail->setFrom('larose7ad@gmail.com', 'RÓE');
            $mail->addAddress($maildathang, 'User1');    
            $mail->addBCC('larose7ad@gmail.com');
        
            $mail->isHTML(true);                                  
            $mail->Subject = $tieude;
            $mail->Body    = $noidung;
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
?>