<?php
  
  require_once "validador_acesso.php";

  // abrir o arquivo.hd
  $arquivo = fopen('arquivo.hd', 'r');

  // enquanto houver registros (linhas) a serem recuperados
  while(!feof($arquivo)) { // testa pelo fim de um arquivo

    $chamado_dados = explode('#', fgets($arquivo));

    if($_SESSION['perfil_id'] == 2) {
      // só vamos exibir o chamado, se ele foi criado pelo usuário
      if($_SESSION['id'] != $chamado_dados[0]) {
        continue;
      }
    }

    if(count($chamado_dados) < 3) {
      continue;
    }

    // linhas
    $registros[] = $chamado_dados;
  }
  // fecha o arquivo aberto
  fclose($arquivo);
?>

<html>

<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .card-consultar-chamado {
      padding: 30px 0 0 0;
      width: 100%;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <?php require_once "nav.php"; ?>

  <div class="container">
    <div class="row">

      <div class="card-consultar-chamado">
        <div class="card">
          <div class="card-header">
            Consulta de chamado
          </div>

          <div class="card-body">

            <?php

              foreach ($registros as $chamado): ?>
              
                <div class="card mb-3 bg-light">
                    <div class="card-body">
                      <h5 class="card-title"><?=$chamado[1];?></h5>
                      <h6 class="card-subtitle mb-2 text-muted"><?=$chamado[2];?></h6>
                      <p class="card-text"><?=$chamado[3];?></p>
                    </div>
                </div>

            <?php endforeach; ?>

            <div class="row mt-5">
              <div class="col-6">
                <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>