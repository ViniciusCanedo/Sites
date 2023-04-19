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
      #backToHome {
        display: flex;
        color: white;
        font-weight:500;
        justify-content: center;
        align-items: center;
        background-color: #888;
        border: 0;
        border-radius: 5px;
        cursor: pointer;
        transition: all ease 0.3s;
        height: 50px;
      }

      #backToHome:hover {
        opacity:0.7;
      }
      @media (max-width: 1200px) {
        .container-login .img-login {
          display: none;
        }
      }
    </style>
  </head>

  <body>
    <?php
    //  echo password_hash('admilsonrc2022', PASSWORD_DEFAULT);
    ?>
    <?php
      $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
      
      if (!empty($dados['sendLogin'])) {
        // var_dump($dados);
        $query_usuario = "SELECT id, nome, user, pass 
                          FROM admin 
                          WHERE user =:user  
                          LIMIT 1";
        
        $result_usuario = $conn->prepare($query_usuario); // prepara a query
        $result_usuario->bindParam(':user', $dados['user-admin'], PDO::PARAM_STR); // cria um link para a query
        $result_usuario->execute(); // executa a query

        if (($result_usuario) AND ($result_usuario->rowCount() != 0)) {
          $row_user = $result_usuario->fetch(PDO::FETCH_ASSOC);
          //  var_dump($row_user);

          if (password_verify($dados['pass-admin'], $row_user['pass'])) {
            $_SESSION['id'] = $row_user['id'];
            $_SESSION['nome'] = $row_user['nome'];

            header("Location:painel-admin.php");
          }else {
            $_SESSION['msg'] = true;
            $_SESSION['recoverPass'] = true;
          }

        }else {
          $_SESSION['msg'] = true;
        }

      }
    
      // '".$dados['user-admin']."'
    ?>


    <div class="container-login">
      <div class="login-form">
        <div class="title">Login</div>
        <form
          action=""
          method="post"
          enctype="multipart/form-data"
        >
          <div class="input-box">
            <i class="fa-solid fa-user"></i>
            <input
              type="text"
              name="user-admin"
              id="user-admin"
              placeholder="Usuário"
              value ="<?php if (isset($dados['user-admin'])) {echo $dados['user-admin'];}?>"
              required
            />
          </div>

          <div class="input-box">
            <i class="fa-solid fa-lock"></i>
            <input
              type="password"
              name="pass-admin"
              id="pass-admin"
              placeholder="Senha"
              value ="<?php if (isset($dados['pass-admin'])) {echo $dados['pass-admin'];}?>"
              required
            />
            <div id="icon" onclick="showHide()"></div>
          </div>

          <?php
            if (isset($_SESSION['msg'])) {
              include_once('includes/erro-login.php');
              unset($_SESSION['msg']);
            }elseif (isset($_SESSION['logout'])) {
              include_once('includes/msg-logout.php');
              unset($_SESSION['logout']);
            }elseif (isset($_SESSION['nologin'])) {
              include_once('includes/erro-no-login.php');
              unset($_SESSION['nologin']);
            }elseif (isset($_SESSION['sucesso'])) {
              include_once('includes/alt-senha.php');
              echo $_SESSION['sucesso'];
              unset($_SESSION['sucesso']);
            }elseif (isset($_SESSION['sucesso-pass'])) {
              include_once('includes/new-pass.php');
              unset($_SESSION['sucesso-pass']);
            }
          ?>
            
            <?php
            
            if (isset($_SESSION['recoverPass'])) {
              include_once('includes/forgot.php');
              unset($_SESSION['recoverPass']);
            }

            ?>
          <!-- <div class="forgot"><a href="classes/recover.php">Esqueceu a senha?</a></div> -->

          <div class="input-box">
            <input type="submit" value="Entrar" name="sendLogin"/>
          </div>
        </form>
        <a href="index.php" id="backToHome">Voltar</a>
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
  </body>
</html>
