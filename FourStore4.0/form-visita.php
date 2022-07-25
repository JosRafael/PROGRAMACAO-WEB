<?php

 $mensagem = $_POST['mensagem'];
      $nome = $_POST['nome'];
      $telefone = $_POST['telefone'];
      $email = $_POST['email'];
      $corpo = "<strong>Mensagem de contato</strong><br><br>";
      $corpo .= "<br><strong>Nome: </strong>$nome";
      $corpo .= "<br><strong>Telefone: </strong>$telefone";
      $corpo .= "<br><strong>Email: </strong>$email";
      $corpo .= "<br><strong>Mensagem: </strong>$mensagem";
    if(sendMail($_POST['email'],'rafaelmatiashue@gmail.com',$corpo, 'Solicitação de Visita'))
    {
        echo "<script>alert('Email enviado com sucesso');</script>";
    }
    else
    {
        echo "Ocorreu um erro ao enviar";
    }
	echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=visita.html'>";

function sendMail($de,$para,$mensagem,$assunto)
{
    require_once('phpmailer/class.phpmailer.php');
    $mail = new PHPMailer(true);

    $mail->IsSMTP();
    try {
      $mail->SMTPAuth   = true;                 
      $mail->Host       = 'rafaelmatiashue@gmail.com';     

	  $mail->Port       = 465;                  #remova se nao usar gmail
      $mail->Username   = '4storecontato@gmail.com'; 
      $mail->Password   = 'wjflpjr007';
      $mail->AddAddress($para);
	  $mail->AddReplyTo($de);
      $mail->SetFrom($de);
      $mail->Subject = $assunto;
      $mail->MsgHTML($mensagem);
      $mail->Send();     
      $envio = true;
    } catch (phpmailerException $e) {
      $envio = false;
    } catch (Exception $e) {
      $envio = false;
    }
    return $envio;
}
?>