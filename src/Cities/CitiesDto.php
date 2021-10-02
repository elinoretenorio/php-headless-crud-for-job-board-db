<?php

declare(strict_types=1);

namespace JobBoard\Cities;

class CitiesDto 
{
    public int $id;
    public string $name;
    public string $description;
    public string $url;
    public int $sort;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->name = $row["name"] ?? "";
        $this->description = $row["description"] ?? "";
        $this->url = $row["url"] ?? "";
        $this->sort = (int) ($row["sort"] ?? 0);
    }
}