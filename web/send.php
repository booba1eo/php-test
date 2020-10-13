<?php

if(isset($_POST['submit'])){
$to = "sasha_2804@mail.ru";; // Здесь нужно написать e-mail, куда будут приходить письма
$from = $_POST['tel']; // this is the sender's Email address
$first_name = $_POST['name'];
$subject = "Форма отправки сообщений с сайта";
$subject2 = "Copy of your form submission";

$headers = "From:" . $from;
$headers2 = "From:" . $to;

mail($to,$subject,$message,$headers);
// mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender - Отключено!
echo "Сообщение отправлено. Спасибо Вам " . $first_name . ", мы скоро свяжемся с Вами.";
echo "<br /><br /><a href='https://lesnoi-komplex.by'>Вернуться на сайт.</a>";

}

?>

<!--Переадресация на главную страницу сайта, через 3 секунды-->
<script language="JavaScript" type="text/javascript">
function changeurl(){eval(self.location="https://lesnoi-komplex.by/index.html");}
window.setTimeout("changeurl();",3000);
</script>