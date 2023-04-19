<?php

    session_start();
    ob_start();
    include_once ('../../conexao.php');


    // recebe os dados via post e converte em string
    $dadosAg=filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dadosAg['saveAg'])) {
        $query_agenda = "INSERT INTO agenda (nome, sobrenome, celular, email, bairro, endereco, numero, data, estado, obs) 
        VALUES (:nome, :sobrenome, :celular, :email, :bairro, :endereco, :numero, :data, :estado, :obs)";

        $new_agenda = $conn->prepare($query_agenda);
        $new_agenda->bindParam(':nome', ucwords(strtolower($dadosAg['nome'])), PDO::PARAM_STR);
        $new_agenda->bindParam(':sobrenome', ucwords(strtolower($dadosAg['sobrenome'])), PDO::PARAM_STR);
        $new_agenda->bindParam(':celular', $dadosAg['celular'], PDO::PARAM_STR);
        $new_agenda->bindParam(':email', $dadosAg['email'], PDO::PARAM_STR);
        $new_agenda->bindParam(':bairro', ucwords(strtolower($dadosAg['bairro'])), PDO::PARAM_STR);
        $new_agenda->bindParam(':endereco', ucwords(strtolower($dadosAg['endereco'])), PDO::PARAM_STR);
        $new_agenda->bindParam(':numero', $dadosAg['numero'], PDO::PARAM_STR);
        $new_agenda->bindParam(':data', $dadosAg['data'], PDO::PARAM_STR);
        $new_agenda->bindParam(':estado', $dadosAg['estado'], PDO::PARAM_STR);
        $new_agenda->bindParam(':obs', $dadosAg['obs'], PDO::PARAM_STR);
        $new_agenda->execute();

        $_SESSION['cad-agenda'] = true;

        header("Location:../../agenda.php");
    }

?>