<?php

declare(strict_types=1);

namespace JobBoard\Subscriptions;

class SubscriptionsDto 
{
    public int $id;
    public string $email;
    public int $categoryId;
    public int $cityId;
    public string $token;
    public string $lastSent;
    public int $isConfirmed;
    public string $created;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->email = $row["email"] ?? "";
        $this->categoryId = (int) ($row["category_id"] ?? 0);
        $this->cityId = (int) ($row["city_id"] ?? 0);
        $this->token = $row["token"] ?? "";
        $this->lastSent = $row["last_sent"] ?? "";
        $this->isConfirmed = (int) ($row["is_confirmed"] ?? 0);
        $this->created = $row["created"] ?? "";
    }
}