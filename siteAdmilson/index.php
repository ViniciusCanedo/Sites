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
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/swiper.min.css" />
    <style>
      .card-servico{
        padding: 15px;
      }

      /********** Estilos Section Galeria *************/

      #galeria {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 30px 0;
        color: var(--white);
      }

      #galeria h2 {
        color: #000;
      }

      #galeria .underline-title {
        width: 10rem;
        margin-bottom: 20px;
      }

      #galeria .galery-box{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 15px;
      }

      #galeria .galery-box .galery-item{
        flex: 25%;
        overflow: hidden;
        cursor: pointer;
        height: 250px;
        width:300;
        border-radius: 15px;
      }

      #galeria .galery-box .galery-item img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all linear .2s;
      }

      #galeria .galery-box .galery-item img:hover{
        transform: scale(1.2);
      }

      @media (max-width: 915px) {
        #galeria .galery-box .galery-item{
          flex: 33.33%;
        }
      }

      @media (max-width: 720px) {
        #galeria .galery-box .galery-item{
          flex: 50%;
        }
      }

    </style>
  </head>
  <body>
    <!-- Inicio Header-->
    <header>
      <a href="login.php" class="logo">
        <img
          src="images/logo.svg"
          alt="Logo Admilson - Reformas e Construções"
        />
      </a>
      <nav id="navbar" class="">
        <a href="#home" class="home">Home</a>
        <a href="#sobre">Sobre a empresa</a>
        <a href="#servicos">Serviços</a>
        <a href="#galeria">Galeria</a>
        <a href="#contato">Contato</a>
      </nav>

      <div
        id="menu-icon"
        class="fa-solid fa-bars"
        onclick="nav('fa-xmark')"
      ></div>
    </header>
    <!-- Fim Header-->

    <!-- Inicio Conteudo -->
    <main>
      <a href="https://api.whatsapp.com/send?phone=5515981401401" target="_blank"><img src="images/whatsapp-icon.svg" alt="Botão para whatsapp" class="whats-button"></a>
      <!-- Inicio Home -->
      <section id="home">
        <h3>Buscando sempre conforto e seguranca pra você.</h3>
      </section>
      <!-- Fim Home -->

      <!-- Inicio Sobre -->
      <div class="container">
        <section id="sobre">
          <h2>Sobre a empresa</h2>
          <div class="underline-title"></div>
          <div class="sobre-content">
            <p>
              A empresa Admilson - Reformas e Construções atua na aréa da
              construção civil, realizando sonhos de nossos clientes a mais de 15
              anos na região de Sorocaba. Para nós, cada cliente é único e pode
              ter o que sempre sonhou, um local para morar, trabalhar ou
              investir. Além de construirmos, nós nos preocupamos com  a segurança de nossos
              cliente e para garantí-la, fazemos reformas e manutenções das mais
              diversas áreas, visando sempre a melhora na qualidade dos serviços
              oferecidos.
            </p>
            <img
              src="images/sobre-section-img.svg"
              alt="Logo Admilson - Reformas e Construções"
            />
          </div>
        </section>
      </div>
      <!-- Fim Sobre -->

      <!-- Inicio Serviços -->
      <section id="servicos">
        <h2>Serviços</h2>
        <div class="underline-title"></div>
        <div class="servicos-content">
          <div class="card-servico">
            <i class="icon-servico fa-solid fa-screwdriver-wrench"></i>
            <p>
              A manutenção predial repara e conserva a estrutura do prédio,
              oferecendo segurança e preservando a vida útil da edificação.
            </p>
          </div>
          <div class="card-servico">
            <i class="icon-servico fa-solid fa-faucet-drip"></i>
            <p>
              A manutenção hidráulica visa averiguar os sistemas
              de água, incluindo o funcionamento de encanamentos e tubulações.
            </p>
          </div>
          <div class="card-servico">
            <i class="icon-servico fa-solid fa-bolt-lightning"></i>
            <p>
              A manutenção elétrica busca previnir possíveis acidentes e falhas
              por meio de verificações e intervenções nas instalações. 
            </p>
          </div>
          <div class="card-servico">
            <i class="icon-servico fa-solid fa-trowel-bricks"></i>
            <p>
              Uma construção bem feita é essencial para garantir conforto e
              segurançapara todos. Por isso é importante uma base sólida.
            </p>
          </div>
          <div class="card-servico">
            <i class="icon-servico fa-solid fa-paint-roller"></i>
            <p>
              Um acabamento são pequenas ações mas que fazem uma grande diferença 
              para a conclusão de uma contrução visualmente agrádavel.
            </p>
          </div>
          <div class="card-servico">
            <i class="icon-servico fa-solid fa-clipboard-list"></i>
            <p>
              O planejamento é o passo inicial para colocar a mão na massa.
              Assim, a consltoria permite entender as necessidades da obra.
            </p>
          </div>
        </div>
      </section>
      <!-- Fim Serviços -->

      <!-- Inicio Galeria-->
      <div class="container container-galeria">
        <section id="galeria">
          <h2>Galeria</h2>
          <div class="underline-title"></div>

          <div class="galery-box">
            <div class="galery-item">
              <img src="images/galery1.jpg" alt="Casa construída por Admilson">
            </div>

            <div class="galery-item">
              <img src="images/galery2.jpg" alt="Casa construída por Admilson">
            </div>

            <div class="galery-item">
              <img src="images/galery3.jpg" alt="Casa construída por Admilson">
            </div>

            <div class="galery-item">
              <img src="images/galery4.jpg" alt="Casa construída por Admilson">
            </div>

            <div class="galery-item">
              <img src="images/galery5.jpg" alt="Casa construída por Admilson">
            </div>
            
            <div class="galery-item">
              <img src="images/galery6.jpg" alt="Casa construída por Admilson">
            </div>

            <div class="galery-item">
              <img src="images/galery7.jpg" alt="Casa construída por Admilson">
            </div>

            <div class="galery-item">
              <img src="images/galery8.jpg" alt="Casa construída por Admilson">
            </div>
          </div>

          
        </section>
      </div>
      <!-- Fim Galeria-->

      <!-- Início Contato -->
      <section id="contato">
        <h2>Contato</h2>
        <div class="underline-title"></div>
        <p>Envie uma mensagem para obter mais informações, solicitar um orçamento e agendar uma reunião.</p>
        <form action="classes/msg/sendMsg.php" method="post" name="msgCliente">
          <input type="text" name="nome" id="input-nome" class="input-form" placeholder="Nome *" required>
          <input type="text" name="celular" id="input-celular" class="input-form" maxlength="15" placeholder="Celular *" data-js="celular" required>
          <input type="text" maxlength="255" name="mensagem" id="input-mensagem" class="input-form" placeholder="Mensagem *" wrap="hard" data-ls-module="charCounter" required>
          <input type="submit" value="Enviar" id="btn-submit" name="sendMsg">
        </form>
        <?php
        
          if (isset($_SESSION['cad-msg'])) {
            include_once('includes/cad-mensagem.php');
            unset($_SESSION['cad-msg']);
          }
        
        ?>
        <span>* - Campos obrigatórios</span>
      </section>
      <!-- Início Contato -->
    </main>
    <!-- fim Conteudo -->

    <footer>
      <p>&copy; Copyright 2022 - Admilson | Reformas e Construções. Desenvolvido por Web Company.</p>
    </footer>
    
    <!-- Arquivos JavaScript -->
    <script src="js/all.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/menu-btn.js"></script>
    <script src="js/page-scroll.js"></script>
    <script src="js/mask.js"></script>
  </body>
</html>
