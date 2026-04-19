<?php include "conexao.php"; ?>

<h2>Agenda</h2>

<table border="1">
<tr>
  <th>Título</th>
  <th>Professor</th>
  <th>Data</th>
  <th>Horário</th>
  <th>Sala</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM eventos");

while($row = $result->fetch_assoc()):
?>

<tr>
  <td><?= $row['titulo'] ?></td>
  <td><?= $row['professor'] ?></td>
  <td><?= $row['data'] ?></td>
  <td><?= $row['hora_inicio'] ?> - <?= $row['hora_fim'] ?></td>
  <td><?= $row['sala'] ?></td>
</tr>

<?php endwhile; ?>
</table>