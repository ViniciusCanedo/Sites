<?php
  require_once('includes/header-admin.php');
  $query_listAg = "SELECT id, nome, sobrenome, celular, email, bairro, endereco, numero, data, estado, obs FROM agenda";
  $result_listAg = $conn->prepare($query_listAg);
  $result_listAg->execute();
  

  $query_count_conc = "SELECT COUNT(estado) AS qnt_conc FROM agenda WHERE estado = 'Serviço Concluído'";
  $result_conc = $conn->prepare($query_count_conc);
  $result_conc->execute();

  $qnt_conc = $result_conc->fetch(PDO::FETCH_ASSOC);

  $query_count_pend = "SELECT COUNT(estado) AS qnt_pend FROM agenda WHERE estado = 'Consulta Pendente'";
  $result_pend = $conn->prepare($query_count_pend);
  $result_pend->execute();

  $qnt_pend = $result_pend->fetch(PDO::FETCH_ASSOC);

  $query_count_real = "SELECT COUNT(estado) AS qnt_real FROM agenda WHERE estado = 'Consulta Realizada'";
  $result_real = $conn->prepare($query_count_real);
  $result_real->execute();

  $qnt_real = $result_real->fetch(PDO::FETCH_ASSOC);

  if (isset($_SESSION['emptyId'])) {
    include_once('includes/not-user.php');
    unset($_SESSION['emptyId']);
  }elseif (isset($_SESSION['erroDelete'])) {
    include_once('includes/erro-delete-agenda.php');
    unset($_SESSION['erroDelete']);
  }elseif (isset($_SESSION['sucessoDelete'])) {
    include_once('includes/sucesso-delete-agenda.php');
    unset($_SESSION['sucessoDelete']);
  }elseif (isset($_SESSION['noEdit'])) {
    include_once('includes/no-edit.php');
    unset($_SESSION['noEdit']);
  }elseif (isset($_SESSION['save-edit'])) {
    include_once('includes/save-edit.php');
    unset($_SESSION['save-edit']);
  }
?>


<div class="home-content">
  <div class="content">
    <div class="title">
      <i class="uil uil-chart-line"></i>
      <span class="text">Relatórios</span>
    </div>
    <div class="boxes">
      <div class="box box1">
        <i class="uil uil-wheel-barrow"></i>
        <span class="text">Serviços Concluídos</span>
        <span class="number"><?php echo $qnt_conc['qnt_conc'];?></span>
      </div>
      <div class="box box2">
        <i class="uil uil-clock-three"></i>
        <span class="text">Consultas Pendentes</span>
        <span class="number"><?php echo $qnt_pend['qnt_pend'];?></span>
      </div>
      <div class="box box3">
        <i class="uil uil-check"></i>
        <span class="text">Consultas Realizadas</span>
        <span class="number"><?php echo $qnt_real['qnt_real'];?></span>
      </div>
    </div>
  </div>
  <div class="agenda">
    <div class="title">
        <i class="uil uil-schedule"></i>
        <span class="text">Agenda</span>
      <!-- <div class="filter">
        <select name="categorias" id="filtroCateg" onchange="pesquisar();" style="height: 40px;
          width: 20ch;
          border: 2px solid var(--box);
          border-radius: 10px;
          padding: 5px;
          background-color: var(--panel-color);
          color: var(--text-color);
          font-size: 16px;">
          <option value="Todos" selected="true">Todos</option>
          <option value="Serviço Concluído">Serviços Concluídos</option>
          <option value="Consulta Pendente">Consultas Pendentes</option>
          <option value="Consulta Realizada">Consultas Realizadas</option>
        </select>
      </div> -->
    </div>
    <div id="resultado">
      <?php
        include_once 'search.php';
      ?>
    </div>
    <!-- <div class="dados-agenda">
      <table>
      <?php
          
              if (($result_listAg) AND ($result_listAg->rowCount() != 0)) {
                  echo "<tr style='white-space:nowrap;'>";
                      echo "<th>Nome</th>";
                      echo "<th>Contato</th>";
                      echo "<th>Situação</th>";
                      echo "<th>Data da consulta</th>";
                      echo "<th>Ações</th>";
                  echo "</tr>";
                  while ($row_ag = $result_listAg->fetch(PDO::FETCH_ASSOC)) {
                      include('includes/row-agenda.php');
                  }


              }else {
                  echo "<span style='
                  color: var(--text-color);
                  font-size: 1.2rem;
                  '>Não há agendamentos no momento. Volte mais tarde.</span>";
              }
          
          ?>
      </table>
    </div> -->
  </div>
