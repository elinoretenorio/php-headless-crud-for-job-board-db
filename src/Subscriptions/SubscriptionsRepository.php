<?php

declare(strict_types=1);

namespace JobBoard\Subscriptions;

use JobBoard\Database\IDatabase;
use JobBoard\Database\DatabaseException;

class SubscriptionsRepository implements ISubscriptionsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(SubscriptionsDto $dto): int
    {
        $sql = "INSERT INTO `subscriptions` (`email`, `category_id`, `city_id`, `token`, `last_sent`, `is_confirmed`, `created`)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->email,
                $dto->categoryId,
                $dto->cityId,
                $dto->token,
                $dto->lastSent,
                $dto->isConfirmed,
                $dto->created
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(SubscriptionsDto $dto): int
    {
        $sql = "UPDATE `subscriptions` SET `email` = ?, `category_id` = ?, `city_id` = ?, `token` = ?, `last_sent` = ?, `is_confirmed` = ?, `created` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->email,
                $dto->categoryId,
                $dto->cityId,
                $dto->token,
                $dto->lastSent,
                $dto->isConfirmed,
                $dto->created,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?SubscriptionsDto
    {
        $sql = "SELECT `id`, `email`, `category_id`, `city_id`, `token`, `last_sent`, `is_confirmed`, `created`
                FROM `subscriptions` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new SubscriptionsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `email`, `category_id`, `city_id`, `token`, `last_sent`, `is_confirmed`, `created`
                FROM `subscriptions`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new SubscriptionsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `subscriptions` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}