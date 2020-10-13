<?php
header("Content-Type: text/html; charset=utf-8");
$name = htmlspecialchars($_POST["name"]);
$tel = htmlspecialchars($_POST["telephone"]);

$check = is_array($_POST['check']) ? $_POST['check'] : array();
$check = implode (', ', $check);

$radio = htmlspecialchars($_POST["radio"]);

$refferer = getenv(HTTP_REFERER);
$date=date("d.m.y"); // число.месяц.год
$time=date("H:i"); // часы:минуты:секунды
$myemail = "sasha_2804@mail.ru";

$tema = "На связи Лесной, вам заявка!";
$message_to_myemail = "Добрый день, вам пришла заявка! :)
<br><br>
Имя: $name<br>
Телефон: $tel<br>
Чек-бокс: Соглашение подтверждено $check<br>
Источник (ссылка): $refferer
";

mail($myemail, $tema, $message_to_myemail, "From: <komplex@lesnoy.by> \r\n Reply-To: Lesnoy \r\n"."MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n" );

$myemail = $email;
$tema = "Добрый день, ваша заявка принята :)";
$message_to_myemail = "Ваше письмо получено, спасибо за обращение. Мы скоро с вами свяжемся.
";

mail($myemail, $tema, $message_to_myemail, "From: <komplex@lesnoy.by> \r\n Reply-To: Lesnoy \r\n"."MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n" );

$f = fopen("leads.xls", "a+");
fwrite($f," <tr>");
fwrite($f," <td>$name</td> <td>$tel</td> <td>$date / $time</td>");
fwrite($f," <td>$refferer</td>");
fwrite($f," </tr>");
fwrite($f,"\n ");
fclose($f);

if(@mail($sendto, $subject, $msg, $headers)) {
    echo "<center>Оооой... Ошибка... Ну, эт самое, на этом наши полномочия все... Окончены. :(</center>";
} else {
    echo "<center><a href='https://lesnoi-komplex.by/'><img src='img/mailto.png'></a></center>";
}
 
?>