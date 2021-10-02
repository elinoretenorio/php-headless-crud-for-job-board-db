<?php

declare(strict_types=1);

namespace JobBoard\Jobs;

interface IJobsRepository
{
    public function insert(JobsDto $dto): int;

    public function update(JobsDto $dto): int;

    public function get(int $id): ?JobsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}