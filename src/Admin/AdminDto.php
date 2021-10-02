<?php

declare(strict_types=1);

namespace JobBoard\Admin;

class AdminDto 
{
    public int $id;
    public string $email;
    public string $password;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->email = $row["email"] ?? "";
        $this->password = $row["password"] ?? "";
    }
}