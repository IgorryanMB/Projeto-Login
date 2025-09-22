<?php

class User
{
    private const MIN_PASSWORD_LENGTH = 8;
    private const PATTERN_NUMBER      = '/\d/';     
    private const PATTERN_UPPERCASE   = '/[A-Z]/';  

 
    private const PASSWORD_SOMETHING = PASSWORD_DEFAULT; 
    private const PASSWORD_OPTIONS   = []; 

    private int $id;
    private string $name;
    private string $email;
    private string $password; 

    public function __construct(int $id, string $name, string $email, string $password)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password); 
    }

    public function getId(): int { return $this->id; }
    public function setId(int $id): void {
        if ($id <= 0) throw new InvalidArgumentException('ID deve ser positivo.');
        $this->id = $id;
    }

    public function getName(): string { return $this->name; }
    public function setName(string $name): void {
        $name = trim($name);
        if ($name === '') throw new InvalidArgumentException('Nome não pode ser vazio.');
        $this->name = $name;
    }

    public function getEmail(): string { return $this->email; }
    public function setEmail(string $email): void {
        $email = trim($email);
        if ($email === '') throw new InvalidArgumentException('Email não pode ser vazio');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Email inválido');
        }
        $this->email = $email;
    }

    public function getPassword(): string { return $this->password; }

    public function setPassword(string $password): void {
        $password = trim($password);


        if (strlen($password) < self::MIN_PASSWORD_LENGTH) {
            throw new InvalidArgumentException(
                'A senha deve ter no mínimo ' . self::MIN_PASSWORD_LENGTH . ' caracteres.'
            );
        }
        if (!preg_match(self::PATTERN_NUMBER, $password)) {
            throw new InvalidArgumentException('A senha deve conter pelo menos um número.');
        }
        if (!preg_match(self::PATTERN_UPPERCASE, $password)) {
            throw new InvalidArgumentException('A senha deve conter pelo menos uma letra maiúscula.');
        }

        $this->password = password_hash(
            $password,
            self::PASSWORD_SOMETHING,
            self::PASSWORD_OPTIONS
        );
    }

    public function verifyPassword(string $plain): bool
    {
        return password_verify($plain, $this->password);
    }
}

?>
