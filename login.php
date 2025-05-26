<?php
include 'conexao.php';

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// Busca o usuário pelo e-mail
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->execute([$email]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario) {
    if (password_verify($senha, $usuario['senha'])) {
        echo "Login realizado com sucesso!";
        // Aqui você pode iniciar uma sessão com session_start()
        // e salvar dados do usuário, se quiser
    } else {
        echo "Senha incorreta.";
    }
} else {
    echo "Usuário não encontrado.";
}
?>



    