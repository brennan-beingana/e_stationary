<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';
require_once 'phpmailer/src/Exception.php';
//require ("../admin/phpmailer/src/PHPMailer.php");
//require ("../admin/phpmailer/src/SMTP.php");
//require ("../admin/phpmailer/src/Exception.php");

class EmailNotifier {
    private $pdo;
    private $mailer;

    public function __construct(
    $dbHost = 'localhost',
    $dbName = 'e_stationary_db',
    $dbUser = 'root',
    $dbPass = ''
    ) {
        try {
            $this->pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("❌ Database error: " . $e->getMessage());
        }
    }

    public function sendEmails($id=0) {
        $recipients = $this->getRecipients($id);

        foreach ($recipients as $recipient) {
            $this->mailer = new PHPMailer(true);
            $status = 'sent';
            $error = null;

            try {
                // SMTP Config
                $this->mailer->isSMTP();
                $this->mailer->Host = 'smtp.gmail.com';
                $this->mailer->SMTPAuth = true;
                $this->mailer->Username = 'statiofy@gmail.com';
                $this->mailer->Password = 'icnosntdxeubqdct'; // App password
                $this->mailer->SMTPSecure = 'tls';
                $this->mailer->Port = 587;

                // Email content
                $this->mailer->setFrom('statiofy@gmail.com', 'Statiofy');
                $this->mailer->addAddress($recipient['EMAILADD'], $recipient['FNAME']);
                $this->mailer->isHTML(true);
                $this->mailer->Subject = 'Statiofy: Order Status!';
                $this->mailer->Body = "Hi <b>{$recipient['FNAME']}</b>,<br>Your Order No.<b>{$recipient['ORDEREDNUM']}</b> dated {$recipient['ORDEREDDATE']} has been {$recipient['ORDEREDSTATS']}!";
                $this->mailer->AltBody = "Hi {$recipient['FNAME']},\nYour order is still pending.";

                $this->mailer->send();
                //echo "✅ Email sent to {$recipient['EMAILADD']}<br>";
            } catch (Exception $e) {
                $status = 'failed';
                $error = $this->mailer->ErrorInfo;
                echo "❌ Failed to send to {$recipient['EMAILADD']}. Error: $error<br>";
            }

            // Log the result
            $this->logEmail($recipient['EMAILADD'], $recipient['FNAME'], 'Hello ' . $recipient['FNAME'] . '!', $status, $error);
        }
    }

    private function getRecipients($id = null) {
        /*$stmt = $this->pdo->query("SELECT * FROM `tblsummary` s ,`tblcustomer` c 
        WHERE   s.`CUSTOMERID`=c.`CUSTOMERID`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);*/
        if ($id) {
            $stmt = $this->pdo->prepare("SELECT * FROM tblsummary s ,tblcustomer c 
        WHERE s.CUSTOMERID=c.CUSTOMERID AND ORDEREDNUM = :id");
            $stmt->execute(['id' => $id]);
        } else {
            $stmt = $this->pdo->query("SELECT * FROM tblsummary s ,tblcustomer c 
        WHERE s.CUSTOMERID=c.CUSTOMERID");
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function logEmail($email, $name, $subject, $status, $error) {
        $stmt = $this->pdo->prepare("
            INSERT INTO email_logs (recipient_email, recipient_name, subject, status, error_message)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([$email, $name, $subject, $status, $error]);
    }
}

?>
