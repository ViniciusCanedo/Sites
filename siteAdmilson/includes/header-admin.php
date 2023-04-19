<?php
  session_start();
  ob_start();
  include_once 'conexao.php';


  if ((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))) {
    $_SESSION['nologin'] = true;
    header('Location:login.php');
  }
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
    <link rel="stylesheet" href="css/style-admin.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <link rel="stylesheet" href="css/swiper.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <style>
      ol, ul{
        padding-left: 0;
      }

      .agenda .obg{
        font-size: 12px;
        color: var(--text-color);
      }

      .agenda form{
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        gap: 15px;
        margin-top: 20px;
      }

      #submit-agenda{
        background-color: var(--primary-color);
        color: var(--title-icon-color);
        width: 20%;
        height: 50px;
        cursor: pointer;
        font-size: 18px;
        font-weight: 500;
        border:2px solid var(--primary-color);
        transition:all linear 0.3s;
        margin-bottom: 100px;
      }

      #submit-agenda:hover{
        background-color: var(--panel-color);
        color: var(--primary-color);
      }

      .agenda form .form-item{
        flex: auto;
      }

      .agenda form .form-item .input-agenda{
        width: 100%;
        padding: 0 15px;
      }

      .nome-agenda, .sobrenome-agenda{
        width: 45%;
      }

      .email-agenda{
        width: 35%;
      }

      .bairro-agenda{
        width: 35%;
      }

      .endereco-agenda{
        width: 50%;
      }

      .estado-agenda, .obs-agenda{
        width: 100%;
      }

      #obs-agenda{
        padding-top: 15px;
        height: 80px;
      }

      .agenda form .form-item label{
        color: var(--text-color);
        display: block;
        font-size: 18px;
        font-weight:500;
      }


      .agenda form input,
      .agenda form select,
      .agenda form textarea{
        height: 40px;
        border: 2px solid var(--box);
        border-radius: 10px;
        padding: 5px;
        background-color: var(--panel-color);
        color: var(--text-color);
        font-size: 16px;
      }

      @media (max-width: 700px) {
      .email-agenda{
        width: 100%;
      }

      .bairro-agenda{
        width: 100%;
      }

      .endereco-agenda{
        width: 75%;
      }

      .numero-agenda{
        width: 20%;
      }

      .estado-agenda, .obs-agenda{
        width: 100%;
      }

      #obs-agenda{
        padding-top: 15px;
        height: 100px;
      }

      #submit-agenda{
        width: 40%;
      }
    }

    @media (max-width: 550px) {
      .nome-agenda, .sobrenome-agenda{
        width: 100%;
      }

      .endereco-agenda{
        width: 100%;
      }

      #submit-agenda{
        width: 100%;
      }

      #obs-agenda{
        padding-top: 15px;
        height: 120px;
      }
    }

    @media (max-width: 420px) {
      .numero-agenda{
        width: 100%;
      }

      #obs-agenda{
        padding-top: 15px;
        height: 150px;
      }
    }
    </style>
  </head>
  <body>
    <nav>
      <div class="logo-name">
        <div class="logo-img">
          <img src="images/favicon.png" alt="Logo Admilson" />
        </div>

        <span class="logo-text"><?php echo $_SESSION['nome'];?></span>
      </div>

      <div class="menu-items">
        <ul class="nav-links">
          <li>
            <a href="./painel-admin.php">
              <i class="uil uil-estate"></i>
              <span class="link-name">Home</span>
            </a>
          </li>
          <li>
            <a href="./agenda.php">
              <i class="uil uil-plus-circle"></i>
              <span class="link-name">Novo Agendamento</span>
            </a>
          </li>
          <li>
            <a href="./mensagem.php">
              <i class="uil uil-message"></i>
              <span class="link-name">Mensagens</span>
            </a>
          </li>
        </ul>

        <ul class="logout-mod">
          <li>
            <a href="./classes/sair.php">
              <i class="uil uil-sign-out-alt"></i>
              <span class="link-name">Sair</span>
            </a>
          </li>
          <li class="mode">
            <a href="#">
              <i class="uil uil-moon"></i>
              <span class="link-name">Tema Escuro</span>
            </a>

            <div class="mode-toggle">
              <span class="switch"></span>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <section class="dashboard">
      <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>

        <div class="search-box">
          <i class="uil uil-search"></i>
          <input
            type="text"
            name="search"
            id="buscar"
            placeholder="Pesquisar cliente..."
          />
        </div>

        <img src="images/avatar-depoimento.png" alt="Ícone Administrador" />
      </div>