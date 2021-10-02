<?php

declare(strict_types=1);

namespace JobBoard\Tests\Jobs;

use PHPUnit\Framework\TestCase;
use JobBoard\Jobs\{ JobsDto, JobsModel, JobsController };

class JobsControllerTest extends TestCase
{
    private array $input;
    private JobsDto $dto;
    private JobsModel $model;
    private $service;
    private $request;
    private $stream;
    private JobsController $controller;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 8119,
            "title" => "he",
            "category" => 7392,
            "city" => 2452,
            "description" => "Wonder these nor first pay. Third environmental threat employee nothing class. Provide ten continue last performance big here.",
            "perks" => "Record talk later as you stay. Popular think simply.",
            "how_to_apply" => "Bank enough receive treat arm mention rich water. Us raise room Congress region number.",
            "company_name" => "never",
            "logo" => "Push whatever style why fly try. Quality force sport economic debate treatment. Class teacher read reality.",
            "url" => "Artist official word heart message street send. More only door firm event record. Theory else business mind.",
            "email" => "jenniferjackson@example.org",
            "is_featured" => 9349,
            "token" => "hour",
            "status" => 2419,
            "created" => "2021-10-02 21:59:30",
        ];
        $this->dto = new JobsDto($this->input);
        $this->model = new JobsModel($this->dto);
        $this->service = $this->createMock("JobBoard\Jobs\IJobsService");
        $this->request = $this->createMock("Psr\Http\Message\ServerRequestInterface");
        $this->stream = $this->createMock("Psr\Http\Message\StreamInterface");
        $this->controller = new JobsController(
            $this->service
        );

        $this->stream->method("getContents")
            ->willReturn("[]");

        $this->request->method("getBody")
            ->willReturn($this->stream);

        $this->request->method("getParsedBody")
            ->willReturn($this->input);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
        unset($this->service);
        unset($this->request);
        unset($this->stream);
        unset($this->controller);
    }

    public function testInsert_ReturnsResponse(): void
    {
        $id = 1877;
        $expected = ["result" => $id];
        $args = [];

        $this->service->expects($this->once())
            ->method("createModel")
            ->with($this->request->getParsedBody())
            ->willReturn($this->model);
        $this->service->expects($this->once())
            ->method("insert")
            ->with($this->model)
            ->willReturn($id);

        $actual = $this->controller->insert($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testUpdate_ReturnsErrorResponse(): void
    {
        $expected = ["result" => 0, "message" => "Invalid input"];
        $args = ["id" => 0];

        $actual = $this->controller->update($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testUpdate_ReturnsResponse(): void
    {
        $id = 8713;
        $expected = ["result" => $id];
        $args = ["id" => 4136];

        $this->service->expects($this->once())
            ->method("createModel")
            ->with($this->request->getParsedBody())
            ->willReturn($this->model);
        $this->service->expects($this->once())
            ->method("update")
            ->with($this->model)
            ->willReturn($id);

        $actual = $this->controller->update($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testGet_ReturnsErrorResponse(): void
    {
        $expected = ["result" => 0, "message" => "Invalid input"];
        $args = ["id" => 0];

        $actual = $this->controller->get($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testGet_ReturnsResponse(): void
    {
        $expected = ["result" => $this->model->jsonSerialize()];
        $args = ["id" => 4167];

        $this->service->expects($this->once())
            ->method("get")
            ->with($args["id"])
            ->willReturn($this->model);

        $actual = $this->controller->get($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testGetAll_ReturnsResponse(): void
    {
        $expected = ["result" => [$this->model->jsonSerialize()]];
        $args = [];

        $this->service->expects($this->once())
            ->method("getAll")
            ->willReturn([$this->model]);

        $actual = $this->controller->getAll($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testDelete_ReturnsErrorResponse(): void
    {
        $expected = ["result" => 0, "message" => "Invalid input"];
        $args = ["id" => 0];

        $actual = $this->controller->delete($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testDelete_ReturnsResponse(): void
    {
        $id = 3803;
        $expected = ["result" => $id];
        $args = ["id" => 1595];

        $this->service->expects($this->once())
            ->method("delete")
            ->with($args["id"])
            ->willReturn($id);

        $actual = $this->controller->delete($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }
}