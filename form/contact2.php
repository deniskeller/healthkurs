<?php
    if ($_POST['Email'] != "" || $_POST['Phone'] != "") {
        $txtname = $_POST['Name'] ? trim(str_replace(" ", "",$_POST['Name'])) : "empty";
    	$txtemail = $_POST['Email'] ? trim($_POST['Email']) : "empty";
    	$txtphone = $_POST['Phone'] ? trim(str_replace(array(")","(","-"," "), "", $_POST['Phone'])) : "";
    	//$txtmessage = trim($_POST['txtmessage']);        
    
    	// от кого
    	$fromMail = 'Akoreshkov@healthkurs.ru';
    	$fromName = $txtname;
    
    	// Сюда введите Ваш email
    	$emailTo = 'Akoreshkov@healthkurs.ru';
    
    	$subject = 'Стань «Медицинским Фитнес Инструктором»';
    	$subject = '=?utf-8?b?'. base64_encode($subject) .'?=';
    	$headers = "Content-type: text/plain; charset=\"utf-8\"\r\n";
    	$headers .= "From: ". $fromName ." <". $fromMail ."> \r\n";
    
    	// тело письма
    	$body = "Получено письмо с сайта healthkurs.ru \n\n Имя: $txtname\n Телефон: $txtphone\n e-mail: $txtemail\n Сообщение: $txtmessage \n";
    	$mail = mail($emailTo, $subject, $body, $headers, '-f'. $fromMail );
    
    	echo 'ok';
    } else {
        echo 'error';
    }
?>
