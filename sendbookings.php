<?php 
require_once('connect.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/* Include the Composer generated autoload.php file */
require 'C:\xampp\composer\vendor\autoload.php';


if(isset($_POST['bookings'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    $userid = $_POST['userId'];
    $carid=$_POST['carId'];
    $address=$_POST['address'];
    $sql = "INSERT INTO bookings (fname, lname, email, phone,sdate,edate,user_id,car_id,address,status) VALUES ('$fname','$lname','$email','$phone','$sdate','$edate','$userid','$carid','$address','pending')";
    if(mysqli_query($connection,$sql))
    {
        echo "Database was updated";
        sendBookingRequest($email,$fname,$lname);
        header('Location: vehicles.php');
    }
    else
    {
        echo mysqli_error($connection);
    }
}
function sendBookingRequest($email,$fname,$lname){
     /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions */
                $mail= new PHPMailer(TRUE);

                /* Open the try/catch block. */
                try{
                    /* Set the mail sender. */
                    $mail->setFrom('mm.gdit.ip@gmail.com','Maria GDIT Support');
                    /*echo "Hmm<br><br>"; /* just a debug trace statement */

                    /* Add a recipient. */
                    $mail->addAddress($email);
                    
                    /* Set the subject */
                    $mail->Subject = "Rental request";
                    
                    /* Set the mail message body. */
                    $mail->Body = 'Hi, ' . $fname . ' ' . $lname .' Thank you for booking on our carrental website. Your booking request has been sent to the admin. In short time your request is going to be proccessed. The new email is going to be sent to you.';
                    
                     /* SMTP parameters. */
                    $mail->isSMTP();

                    /*SMTP server address */
                    $mail->Host = 'smtp.gmail.com';

                    /* Use SMTP authentication. */
                    $mail->SMTPAuth = TRUE;

                    /* Set the encryption system */
                    $mail->SMTPSecure = 'tls';

                    /*SMTP authentication username. */
                    $mail->Username = 'mm.gdit.ip@gmail.com';

                    /*SMTP authentication password */
                    $mail->Password = 'Mailer@123';

                    /*Set the SMTP port */
                    $mail->Port = 587;

                    /* Finally send the email */
                    $mail->send();
                    /*echo "<b>Mail sent sucessfully<b><br><br>";/* just a debug trace statement */ 
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

}
?>