<?php

class SearchController extends BaseController {

	public function quickSearch()
	{
		if (Input::hasFile('searchfile'))
		{
			$genome = Input::only('genome');
		    $datain = App::make('SearchDB')->getFileData(Input::file('searchfile')->getRealPath());
		} else {
			$datain = Input::all();
			$genome = $datain['genome'];
		}
		return View::make("search", $data=array('results' => App::make('SearchDB')->quickSearchData($datain, $genome)));
	}

	public function advancedSearch()
	{
		$datain = Input::all();
		return View::make("search", $data=array('results' => App::make('SearchDB')->advancedSearch($datain)));
	}

}