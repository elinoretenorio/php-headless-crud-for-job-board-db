<?php

declare(strict_types=1);

namespace JobBoard\Blocks;

class BlocksService implements IBlocksService
{
    private IBlocksRepository $repository;

    public function __construct(IBlocksRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(BlocksModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(BlocksModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?BlocksModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new BlocksModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var BlocksDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new BlocksModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?BlocksModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new BlocksDto($row);

        return new BlocksModel($dto);
    }
}