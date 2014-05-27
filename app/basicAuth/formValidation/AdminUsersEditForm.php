<?php namespace basicAuth\formValidation;

use Laracasts\Validation\FormValidator;

class AdminUsersEditForm extends FormValidator {

  /**
   * @var array
   */
  protected $update_rules =
    [
    'account_type' => 'integer|between:1,2',
    'email' => 'required|email|unique:users',
		'first_name' => 'required',
		'last_name' => 'required',
		'password' => 'confirmed|min:6',
    ];

  /**
   * @var array
   */
  protected $rules = [];


  /**
   * @param int $id
   * @param array $input
   * @return mixed
   */
  public function validateUpdate($id, array $input)
  {
    $this->update_rules['email'] = "required|email|unique:users,email,$id";
    $this->rules = $this->update_rules;
    return $this->validate($input);
  }



}


