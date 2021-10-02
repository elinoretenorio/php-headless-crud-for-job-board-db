<?php

declare(strict_types=1);

namespace JobBoard\Jobs;

use JsonSerializable;

class JobsModel implements JsonSerializable
{
    private int $id;
    private string $title;
    private int $category;
    private int $city;
    private string $description;
    private string $perks;
    private string $howToApply;
    private string $companyName;
    private string $logo;
    private string $url;
    private string $email;
    private int $isFeatured;
    private string $token;
    private int $status;
    private string $created;

    public function __construct(JobsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->title = $dto->title;
        $this->category = $dto->category;
        $this->city = $dto->city;
        $this->description = $dto->description;
        $this->perks = $dto->perks;
        $this->howToApply = $dto->howToApply;
        $this->companyName = $dto->companyName;
        $this->logo = $dto->logo;
        $this->url = $dto->url;
        $this->email = $dto->email;
        $this->isFeatured = $dto->isFeatured;
        $this->token = $dto->token;
        $this->status = $dto->status;
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getCategory(): int
    {
        return $this->category;
    }

    public function setCategory(int $category): void
    {
        $this->category = $category;
    }

    public function getCity(): int
    {
        return $this->city;
    }

    public function setCity(int $city): void
    {
        $this->city = $city;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPerks(): string
    {
        return $this->perks;
    }

    public function setPerks(string $perks): void
    {
        $this->perks = $perks;
    }

    public function getHowToApply(): string
    {
        return $this->howToApply;
    }

    public function setHowToApply(string $howToApply): void
    {
        $this->howToApply = $howToApply;
    }

    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): void
    {
        $this->companyName = $companyName;
    }

    public function getLogo(): string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): void
    {
        $this->logo = $logo;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getIsFeatured(): int
    {
        return $this->isFeatured;
    }

    public function setIsFeatured(int $isFeatured): void
    {
        $this->isFeatured = $isFeatured;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function setCreated(string $created): void
    {
        $this->created = $created;
    }

    public function toDto(): JobsDto
    {
        $dto = new JobsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->title = $this->title ?? "";
        $dto->category = (int) ($this->category ?? 0);
        $dto->city = (int) ($this->city ?? 0);
        $dto->description = $this->description ?? "";
        $dto->perks = $this->perks ?? "";
        $dto->howToApply = $this->howToApply ?? "";
        $dto->companyName = $this->companyName ?? "";
        $dto->logo = $this->logo ?? "";
        $dto->url = $this->url ?? "";
        $dto->email = $this->email ?? "";
        $dto->isFeatured = (int) ($this->isFeatured ?? 0);
        $dto->token = $this->token ?? "";
        $dto->status = (int) ($this->status ?? 0);
        $dto->created = $this->created ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "category" => $this->category,
            "city" => $this->city,
            "description" => $this->description,
            "perks" => $this->perks,
            "how_to_apply" => $this->howToApply,
            "company_name" => $this->companyName,
            "logo" => $this->logo,
            "url" => $this->url,
            "email" => $this->email,
            "is_featured" => $this->isFeatured,
            "token" => $this->token,
            "status" => $this->status,
            "created" => $this->created,
        ];
    }
}