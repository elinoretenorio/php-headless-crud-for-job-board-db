<?php

declare(strict_types=1);

namespace JobBoard\Cities;

interface ICitiesRepository
{
    public function insert(CitiesDto $dto): int;

    public function update(CitiesDto $dto): int;

    public function get(int $id): ?CitiesDto;

    public function getAll(): array;

    public function delete(int $id): int;
}