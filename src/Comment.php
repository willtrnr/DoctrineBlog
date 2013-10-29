<?php

/**
 * @Entity @Table(name="comments")
 **/
class Comment {

  /** @Id @Column(type="integer") @GeneratedValue **/
  protected $id;
  /** @ManyToOne(targetEntity="Post", inversedBy="comments") **/
  protected $post;
  /** @Column(type="string") **/
  protected $body;

  public function getId()
  {
    return $this->id;
  }
  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  public function getPost()
  {
    return $this->post;
  }
  public function setPost(Post $post)
  {
    $post->addComment($this);
    $this->post = $post;
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

}
