<?php

namespace Domain\Blog\UseCase;

use Domain\Blog\Entity\Post;
use Domain\Blog\Port\PostRepositoryInterface;

class CreatePost
{
  protected PostRepositoryInterface $repository;

  public function __construct(PostRepositoryInterface $repository)
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
