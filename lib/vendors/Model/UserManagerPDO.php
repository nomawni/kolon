<?php

namespace Model;

use \Entity\User;

class UserManagerPDO extends UserManager {

  public function add(User $user) {
     $sql = $this->dao->prepare("INSERT INTO user SET user_name=:username, user_email=:useremail, user_password=:userpassword, user_role=:userrole, date = NOW() ");

     $sql->bindValue(":username", $user->getUsername());
     $sql->bindValue(":useremail", $user->getEmail());
     $sql->bindValue(":userpassword", $user->getPassword());
     $sql->bindValue(":userrole", $user->getRole());

     $sql->execute();

     $user->setId($this->dao->lastInsertId());

  }

  public function modify(User $user) {
    $sql = $this->dao->prepare("UPDATE user SET user_name=:username, user_email=:useremail, user_password=:userpassword");

    $sql->bindValue(":useremail", $user->getUsername());
    $sql->bindValue(":useremail", $user->getEmail());
    $sql->bindValue(":userpassword", $user->getPassword());

    $sql->execute();
  }
	
	public function find($id) {
	   if (!ctype_digit($id))
    {
      throw new \InvalidArgumentException('L\'identifiant de la news passé doit être un nombre entier valide');
    }

     $sql = $this->dao->prepare("SELECT * FROM user where user_id =:id");
      $sql->bindValue(":id", $id, \PDO::PARAM_INT);
      $sql->execute();

      $sql->setFetchMode(\PDO::FETCH_CLASS| PDO::FETCH_PROPS_LATE,'\Entity\User');

      $user = $sql->fetchAll();

      if($user) 
        return $this->buildDomainObject($user);
      else 
           throw new \Exception ("No user matching id " . $id);
	}

	public function loadUserByUsername($username){
		$sql = $this->dao->prepare("SELECT * FROM user WHERE user_name=:username");

		$sql->bindValue(":username", $username);
		$sql->execute();

		$sql->setFetchMode(\PDO::FETCH_CLASS| PDO::FETCH_PROPS_LATE,'\Entity\User');

		$user = $sql->fetchAll();

		if($user) 
			return $this->buildDomainObject($user);
		else
		//throw new \Exception('User "%s" not found.', $username);
      return null;
			
	}

	public function refreshUser(User $user) {

           $class = get_class($user);
           if(!$this->supportsClass($class)) {
           	throw new \Exception(sprintf('Instance of "%s" are not supported.', $class));
           }

           return $this->loadUserByUsername($user->getUsername());
	}

	public function supportsClass($class) {
		return '\Entity\User' === $class;
	}


  public function findAllUsers() {

      $sql = $this->dao->prepare("SELECT * FROM user ORDER BY user_id");

      $sql->execute();

      $users = $sql->fetchAll();

      return $users;
  }

  public function register(User $user) {

       $sql = $this->dao->prepare("INSERT INTO user SET user_name=:username, user_email=:useremail,user_password=:userpassword");

       $sql->bindValue(":username", $user->getUsername());
       $sql->bindValue(":useremail", $user->getUserEmail());
       $sql->bindValue(":userpassword", $user->getPassword());
  }


	/**
     * Creates a User object based on a DB row.
     *
     * @param array $row The DB row containing User data.
     * @return \Entity\User
     */
    protected function buildDomainObject($row) {
        $user = new User();
        $user->setId($row['user_id']);
        $user->setUsername($row['user_name']);
        $user->setPassword($row['user_password']);
        $user->setSalt($row['user_salt']);
        $user->setRole($row['user_role']);
        return $user;
    }
}

