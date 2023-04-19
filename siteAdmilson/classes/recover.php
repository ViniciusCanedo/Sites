<?php
    session_start();
    ob_start();
    include_once("../conexao.php");

    $novaSenha = substr(time(), 0, 6);
    $newPassCript = password_hash($novaSenha, PASSWORD_DEFAULT);

    

    $email = "websiteadmilson@gmail.com";
    $assunto = "Recuperação de senha.";
    $corpo = "Sua nova senha é: $novaSenha. Acesse o link para alterar a sua senha:";
    $from = "From: recover@admilsonweb.x10.mx";

    if(mail($email, $assunto, $corpo, $from)){
        $alt_pass = "UPDATE admin SET pass = '".$newPassCript . "' WHERE user = 'admilson@admin'";
        $result_pass = $conn->prepare($alt_pass);
        $result_pass->execute();

        $_SESSION['sucesso'] = $novaSenha;
    }

    header("Location:../login.php");

?>