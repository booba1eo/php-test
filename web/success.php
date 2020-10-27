<?php
header("Content-Type: text/html; charset=utf-8");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$name = htmlspecialchars($_POST["name"]);
$tel = htmlspecialchars($_POST["telephone"]);

$check = is_array($_POST['check']) ? $_POST['check'] : array();
$check = implode (', ', $check);

$radio = htmlspecialchars($_POST["radio"]);

$company_mail = "lesnoi.komplex@gmail.com";
$subject = "Lesnoi Application";
$message = "Добрый день, вам пришла заявка! :)
<br><br>
Имя: $name<br>
Телефон: $tel<br>
Чек-бокс: Соглашение подтверждено $check<br>
";

try {
    $mail = new PHPMailer(true);
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'lesnoi.komplex@gmail.com';
    $mail->Password   = 'lesnoikomplex0202';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;  

    $mail->setFrom($company_mail, 'Lesnoi');
    $mail->addAddress($company_mail, 'Lesnoi');

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();
    echo "<center><a href='https://lesnoi-komplex.by/'><img src='img/mailto.png'></a></center>";
} catch (Exception $e) {
    echo "<center>Оооой... Ошибка... Ну, эт самое, на этом наши полномочия все... Окончены. :(</center>";
}
?>