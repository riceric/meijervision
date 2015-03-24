<?php
session_start();
$PHP_SELF = $_SERVER['PHP_SELF'];
$errore = 0;
if($_POST && isset($_SESSION['captcha'])) {
	if(isset($_POST['code'])){
		$_code = $_POST['code'];
		if($_SESSION['captcha'] == $_code){
		header("HTTP/1.0 307 Temporary Redirect");
			header("Location: thanks.php");
			exit;
		} else {
			$errore = 1;
		}
	} else {
		$errore = 1;
	}
}
if(!isset($_SESSION['captcha'])){
	$_SESSION['captcha'] = $captcha;
}	
$PHP_SELF = $_SERVER['PHP_SELF'];
$stringa = '';
$cifre = 5;
for($i=1;$i<=$cifre;$i++){
	$letteraOnumero = rand(1,2);
	if($letteraOnumero == 1){
		// lettera
		$lettere = 'ABEFHKMNRVWX';
		$x = rand(1,11);
		$lettera = substr($lettere,$x,1);
		$stringa .= $lettera;
	} else {
		$numero = rand(3,7);
		$stringa .= $numero;
	}
}
$_SESSION['captcha'] = $stringa;
?>