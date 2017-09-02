<?php

namespace FormBuilder;

use \Kolon\FormBuilder;
use \Kolon\TextField;
use \Kolon\NotNullValidator;

class UserFormBuilder extends FormBuilder {
	
	public function build() {

	  $this->form->add(new StringField([
      'label' => 'Pseudo',
      'name' => 'pseudo',
      'maxLength' => 30,
      'validators' => [
          new MaxLengthValidator('The name of the author is too long  (20 characters maximum)', 20),
          new NotNullValidator('Thank to specify the name of the author'),
        ],
  
	  ]))
	  ->add (new StringField( [
      'label' => 'Email',
      'type'  => 'email',
      'name' => 'email',
      'maxLength' => 40,
      'validators' => [
          new MaxLengthValidator('The email of the author is too long  (20 characters maximum)', 20),
          new NotNullValidator('Thank to specify the email of the author'),

       ],

	  	]))
	  ->add (new StringField([
       'label' => 'Password',
       'type' => 'password',
       'name' => 'password',
       'placeholder' =>'placeholder'

	  	]));
	}
}