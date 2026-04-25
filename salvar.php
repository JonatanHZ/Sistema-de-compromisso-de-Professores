<?php
session_start();
include 'conexao.php';

// Proteção: só processa se estiver logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Só aceita POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: adicionar.php");
    exit();
}

$professor_id    = $_POST['professor_id'];
$agenda_tipo_id  = $_POST['agenda_tipo_id'];
$data            = $_POST['data'];                        // formato Y-m-d, direto do input date
$hora            = !empty($_POST['hora']) ? $_POST['hora'] : null; // null se não preencheu
$observacao      = $_POST['observacao'];
$atualizado_por  = $_SESSION['usuario_id'];              // agora vem da sessão, não mais hardcoded!

$stmt = $conn->prepare("
    INSERT INTO tbAgenda (data, hora, professor_id, agenda_tipo_id, observacao, atualizado_por, atualizado_em)
    VALUES (?, ?, ?, ?, ?, ?, NOW())
");

// s = string, s = string(hora), i = int, i = int, s = string, i = int
$stmt->bind_param("ssiisi", $data, $hora, $professor_id, $agenda_tipo_id, $observacao, $atualizado_por);

if ($stmt->execute()) {
    header("Location: agenda-aula.php");
} else {
    echo "Erro ao salvar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
