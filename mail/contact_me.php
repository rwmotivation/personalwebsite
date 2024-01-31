<?php
function send_mail($name, $email, $phone, $message) {
   // Sanitize input
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   $phone = filter_var($phone, FILTER_SANITIZE_STRING);
   $message = filter_var($message, FILTER_SANITIZE_STRING);

   // Validate email
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      die('Invalid email');
   }

   // Create the email and send the message
   $to = 'info@cloudzguru.com';
   $email_subject = "Website Contact Form:  $name";
   $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nPhone: $phone\n\nMessage:\n$message";
   $headers = "From: info@cloudzguru.com\n";
   $headers .= "Reply-To: $email";	
   $mailSent = mail($to,$email_subject,$email_body,$headers);
   if (!$mailSent) {
      die('Mail sending failed');
   }
   // Replace the URL below with the URL of your home page
   header('Location: http://www.cloudzguru.com');
   exit;
}
?>