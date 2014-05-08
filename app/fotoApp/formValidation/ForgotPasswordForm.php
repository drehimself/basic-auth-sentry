<?php namespace fotoApp\formValidation;

use Laracasts\Validation\FormValidator;

class ForgotPasswordForm extends FormValidator {

	protected $rules = [
		'email' => 'required|email',
	];
}


