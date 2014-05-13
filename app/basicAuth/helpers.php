<?php

 function errors_for($attribute, $errors)
 {
 	return $errors->first($attribute, '<span class="error">:message</span>');
 }