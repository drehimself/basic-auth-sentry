<?php namespace basicAuth\formValidation;

use Laracasts\Validation\FormValidator;

class UsersEditForm extends FormValidator {

  /**
   * @var array
   */
  protected $rules =
    [
    'email' => 'required|email|unique:users',
		'first_name' => 'required',
		'last_name' => 'required',
		'password' => 'confirmed|min:6',
    ];


  /**
   * @param int $id
   */
  public function excludeUserId($id)
  {
    $this->rules['email'] = "required|email|unique:users,email,$id";

    return $this;
  }



}


