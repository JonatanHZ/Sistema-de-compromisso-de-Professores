<?php
session_start();
include 'conexao.php';

// Proteção: só acessa se estiver logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$avatar_letra = strtoupper(mb_substr($_SESSION['nome'], 0, 1));

// Busca todos os compromissos do banco ordenados por data e hora
$result = $conn->query("
    SELECT
        tbAgenda.agenda_id,
        tbAgenda.data,
        tbAgenda.hora,
        tbAgenda.observacao,
        tbPessoas.nome AS professor,
        tbAgendaTipo.nome AS tipo
    FROM tbAgenda
    JOIN tbPessoas ON tbAgenda.professor_id = tbPessoas.pessoa_id
    JOIN tbAgendaTipo ON tbAgenda.agenda_tipo_id = tbAgendaTipo.agenda_tipo_id
    ORDER BY tbAgenda.data ASC, tbAgenda.hora ASC
");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="img/ProfPlanner.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/agenda-aula.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Sora:wght@600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
    <title>ProfPlanner — Agenda</title>
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
                <a href="principal.php" class="nav-link">Início</a>
                <a href="#" class="nav-link-active">Aulas</a>
                <a href="#" class="nav-link">Turmas</a> 
                <a href="sair.php" class="nav-link">Sair</a>               
            </nav>

            <div class="header-actions">
                <button class="btn-icon notif-btn">
                    <i class="bi bi-bell"></i>
                    <span class="notif-dot"></span>
                </button>
                <div class="avatar"><?= $avatar_letra ?></div>
            </div>
        </div>
    </header>
    
    <!-- AGENDA -->
    <main>
      <div class="agenda-container">

        <div class="agenda-header">
          <h2>Agenda de Aulas</h2>
          <a href="adicionar.php" class="btn-adicionar">+ Adicionar</a>
        </div>

        <table class="agenda-tabela">
          <thead>
            <tr>
              <th>Professor</th>
              <th>Data</th>
              <th>Horário</th>
              <th>Tipo</th>
              <th>Descrição</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($result->num_rows === 0): ?>
              <tr>
                <td colspan="6" style="text-align:center; color:#888; padding: 32px;">
                  Nenhum compromisso cadastrado ainda.
                  <a href="adicionar.php">Adicionar agora</a>
                </td>
              </tr>
            <?php else: ?>
              <?php while ($row = $result->fetch_assoc()): ?>
                <?php
                  // Converte formato do banco (Y-m-d) para brasileiro (d/m/Y)
                  $data_formatada = date('d/m/Y', strtotime($row['data']));
                 
                  $hora_formatada = $row['hora'] ? date('H:i', strtotime($row['hora'])) : '—';
                  // Define a classe do badge pelo tipo do compromisso
                  $tipo = strtolower($row['tipo']);
                  if (str_contains($tipo, 'aula')) {
                      $badge_class = 'badge-aula';
                  } elseif (str_contains($tipo, 'reuni')) {
                      $badge_class = 'badge-reuniao';
                  } else {
                      $badge_class = 'badge-outro';
                  }
                ?>
                <tr>
                  <td><?= htmlspecialchars($row['professor']) ?></td>
                  <td><?= $data_formatada ?></td>
                  <td><?= $hora_formatada ?></td>
                  <td><span class="badge <?= $badge_class ?>"><?= htmlspecialchars($row['tipo']) ?></span></td>
                  <td><?= htmlspecialchars($row['observacao'] ?? '') ?></td>
                  
                  <td class="acoes">
                    <button class="btn-editar">Editar</button>                   
                    <button class="btn-excluir" onclick="excluir(<?= $row['agenda_id'] ?>)">Excluir</button>
                  </td>
                </tr>
              <?php endwhile; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>   
    </main>
  
    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-inner">
            <span class="footer-brand">ProfPlanner</span>
            <span class="footer-copy">© 2025 · Todos os direitos reservados</span>
        </div>
    </footer>
  </body>
</html>
