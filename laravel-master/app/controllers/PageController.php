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

	public function getUserContent()
	{
		return View::make('userdata');
	}

	public function postUserContent() {
		$data = Input::all();

		$validate = Validator::make(array(
			'Chromosome' => $data['chromosome'],
			'Start of Element' => $data['start'],
			'End of Element' => $data['end'],
			'Name' => $data['name'],
			'Class' => $data['class'],
			'Family' => $data['family'],
			'Genomic Region' => $data['region'],
			'Your Name' => $data['submitter'],
			'Peer Reviewed Article' => $data['ref'],
			'Sequence of Element' => $data['seq']), array(
			'Chromosome' => array('required', 'regex:/chr[1-9xyXY]/'),
			'Start of Element' => 'required',
			'End of Element' => 'required',
			'Name' => 'required|min:7|max:9',
			'Class' => 'required',
			'Family' => 'required',
			'Genomic Region' => 'required',
			'Your Name' => 'required|min:5',
			'Peer Reviewed Article' => 'required|active_url',
			'Sequence of Element' => 'required'
		));
		if ($validate->fails()) {
			return Redirect::to('/usercontent')->withErrors($validate);
		}
	}

}