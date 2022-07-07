<?php 
 use PHPMailer\PHPMailer\PHPMailer;

 
 require_once'phpmailer/Exception.php';
 require_once'phpmailer/PHPMailer.php';
 require_once'phpmailer/SMTP.php';

 

 $mail = new PHPMailer(true);
 $alert= '';

if(isset($_POST['submit_send']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try{
        $mail -> isSMTP();
        $mail -> Host = 'smtp.gmail.com';
        $mail -> SMTPAuth = true;
        $mail -> Username = 'dinhngocminhhieu@gmail.com';
        $mail -> Password = '01629156861';
        $mail -> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail -> Port = '587';

        $mail ->setFrom('dinhngocminhhieu@gmail.com');
        $mail ->addAddress('dinhngocminhhieu@gmail.com');

        $mail ->isHTML(true);
        $mail ->Subject ='Message Received ';
        $mail ->Body ="<h3>Name : $name <br> Email: $email <br> Subject: $subject <br> Message: $message </h3>";
       
        $mail ->send();
        $alert ="<div class='alert-success'>
                    <script> alert(' Message Sent! Thank you for contacting us') ;</script>
                </div>";
    } catch (Exception $e) {
        $alert = "<div class='alert-error'>
                    <script>'.$e->getMessage().'</script> 
                 </div>";
    }

}

?>