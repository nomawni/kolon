<?php

namespace Entity;

use Kolon\Entity;

class User extends Entity {
	
	/**
	* User id.
	*
	* @var integer
	*/
	protected $id;

	/**
	* User name.
	*
	* @var string
	*/
	protected $username;

	/** 
	* User email
	*
	* @var string 
	*/
	protected $email;
    
    /**
    * User password.
    *
    * @var string 
    */
    protected $password;

    /**
    * User salt;
    *
    * @var string
    */
    protected $salt;

    /**
    * User Role
    * Values : ROLE_USER or ROLE_ADMIN.
    *
    * @var string
    */
    protected $role;

    /**
    * User date
    * @var Date 
    */
    protected $date;


    public function isValid() {

         return !(empty($this->username) || empty($this->email) || empty($this->password));
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getEmail() {
    	return $this->email;
    }

    public function setEmail($email) {
    	$this->email = $email;
    }
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    
    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    
    public function getRoles()
    {
        return array($this->getRole());
    }

    public function eraseCredentials() {
        // Nothing to do here
    }

    public function getDate() {
    	return $this->date;
    }

    public function setDate($date) {
    	$this->date = $date;
    }

}