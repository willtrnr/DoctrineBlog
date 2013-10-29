<?php
require_once 'bootstrap.php';

if (isset($_POST['title']) && isset($_POST['body']))
{
  $post = new Post();
  $post->setTitle($_POST['title'])
       ->setBody($_POST['body']);

  $entityManager->persist($post);
  $entityManager->flush();

  header('Location: single.php?id=' . $post->getId());
  exit(0);
}

include 'template/header.php';
?>

<article>
  <h2>New Post</h2>
  <form action="new.php" method="post">
    <p>
      <label for="title">Title:</label>
      <input id="title" type="text" name="title" value="<?= (isset($_POST['title'])) ? $_POST['title'] : '' ?>">
    </p>
    <p>
      <label for="body">Body:</label>
      <textarea id="body" name="body">
<?= (isset($_POST['body'])) ? $_POST['body'] : '' ?>
</textarea>
    </p>
    <p><input type="submit"></p>
  </form>
</article>

<?php
include 'template/footer.php';
