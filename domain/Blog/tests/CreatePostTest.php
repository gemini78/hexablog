<?php

use Domain\Blog\UseCase\CreatePost;
use Domain\Blog\Entity\Post;

use function PHPUnit\Framework\assertInstanceOf;

it("should create a post", function () {
  $useCase = new CreatePost;

  $post = $useCase->execute([
    'title' => 'Mon titre',
    'content' => 'Mon contenu',
    'publishedAt' => new DateTime()
  ]);

  assertInstanceOf(Post::class, $post);
});
