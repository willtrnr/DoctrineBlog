<?php
require_once 'bootstrap.php';

if (!isset($_GET['id']))
{
  header('Location: index.php');
  exit(0);
}

$repository = $entityManager->getRepository('Post');
$post = $repository->find($_GET['id']);

if (!$post)
{
  header('Location: index.php');
  exit(0);
}

if (isset($_POST['body']))
{
  $comment = new Comment();
  $comment->setBody($_POST['body'])
          ->setPost($post);

  $entityManager->persist($comment);
  $entityManager->flush();
}

include 'template/header.php';
include 'template/post.php';
?>
<article>
  <h3>Comments (<?= count($post->getComments()) ?>)</h3>
<?php
foreach ($post->getComments() as $key => $comment) {
  include 'template/comment.php';
}
?>
</article>
<article>
  <h3>Post a Comment</h3>
  <form action="single.php?id=<?= $post->getId() ?>" method="post">
    <p>
      <label for="body">Comment:</label>
      <textarea id="body" name="body"></textarea>
    </p>
    <p><input type="submit"></p>
  </form>
</article>
<?php
include 'template/footer.php';
