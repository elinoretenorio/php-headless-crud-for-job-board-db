<?php

declare(strict_types=1);

namespace JobBoard\Applications;

interface IApplicationsRepository
{
    public function insert(ApplicationsDto $dto): int;

    public function update(ApplicationsDto $dto): int;

    public function get(int $id): ?ApplicationsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}