<?php

declare(strict_types=1);

namespace JobBoard\Banlist;

class BanlistDto 
{
    public int $id;
    public string $type;
    public string $value;
    public string $created;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->type = $row["type"] ?? "";
        $this->value = $row["value"] ?? "";
        $this->created = $row["created"] ?? "";
    }
}