<?php

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
 
 //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
 //====================================================
 $email_remetente = "site@inov-ind.com"; // deve ser uma conta de email do seu dominio
 //====================================================

 //Configurações do email, ajustar conforme necessidade
 //====================================================
 $email_destinatario = "rilton@inov-ind.com"; // pode ser qualquer email que receberá as mensagens
 $email_reply = "$email"; 
 $email_assunto = $nome+" esta entrando em contato pelo site!"; // Este será o assunto da mensagem
 //====================================================
 //Seta os Headers (Alterar somente caso necessario)
 //====================================================
 $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
 //====================================================
 
 //Enviando o email
 //====================================================
 if (mail ($email_destinatario, $email_assunto, nl2br($arquivo), $email_headers)){ 
 echo "<script>alert('E-Mail enviado com sucesso!');history.go(-1);</script>"; 
 } 
 else{ 
 echo "<script>alert('Falha no envio do E-Mail!');history.go(-1);</script>"; } 
?>