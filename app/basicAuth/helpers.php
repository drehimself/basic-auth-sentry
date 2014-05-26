<?php

 function errors_for($attribute, $errors)
 {
 	return $errors->first($attribute, '<p class="text-danger">:message</p>');
 }

 function set_active($path, $active='active')
 {
 	return Request::is($path) || Request::is($path . '/*') ? $active: '';
 }

 function set_active_admin($path, $active='active')
 {
 	return Request::is($path) ? $active: '';
 }

 // function link_to_profile($text='My Profile')
 // {
 // 	return link_to('/profile/' .  Sentry::getUser()->id, $text);
 // }