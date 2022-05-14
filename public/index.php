<?php

use App\Controller\CreatePostController;
use Domain\Blog\Test\Adapter\PDOPostRepository;
use Domain\Blog\UseCase\CreatePost;
use Symfony\Component\HttpFoundation\Request;

require __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();

$pdoRepository = new PDOPostRepository;

$useCase = new CreatePost($pdoRepository);

$controller = new CreatePostController($useCase);

$response = $controller->handleRequest($request);

$response->send();
