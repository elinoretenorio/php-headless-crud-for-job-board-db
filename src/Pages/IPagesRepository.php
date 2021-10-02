<?php

declare(strict_types=1);

namespace JobBoard\Pages;

interface IPagesRepository
{
    public function insert(PagesDto $dto): int;

    public function update(PagesDto $dto): int;

    public function get(int $id): ?PagesDto;

    public function getAll(): array;

    public function delete(int $id): int;
}