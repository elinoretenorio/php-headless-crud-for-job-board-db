<?php

declare(strict_types=1);

namespace JobBoard\Applications;

use JsonSerializable;

class ApplicationsModel implements JsonSerializable
{
    private int $id;
    private int $jobId;
    private string $coverLetter;
    private string $fullName;
    private string $email;
    private string $location;
    private string $websites;
    private string $attachment;
    private string $token;
    private string $created;

    public function __construct(ApplicationsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->jobId = $dto->jobId;
        $this->coverLetter = $dto->coverLetter;
        $this->fullName = $dto->fullName;
        $this->email = $dto->email;
        $this->location = $dto->location;
        $this->websites = $dto->websites;
        $this->attachment = $dto->attachment;
        $this->token = $dto->token;
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

    public function getJobId(): int
    {
        return $this->jobId;
    }

    public function setJobId(int $jobId): void
    {
        $this->jobId = $jobId;
    }

    public function getCoverLetter(): string
    {
        return $this->coverLetter;
    }

    public function setCoverLetter(string $coverLetter): void
    {
        $this->coverLetter = $coverLetter;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getWebsites(): string
    {
        return $this->websites;
    }

    public function setWebsites(string $websites): void
    {
        $this->websites = $websites;
    }

    public function getAttachment(): string
    {
        return $this->attachment;
    }

    public function setAttachment(string $attachment): void
    {
        $this->attachment = $attachment;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function setCreated(string $created): void
    {
        $this->created = $created;
    }

    public function toDto(): ApplicationsDto
    {
        $dto = new ApplicationsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->jobId = (int) ($this->jobId ?? 0);
        $dto->coverLetter = $this->coverLetter ?? "";
        $dto->fullName = $this->fullName ?? "";
        $dto->email = $this->email ?? "";
        $dto->location = $this->location ?? "";
        $dto->websites = $this->websites ?? "";
        $dto->attachment = $this->attachment ?? "";
        $dto->token = $this->token ?? "";
        $dto->created = $this->created ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "job_id" => $this->jobId,
            "cover_letter" => $this->coverLetter,
            "full_name" => $this->fullName,
            "email" => $this->email,
            "location" => $this->location,
            "websites" => $this->websites,
            "attachment" => $this->attachment,
            "token" => $this->token,
            "created" => $this->created,
        ];
    }
}