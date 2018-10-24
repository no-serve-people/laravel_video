<?php

function send_mail($to, $sub, $msg){	
require_once "smtp.class.php";
									
	$From = 'film@olei.me';
	$Host = 'smtp.exmail.qq.com';
	$Port = 465;
	$SMTPAuth = 1;
	$Username = 'film@olei.me';
	$Password = '#X5L2XC3e%vqX^';
	$Nickname = '禹都一只猫科技';
	$SSL = 465;
	$mail = new SMTP($Host, $Port, $SMTPAuth, $Username, $Password, $SSL);
	$mail->att = array();
	if ($mail->send($to, $From, $sub, $msg, $Nickname)) {
		return true;
	}
	return $mail->log;
}

	$SHOU = 'film@olei.me';
?>