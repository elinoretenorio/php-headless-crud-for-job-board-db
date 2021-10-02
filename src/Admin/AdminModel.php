<?php

declare(strict_types=1);

namespace JobBoard\Admin;

use JsonSerializable;

class AdminModel implements JsonSerializable
{
    private int $id;
    private string $email;
    private string $password;

    public function __construct(AdminDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->email = $dto->email;
        $this->password = $dto->password;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function toDto(): AdminDto
    {
        $dto = new AdminDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->email = $this->email ?? "";
        $dto->password = $this->password ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "email" => $this->email,
            "password" => $this->password,
        ];
    }
}