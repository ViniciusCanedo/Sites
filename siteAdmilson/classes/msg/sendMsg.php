<?php

    session_start();
    ob_start();
    include_once ('../../conexao.php');


    // recebe os dados via post e converte em string
    $dadosMsg=filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dadosMsg['sendMsg'])) {
        $query_mensagem = "INSERT INTO mensagens (nome, celular, mensagem) 
        VALUES (:nome, :celular, :mensagem)";

        $new_msg = $conn->prepare($query_mensagem);
        $new_msg->bindParam(':nome', ucwords(strtolower($dadosMsg['nome'])), PDO::PARAM_STR);
        $new_msg->bindParam(':celular', $dadosMsg['celular'], PDO::PARAM_STR);
        $new_msg->bindParam(':mensagem', $dadosMsg['mensagem'], PDO::PARAM_STR);
        $new_msg->execute();

        $_SESSION['cad-msg'] = true;

        header("Location:../../index.php#contato");
    }

?>