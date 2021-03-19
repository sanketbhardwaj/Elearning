<?php
$mailto = "bhardwaj99sanket@gmail.com";
    $mailSub = "New Leads from Apni Pehchan!";
    $mailMsg = "Name: Sanket Bhardwaj<br>Mobile: 9325617420<br>Email: bhardwaj99sanket@gmail.com";
 require 'PHPMailer-master/PHPMailerAutoload.php';
 $mail = new PHPMailer();
 $mail ->IsSmtp();
 $mail ->SMTPDebug = 0;
 $mail ->SMTPAuth = true;
 $mail ->SMTPSecure = 'SSL';
 $mail ->Host = "sg2plcpnl0016.prod.sin2.secureserver.net";
 $mail ->Port = 587; // or 587
 $mail ->IsHTML(true);
 $mail ->Username = "noreply@musskanerp.com";
 $mail ->Password = "12345";
 $mail ->SetFrom("noreply@musskanerp.com","Musskan ERP");
 //Set CC address
 //$mail->addCC("noreply@afaceresolutions.com","Afacere Solutions");
 //Set BCC address
 //$mail->addBCC("noreply@afaceresolutions.com","Afacere Solutions");
 //Set an alternative reply-to address
 $mail->addReplyTo("noreply@musskanerp.com","Musskan ERP");
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
     echo "Mail Not Sent";
  echo 'Mailer Error: ' . $mail->ErrorInfo;
   }
   else
   {
     echo "Mail Sent";
   }
?>