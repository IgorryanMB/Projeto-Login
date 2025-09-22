<?php

require_once __DIR__ . '/User.php';
require_once __DIR__ . '/UserManager.php';

$um = new UserManager();

//cadastra João (id 1) antes para usar nos outros casos
$um->register('João Silva', 'joao@email.com', 'SenhaForte1');

//Caso 1 — Cadastro válido
$res1 = $um->register('Maria Oliveira', 'maria@email.com', 'Senha123');
echo "Caso 1 — Cadastro válido<br>";
echo ($res1['success'] ? "OK — " : "ERRO — ") . $res1['message'] . "<br><br>";

//Caso 2 — Cadastro com e-mail inválido
$res2 = $um->register('Pedro', 'pedro@@email', 'Senha123');
echo "Caso 2 — Cadastro com e-mail inválido<br>";
echo ($res2['success'] ? "OK — " : "ERRO — ") . $res2['message'] . "<br><br>";

//Caso 3 — Tentativa de login com senha errada
$res3 = $um->login('joao@email.com', 'Errada123');
echo "Caso 3 — Login com senha errada<br>";
echo ($res3['success'] ? "OK — " : "ERRO — ") . $res3['message'] . "<br><br>";

//Caso 4 — Reset de senha válido (João é id 1)
$res4 = $um->resetPassword(1, 'NovaSenha1');
echo "Caso 4 — Reset de senha válido<br>";
echo ($res4['success'] ? "OK — " : "ERRO — ") . $res4['message'] . "<br><br>";

//Caso 5 — Cadastro de usuário com e-mail duplicado
$res5 = $um->register('Outro João', 'joao@email.com', 'SenhaForte2');
echo "Caso 5 — Cadastro com e-mail duplicado<br>";
echo ($res5['success'] ? "OK — " : "ERRO — ") . $res5['message'] . "<br><br>";

?>
