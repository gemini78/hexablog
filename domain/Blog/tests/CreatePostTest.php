<?php

use Domain\Blog\UseCase\CreatePost;
use Domain\Blog\Entity\Post;
use Domain\Blog\Test\Adapter\InMemoryPostRepository;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;

it("should create a post", function () {
  $repository = new InMemoryPostRepository;
  $useCase = new CreatePost($repository);

  $post = $useCase->execute([
    'title' => 'Mon titre',
    'content' => 'Mon contenu',
    'publishedAt' => new DateTime()
  ]);

  assertInstanceOf(Post::class, $post);
  assertEquals($post, $repository->findOne($post->uuid));
});
