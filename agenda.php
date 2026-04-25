<?php include "conexao.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="img/ProfPlanner.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/agenda.css" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Sora:wght@600;700;800&display=swap"
    rel="stylesheet" />
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <title>ProfPlanner</title>

</head>

<body>

  <!-- HEADER -->
  <header>
    <div class="header-inner">
      <div class="logo">
        <div class="logo-icon"><i class="bi bi-book-half"></i></div>
        <span class="logo-text">Prof<span class="logo-accent">Planner</span></span>
      </div>

      <nav class="nav">
        <a href="adicionar.php" class="nav-link">Sair</a>
      </nav>

      <div class="header-actions">
        <button class="btn-icon notif-btn">
          <i class="bi bi-bell"></i>
          <span class="notif-dot"></span>
        </button>

        <div class="avatar">P</div>
      </div>
    </div>
  </header>

  <!-- CONTEUDO PRINCIPAL  -->
  <div class="container">
    <h2>Agenda</h2>
    
    <table border="1">
      <tr>
        <th>Professor</th>
        <th>Tipo</th>
        <th>Data</th>
        <th>Observação</th>
      </tr>
      <?php
      $result = $conn->query("
      SELECT
          tbAgenda.data,
          tbAgenda.observacao,
          tbPessoas.nome AS professor,
          tbAgendaTipo.nome AS tipo
      FROM tbAgenda
      JOIN tbPessoas ON tbAgenda.professor_id = tbPessoas.pessoa_id
      JOIN tbAgendaTipo ON tbAgenda.agenda_tipo_id = tbAgendaTipo.agenda_tipo_id
    ");
      while ($row = $result->fetch_assoc()):
      ?>
        <tr>
          <td><?= $row['professor'] ?></td>
          <td><?= $row['tipo'] ?></td>
          <td><?= $row['data'] ?></td>
          <td><?= $row['observacao'] ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-inner">
      <span class="footer-brand">ProfPlanner</span>
      <span class="footer-copy">© 2025 · Todos os direitos reservados</span>
    </div>
  </footer>

</body>

</html>