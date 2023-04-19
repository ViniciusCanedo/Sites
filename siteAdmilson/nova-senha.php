<?php

  session_start();
  ob_start();
  include_once ('conexao.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admilson | Reformas e Construções</title>
    <link rel="shortcut icon" href="images/favicon.png" />

    <!-- Folhas de Estilos -->
    <link rel="stylesheet" href="css/style-login.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/swiper.min.css" />

    <style>
      #icon-atual {
        position: absolute;
        background: url("images/show.png");
        width: 25px;
        height: 25px;
        cursor: pointer;
        background-size: cover;
        right: 15px;
        transition: all ease 200ms;
      }

      #icon-atual.hide {
        background: url("images/hide.png");
        background-size: cover;
      }
    </style>
  </head>

  <body>
    <?php
    //  echo password_hash('admilsonrc2022', PASSWORD_DEFAULT);
    ?>
    <?php
      $dadosPass = filter_input_array(INPUT_POST, FILTER_DEFAULT);
      
      if (!empty($dadosPass['savePass'])) {
        // var_dump($dadosPass);
        $query_pass = "SELECT id, nome, user, pass 
                          FROM admin 
                          WHERE id = 1 
                          LIMIT 1";
        
        $result_pass = $conn->prepare($query_pass); // prepara a query
        $result_pass->execute(); // executa a query

        $row_pass = $result_pass->fetch(PDO::FETCH_ASSOC);

        if (password_verify($dadosPass['atual-pass'], $row_pass['pass'])){
          $passCript = password_hash($dadosPass['new-pass'], PASSWORD_DEFAULT);
          $new_pass = "UPDATE admin SET pass = '". $passCript . "' WHERE user = 'admilson@admin'";
          $result_pass = $conn->prepare($new_pass);
          $result_pass->execute();

          $_SESSION['sucesso-pass'] = true;

          header('Location:login.php');
        }else{
          $_SESSION['erro-pass'] = true;
        }

      }
    
      // '".$dados['user-admin']."'
    ?>


    <div class="container-login">
      <div class="login-form">
        <div class="title">Nova Senha</div>
        <form
          action=""
          method="post"
          enctype="multipart/form-data"
        >
          <div class="input-box">
          <i class="fa-solid fa-lock"></i>
            <input
              type="password"
              name="atual-pass"
              id="atual-pass"
              placeholder="Senha atual"
              required
            />
            <div id="icon-atual" onclick="showHideAtual()"></div>
          </div>

          <div class="input-box">
            <i class="fa-solid fa-lock"></i>
            <input
              type="password"
              name="new-pass"
              id="pass-admin"
              placeholder="Nova senha"
              required
            />
            <div id="icon" onclick="showHide()"></div>
          </div>

          <?php
          
            if (isset($_SESSION['erro-pass'])) {
              include_once('includes/erro-new-pass.php');
              unset($_SESSION['erro-pass']);
            }
          
          ?>

          <div class="input-box">
            <input type="submit" value="Salvar" name="savePass"/>
          </div>
        </form>
      </div>
      <!-- Fim Login Form -->

      <!-- Img Login-->
      <div class="img-login">
        <img
          src="images/img-login.svg"
          alt="Desenho de engenheiro supervisionando o projeto"
        />
      </div>
      <!-- Fim Img Login-->
    </div>
    <!-- Arquivos JavaScript -->
    <script src="js/all.min.js"></script>
    <script src="js/passwordShow.js"></script>
    <script src="js/atualPassShow.js"></script>
  </body>
</html>
