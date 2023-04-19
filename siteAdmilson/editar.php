<?php
  require_once('includes/header-admin.php')
?>
<div class="home-content">
    <div class="agenda">
    <?php
      $idEditar = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

      if (empty($idEditar)) {
        $_SESSION['notEdit'] = true;
        header('Location:painel-admin.php');
      }else{
        $query_usuario = "SELECT * FROM agenda WHERE id = $idEditar LIMIT 1";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->execute();

        $dados_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);

        extract($dados_usuario);
      }
    
    ?>
        <div class="title">
            <i class="uil uil-file-plus"></i>
            <span class="text">Novo Agendamento</span>
        </div>

        <span class="obg">* - Campos obrigatórios.</span>

        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-item nome-agenda">
            <label for="nome-agenda">Nome:*</label>
            <input type="text" name="nome" id="nome-agenda" class="input-agenda" data-js="noNumber" value="<?php echo $nome;?>" required>
          </div>

          <div class="form-item sobrenome-agenda">
            <label for="sobrenome-agenda">Sobrenome:*</label>
            <input type="text" name="sobrenome" id="sobrenome-agenda" class="input-agenda" data-js="noNumber" value="<?php echo $sobrenome;?>"  required>
          </div>

          <div class="form-item celular-agenda">
            <label for="celular-agenda">Celular:*</label>
            <input type="text" name="celular" id="celular-agenda" class="input-agenda" data-js="celular" maxlength="15" value="<?php echo $celular;?>" required>
          </div>

          <div class="form-item email-agenda">
            <label for="email-agenda">E-mail:</label>
            <input type="text" name="email" id="email-agenda" class="input-agenda" value="<?php echo $email;?>">
          </div>

          <div class="form-item bairro-agenda">
            <label for="bairro-agenda">Bairro: *</label>
            <input type="text" name="bairro" id="bairro-agenda" class="input-agenda" value="<?php echo $bairro;?>" required>
          </div>

          <div class="form-item endereco-agenda">
            <label for="endereco-agenda">Endereço:*</label>
            <input type="text" name="endereco" id="endereco-agenda" class="input-agenda" value="<?php echo $endereco;?>" required>
          </div>

          <div class="form-item numero-agenda">
            <label for="numero-agenda">Número:*</label>
            <input type="text" name="numero" id="numero-agenda" class="input-agenda" data-js="justNumber" maxlength="6" value="<?php echo $numero;?>" required>
          </div>

          <div class="form-item data-agenda">
            <label for="data-agenda">Data da consulta:*</label>
            <input type="date" name="data" id="data-agenda" class="input-agenda" value="<?php echo $data;?>" required>
          </div>
          
          <div class="form-item estado-agenda">
            <label for="estado-agenda">Estado da consulta: *</label>
            <select name="estado" id="estado-agenda" class="input-agenda" required>
            <?php echo $estado;?>
              <option value=""  disabled>Selecione uma opção...</option>
              <option value="Consulta Pendente" <?php if($estado == 'Consulta Pendente'){echo "selected='true'";}?>>Consulta Pendente</option>
              <option value="Consulta Realizada" <?php if($estado == 'Consulta Realizada'){echo "selected='true'";}?>>Consulta Realizada</option>
              <option value="Serviço Concluído" <?php if($estado == 'Serviço Concluído'){echo "selected='true'";}?>>Serviço Concluído</option>
            </select>
          </div>

          <div class="form-item obs-agenda">
            <label for="obs-agenda">Observações:*</label>
            <textarea maxlength="255" name="obs" id="obs-agenda" class="input-agenda" required><?php echo $obs;?></textarea>
          </div>

          <div class="form-item submit-agenda">
            <input type="submit" value="Salvar" id="submit-agenda" class="input-agenda" name="saveEdit">
          </div>
        </form>
    </div>
</div>

<?php
  $dadosEdit=filter_input_array(INPUT_POST, FILTER_DEFAULT);

  if (!empty($dadosEdit['saveEdit'])) {
    $query_agenda = "UPDATE agenda SET nome =:nome , sobrenome=:sobrenome, celular=:celular, email=:email, bairro=:bairro, endereco=:endereco, numero=:numero, data=:data, estado=:estado, obs=:obs 
    WHERE id=$id";

    $new_agenda = $conn->prepare($query_agenda);
    $new_agenda->bindParam(':nome', ucwords(strtolower($dadosEdit['nome'])), PDO::PARAM_STR);
    $new_agenda->bindParam(':sobrenome', ucwords(strtolower($dadosEdit['sobrenome'])), PDO::PARAM_STR);
    $new_agenda->bindParam(':celular', $dadosEdit['celular'], PDO::PARAM_STR);
    $new_agenda->bindParam(':email', $dadosEdit['email'], PDO::PARAM_STR);
    $new_agenda->bindParam(':bairro', ucwords(strtolower($dadosEdit['bairro'])), PDO::PARAM_STR);
    $new_agenda->bindParam(':endereco', ucwords(strtolower($dadosEdit['endereco'])), PDO::PARAM_STR);
    $new_agenda->bindParam(':numero', $dadosEdit['numero'], PDO::PARAM_STR);
    $new_agenda->bindParam(':data', $dadosEdit['data'], PDO::PARAM_STR);
    $new_agenda->bindParam(':estado', $dadosEdit['estado'], PDO::PARAM_STR);
    $new_agenda->bindParam(':obs', $dadosEdit['obs'], PDO::PARAM_STR);
    $new_agenda->execute();

    $_SESSION['save-edit'] = true;

    header("Location:painel-admin.php");
  }

  require_once('includes/footer-admin.php')
?>