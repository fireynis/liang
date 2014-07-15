<?php

class PageController extends BaseController {

	public function showHome()
	{
		return View::make('home');
	}

	public function showSearch()
	{
		return View::make('search');
	}

	public function showDescription()
	{
		return View::make('description');
	}

	public function showUses()
	{
		return View::make('uses');
	}

    public function getPositionMapping()
    {
        return View::make('posmap');
    }

	public function getReference()
	{
		return View::make('references');
	}

}