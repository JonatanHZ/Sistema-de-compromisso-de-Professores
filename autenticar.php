<?php
session_start();
include 'conexao.php';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if (empty($email) || empty($senha)) {
    header("Location: login.php?erro=1");
    exit();
}

// Busca o usuário no banco pelo campo 'login'
$stmt = $conn->prepare("SELECT usuario_id, nome, senha FROM tbUsuarios WHERE login = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

// Verifica se encontrou o usuário E se a senha bate com o hash salvo
if ($usuario && password_verify($senha, $usuario['senha'])) {

    $_SESSION['usuario_id'] = $usuario['usuario_id'];
    $_SESSION['nome']       = $usuario['nome'];

    header("Location: principal.php");
    exit();
} else {


    header("Location: login.php?erro=1");
    exit();
}

$stmt->close();
$conn->close();
