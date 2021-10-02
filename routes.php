<?php

declare(strict_types=1);

$router->get("/admin", "JobBoard\Admin\AdminController::getAll");
$router->post("/admin", "JobBoard\Admin\AdminController::insert");
$router->group("/admin", function ($router) {
    $router->get("/{id:number}", "JobBoard\Admin\AdminController::get");
    $router->post("/{id:number}", "JobBoard\Admin\AdminController::update");
    $router->delete("/{id:number}", "JobBoard\Admin\AdminController::delete");
});

$router->get("/applications", "JobBoard\Applications\ApplicationsController::getAll");
$router->post("/applications", "JobBoard\Applications\ApplicationsController::insert");
$router->group("/applications", function ($router) {
    $router->get("/{id:number}", "JobBoard\Applications\ApplicationsController::get");
    $router->post("/{id:number}", "JobBoard\Applications\ApplicationsController::update");
    $router->delete("/{id:number}", "JobBoard\Applications\ApplicationsController::delete");
});

$router->get("/banlist", "JobBoard\Banlist\BanlistController::getAll");
$router->post("/banlist", "JobBoard\Banlist\BanlistController::insert");
$router->group("/banlist", function ($router) {
    $router->get("/{id:number}", "JobBoard\Banlist\BanlistController::get");
    $router->post("/{id:number}", "JobBoard\Banlist\BanlistController::update");
    $router->delete("/{id:number}", "JobBoard\Banlist\BanlistController::delete");
});

$router->get("/blocks", "JobBoard\Blocks\BlocksController::getAll");
$router->post("/blocks", "JobBoard\Blocks\BlocksController::insert");
$router->group("/blocks", function ($router) {
    $router->get("/{id:number}", "JobBoard\Blocks\BlocksController::get");
    $router->post("/{id:number}", "JobBoard\Blocks\BlocksController::update");
    $router->delete("/{id:number}", "JobBoard\Blocks\BlocksController::delete");
});

$router->get("/categories", "JobBoard\Categories\CategoriesController::getAll");
$router->post("/categories", "JobBoard\Categories\CategoriesController::insert");
$router->group("/categories", function ($router) {
    $router->get("/{id:number}", "JobBoard\Categories\CategoriesController::get");
    $router->post("/{id:number}", "JobBoard\Categories\CategoriesController::update");
    $router->delete("/{id:number}", "JobBoard\Categories\CategoriesController::delete");
});

$router->get("/cities", "JobBoard\Cities\CitiesController::getAll");
$router->post("/cities", "JobBoard\Cities\CitiesController::insert");
$router->group("/cities", function ($router) {
    $router->get("/{id:number}", "JobBoard\Cities\CitiesController::get");
    $router->post("/{id:number}", "JobBoard\Cities\CitiesController::update");
    $router->delete("/{id:number}", "JobBoard\Cities\CitiesController::delete");
});

$router->get("/jobs", "JobBoard\Jobs\JobsController::getAll");
$router->post("/jobs", "JobBoard\Jobs\JobsController::insert");
$router->group("/jobs", function ($router) {
    $router->get("/{id:number}", "JobBoard\Jobs\JobsController::get");
    $router->post("/{id:number}", "JobBoard\Jobs\JobsController::update");
    $router->delete("/{id:number}", "JobBoard\Jobs\JobsController::delete");
});

$router->get("/pages", "JobBoard\Pages\PagesController::getAll");
$router->post("/pages", "JobBoard\Pages\PagesController::insert");
$router->group("/pages", function ($router) {
    $router->get("/{id:number}", "JobBoard\Pages\PagesController::get");
    $router->post("/{id:number}", "JobBoard\Pages\PagesController::update");
    $router->delete("/{id:number}", "JobBoard\Pages\PagesController::delete");
});

$router->get("/subscriptions", "JobBoard\Subscriptions\SubscriptionsController::getAll");
$router->post("/subscriptions", "JobBoard\Subscriptions\SubscriptionsController::insert");
$router->group("/subscriptions", function ($router) {
    $router->get("/{id:number}", "JobBoard\Subscriptions\SubscriptionsController::get");
    $router->post("/{id:number}", "JobBoard\Subscriptions\SubscriptionsController::update");
    $router->delete("/{id:number}", "JobBoard\Subscriptions\SubscriptionsController::delete");
});

