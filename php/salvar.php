<?php
include 'conexao.php';

$data = $_POST['data'];
$professor_id = $_POST['professor_id'];
$agenda_tipo_id = $_POST['agenda_tipo_id'];
$observacao = $_POST['observacao'];
$atualizado_por = 1;

$stmt = $conn->prepare("INSERT INTO tbAgenda 
    (data, professor_id, agenda_tipo_id, observacao, atualizado_por, atualizado_em) 
    VALUES (?, ?, ?, ?, ?, NOW())");

$stmt->bind_param("siissi", $data, $professor_id, $agenda_tipo_id, $observacao, $atualizado_por);

if ($stmt->execute()) {
    header("Location: agenda.php");
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>