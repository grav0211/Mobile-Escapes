<?php
// Check for empty fields
if(empty($_POST['name'])            ||
   empty($_POST['phone'])           ||
   empty($_POST['email'])           ||
   empty($_POST['groupsize'])       ||
   empty($_POST['preferreddate'])   ||
   empty($_POST['location'])        ||
   empty($_POST['message'])         ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$group_size = strip_tags(htmlspecialchars($_POST['groupsize']));
$preferred_date = strip_tags(htmlspecialchars($_POST['preferreddate']));
$location = strip_tags(htmlspecialchars($_POST['location']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'agrav065@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nPhone: $phone\n\nEmail: $email_address\n\nGroup Size: $group_size\n\nPreferred Date: $preferred_date\n\nLocation: $location\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>
