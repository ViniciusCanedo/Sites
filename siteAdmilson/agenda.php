<?php
  require_once('includes/header-admin.php')
?>
<div class="home-content">
    <div class="agenda">
    <?php
      
      if (isset($_SESSION['cad-agenda'])) {
        include_once('includes/cad-agenda.php');
        unset($_SESSION['cad-agenda']);
      }
    
    ?>
        <div class="title">
            <i class="uil uil-file-plus"></i>
            <span class="text">Novo Agendamento</span>
        </div>

        <span class="obg">* - Campos obrigatórios.</span>

        <form action="classes/agenda/saveAgenda.php" method="post" enctype="multipart/form-data">
          <div class="form-item nome-agenda">
            <label for="nome-agenda">Nome:*</label>
            <input type="text" name="nome" id="nome-agenda" class="input-agenda" data-js="noNumber" required>
          </div>

          <div class="form-item sobrenome-agenda">
            <label for="sobrenome-agenda">Sobrenome:*</label>
            <input type="text" name="sobrenome" id="sobrenome-agenda" class="input-agenda" data-js="noNumber" required>
          </div>

          <div class="form-item celular-agenda">
            <label for="celular-agenda">Celular:*</label>
            <input type="text" name="celular" id="celular-agenda" class="input-agenda" data-js="celular" maxlength="15" required>
          </div>

          <div class="form-item email-agenda">
            <label for="email-agenda">E-mail:</label>
            <input type="text" name="email" id="email-agenda" class="input-agenda">
          </div>

          <div class="form-item bairro-agenda">
            <label for="bairro-agenda">Bairro: *</label>
            <input type="text" name="bairro" id="bairro-agenda" class="input-agenda" required>
          </div>

          <div class="form-item endereco-agenda">
            <label for="endereco-agenda">Endereço:*</label>
            <input type="text" name="endereco" id="endereco-agenda" class="input-agenda" required>
          </div>

          <div class="form-item numero-agenda">
            <label for="numero-agenda">Número:*</label>
            <input type="text" name="numero" id="numero-agenda" class="input-agenda" data-js="justNumber" maxlength="6" required>
          </div>

          <div class="form-item data-agenda">
            <label for="data-agenda">Data da consulta:*</label>
            <input type="date" name="data" id="data-agenda" class="input-agenda" required>
          </div>
          
          <div class="form-item estado-agenda">
            <label for="estado-agenda">Estado da consulta: *</label>
            <select name="estado" id="estado-agenda" class="input-agenda" required>
              <option value="" disabled selected="true">Selecione uma opção...</option>
              <option value="Consulta Pendente">Consulta Pendente</option>
              <option value="Consulta Realizada">Consulta Realizada</option>
              <option value="Serviço Concluído">Serviço Concluído</option>
            </select>
          </div>

          <div class="form-item obs-agenda">
            <label for="obs-agenda">Observações:*</label>
            <textarea maxlength="255" name="obs" id="obs-agenda" class="input-agenda" required></textarea>
          </div>

          <div class="form-item submit-agenda">
            <input type="submit" value="Salvar" id="submit-agenda" class="input-agenda" name="saveAg">
          </div>
        </form>
    </div>
</div>

<?php
  require_once('includes/footer-admin.php')
?>