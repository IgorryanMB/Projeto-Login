<?php

require_once __DIR__ . '/User.php';

class UserManager
{
    private array $users = [];

    public function register(string $name, string $email, string $password): array
    {
        $email = trim($email);
        $name  = trim($name);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'message' => 'E-mail inválido'];
        }

        foreach ($this->users as $u) {
            if (mb_strtolower($u->getEmail()) === mb_strtolower($email)) {
                return ['success' => false, 'message' => 'E-mail já está em uso'];
            }
        }

        $maxId = 0;
        foreach ($this->users as $u) {
            if ($u->getId() > $maxId) $maxId = $u->getId();
        }

        try {
            $user = new User($maxId + 1, $name, $email, $password); 
        } catch (InvalidArgumentException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }

        $this->users[] = $user;
        return ['success' => true, 'message' => 'Usuário cadastrado com sucesso', 'user' => $user];
    }

    public function login(string $email, string $password): array
    {
        $email = trim($email);

        foreach ($this->users as $u) {
            if (mb_strtolower($u->getEmail()) === mb_strtolower($email)) {
                if ($u->verifyPassword($password)) {
                    return ['success' => true, 'message' => 'Login realizado com sucesso', 'user' => $u];
                }
                return ['success' => false, 'message' => 'Credenciais inválidas'];
            }
        }

        return ['success' => false, 'message' => 'Credenciais inválidas'];
    }

    public function resetPassword(int $id, string $newPassword): array
    {
        foreach ($this->users as $u) {
            if ($u->getId() === $id) {
                try {
                    $u->setPassword($newPassword); 
                    return ['success' => true, 'message' => 'Senha alterada com sucesso'];
                } catch (InvalidArgumentException $e) {
                    return ['success' => false, 'message' => $e->getMessage()];
                }
            }
        }
        return ['success' => false, 'message' => 'Usuário não encontrado'];
    }

    public function all(): array
    {
        return $this->users;
    }
}
