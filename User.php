<?php

class User 
{
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

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        if ($id <= 0) {
            throw new InvalidArgumentException('id deve ser positivo');
        }
        $this->id = $id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
         $name = trim($name);
        if ($name === '') {
            throw new InvalidArgumentException('nome não pode ser vazio');
        }
        $this->name = $name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
         $email = trim($email);
        if ($email === '') {
            throw new InvalidArgumentException('Email nao pode ser vazio');
        }
        $this->email = $email;
    }

    public function getPassword(): string {
        return $this->password;
    }
}
