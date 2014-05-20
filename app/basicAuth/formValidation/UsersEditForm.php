<?php namespace basicAuth\formValidation;

use Laracasts\Validation\FormValidator;

class UsersEditForm extends FormValidator {


	// protected $rules = [
	// 	'email' => 'required|email|unique:users',
	// 	'first_name' => 'required',
	// 	'last_name' => 'required',
	// ];

	protected $create_rules =
    [
		'email' => 'required|email|unique:users',
		'first_name' => 'required',
		'last_name' => 'required',
    ];

  /**
   * @var array
   */
  protected $update_rules =
    [
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
   * @param array $input
   * @return mixed
   */
  public function validateCreate(array $input)
  {
    $this->rules = $this->create_rules;
    return $this->validate($input);
  }

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


