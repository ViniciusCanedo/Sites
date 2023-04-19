<?php

    session_start();
    ob_start();
    include_once ('../../conexao.php');

    $idDelete = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    if (empty($idDelete)) {
        $_SESSION['emptyId'] = true;
        header('Location:../../painel-admin.php');
    }

    $query_usuario = "SELECT id FROM agenda WHERE id = $idDelete LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->execute();

    $id_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);

    if (($result_usuario) AND ($result_usuario->rowCount() != 0)) {
        $query_delete = "DELETE FROM agenda WHERE id = $idDelete";
        $result_delete = $conn->prepare($query_delete);

        if ($result_delete->execute()){
            $_SESSION['sucessoDelete'] = true;
            header('Location:../../painel-admin.php');
        }else {
            $_SESSION['erroDelete'] = true;
            header('Location:../../painel-admin.php');
        }

    }else{
        $_SESSION['emptyId'] = true;
        header('Location:../../painel-admin.php');
    }

?>