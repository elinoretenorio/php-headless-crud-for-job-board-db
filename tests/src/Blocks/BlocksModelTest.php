<?php

declare(strict_types=1);

namespace JobBoard\Tests\Blocks;

use PHPUnit\Framework\TestCase;
use JobBoard\Blocks\{ BlocksDto, BlocksModel };

class BlocksModelTest extends TestCase
{
    private array $input;
    private BlocksDto $dto;
    private BlocksModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 5992,
            "name" => "write",
            "url" => "model",
            "content" => "Interview term crime table unit. Add live out necessary drive possible.",
        ];
        $this->dto = new BlocksDto($this->input);
        $this->model = new BlocksModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new BlocksModel(null);

        $this->assertInstanceOf(BlocksModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 4016;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetName(): void
    {
        $this->assertEquals($this->dto->name, $this->model->getName());
    }

    public function testSetName(): void
    {
        $expected = "and";
        $model = $this->model;
        $model->setName($expected);

        $this->assertEquals($expected, $model->getName());
    }

    public function testGetUrl(): void
    {
        $this->assertEquals($this->dto->url, $this->model->getUrl());
    }

    public function testSetUrl(): void
    {
        $expected = "physical";
        $model = $this->model;
        $model->setUrl($expected);

        $this->assertEquals($expected, $model->getUrl());
    }

    public function testGetContent(): void
    {
        $this->assertEquals($this->dto->content, $this->model->getContent());
    }

    public function testSetContent(): void
    {
        $expected = "Serve before chance situation kind southern. Bit major so by. Figure we north strong style.";
        $model = $this->model;
        $model->setContent($expected);

        $this->assertEquals($expected, $model->getContent());
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