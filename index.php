<?php
require_once 'bootstrap.php';

$pageTitle = 'Mon Blog';

$repository = $entityManager->getRepository('Post');
$posts = $repository->findAll();

include 'template/header.php';
foreach (array_reverse($posts) as $key => $post) {
  include 'template/post.php';
}
include 'template/footer.php';
