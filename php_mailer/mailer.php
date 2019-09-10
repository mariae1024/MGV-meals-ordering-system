<?php 
/*Namespace aias. */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Include the Composer generated autoload.php file */
require 'C:\xampp\composer\vendor\autoload.php';


/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions */
$mail= new PHPMailer(TRUE);

/* Open the try/catch block. */
try{
    /* Set the mail sender. */
    $mail->setFrom('ak.gdit.ip@gmail.com','Akshit GDIT Support');
    echo "Hmm<br><br>"; /* just a debug trace statement */
    
    /* Add a recipient. */
    $mail->addAddress('mm.gdit.ip@gmail.com','Maria Medina');
    
    /* Set the subject */
    $mail->Subject = "PHP Mailer SMTP Test";
    
    /* Set the mail message body. */
    $mail->Body = "There is a great disturbance in the Force.";
    echo "Howdy<br><br>"; /* just a debug trace statement */
    
    /* SMTP parameters. */
    $mail->isSMTP();
    
    /*SMTP server address */
    $mail->Host = 'smtp.gmail.com';
    
    /* Use SMTP authentication. */
    $mail->SMTPAuth = TRUE;
    
    /* Set the encryption system */
    $mail->SMTPSecure = 'tls';
    
    /*SMTP authentication username. */
    $mail->Username = 'ak.gdit.ip@gmail.com';
    
    /*SMTP authentication password */
    $mail->Password = 'Mailer@123';
    
    /*Set the SMTP port */
    $mail->Port = 587;
    
    /* Finally send the email */
    $mail->send();
    echo "<b>Mail sent sucessfully<b><br><br>";/* just a debug trace statement */ 
}
catch (Exception $e){
    /* PHPMailer exception*/
    echo "First catch<br>";
    echo $e->errorMessage();
}
catch (\Exception $e){
    /* PHP exception (note the backslash to select the global namespace Exception class)*/
    echo "Second catch<br>";
    echo $e->getMessage();
}

?>