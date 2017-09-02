<?php

namespace Model;

use \Entity\Comment;

class CommentsManagerPDO extends CommentsManager
{

  protected function add(Comment $comment)
  {
    $q = $this->dao->prepare('INSERT INTO comments SET news = :news, auteur = :auteur, contenu = :contenu, date = NOW()');
    
    $q->bindValue(':news', $comment->news(), \PDO::PARAM_INT);
    $q->bindValue(':auteur', $comment->auteur());
    $q->bindValue(':contenu', $comment->contenu());
    
    $q->execute();
    
    $comment->setId($this->dao->lastInsertId());
  }

  public function getListOf($news)
  {
    if (!ctype_digit($news))
    {
      throw new \InvalidArgumentException('L\'identifiant de la news passé doit être un nombre entier valide');
    }

    $article = $this->newsManagerDAO->getUnique($news);
    
    $q = $this->dao->prepare('SELECT com_id, user_id, com_content FROM comments WHERE forum_id = :forum_id ORDER BY com_id');
    $q->bindValue(':forum_id', $news, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
    
    $result = $q->fetchAll();

    $comments = array();
    
    foreach ($result as $row)
    {
      $comId = $row['com_id'];
      $comment = $this->buildDomainObject($row);
     // the associated news is defined for the constructed comment
      $comment->setNews($article);
      $comments[$comId] = $comment;

    //  $comment->setDate(new \DateTime($comment->date()));
    }
    
    return $comments;
  }

  protected function modify(Comment $comment)
  {
    $q = $this->dao->prepare('UPDATE comments SET auteur = :auteur, contenu = :contenu WHERE id = :id');
    
    $q->bindValue(':auteur', $comment->auteur());
    $q->bindValue(':contenu', $comment->contenu());
    $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);
    
    $q->execute();
  }
  
  public function get($id)
  {
    $q = $this->dao->prepare('SELECT id, news, auteur, contenu FROM comments WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
    
    return $q->fetch();
  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM comments WHERE id = '.(int) $id);
  }

  public function deleteFromNews($news)
  {
    $this->dao->exec('DELETE FROM comments WHERE news = '.(int) $news);
  }

  protected function buildDomainObject($row){
    $comment = new Comment();
    $comment->setId($row['com_id']);
    $comment->setContent($row['com_content']);

    if(array_key_exists('forum_id', $row)) {
      // Find and set the associated article 

      $newsId = $row['forum_id'];
      $news = $this->newsManagerDAO->find($newsId);
      $comment->setNews($news);
    }

    if (array_key_exists('user_id', $row)) {
       // find and set the associated author
      $userId = $row['user_id'];
      $user = $this->userManagerDAO->find($userId);
      $comment->setAuthor($user);
    }

    return $comment;
  }
}