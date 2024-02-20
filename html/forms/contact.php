<?php  error_reporting(E_ALL); ini_set('display_errors', 1);
$result = "";
$error  = "";
if(isset($_POST['submit']))
{
$name = $_POST['name']; // Get Name value from HTML Form
$email_id = $_POST['email']; // Get Email Value
     
$to = "ngandjuialphonse@gmail.com"; // You can change here your Email
$subject = $_POST['subject']; // This is your subject
     
require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
//smtp settings
$mail->isSMTP(); // send as HTML
$mail->Host = "smtpout.secureserver.net"; // SMTP servers
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "************"; // Your mail
$mail->Password = '************'; // Your password mail
$mail->Port = 25; //specify SMTP Port
$mail->SMTPSecure = 'ssl\tls';                               
$mail->setFrom($email_id,$name);
$mail->addAddress('**********');
$mail->addReplyTo($email_id,$name);
$mail->isHTML(true);
$mail->Subject=$subject;
$mail->Body="
    <html>
        <body>
            <table style='width:600px;'>
                <tbody>
                    <tr>
                        <td style='width:150px'><strong>Name: </strong></td>
                        <td style='width:400px'>$name</td>
                    </tr>
                    <tr>
                        <td style='width:150px'><strong>Email ID: </strong></td>
                        <td style='width:400px'>$email_id</td>
                    </tr>
                    <tr>
                        <td style='width:150px'><strong>Message: </strong></td>
                        <td style='width:400px'>$msg</td>
                    </tr>
                </tbody>
            </table>
        </body>
    </html>
    ";;
if(!$mail->send())
{
    $error = "Something went worng. Please try again.";
}
else 
{
    $result="Thanks\t" .$name. " for contacting us.";
}
}

?>
