<?php namespace Liang\Search;

interface SearchInterface {

	public function quickSearchData($datain, $genome);
	public function getFileData($file);
}