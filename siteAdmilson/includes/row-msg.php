<?php

    extract($row_msg);
    echo "<tr id='".$id."'>";
        echo ("<td style='max-width: 25ch;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'
        >$nome</td>");
        echo ("<td style='max-width: 20ch;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'
        >$celular</td>");
        echo ("<td style='max-width: 25ch;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'
        >$mensagem</td>");
        echo "<td style='min-width: 15ch; class='actions'>";
            echo "<button style='margin:0 5px;background:none;border:none;padding:0;font-size:1.5rem;color:var(--text-color);' title='Vizualizar' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever='" .$nome."' data-bs-whatevercelular='" .$celular."' data-bs-whatevermsg='" .$mensagem."'><i class='uil uil-eye'></i></button>";
            echo "<button style='margin:0 5px;background:none;border:none;padding:0;font-size:1.5rem;color:var(--text-color);' title='Excluir' onclick='confirmDelete($id)'><i class='uil uil-trash-alt'></i></button>";
        echo "</td>";
    echo "</tr>";
?>
