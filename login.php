<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="img/ProfPlanner.ico" type="image/x-icon">
  <title>ProfPlanner – Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Sora:wght@600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="css/login.css" />
</head>
<body>

  <!-- HEADER -->
  <header>
    <div class="header-inner">
      <div class="logo">
        <div class="logo-icon"><i class="bi bi-book-half"></i></div>
        <span class="logo-text">Prof<span class="logo-accent">Planner</span></span>
      </div>
    </div>
  </header>

  <!-- MAIN -->
  <main>
    <div class="login-card">
      <div class="login-icon"><i class="bi bi-person-lock"></i></div>
      <h1>Bem-vindo de volta!</h1>
      <p class="sub">Acesse sua conta para gerenciar sua agenda.</p>

      <?php if (isset($_GET['erro'])): ?>
        <div class="alerta-erro">
          <i class="bi bi-exclamation-circle-fill"></i>
          Email ou senha incorretos. Tente novamente.
        </div>
      <?php endif; ?>

      <form action="autenticar.php" method="POST">
        <div class="campo">
          <label for="email">Email</label>
          <div class="campo-inner">
            <i class="bi bi-envelope"></i>
            <input type="email" id="email" name="email" placeholder="seu@email.com" required />
          </div>
        </div>

        <div class="campo">
          <label for="senha">Senha</label>
          <div class="campo-inner">
            <i class="bi bi-lock"></i>
            <input type="password" id="senha" name="senha" placeholder="••••••••" required />
          </div>
        </div>

        <a href="#" class="esqueceu">Esqueceu sua senha?</a>

        <button type="submit" class="btn-entrar">Entrar</button>

      </form>
    </div>
  </main>

  <!-- FOOTER -->
  <footer>
    <div class="footer-inner">
      <span class="footer-brand">ProfPlanner</span>
      <span class="footer-copy">© 2025 · Todos os direitos reservados</span>
    </div>
  </footer>

</body>
</html>
