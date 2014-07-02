<?php namespace Liang\Nav;

class Navigation implements NavInterface {

	public function makeNav() {

		$data = array('Home' => '/', 'Search' => 'search', 'Position Mapping' => '/positionmapping');
		return $data;

	}

}