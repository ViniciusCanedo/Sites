<?php

    extract($row_ag);
    list($ano, $mes, $dia ) = explode("-", $data);
    $dataBr = $dia ."/". $mes ."/". $ano;

    echo "<tr id='".$id."'>";
        echo ("<td style='max-width: 25ch;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'
        >$nome $sobrenome</td>");
        echo ("<td style='max-width: 25ch;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'
        >$celular</td>");
        echo ("<td style='max-width: 25ch;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'
        >$estado</td>");
        echo ("<td style='max-width: 20ch;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'
        >$dataBr</td>");
        echo "<td style='min-width: 15ch; class='actions'>";
            echo "<a href='./editar.php?id=".$id."' style='margin:0 5px;background:none;border:none;padding:0;font-size:1.5rem;color:var(--text-color);' title='Editar'><i class='uil uil-edit'></i></a>";
            echo "<button style='margin:0 5px;background:none;border:none;padding:0;font-size:1.5rem;color:var(--text-color);' title='Excluir' onclick='confirmDeleteAgenda($id)'><i class='uil uil-trash-alt'></i></button>";
            echo "<button style='margin:0 5px;background:none;border:none;padding:0;font-size:1.5rem;color:var(--text-color);' title='Vizualizar' data-bs-toggle='modal' data-bs-target='#modalAg' data-bs-whatever-nome='" .$nome."' data-bs-whatever-sobrenome='" .$sobrenome."' data-bs-whatever-celular='" .$celular."' data-bs-whatever-email='" .$email."' data-bs-whatever-bairro='" .$bairro."' data-bs-whatever-endereco='" .$endereco."' data-bs-whatever-numero='" .$numero."' data-bs-whatever-data='" .$dataBr."' data-bs-whatever-estado='" .$estado."' data-bs-whatever-obs='" .$obs."'><i class='uil uil-eye'></i></button>";
        echo "</td>";
    echo "</tr>";

?>