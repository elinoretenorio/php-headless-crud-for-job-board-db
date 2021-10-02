<?php

declare(strict_types=1);

namespace JobBoard\Jobs;

class JobsDto 
{
    public int $id;
    public string $title;
    public int $category;
    public int $city;
    public string $description;
    public string $perks;
    public string $howToApply;
    public string $companyName;
    public string $logo;
    public string $url;
    public string $email;
    public int $isFeatured;
    public string $token;
    public int $status;
    public string $created;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->title = $row["title"] ?? "";
        $this->category = (int) ($row["category"] ?? 0);
        $this->city = (int) ($row["city"] ?? 0);
        $this->description = $row["description"] ?? "";
        $this->perks = $row["perks"] ?? "";
        $this->howToApply = $row["how_to_apply"] ?? "";
        $this->companyName = $row["company_name"] ?? "";
        $this->logo = $row["logo"] ?? "";
        $this->url = $row["url"] ?? "";
        $this->email = $row["email"] ?? "";
        $this->isFeatured = (int) ($row["is_featured"] ?? 0);
        $this->token = $row["token"] ?? "";
        $this->status = (int) ($row["status"] ?? 0);
        $this->created = $row["created"] ?? "";
    }
}