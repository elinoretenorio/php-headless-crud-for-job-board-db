<?php

declare(strict_types=1);

namespace JobBoard\Banlist;

use JsonSerializable;

class BanlistModel implements JsonSerializable
{
    private int $id;
    private string $type;
    private string $value;
    private string $created;

    public function __construct(BanlistDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->type = $dto->type;
        $this->value = $dto->value;
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

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function setCreated(string $created): void
    {
        $this->created = $created;
    }

    public function toDto(): BanlistDto
    {
        $dto = new BanlistDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->type = $this->type ?? "";
        $dto->value = $this->value ?? "";
        $dto->created = $this->created ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "type" => $this->type,
            "value" => $this->value,
            "created" => $this->created,
        ];
    }
}