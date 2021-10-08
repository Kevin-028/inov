<?php
include_once 'conexao.php';


require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];
$data_envio = date('d/m/Y');
$dataini = date('Y-m-d');
$hora_envio = date('H:i:s');



$qntcelular=strlen($telefone);
if($qntcelular<11){

    echo"<script>alert('Celular inválido, favor preencher corretamente!! DDxxxxxxxxxx');history.go(-1);</script>";
        exit;

}
// Dados do SMTP do cliente
    $smtp_nome_servidor = 'smtp.office365.com';
    $smtp_porta = '587';
    $smtp_email = '3point03@3point.ws'; //email do provedor de hospedagem
    $smtp_senha = 'Kevin028791';
    $smtp_seguranca = 'tls';

    $email_de = $smtp_email; //nome do remetente
    $email_para = '3point03@3point.ws'; //para quem deve ser enviado

    $email_assunto = $assunto;
// fim dos dados do SMTP do cliente


$arquivo = ("
<style type='text/css'>
    body {
        margin: 0px;
        font-family: Verdane;
        font-size: 18px;
        background-color: #386BBE;
    }

    span {
        font-size: 1em;
        color: #3d2626;
    }

    .email {
        width: 100vw;
        height: 100vh;
        align-self: center;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center
    }


    table {
        width: 80%;
        background-color: #fff;
        color: #111111;
        min-width: 350px;
        font-size: 0.8em;
    }

    td {
        padding-top: 1%;
        padding-bottom: 1%;
        padding-left: 1%;
        font-weight: 700;
    }
    a {
        color: #666666;
        text-decoration: none;
    }

    a:hover {
        color: #FF0000;
        text-decoration: none;
    }
</style>

<body>
    <div class='email'>
            
        <table border='1' cellpadding='1' cellspacing='1'>
            <tr>

            <tr>
                <td>Nome: <span>$nome</span></td>

            </tr>
            <tr>
                <td>E-mail: <span>$email</span></td>
            </tr>
            <tr>
                <td>Telefone: <span>$telefone</span></td>
            </tr>
            <tr>
                <td>Mensagem: <span>$mensagem</span></td>
            </tr>
            <td>
                Este e-mail foi enviado em <b>$data_envio</b> | <b>$hora_envio</b>
            </td>
            </tr>
        </table>
    </div>

</body>
  ");

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = $smtp_nome_servidor;
    $mail->SMTPAuth = true;
    $mail->Username = $smtp_email;
    $mail->Password = $smtp_senha;
    $mail->Port = $smtp_porta;
    $mail->SMTPSecure = $smtp_seguranca;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom($email_de);
    $mail->addAddress($email_para);

    $mail->isHTML(true);
    $mail->Subject = ("Estão ".$nome." E esta tentando entrar em contato");
    $mail->Body = $arquivo; //texto com formatação
    $mail->AltBody = 'Nome:'.$nome.', E-mail: '.$email.', Telefone: '.$telefone.', Assunto: '.$mensagem.'.'; //texto sem formatação.


    if($mail->send()){
        echo "<script> alert ('Muito obrigado, logo entraremos em contato.');history.go(-1);</script>";
        exit;
    }else{
        echo"<script>alert('Email não enviado');history.go(-1);</script>";
        exit;
    };
    // echo"<script>alert('Este é somente um exemplo, para um exemplo pratico<br> entre em contato com seu responsavel comercial');history.go(-1);</script>";
?>