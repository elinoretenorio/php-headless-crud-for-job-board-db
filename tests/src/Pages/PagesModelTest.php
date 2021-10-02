<?php

declare(strict_types=1);

namespace JobBoard\Tests\Pages;

use PHPUnit\Framework\TestCase;
use JobBoard\Pages\{ PagesDto, PagesModel };

class PagesModelTest extends TestCase
{
    private array $input;
    private PagesDto $dto;
    private PagesModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 7761,
            "name" => "actually",
            "description" => "tonight",
            "url" => "poor",
            "content" => "Than section maintain my. Out public scene international into value. Try evidence prevent shake.",
        ];
        $this->dto = new PagesDto($this->input);
        $this->model = new PagesModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new PagesModel(null);

        $this->assertInstanceOf(PagesModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 4660;
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
        $expected = "market";
        $model = $this->model;
        $model->setName($expected);

        $this->assertEquals($expected, $model->getName());
    }

    public function testGetDescription(): void
    {
        $this->assertEquals($this->dto->description, $this->model->getDescription());
    }

    public function testSetDescription(): void
    {
        $expected = "include";
        $model = $this->model;
        $model->setDescription($expected);

        $this->assertEquals($expected, $model->getDescription());
    }

    public function testGetUrl(): void
    {
        $this->assertEquals($this->dto->url, $this->model->getUrl());
    }

    public function testSetUrl(): void
    {
        $expected = "perform";
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
        $expected = "Certainly open pick national. Suffer range reach window raise. Per show five program although method.";
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