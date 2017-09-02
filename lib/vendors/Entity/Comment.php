<?php

namespace Entity;

use \Kolon\Entity;

class Comment extends Entity
{
  protected $news,
            $author,
            $content,
            $date;

  const AUTEUR_INVALIDE = 1;
  const CONTENU_INVALIDE = 2;

  public function isValid()
  {
    return !(empty($this->author) || empty($this->content));
  }

  public function setNews(News $news)
  {
    $this->news = $news;
  }

  public function setAuthor(User $author)
  {
    if (!is_string($author) || empty($author))
    {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
    }

    $this->author = $author;
  }

  public function setContent($content)
  {
    if (!is_string($content) || empty($content))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }

    $this->content = $content;
  }

  public function setDate(\DateTime $date)
  {
    $this->date = $date;
  }

  public function news()
  {
    return $this->news;
  }

  public function author()
  {
    return $this->author;
  }

  public function content()
  {
    return $this->content;
  }

  public function date()
  {
    return $this->date;
  }
}