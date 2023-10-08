<?php


include('smtp/PHPMailerAutoload.php');


 
                     
//$message_body = "One Time Password for Verification is: ";
  // $ootp = " Verification Code : .$otp " ;   
   
     
     
     function smtp_mailer($to,$subject, $msg){
        $val1="j6$";
        $val2="_4)pmDTxy";
        $pass=$val1.$val2;

     $mail = new PHPMailer(); 
     $mail->IsSMTP(); 
     $mail ->debug =0;
     $mail->SMTPAuth = true; 
     $mail->SMTPSecure = 'ssl'; 
     $mail->Host = "artvirsa.com";
     $mail->Port = 465; 
     $mail ->IsHTML(true);
     $mail->Username = "noreply@artvirsa.com";
     $mail->Password = $pass;
     $mail->SetFrom("noreply@artvirsa.com");
     $mail->Subject = $subject;
     $mail->Body =$msg;
     $mail->AddAddress($to);
     $mail->SMTPOptions=array('ssl'=>array(
         'verify_peer'=>false,
         'verify_peer_name'=>false,
         'allow_self_signed'=>false
     ));
     if(!$mail->Send()){
         echo $mail->ErrorInfo;
     }else{
         return 'Sent';
     }
     }
    




    //     require('PHPMailer/src/Exception.php');
//     require('PHPMailer/src/SMTP.php');
//     require('PHPMailer/src/autoload.php.php');
//     # code...

//     $message_body = "One Time Password for Verification is: <br><br>" . 
//     $otp;

//     $mail = new PHPMailer();

//   $mail ->AddReplyTo('arhamnovelops@gmail.com','Kitabistan');
//                      $mail->setFrom('arhamnovelops@gmail.com','Kitabistan');
//                      $mail->AddAddress($email);
//                      $mail->Subject="OTP for Verification";
//                      $mail->msgHTML($message_body);   

//                     $result =$mail->send();
                     
//                     if(!$result){
//                      echo "Mailer Error" . $mail->ErrorInfo;  


//                     } else {
//                         return $result;
//                     }
                    
//
?>