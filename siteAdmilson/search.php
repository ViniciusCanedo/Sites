<?php
    include_once 'conexao.php';

    if (isset($_POST['nome'])) {
        $busca = $_POST['nome'];
        $query_pesquisa = "SELECT * FROM agenda WHERE nome LIKE '%".$busca."%' order by nome";
    }else {
        $query_pesquisa = "SELECT * FROM agenda order by nome";
    }

    $statement = $conn->prepare($query_pesquisa);
    $statement->execute();
    $result = $statement->fetchAll();
    $row_count = $statement->rowCount();
    $data = "";

    if ($row_count > 0) {
        $data .= "
        <div class='dados-agenda'>
            <table>
                <tr style='white-space:nowrap;'>
                    <th>Nome</th>
                    <th>Contato</th>
                    <th>Situação</th>
                    <th>Data da consulta</th>
                    <th>Ações</th>
                </tr>";

        foreach ($result as $row) {
            list($ano, $mes, $dia ) = explode("-", $row['data']);
            $row['dataBr'] = $dia ."/". $mes ."/". $ano;

            $data .= "
            <tr id='".$row['id']."'>
                <td style='max-width: 25ch;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'
                >".$row['nome']. " ".$row['sobrenome']. "</td>
                <td style='max-width: 25ch;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'
                >".$row['celular']."</td>
                <td style='max-width: 25ch;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'
                >".$row['estado']."</td>
                <td style='max-width: 20ch;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'
                >".$row['dataBr']."</td>
                <td style='min-width: 15ch; class='actions'>
                    <a href='./editar.php?id=".$row['id']."' style='margin:0 5px;background:none;border:none;padding:0;font-size:1.5rem;color:var(--text-color);' title='Editar'><i class='uil uil-edit'></i></a>
                    <button style='margin:0 5px;background:none;border:none;padding:0;font-size:1.5rem;color:var(--text-color);' title='Excluir' onclick='confirmDeleteAgenda(".$row['id'].")'><i class='uil uil-trash-alt'></i></button>
                    <button style='margin:0 5px;background:none;border:none;padding:0;font-size:1.5rem;color:var(--text-color);' title='Vizualizar' data-bs-toggle='modal' data-bs-target='#modalAg' data-bs-whatever-nome='" .$row['nome']."' data-bs-whatever-sobrenome='" .$row['sobrenome']."' data-bs-whatever-celular='" .$row['celular']."' data-bs-whatever-email='" .$row['email']."' data-bs-whatever-bairro='" .$row['bairro']."' data-bs-whatever-endereco='" .$row['endereco']."' data-bs-whatever-numero='" .$row['numero']."' data-bs-whatever-data='" .$row['dataBr']."' data-bs-whatever-estado='" .$row['estado']."' data-bs-whatever-obs='" .$row['obs']."'><i class='uil uil-eye'></i></button>
                </td>
            </tr>
            ";
        }
        $data .= "</table></div>";
    }else {
        $data .= "Nenhum registro encontrado.";
    }

    echo $data;
?>