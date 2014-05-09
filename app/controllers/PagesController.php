<?php

class PagesController extends \BaseController {


	public function getHome()
	{
		return View::make('pages.home');
	}


}