</div>


<div class="modal fade" id="modalAg" tabindex="-1" aria-labelledby="modalAgLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content" style="background-color:var(--table-odd);color:var(--text-color);">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAgLabel">Vizualizar</h5>
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body row">
          <div class="mb-3 col-6">
            <label for="recipient-name" class="col-form-label">Nome:</label>
            <h5 class="agenda-nome" id="modalAgLabel"></h5>
          </div>
          <div class="mb-3 col-6">
            <label for="recipient-name" class="col-form-label">Celular:</label>
            <h5 class="agenda-celular" id="modalAgLabel"></h5>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">E-mail:</label>
            <h5 class="agenda-email" id="modalAgLabel"></h5>
          </div>
          <div class="mb-3 col-6">
            <label for="recipient-name" class="col-form-label">Bairro:</label>
            <h5 class="agenda-bairro" id="modalAgLabel"></h5>
          </div>
          <div class="mb-3 col-6">
            <label for="recipient-name" class="col-form-label">Endereço:</label>
            <h5 class="agenda-endereco" id="modalAgLabel"></h5>
          </div>
          <div class="mb-3 col-6">
            <label for="recipient-name" class="col-form-label">Data da consulta:</label>
            <h5 class="agenda-data" id="modalAgLabel"></h5>
          </div>
          <div class="mb-3 col-6">
            <label for="recipient-name" class="col-form-label">Situação da consulta:</label>
            <h5 class="agenda-estado" id="modalAgLabel"></h5>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Observações:</label>
            <h5 class="agenda-obs" id="modalAgLabel"></h5>
          </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    var modalAg = document.getElementById('modalAg')
    modalAg.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var recipientnome = button.getAttribute('data-bs-whatever-nome')
        var recipientsobrenome = button.getAttribute('data-bs-whatever-sobrenome')
        var recipientcelular = button.getAttribute('data-bs-whatever-celular')
        var recipientemail = button.getAttribute('data-bs-whatever-email')
        var recipientbairro = button.getAttribute('data-bs-whatever-bairro')
        var recipientendereco = button.getAttribute('data-bs-whatever-endereco')
        var recipientnumero = button.getAttribute('data-bs-whatever-numero')
        var recipientdata = button.getAttribute('data-bs-whatever-data')
        var recipientestado = button.getAttribute('data-bs-whatever-estado')
        var recipientobs = button.getAttribute('data-bs-whatever-obs')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = modalAg.querySelector('.modal-title')
        var modalBodyNome = modalAg.querySelector('.agenda-nome')
        var modalBodyCelular = modalAg.querySelector('.agenda-celular')
        var modalBodyEmail = modalAg.querySelector('.agenda-email')
        var modalBodyBairro = modalAg.querySelector('.agenda-bairro')
        var modalBodyEndereco = modalAg.querySelector('.agenda-endereco')
        var modalBodyData = modalAg.querySelector('.agenda-data')
        var modalBodyEstado = modalAg.querySelector('.agenda-estado')
        var modalBodyObs = modalAg.querySelector('.agenda-obs')

        modalTitle.textContent = 'Vizualizar' 
        modalBodyNome.textContent = recipientnome + ' ' + recipientsobrenome
        modalBodyCelular.textContent = recipientcelular
        modalBodyEmail.textContent = recipientemail
        modalBodyBairro.textContent = recipientbairro
        modalBodyEndereco.textContent = recipientendereco + ', ' + recipientnumero
        modalBodyData.textContent = recipientdata
        modalBodyEstado.textContent = recipientestado
        modalBodyObs.textContent = recipientobs
    })
</script>

<script src="js/modal-delete-agenda.js"></script>
<!-- <script src="js/filtro.js"></script> -->
<?php
  require_once('includes/footer-admin.php')
?>