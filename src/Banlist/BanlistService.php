<?php

declare(strict_types=1);

namespace JobBoard\Banlist;

class BanlistService implements IBanlistService
{
    private IBanlistRepository $repository;

    public function __construct(IBanlistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(BanlistModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(BanlistModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?BanlistModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new BanlistModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var BanlistDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new BanlistModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?BanlistModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new BanlistDto($row);

        return new BanlistModel($dto);
    }
}