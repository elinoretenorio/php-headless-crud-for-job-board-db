<?php

declare(strict_types=1);

namespace JobBoard\Subscriptions;

class SubscriptionsService implements ISubscriptionsService
{
    private ISubscriptionsRepository $repository;

    public function __construct(ISubscriptionsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(SubscriptionsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(SubscriptionsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?SubscriptionsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new SubscriptionsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var SubscriptionsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new SubscriptionsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?SubscriptionsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new SubscriptionsDto($row);

        return new SubscriptionsModel($dto);
    }
}