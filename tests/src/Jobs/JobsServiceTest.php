<?php

declare(strict_types=1);

namespace JobBoard\Tests\Jobs;

use PHPUnit\Framework\TestCase;
use JobBoard\Jobs\{ JobsDto, JobsModel, IJobsService, JobsService };

class JobsServiceTest extends TestCase
{
    private $repository;
    private array $input;
    private JobsDto $dto;
    private JobsModel $model;
    private IJobsService $service;

    protected function setUp(): void
    {
        $this->repository = $this->createMock("JobBoard\Jobs\IJobsRepository");
        $this->input = [
            "id" => 3961,
            "title" => "book",
            "category" => 7315,
            "city" => 5993,
            "description" => "True voice Congress cause attack voice then must. Relationship back outside address trial material.",
            "perks" => "Pick know economy operation among sea fear. Field door range front knowledge fly board.",
            "how_to_apply" => "Kitchen course short control second radio campaign support. Must always keep product. Month edge expect whom sign physical indeed.",
            "company_name" => "sea",
            "logo" => "Ok figure bill international power start control later. Example black kitchen owner enjoy game. Investment southern hear assume best investment eye.",
            "url" => "Knowledge weight impact big TV sign brother national. Remain play kind somebody bed off. Fight author senior necessary effort after.",
            "email" => "hgeorge@example.org",
            "is_featured" => 3377,
            "token" => "form",
            "status" => 7559,
            "created" => "2021-10-05 07:00:37",
        ];
        $this->dto = new JobsDto($this->input);
        $this->model = new JobsModel($this->dto);
        $this->service = new JobsService($this->repository);
    }

    protected function tearDown(): void
    {
        unset($this->repository);
        unset($this->input);
        unset($this->dto);
        unset($this->model);
        unset($this->service);
    }

    public function testInsert_ReturnsId(): void
    {
        $expected = 3544;

        $this->repository->expects($this->once())
            ->method("insert")
            ->with($this->dto)
            ->willReturn($expected);

        $actual = $this->service->insert($this->model);
        $this->assertEquals($expected, $actual);
    }

    public function testInsert_ReturnsEmpty(): void
    {
        $expected = 0;

        $this->repository->expects($this->once())
            ->method("insert")
            ->with($this->dto)
            ->willReturn($expected);

        $actual = $this->service->insert($this->model);
        $this->assertEmpty($actual);
    }

    public function testUpdate_ReturnsRowCount(): void
    {
        $expected = 2028;

        $this->repository->expects($this->once())
            ->method("update")
            ->with($this->dto)
            ->willReturn($expected);

        $actual = $this->service->update($this->model);
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate_ReturnsEmpty(): void
    {
        $expected = 0;

        $this->repository->expects($this->once())
            ->method("update")
            ->with($this->dto)
            ->willReturn($expected);

        $actual = $this->service->update($this->model);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsNull(): void
    {
        $id = 3400;

        $this->repository->expects($this->once())
            ->method("get")
            ->with($id)
            ->willReturn(null);

        $actual = $this->service->get($id);
        $this->assertNull($actual);
    }

    public function testGet_ReturnsModel(): void
    {
        $id = 1830;

        $this->repository->expects($this->once())
            ->method("get")
            ->with($id)
            ->willReturn($this->dto);

        $actual = $this->service->get($id);
        $this->assertEquals($this->model, $actual);
    }

    public function testGetAll_ReturnsEmpty(): void
    {
        $this->repository->expects($this->once())
            ->method("getAll")
            ->willReturn([]);

        $actual = $this->service->getAll();
        $this->assertEmpty($actual);
    }

    public function testGetAll_ReturnsModels(): void
    {
        $this->repository->expects($this->once())
            ->method("getAll")
            ->willReturn([$this->dto]);

        $actual = $this->service->getAll();
        $this->assertEquals([$this->model], $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 7873;
        $expected = 2396;

        $this->repository->expects($this->once())
            ->method("delete")
            ->with($id)
            ->willReturn($expected);

        $actual = $this->service->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testCreateModel_ReturnsNullIfEmpty(): void
    {
        $actual = $this->service->createModel([]);
        $this->assertNull($actual);
    }

    public function testCreateModel_ReturnsModel(): void
    {
        $actual = $this->service->createModel($this->input);
        $this->assertEquals($this->model, $actual);
    }
}