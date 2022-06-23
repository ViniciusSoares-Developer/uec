<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <title>Cadastro - UEC</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container-fluid">
        <?php if ($_SESSION['usuarioLogado'] === false) : ?>
          <a class="navbar-brand" href="?pagina=0">Home</a>
        <?php endif; ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <?php if ($_SESSION['usuarioLogado'] === true) : ?>
              <li class="nav-item">
                <a class="nav-link" href="?pagina=2">Lista de Usuário</a>
              </li>
              <li class="nav-item top-0 end-0 position-absolute">
                <a class="nav-link" href="?pagina=4&logout=true"><button type="button" class="btn btn-danger">Deslogar</button></a>
              </li>
              <?php endif; ?>
              <li class="nav-item">
                <a class="nav-link" href="?pagina=1">Lutadores</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="?pagina=8">Lutas</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main class="container">