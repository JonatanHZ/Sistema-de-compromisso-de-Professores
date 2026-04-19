<?php  include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="img/ProfPlanner.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/Adicionar.css" />
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
        <a href="#" class="nav-link">Início</a>
        <a href="#" class="nav-link-active">Aulas</a>
        <a href="agenda.php" class="nav-link">Turmas</a>
        <a href="principal.html" class="nav-link">Sair</a>
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

  <div class="container">
    <h2>Novo Compromisso</h2>

    <!-- TIPO -->

    <form action="salvar.php" method="POST" onsubmit="return validarForm()">
      
    <!-- Select dos orifessor  -->
    <select name="professor_id" id="titulo" required>
        <option value="" disabled selected>Selecione um professor</option>
       
       <?php 
        $resultado = $conn->query("SELECT pessoa_id, nome FROM tbPessoas");
        while ($linha = $resultado->fetch_assoc()) {
          echo "<option value='{$linha['pessoa_id']}' > {$linha['nome']} </option>";
        }?>
       
      </select>

      <!-- select do tipo -->
    <select name="agenda_tipo_id" id="" required>
      <option value="" disabled selected>Selecione o Tipo</option>
      
      <?php 
      $tipos = $conn->query("SELECT agenda_tipo_id, nome FROM tbAgendaTipo");
      while ($linha = $tipos->fetch_assoc()) {
        echo "<option value='{$linha['agenda_tipo_id']}' > {$linha['nome']}</option> ";
      }?>   
    </select>
      
    <input type="date" name="data" id="data" required>
    <input type="text" name="observacao" placeholder="Observação">
      
      <!-- BOTÃO -->
      <button type="submit">Salvar</button>
  </form>
  </div>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-inner">
      <span class="footer-brand">ProfPlanner</span>
      <span class="footer-copy">© 2025 · Todos os direitos reservados</span>
    </div>
  </footer>

  <script src="js/adicionar.js"></script>
</body>

</html>