<?php

declare(strict_types=1);

namespace JobBoard\Blocks;

use JsonSerializable;

class BlocksModel implements JsonSerializable
{
    private int $id;
    private string $name;
    private string $url;
    private string $content;

    public function __construct(BlocksDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->name = $dto->name;
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

    public function toDto(): BlocksDto
    {
        $dto = new BlocksDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->name = $this->name ?? "";
        $dto->url = $this->url ?? "";
        $dto->content = $this->content ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "url" => $this->url,
            "content" => $this->content,
        ];
    }
}