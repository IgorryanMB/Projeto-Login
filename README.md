# Sistema de Usuários e Autenticação

Projeto simples em **PHP** que simula um sistema de cadastro, login e
reset de senha de usuários.

## 👨‍💻 Integrantes

-   Guilherme Dalanora Dos Santos --- RA: XXXXXXX
-   Igor Ryan De Mello Barbosa --- RA: XXXXXXX

------------------------------------------------------------------------

## 🚀 Como rodar o projeto

1.  Copie a pasta `Projeto-User-Auth` para dentro do diretório `htdocs`
    do **XAMPP**:

    -   **Windows** → `C:\xampp\htdocs\Projeto-User-Auth`
    -   **Linux** → `/opt/lampp/htdocs/Projeto-User-Auth`

2.  Inicie o **Apache** pelo painel do XAMPP.

3.  No navegador, acesse:

```{=html}
<!-- -->
```
    http://localhost/Projeto-User-Auth/src/index.php

------------------------------------------------------------------------

## 📌 Funcionalidades implementadas

-   **Cadastro de usuário**
    -   Valida se o e-mail é válido
    -   Verifica se a senha é forte (mín. 8 caracteres, 1 número e 1
        letra maiúscula)
    -   Criptografa a senha com `password_hash`
    -   Não permite e-mails duplicados
-   **Login de usuário**
    -   Verifica e-mail e senha com `password_verify`
    -   Retorna mensagem de sucesso ou falha
-   **Reset de senha**
    -   Permite atualizar senha de usuário existente
    -   Aplica novamente regras de senha forte
    -   Salva com `password_hash`

------------------------------------------------------------------------

## 🧪 Exemplos de uso (Casos de teste)

1.  **Cadastro válido**
    -   Entrada: nome `Maria Oliveira`, email `maria@email.com`, senha
        `Senha123`
    -   Saída esperada: usuário cadastrado com sucesso
2.  **Cadastro com e-mail inválido**
    -   Entrada: nome `Pedro`, email `pedro@@email`, senha `Senha123`
    -   Saída esperada: mensagem de erro → `"E-mail inválido"`
3.  **Tentativa de login com senha errada**
    -   Entrada: email `joao@email.com`, senha `Errada123`
    -   Saída esperada: mensagem de erro → `"Credenciais inválidas"`
4.  **Reset de senha válido**
    -   Entrada: id `1`, nova senha `NovaSenha1`
    -   Saída esperada: `"Senha alterada com sucesso"`
5.  **Cadastro de usuário com e-mail duplicado**
    -   Entrada: email já existente
    -   Saída esperada: mensagem de erro → `"E-mail já está em uso"`

------------------------------------------------------------------------

## ⚠️ Limitações

-   Dados armazenados apenas em arrays (sem banco de dados)
-   Não há interface gráfica, apenas execução em scripts PHP
-   Não recebe input via formulários (valores fixos em variáveis/arrays)
-   Não utiliza frameworks externos
