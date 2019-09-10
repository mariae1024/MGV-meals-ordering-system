<?php 
require_once('connect.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/* Include the Composer generated autoload.php file */
require 'C:\xampp\composer\vendor\autoload.php';
if(isset($_POST['feedbackpost'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];
    $sql = "INSERT INTO contact (fname, lname, phone, email,feedback) VALUES ('$fname','$lname','$phone','$email','$feedback')";
    
    if(mysqli_query($connection,$sql))
    {
        echo "Database was updated";
        sendfeedback($email,$fname,$lname);
        header('Location: ContactUs.php');
    }
    else
    {
        echo mysqli_error($connection);
    }
}
    function sendfeedback($email,$fname,$lname){
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
                    $mail->Subject = "RE: Feedback";
                    
                    /* Set the mail message body. */
                    $mail->Body = 'Hi, ' . $fname . ' ' . $lname .' Thank you for sending us a feedback, we are constantly working to improve our service.';
                    
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