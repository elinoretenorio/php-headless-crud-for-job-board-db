<?php

declare(strict_types=1);

namespace JobBoard\Cities;

use JsonSerializable;

class CitiesModel implements JsonSerializable
{
    private int $id;
    private string $name;
    private string $description;
    private string $url;
    private int $sort;

    public function __construct(CitiesDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->name = $dto->name;
        $this->description = $dto->description;
        $this->url = $dto->url;
        $this->sort = $dto->sort;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getSort(): int
    {
        return $this->sort;
    }

    public function setSort(int $sort): void
    {
        $this->sort = $sort;
    }

    public function toDto(): CitiesDto
    {
        $dto = new CitiesDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->name = $this->name ?? "";
        $dto->description = $this->description ?? "";
        $dto->url = $this->url ?? "";
        $dto->sort = (int) ($this->sort ?? 0);

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "url" => $this->url,
            "sort" => $this->sort,
        ];
    }
}