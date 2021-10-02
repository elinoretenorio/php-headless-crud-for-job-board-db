<?php

declare(strict_types=1);

namespace JobBoard\Applications;

use JobBoard\Database\IDatabase;
use JobBoard\Database\DatabaseException;

class ApplicationsRepository implements IApplicationsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(ApplicationsDto $dto): int
    {
        $sql = "INSERT INTO `applications` (`job_id`, `cover_letter`, `full_name`, `email`, `location`, `websites`, `attachment`, `token`, `created`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->jobId,
                $dto->coverLetter,
                $dto->fullName,
                $dto->email,
                $dto->location,
                $dto->websites,
                $dto->attachment,
                $dto->token,
                $dto->created
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(ApplicationsDto $dto): int
    {
        $sql = "UPDATE `applications` SET `job_id` = ?, `cover_letter` = ?, `full_name` = ?, `email` = ?, `location` = ?, `websites` = ?, `attachment` = ?, `token` = ?, `created` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->jobId,
                $dto->coverLetter,
                $dto->fullName,
                $dto->email,
                $dto->location,
                $dto->websites,
                $dto->attachment,
                $dto->token,
                $dto->created,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?ApplicationsDto
    {
        $sql = "SELECT `id`, `job_id`, `cover_letter`, `full_name`, `email`, `location`, `websites`, `attachment`, `token`, `created`
                FROM `applications` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new ApplicationsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `job_id`, `cover_letter`, `full_name`, `email`, `location`, `websites`, `attachment`, `token`, `created`
                FROM `applications`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new ApplicationsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `applications` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}