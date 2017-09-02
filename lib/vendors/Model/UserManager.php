<?php

namespace Model;

use \Kolon\Manager;
use \Entity\User;

abstract class UserManager extends Manager {

    /**
     * Returns a user matching the supplied id.
     *
     * @param integer $id The user id.
     *
     * @return \Kolon\vendors\Model\User|throws an exception if no matching user is found
     */
	
	abstract protected function find($id);



	abstract protected function loadUserByUsername($username) ;

	abstract protected function refreshUser (User $user);

	abstract protected function buildDomainObject($row);

	abstract protected function findAllUsers();

	abstract protected function add(User $user);

	abstract protected function modify(User $user);

	/**
   * Méthode permettant d'enregistrer un commentaire.
   * @param $comment Le commentaire à enregistrer
   * @return void
   */
  
  public function save(User $user)
  {
    if ($user->isValid())
    {
      $user->isNew() ? $this->add($user) : $this->modify($user);
    }
    else
    {
      throw new \RuntimeException('L\' utilisateur specifier doit être validé pour être enregistré');
    }
  }

	//abstract protected function validationUserAuthentification($login, $password); 
}