<?php

declare(strict_types=1);

namespace JobBoard\Tests\Subscriptions;

use PHPUnit\Framework\TestCase;
use JobBoard\Database\DatabaseException;
use JobBoard\Subscriptions\{ SubscriptionsDto, ISubscriptionsRepository, SubscriptionsRepository };

class SubscriptionsRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private SubscriptionsDto $dto;
    private ISubscriptionsRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("JobBoard\Database\IDatabase");
        $this->result = $this->createMock("JobBoard\Database\IDatabaseResult");
        $this->input = [
            "id" => 1230,
            "email" => "gary08@example.net",
            "category_id" => 2455,
            "city_id" => 9773,
            "token" => "also",
            "last_sent" => "2021-09-20 07:28:53",
            "is_confirmed" => 616,
            "created" => "2021-10-09 14:20:09",
        ];
        $this->dto = new SubscriptionsDto($this->input);
        $this->repository = new SubscriptionsRepository($this->db);
    }

    protected function tearDown(): void
    {
        unset($this->db);
        unset($this->result);
        unset($this->input);
        unset($this->dto);
        unset($this->repository);
    }

    public function testInsert_ReturnsFailedOnException(): void
    {
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->insert($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testInsert_ReturnsId(): void
    {
        $expected = 5925;

        $sql = "INSERT INTO `subscriptions` (`email`, `category_id`, `city_id`, `token`, `last_sent`, `is_confirmed`, `created`)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->email,
                $this->dto->categoryId,
                $this->dto->cityId,
                $this->dto->token,
                $this->dto->lastSent,
                $this->dto->isConfirmed,
                $this->dto->created
            ]);
        $this->db->expects($this->once())
            ->method("lastInsertId")
            ->willReturn($expected);

        $actual = $this->repository->insert($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate_ReturnsFailedOnException(): void
    {
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->update($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate_ReturnsRowCount(): void
    {
        $expected = 5373;

        $sql = "UPDATE `subscriptions` SET `email` = ?, `category_id` = ?, `city_id` = ?, `token` = ?, `last_sent` = ?, `is_confirmed` = ?, `created` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->email,
                $this->dto->categoryId,
                $this->dto->cityId,
                $this->dto->token,
                $this->dto->lastSent,
                $this->dto->isConfirmed,
                $this->dto->created,
                $this->dto->id
            ]);
        $this->result->expects($this->once())
            ->method("rowCount")
            ->willReturn($expected);

        $actual = $this->repository->update($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testGet_ReturnsEmptyOnException(): void
    {
        $id = 5027;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 6908;

        $sql = "SELECT `id`, `email`, `category_id`, `city_id`, `token`, `last_sent`, `is_confirmed`, `created`
                FROM `subscriptions` WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([$id]);
        $this->result->expects($this->once())
            ->method("fetchAll")
            ->willReturn([$this->input]);

        $actual = $this->repository->get($id);
        $this->assertEquals($this->dto, $actual);
    }

    public function testGetAll_ReturnsEmptyOnException(): void
    {
        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->getAll();
        $this->assertEmpty($actual);
    }

    public function testGetAll_ReturnsDtos(): void
    {
        $sql = "SELECT `id`, `email`, `category_id`, `city_id`, `token`, `last_sent`, `is_confirmed`, `created`
                FROM `subscriptions`";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute");
        $this->result->expects($this->once())
            ->method("fetchAll")
            ->willReturn([$this->input]);

        $actual = $this->repository->getAll();
        $this->assertEquals([$this->dto], $actual);
    }

    public function testDelete_ReturnsFailedOnException(): void
    {
        $id = 3055;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 4130;
        $expected = 3196;

        $sql = "DELETE FROM `subscriptions` WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([$id]);
        $this->result->expects($this->once())
            ->method("rowCount")
            ->willReturn($expected);

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }
}