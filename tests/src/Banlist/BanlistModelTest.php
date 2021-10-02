<?php

declare(strict_types=1);

namespace JobBoard\Tests\Banlist;

use PHPUnit\Framework\TestCase;
use JobBoard\Banlist\{ BanlistDto, BanlistModel };

class BanlistModelTest extends TestCase
{
    private array $input;
    private BanlistDto $dto;
    private BanlistModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 9341,
            "type" => "place",
            "value" => "analysis",
            "created" => "2021-09-30 14:15:12",
        ];
        $this->dto = new BanlistDto($this->input);
        $this->model = new BanlistModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new BanlistModel(null);

        $this->assertInstanceOf(BanlistModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 1387;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetType(): void
    {
        $this->assertEquals($this->dto->type, $this->model->getType());
    }

    public function testSetType(): void
    {
        $expected = "citizen";
        $model = $this->model;
        $model->setType($expected);

        $this->assertEquals($expected, $model->getType());
    }

    public function testGetValue(): void
    {
        $this->assertEquals($this->dto->value, $this->model->getValue());
    }

    public function testSetValue(): void
    {
        $expected = "matter";
        $model = $this->model;
        $model->setValue($expected);

        $this->assertEquals($expected, $model->getValue());
    }

    public function testGetCreated(): void
    {
        $this->assertEquals($this->dto->created, $this->model->getCreated());
    }

    public function testSetCreated(): void
    {
        $expected = "2021-10-16 17:04:07";
        $model = $this->model;
        $model->setCreated($expected);

        $this->assertEquals($expected, $model->getCreated());
    }

    public function testToDto(): void
    {
        $this->assertEquals($this->dto, $this->model->toDto());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals($this->input, $this->model->jsonSerialize());
    }
}