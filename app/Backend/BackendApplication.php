<?php

namespace app\Backend;

use \Kolon\Application;

class BackendApplication extends Application
{
  public function __construct()
  {
    parent::__construct();

    $this->name = 'Backend';
  }

  public function run()
  {
    if ($this->user->isAuthenticated())
    {
      $controller = $this->getController();
    }
      else if ($this->httpRequest->requestUri() == "/admin/register/")
    {
      $controller = new Modules\Connexion\ConnexionController($this, 'Connexion', 'registration');

    }else if ($this->httpRequest->requestUri() == "/admin/checkLogin") {

             $controller = new Modules\Connexion\ConnexionController($this, 'Connexion', 'checkLogin');

    }else if ( $this->httpRequest->requestUri() == '/admin/logout') {

      $controller = new Modules\Connexion\ConnexionController($this, 'Connexion', 'logout');

    }else if ( $this->httpRequest->requestUri() == '/admin/validate-registration') {

      $controller = new Modules\Connexion\ConnexionController($this, 'Connexion', 'insertUser');

    }else {
            $controller = new Modules\Connexion\ConnexionController($this, 'Connexion', 'index');
    }

    $controller->execute();

    $this->httpResponse->setPage($controller->page());
    $this->httpResponse->send();
  }
}