<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: agenda-aula.php");
    exit();
}

$agenda_id = (int) $_GET['id'];

$stmt = $conn->prepare("DELETE FROM tbAgenda WHERE agenda_id = ?");
$stmt->bind_param("i", $agenda_id);

if ($stmt->execute()) {
    header("Location: agenda-aula.php");
} else {
    echo "Erro ao excluir: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
