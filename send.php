<?php

// Mudar Aqui

$email_envio = 'contato@turtleagencia.com.br'; // E-mail receptor
$email_pass = '@t3nd1m3nt0Turtl3'; // Senha do e-mail

$site_name = 'Aléxia Trevisan - Portfólio'; // Nome do Site
$site_url = 'http://alexiatrevisan.com'; // URL do Site

$host_smtp = 'wp120.hostgator.com.br'; // HOST SMTP Ex: smtp.domain.com.br
$host_port = '587'; // Porta do Host

// Variáveis do Formulário

$nome = $_POST['nome'];
$email = $_POST['email'];
$email = $_POST['telefone'];
$email = $_POST['modelo'];
$email = $_POST['loja'];
$email = $_POST['cidade'];
$mensagem = $_POST['mensagem'];

// Conteúdo do Formulário

$body_content = "De: $nome \n Email: $email \n Telefone: $telefone \n Modelo: $modelo \n Loja: $loja \n Cidade: $cidade \n Mensagem: $mensagem";

// Não mudar a partir daqui

if (isset($_POST['nome'])){

require ('./PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';

$mail->isSMTP();
$mail->Host = $host_smtp;
$mail->SMTPAuth = true;
$mail->Username = $email_envio;
$mail->Password = $email_pass;
$mail->Port = $host_port; 

$mail->From = $email_envio;

$mail->addAddress($email_envio);

$mail->FromName = 'Formulário de Contato';
$mail->AddReplyTo($_POST['email'], $_POST['nome']);

$mail->WordWrap = 70;

$mail->Subject = 'Formulário - ' . $site_name . ' - ' . $_POST['nome'];

$mail->Body = $body_content;

if(!$mail->send()) {
  
  echo "<h2
	style=\"
	font-size: 1.5em;
	margin-top: 20%;
	text-align: center;
	font-family: 'Ubuntu', 'Helvetica', 'Arial', 'sans-serif';
	font-weight: normal;
	color: #fdc64b;
	\"><center><span>Aconteceu algum erro!</span><p>Você pode tentar denovo ou enviar direto para " . $email_envio . "!</p></center><h2>";
	
	echo "<html style=\"background: #fff;\"></html>";
	echo "<meta HTTP-EQUIV='Refresh' CONTENT='10;URL=" . $site_url . "'>";
  
} else {

  echo "<h2
	style=\"
	font-size: 1.5em;
	margin-top: 20%;
	text-align: center;
	font-family: 'Ubuntu', 'Helvetica', 'Arial', 'sans-serif';
	font-weight: normal;
	color: #89bb50;
	\"><center><span>Formulário Enviado</span><p>Em breve entraremos em contato. Abraço.</p></center><h2>";
	
	echo "<html style=\"background: #fff;\"></html>";
	echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=" . $site_url . "'>";
}
}
?>