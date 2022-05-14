<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Post</title>
</head>

<body>
  <h1>Créer un article</h1>
  <form action="" method="post">
    <label for="title">Titre</label><br>
    <input type="text" name="title" id="title" placeholder="titre"><br><br>
    <label for="content">Contenu</label><br>
    <textarea name="content" id="content" cols="30" rows="10" placeholder="contenu"></textarea><br>
    <label for="publishedAt"><br>
      <input type="checkbox" name="publishedAt" id="publishedAt"> Article Publié
    </label><br><br>
    <button type="submit">Enregistrer</button>
  </form>
</body>

</html>