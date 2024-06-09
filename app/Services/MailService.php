<?php
namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MailService
{
    public static function phpMailer($email, $subject, $body)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = false;
            $mail->do_debug = 0;

            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = config('mail.host');                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = config('mail.username');    // SMTP username
            $mail->Password   = config('mail.password');   // SMTP password
    
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = config('mail.port');       // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
            $mail->setFrom(config('mail.username'), 'No Reply');
            $mail->addAddress(trim($email, '"'), 'App User');     // Add a recipient
            
            // Content
                $mail->isHTML(true);                                  // Set email format to HTML
      
            $mail->Subject = $subject;
            $mail->Body    = $body;

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
