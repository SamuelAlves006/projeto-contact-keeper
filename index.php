<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>ContactKeeper</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/product/">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="css/product.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }

      .left-section {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        height: 100%;
        padding: 20px;
      }

      .right-section {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
      }

      .right-section img {
        max-width: 100%;
        height: auto;
      }

      #sobre-nos .imagem {
            height: 100%;
            width: 100%;
            object-fit: cover;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="product.css" rel="stylesheet">
  </head>
  <body>

  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <i class="fa-solid fa-square-phone"></i>
        ContactKeeper
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#sobre">Sobre Nós</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Entrar</a>
          </li>
          <li class="nav-item">
            <a href="cadastro.php">
              <button class="btn">Inscreva-se</button>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <div class="container">
      <div class="row vh-100 align-items-center">
        <div class="col-md-6 left-section">
          <h4>ContactKeeper</h4>
          <h1 class="title">Bem-vindo!</h1>
          <p>Estamos felizes em vê-lo aqui. Com nosso serviço de agenda de contatos, é possível guardar seus contatos telefônicos de maneira simplificada e moderna. Comece agora adicionando seu primeiro contato.</p>
          <a href="login.php">
            <button class="btn">Adicionar um contato</button>
          </a>
        </div>
        <div class="col-md-6 right-section">
          <img src="assets/contact-home.svg" alt="Imagem de boas-vindas" height="600">
        </div>
      </div>
    </div>
  </main>

  <footer class="text-white text-center text-md-start py-4 mt-4">
  <div class="container">
    <div class="row" style="padding: 70px 0px 70px 0px" id="sobre">
        <div class="col-md-6">
            <img src="assets/company.jpg" class="img-fluid" alt="Foto da Empresa" style="border: 3px solid white; border-radius: 10px">
        </div>
        <div class="col-md-6">
            <div class="text-center mt-5">
                <h2>Sobre Nós</h2>
                <p style="font-size: 18px; text-align:end; padding-top: 10px">Somos uma empresa dedicada a fornecer soluções inovadoras para nossos clientes. Nossa equipe é apaixonada por oferecer serviços de alta qualidade e satisfazer as necessidades de nossos clientes. Com uma abordagem centrada no cliente, buscamos constantemente melhorar e superar as expectativas, entregando sistemas simples porém eficazes.</p>
            </div>
        </div>
    </div>
</div>
  </footer>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
