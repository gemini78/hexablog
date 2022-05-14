<?php

namespace App\Controller;

use DateTimeImmutable;
use Domain\Blog\UseCase\CreatePost;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreatePostController
{
  protected CreatePost $useCase;

  public function __construct(CreatePost $useCase)
  {
    $this->useCase = $useCase;
  }

  public function handleRequest(Request $request)
  {
    if ($request->isMethod('GET')) {
      // Show Form
      ob_start();
      include __DIR__ . '/../templates/form.html.php';
      return new Response(ob_get_clean());
    } else {
      // Process form with useCase's Domain
      $post = $this->useCase->execute([
        'title' => $request->request->get('title', ''),
        'content' => $request->request->get('content', ''),
        'publishedAt' => $request->request->has('publishedAt') ?
          new \DateTime() :
          null
      ]);

      // Show h1 title'post
      return new Response("<h1>{$post->title}</h1>");
    }
  }
}
