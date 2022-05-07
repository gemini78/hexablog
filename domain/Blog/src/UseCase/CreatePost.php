<?php

namespace Domain\Blog\UseCase;

use Domain\Blog\Entity\Post;
use Domain\Blog\Test\Adapter\InMemoryPostRepository;

class CreatePost
{
  protected InMemoryPostRepository $repository;

  public function __construct(InMemoryPostRepository $repository)
  {
    $this->repository = $repository;
  }
  public function execute(array $postData): ?Post
  {
    $post = new Post($postData['title'], $postData['content'], $postData['publishedAt']);
    $this->repository->save($post);
    return $post;
  }
}
