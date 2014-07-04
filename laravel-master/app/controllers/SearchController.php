<?php

class SearchController extends BaseController {

	public function quickSearch()
	{
		if (Input::hasFile('searchfile'))
		{
			$genome = Input::only('genome');
		    $datain = searchDB::getFileData(Input::file('searchfile')->getRealPath());
		} else {
			$datain = Input::all();
			$genome = $datain['genome'];
		}
		return View::make("search", $data=array('quickResults' => searchDB::quickSearchData($datain, $genome)));
	}

	public function advancedSearch()
	{
		$datain = Input::all();
		return View::make("search", $data=array('results' => searchDB::advancedSearch($datain)));
	}

    public function postPosMap()
    {
        if(Input::has('file'))
        {
            $genome = Input::only('genome')
        }
    }

}