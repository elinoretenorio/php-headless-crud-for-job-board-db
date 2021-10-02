<?php

declare(strict_types=1);

namespace JobBoard\Pages;

class PagesDto 
{
    public int $id;
    public string $name;
    public string $description;
    public string $url;
    public string $content;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->name = $row["name"] ?? "";
        $this->description = $row["description"] ?? "";
        $this->url = $row["url"] ?? "";
        $this->content = $row["content"] ?? "";
    }
}