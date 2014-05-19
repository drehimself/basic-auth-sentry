<?php

 function errors_for($attribute, $errors)
 {
 	return $errors->first($attribute, '<p class="text-danger">:message</p>');
 }