<?php

declare(strict_types=1);

namespace JobBoard\Subscriptions;

use JsonSerializable;

class SubscriptionsModel implements JsonSerializable
{
    private int $id;
    private string $email;
    private int $categoryId;
    private int $cityId;
    private string $token;
    private string $lastSent;
    private int $isConfirmed;
    private string $created;

    public function __construct(SubscriptionsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->email = $dto->email;
        $this->categoryId = $dto->categoryId;
        $this->cityId = $dto->cityId;
        $this->token = $dto->token;
        $this->lastSent = $dto->lastSent;
        $this->isConfirmed = $dto->isConfirmed;
        $this->created = $dto->created;
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

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    public function getCityId(): int
    {
        return $this->cityId;
    }

    public function setCityId(int $cityId): void
    {
        $this->cityId = $cityId;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    public function getLastSent(): string
    {
        return $this->lastSent;
    }

    public function setLastSent(string $lastSent): void
    {
        $this->lastSent = $lastSent;
    }

    public function getIsConfirmed(): int
    {
        return $this->isConfirmed;
    }

    public function setIsConfirmed(int $isConfirmed): void
    {
        $this->isConfirmed = $isConfirmed;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function setCreated(string $created): void
    {
        $this->created = $created;
    }

    public function toDto(): SubscriptionsDto
    {
        $dto = new SubscriptionsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->email = $this->email ?? "";
        $dto->categoryId = (int) ($this->categoryId ?? 0);
        $dto->cityId = (int) ($this->cityId ?? 0);
        $dto->token = $this->token ?? "";
        $dto->lastSent = $this->lastSent ?? "";
        $dto->isConfirmed = (int) ($this->isConfirmed ?? 0);
        $dto->created = $this->created ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "email" => $this->email,
            "category_id" => $this->categoryId,
            "city_id" => $this->cityId,
            "token" => $this->token,
            "last_sent" => $this->lastSent,
            "is_confirmed" => $this->isConfirmed,
            "created" => $this->created,
        ];
    }
}