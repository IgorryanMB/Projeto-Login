<?php

require_once __DIR__ . '/User.php';
require_once __DIR__ . '/UserManager.php';

$user = new UserManager();

//cadastra João (id 1) antes para usar nos outros casos
$user->register('João Silva', 'joao@email.com', 'SenhaForte1');

//Caso 1 — Cadastro válido
$question1 = $user->register('Maria Oliveira', 'maria@email.com', 'Senha123');
echo "Caso 1 — Cadastro válido<br>";
echo ($question1['success'] ? "OK — " : "ERRO — ") . $question1['message'] . "<br><br>";

//Caso 2 — Cadastro com e-mail inválido
$question2 = $user->register('Pedro', 'pedro@@email', 'Senha123');
echo "Caso 2 — Cadastro com e-mail inválido<br>";
echo ($question2['success'] ? "OK — " : "ERRO — ") . $question2['message'] . "<br><br>";

//Caso 3 — Tentativa de login com senha errada
$question3 = $user->login('joao@email.com', 'Errada123');
echo "Caso 3 — Login com senha errada<br>";
echo ($question3['success'] ? "OK — " : "ERRO — ") . $question3['message'] . "<br><br>";

//Caso 4 — Reset de senha válido (João é id 1)
$question4 = $user->resetPassword(1, 'NovaSenha1');
echo "Caso 4 — Reset de senha válido<br>";
echo ($question4['success'] ? "OK — " : "ERRO — ") . $question4['message'] . "<br><br>";

//Caso 5 — Cadastro de usuário com e-mail duplicado
$question5 = $user->register('Outro João', 'joao@email.com', 'SenhaForte2');
echo "Caso 5 — Cadastro com e-mail duplicado<br>";
echo ($question5['success'] ? "OK — " : "ERRO — ") . $question5['message'] . "<br><br>";

?>
