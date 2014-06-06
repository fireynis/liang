<?php namespace Liang\Nav;

class Navigation implements NavInterface {

	public function makeNav() {

		$data = array('Home' => '/', 'Search' => 'search');
		return $data;

	}

}