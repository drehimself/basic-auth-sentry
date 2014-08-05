<?php namespace basicAuth\formValidation;

use Laracasts\Validation\FormValidator;

class AdminUsersEditForm extends FormValidator {

  /**
   * @var array
   */
  protected $rules =
    [
    'account_type' => 'integer|between:1,2',
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


