<?php
  require_once('includes/header-admin.php');

  $query_listMsg = "SELECT id, nome, celular, mensagem FROM mensagens";
  $result_listMsg = $conn->prepare($query_listMsg);
  $result_listMsg->execute();
?>
<div class="home-content">

  <?php
    if (isset($_SESSION['emptyId'])) {
      include_once('includes/not-user.php');
      unset($_SESSION['emptyId']);
    }elseif (isset($_SESSION['erroDelete'])) {
      include_once('includes/erro-delete.php');
      unset($_SESSION['erroDelete']);
    }elseif (isset($_SESSION['sucessoDelete'])) {
      include_once('includes/sucesso-delete.php');
      unset($_SESSION['sucessoDelete']);
    }
  
  ?>
  <div class="agenda">
    <div class="title">
      <i class="uil uil-comment-alt-message"></i>
      <span class="text">Mensagens</span>
    </div>

    <div class="dados-agenda">
      <table>
        <?php
          if (($result_listMsg) AND ($result_listMsg->rowCount() != 0)) {
        
            echo "<tr>";
            echo "<th>Nome</th>";
            echo "<th>Contato</th>";
            echo "<th>Mensagen</th>";
            echo "<th>Ações</th>";
            echo "</tr>";

            while ($row_msg = $result_listMsg->fetch(PDO::FETCH_ASSOC)) {
              include('includes/row-msg.php');
            }
          }else {
            echo "<span style='
            color: var(--text-color);
            font-size: 1.2rem;
            '>Não há mensagens no momento. Volte mais tarde.</span>";
          }
                
        ?>       
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color:var(--table-odd);color:var(--text-color);">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vizualizar</h5>
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body row">
          <div class="mb-3 col-6">
            <label for="recipient-name" class="col-form-label">Nome:</label>
            <h5 class="modal-nome" id="exampleModalLabel"></h5>
          </div>
          <div class="mb-3 col-6">
            <label for="recipient-name" class="col-form-label">Contato:</label>
            <h5 class="modal-celular" id="exampleModalLabel"></h5>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Mensagem:</label>
            <h5 class="modal-msg" id="exampleModalLabel"></h5>
          </div>
      </div>
    </div>
  </div>
</div>





<script type="text/javascript">
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var recipient = button.getAttribute('data-bs-whatever')
        var recipientcelular = button.getAttribute('data-bs-whatevercelular')
        var recipientmsg = button.getAttribute('data-bs-whatevermsg')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = exampleModal.querySelector('.modal-title')
        var modalBodyInput = exampleModal.querySelector('.modal-nome')
        var modalBodyInputCelular = exampleModal.querySelector('.modal-celular')
        var modalBodyInputMsg = exampleModal.querySelector('.modal-msg')

        modalTitle.textContent = 'Vizualizar' 
        modalBodyInput.textContent = recipient
        modalBodyInputCelular.textContent = recipientcelular
        modalBodyInputMsg.textContent = recipientmsg
    })
</script>

<script src="js/modal-delete.js"></script>

<?php
  require_once('includes/footer-admin.php')
?>