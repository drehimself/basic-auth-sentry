<?php

class PagesController extends \BaseController {


	public function getHome()
	{
		return View::make('pages.home');
	}

	public function getAbout()
	{
		return View::make('pages.about');
	}

	public function getContact()
	{
		return View::make('pages.contact');
	}


}