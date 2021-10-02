<?php

declare(strict_types=1);

namespace JobBoard\Applications;

class ApplicationsDto 
{
    public int $id;
    public int $jobId;
    public string $coverLetter;
    public string $fullName;
    public string $email;
    public string $location;
    public string $websites;
    public string $attachment;
    public string $token;
    public string $created;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->jobId = (int) ($row["job_id"] ?? 0);
        $this->coverLetter = $row["cover_letter"] ?? "";
        $this->fullName = $row["full_name"] ?? "";
        $this->email = $row["email"] ?? "";
        $this->location = $row["location"] ?? "";
        $this->websites = $row["websites"] ?? "";
        $this->attachment = $row["attachment"] ?? "";
        $this->token = $row["token"] ?? "";
        $this->created = $row["created"] ?? "";
    }
}