<?php
    if ($_POST['Email'] != "" || $_POST['Phone'] != "") {
        $txtname = $_POST['Name'] ? trim(str_replace(" ", "",$_POST['Name'])) : "empty";
    	$txtemail = $_POST['Email'] ? trim($_POST['Email']) : "empty";
    	$txtphone = $_POST['Phone'] ? trim(str_replace(array(")","(","-"," "), "", $_POST['Phone'])) : "";
    	//$txtmessage = trim($_POST['txtmessage']);    
        
    	$link='https://new.healthkurs.ru/authamo/handler.php?name='.$txtname.'&phone='.(string)$txtphone.'&email='.$txtemail.'&tag=fit_page3';
    
    	$curl=curl_init(); #Сохраняем дескриптор сеанса cURL
    	#Устанавливаем необходимые опции для сеанса cURL
    	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    	curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
    	curl_setopt($curl,CURLOPT_URL,$link);
    	curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
    	curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($user));
    	curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
    	curl_setopt($curl,CURLOPT_HEADER,false);
    	curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
    	curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
    	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
    	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
    
    	$out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
    	$code=curl_getinfo($curl,CURLINFO_HTTP_CODE); #Получим HTTP-код ответа сервера
    	curl_close($curl); #Завершаем сеанс cURL    
    
    	// от кого
    	$fromMail = $txtemail;
    	$fromName = $txtname;
    
    	// Сюда введите Ваш email
    	$emailTo = 'Akoreshkov@healthkurs.ru';
    
    	$subject = 'Стань «Медицинским Фитнес Инструктором»';
    	$subject = '=?utf-8?b?'. base64_encode($subject) .'?=';
    	$headers = "Content-type: text/plain; charset=\"utf-8\"\r\n";
    	$headers .= "From: ". $fromName ." <". $fromMail ."> \r\n";
    
    	// тело письма
    	$body = "Получено письмо с сайта healthkurs.ru \n\nИмя: $txtname\nТелефон: $txtphone\ne-mail: $txtemail\n";
    	$mail = mail($emailTo, $subject, $body, $headers, '-f'. $fromMail );
    
    	echo 'ok';
    } else {
        echo 'error';
    }
?>
