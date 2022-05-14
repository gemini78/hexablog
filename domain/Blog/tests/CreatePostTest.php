<?php

use Domain\Blog\UseCase\CreatePost;
use Domain\Blog\Entity\Post;
use Domain\Blog\Exception\InvalidPostDataException;
use Domain\Blog\Test\Adapter\InMemoryPostRepository;
use Domain\Blog\Test\Adapter\PDOPostRepository;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;

it("should create a post", function () {
  $repository = new InMemoryPostRepository;
  $useCase = new CreatePost($repository);

  $post = $useCase->execute([
    'title' => 'Mon titre',
    'content' => 'Mon contenu',
    'publishedAt' => new DateTime('2020-07-08 17:28:08')
  ]);

  assertInstanceOf(Post::class, $post);
  assertEquals($post, $repository->findOne($post->uuid));
});

/* it("should create a post whit PDO", function () {
  $repository = new PDOPostRepository;
  $useCase = new CreatePost($repository);

  $post = $useCase->execute([
    'title' => 'Mon titre',
    'content' => 'Mon contenu',
    'publishedAt' => new DateTime('2020-07-08 17:28:08')
  ]);

  assertInstanceOf(Post::class, $post);
  assertEquals($post, $repository->findOne($post->uuid));
}); */

it("should throw a InvalidPostDataException id bad data", function ($postData) {
  $repository = new InMemoryPostRepository;
  $useCase = new CreatePost($repository);

  $post = $useCase->execute($postData);
})->with([
  [['title' => 'Mon titre', 'published_at' => new DateTime('2020-01-01')]],
  [['published_at' => new DateTime('2020-01-01')]],
  [[]]
])->throws(InvalidPostDataException::class);
