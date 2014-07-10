<?php

class SearchController extends BaseController {

	public function quickSearch()
	{
		if (Input::hasFile('searchfile'))
		{
			$datain = Input::all();
			$genome = $datain['genome'];
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
	    if (Input::hasFile('searchfile'))
	    {
		    $datain = Input::all();
		    $genome = $datain['genome'];
		    $datain = searchDB::getFileData(Input::file('searchfile')->getRealPath());
		    $file = true;
	    } else {
            $datain = Input::all();
            $genome = $datain['genome'];
	        $file = false;
        }
        return View::make("posresults", $data=array('results' => positionMapping::posMap($datain, $genome, $file)));
    }

}