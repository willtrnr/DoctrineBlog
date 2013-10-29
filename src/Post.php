<?php

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="posts")
 **/
class Post {

  /** @Id @Column(type="integer") @GeneratedValue **/
  protected $id;
  /** @Column(type="string") **/
  protected $title;
  /** @Column(type="string") **/
  protected $body;
  /** @OneToMany(targetEntity="Comment", mappedBy="post") **/
  protected $comments;

  public function __construct() {
    $this->comments = new ArrayCollection();
  }

  public function getId()
  {
    return $this->id;
  }
  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  public function getTitle()
  {
    return $this->title;
  }
  public function setTitle($title)
  {
    $this->title = $title;
    return $this;
  }

  public function getBody()
  {
    return $this->body;
  }
  public function setBody($body)
  {
    $this->body = $body;
    return $this;
  }

  public function getComments()
  {
    return $this->comments;
  }
  public function addComment(Comment $comment)
  {
    $this->comments[] = $comment;
    return $this;
  }

}
