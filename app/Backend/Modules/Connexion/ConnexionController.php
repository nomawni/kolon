<?php

namespace app\Backend\Modules\Connexion;

use \Kolon\BackController;
use \Kolon\HTTPRequest;
use \Entity\User;

class ConnexionController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Connexion');
    
  }

  public function executeCheckLogin(HTTPRequest $request) {
    if ($request->postExists('login'))
    {
      $login = $request->postData('login');
      $password = $request->postData('password');

      $managers = $this->managers->getManagerOf('User');

      $users = $managers->findAllUsers() ;
      
      foreach ($users as $user) {
        
         if($user['user_name'] == $login && $user['user_password'] == $password) {
      
        $this->app->user()->setAuthenticated(true);
        $this->app->httpResponse()->redirect('.');
      }
      else
      {
        $this->app->httpResponse()->redirect("/");
        $this->app->user()->setFlash('Le pseudo ou le mot de passe est incorrect.');
      }
    }

  }
   }

  public function executeRegistration(HTTPRequest $request) {

       if($request->postExists("login")) {
         $login = $request->postData("login");
         $email = $rquest->postData("email");
         $password = $request->postData("password");
       }
      $this->page->addVar('title', 'Registration');
  }

  public function executeInsertUser(HTTPRequest $request) {

     if($request->method() == "POST") {
       $user = new User([
        'username' => $request->getData('login'),
        'email' => $request->getData('email'),
        'password' => $request->getData('password')
        ]);
     }else {
        $user = new User;
     }

     $formBuilder = new UserFormBuilder($user);
     $formBuilder->build();
     $form = $formBuilder->form();

    $formHandler = new \Kolon\FormHandler($form, $this->managers->getManagerOf('User'), $request);

     if($formHandler->process()) {
       $this->managers->getManagerOf("User")->save($user);
       $this->app->user()->setFlash("L'utilisateur a bien ete ajouter, thanks");
       $this->app->user()->setAuthenticated(true);
       $this->app->httpResponse()->redirect('.');
       
     }

  }

  public function executeLogout(HTTPRequest $request) {
     session_destroy();
     $this->app->httpResponse()->redirect('/');
  }

}