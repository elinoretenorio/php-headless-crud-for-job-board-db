<?php

declare(strict_types=1);

namespace JobBoard\Tests\Jobs;

use PHPUnit\Framework\TestCase;
use JobBoard\Jobs\{ JobsDto, JobsModel };

class JobsModelTest extends TestCase
{
    private array $input;
    private JobsDto $dto;
    private JobsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 6365,
            "title" => "official",
            "category" => 5666,
            "city" => 770,
            "description" => "Open industry study sound bad. Use off data building analysis example. Head minute body.",
            "perks" => "Cut learn responsibility about conference. Traditional better ten upon son discussion me.",
            "how_to_apply" => "Operation and itself least. Form attorney major reason.",
            "company_name" => "may",
            "logo" => "Section drop ahead reality wide follow position almost. Example television if power stop medical story decision.",
            "url" => "Middle future just these stop nation entire. Whatever stock onto attorney so.",
            "email" => "bradleysmith@example.org",
            "is_featured" => 5347,
            "token" => "middle",
            "status" => 7924,
            "created" => "2021-10-14 19:48:51",
        ];
        $this->dto = new JobsDto($this->input);
        $this->model = new JobsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new JobsModel(null);

        $this->assertInstanceOf(JobsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 4900;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetTitle(): void
    {
        $this->assertEquals($this->dto->title, $this->model->getTitle());
    }

    public function testSetTitle(): void
    {
        $expected = "my";
        $model = $this->model;
        $model->setTitle($expected);

        $this->assertEquals($expected, $model->getTitle());
    }

    public function testGetCategory(): void
    {
        $this->assertEquals($this->dto->category, $this->model->getCategory());
    }

    public function testSetCategory(): void
    {
        $expected = 6701;
        $model = $this->model;
        $model->setCategory($expected);

        $this->assertEquals($expected, $model->getCategory());
    }

    public function testGetCity(): void
    {
        $this->assertEquals($this->dto->city, $this->model->getCity());
    }

    public function testSetCity(): void
    {
        $expected = 6506;
        $model = $this->model;
        $model->setCity($expected);

        $this->assertEquals($expected, $model->getCity());
    }

    public function testGetDescription(): void
    {
        $this->assertEquals($this->dto->description, $this->model->getDescription());
    }

    public function testSetDescription(): void
    {
        $expected = "Want from must learn offer but knowledge. Story say would phone modern. Let manager even option. Star development tell name debate alone politics every.";
        $model = $this->model;
        $model->setDescription($expected);

        $this->assertEquals($expected, $model->getDescription());
    }

    public function testGetPerks(): void
    {
        $this->assertEquals($this->dto->perks, $this->model->getPerks());
    }

    public function testSetPerks(): void
    {
        $expected = "Already long past expect production baby here. Skin serious important strong ok. Matter measure local certainly. Join now hundred place move.";
        $model = $this->model;
        $model->setPerks($expected);

        $this->assertEquals($expected, $model->getPerks());
    }

    public function testGetHowToApply(): void
    {
        $this->assertEquals($this->dto->howToApply, $this->model->getHowToApply());
    }

    public function testSetHowToApply(): void
    {
        $expected = "Congress success understand often toward series. Low magazine even top former.";
        $model = $this->model;
        $model->setHowToApply($expected);

        $this->assertEquals($expected, $model->getHowToApply());
    }

    public function testGetCompanyName(): void
    {
        $this->assertEquals($this->dto->companyName, $this->model->getCompanyName());
    }

    public function testSetCompanyName(): void
    {
        $expected = "blue";
        $model = $this->model;
        $model->setCompanyName($expected);

        $this->assertEquals($expected, $model->getCompanyName());
    }

    public function testGetLogo(): void
    {
        $this->assertEquals($this->dto->logo, $this->model->getLogo());
    }

    public function testSetLogo(): void
    {
        $expected = "Win attorney inside technology soon. Its popular work firm stuff. Really information threat behavior pull responsibility.";
        $model = $this->model;
        $model->setLogo($expected);

        $this->assertEquals($expected, $model->getLogo());
    }

    public function testGetUrl(): void
    {
        $this->assertEquals($this->dto->url, $this->model->getUrl());
    }

    public function testSetUrl(): void
    {
        $expected = "Upon any news relationship report soldier new energy. Great create try health yes. Enter early defense find.";
        $model = $this->model;
        $model->setUrl($expected);

        $this->assertEquals($expected, $model->getUrl());
    }

    public function testGetEmail(): void
    {
        $this->assertEquals($this->dto->email, $this->model->getEmail());
    }

    public function testSetEmail(): void
    {
        $expected = "walvarado@example.org";
        $model = $this->model;
        $model->setEmail($expected);

        $this->assertEquals($expected, $model->getEmail());
    }

    public function testGetIsFeatured(): void
    {
        $this->assertEquals($this->dto->isFeatured, $this->model->getIsFeatured());
    }

    public function testSetIsFeatured(): void
    {
        $expected = 6669;
        $model = $this->model;
        $model->setIsFeatured($expected);

        $this->assertEquals($expected, $model->getIsFeatured());
    }

    public function testGetToken(): void
    {
        $this->assertEquals($this->dto->token, $this->model->getToken());
    }

    public function testSetToken(): void
    {
        $expected = "event";
        $model = $this->model;
        $model->setToken($expected);

        $this->assertEquals($expected, $model->getToken());
    }

    public function testGetStatus(): void
    {
        $this->assertEquals($this->dto->status, $this->model->getStatus());
    }

    public function testSetStatus(): void
    {
        $expected = 6872;
        $model = $this->model;
        $model->setStatus($expected);

        $this->assertEquals($expected, $model->getStatus());
    }

    public function testGetCreated(): void
    {
        $this->assertEquals($this->dto->created, $this->model->getCreated());
    }

    public function testSetCreated(): void
    {
        $expected = "2021-10-01 00:59:59";
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