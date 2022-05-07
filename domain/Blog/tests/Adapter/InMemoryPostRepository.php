<?php

namespace Domain\Blog\Test\Adapter;

use Domain\Blog\Entity\Post;

class InMemoryPostRepository
{
  public array $posts = [];

  public function save(Post $post): Post
  {
    $this->posts[$post->uuid] = $post;

    return $post;
  }

  public function findOne(string $uuid): ?Post
  {
    return $this->posts[$uuid] ?? null;
  }
}
