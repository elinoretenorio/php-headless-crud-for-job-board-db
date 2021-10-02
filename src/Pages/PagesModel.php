<?php

declare(strict_types=1);

namespace JobBoard\Pages;

use JsonSerializable;

class PagesModel implements JsonSerializable
{
    private int $id;
    private string $name;
    private string $description;
    private string $url;
    private string $content;

    public function __construct(PagesDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->name = $dto->name;
        $this->description = $dto->description;
        $this->url = $dto->url;
        $this->content = $dto->content;
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

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function toDto(): PagesDto
    {
        $dto = new PagesDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->name = $this->name ?? "";
        $dto->description = $this->description ?? "";
        $dto->url = $this->url ?? "";
        $dto->content = $this->content ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "url" => $this->url,
            "content" => $this->content,
        ];
    }
}