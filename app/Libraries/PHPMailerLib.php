<?php

namespace App\Libraries;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailerLib
{
    protected $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true); // Passing true enables exceptions
    }

    public function sendEmail($to, $subject, $message)
    {
        try {
            // Server settings
            $this->mailer->isSMTP();
            $this->mailer->Host       = 'smtp.gmail.com'; // SMTP server
            $this->mailer->SMTPAuth   = true;
            $this->mailer->Username   = 'wmail8376@gmail.com';
            $this->mailer->Password   = 'zcaa each buse zxbw';
            $this->mailer->SMTPSecure = 'ssl';
            $this->mailer->Port       = 465;

            // Recipients
            $this->mailer->setFrom('wmail8376@gmail.com', 'CI4 AUTH+CRUD SYSTEM');
            $this->mailer->addAddress($to); // Add a recipient

            // Content
            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;
            $this->mailer->Body    = $message;

            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
