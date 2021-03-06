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

		if(!isset($data['asc_method']) || is_null($data['asc_method'])) {
			$data['asc_method'] = '';
		}

		$validate = Validator::make(array(
			'Chromosome' => $data['chromosome'],
			'Start of Element' => $data['start'],
			'End of Element' => $data['end'],
			'Name' => $data['name'],
			'Class' => $data['class'],
			'Family' => $data['family'],
			'Genomic Region' => $data['region'],
			'Ascertaining Method' => $data['asc_method'],
			'Your Name' => $data['submitter'],
			'Your Email' => $data['email'],
			'Your Institution' => $data['institution'],
			'Peer Reviewed Publication Status' => $data['ref'],
			'Article' => $data['pub'],
			'Sequence of Element' => $data['seq']), array(
			'Chromosome' => array('required', 'regex:/chr[1-9xyXY]/'),
			'Start of Element' => 'required',
			'End of Element' => 'required',
			'Name' => array('required', 'regex:/^[^\s]+$s/'),
			'Class' => 'required',
			'Family' => 'required',
			'Ascertaining Method' => 'required',
			'Your Name' => 'required|min:5',
			'Your Email' => 'required|email',
			'Your Institution' => 'required|min:5',
			'Peer Reviewed Publication Status' => 'required',
			'Article' => 'required_if:Peer Reviewed Publication Status,published|active_url',
			'Sequence of Element' => 'required'
		));
		if ($validate->fails()) {
			return Redirect::to('/usercontent')->withInput()->withErrors($validate);
		} else {
			insertIntoDb::insert($data);
		}
	}

}