<?php namespace Liang\Search;

class SearchDB implements SearchInterface {

	public function quickSearchData($datain, $genome) {

		$outstring = array();
		if(isset($datain['quicksearch'])){
			$id = explode(',', $datain['quicksearch']);
		} else {
			$id = $datain;
		}

		foreach ($id as $searchval) {
			$searchval = trim($searchval);

			if (preg_match("/^chr[1-9XY][0-9]*$/i", $searchval)) {
				$string = "SELECT * FROM ".$genome." WHERE chrom = '".$searchval."'";
			} elseif (preg_match("/^chr[1-9XY][0-9]*\:\d+\-\d+$/i", $searchval)) {
				$array = explode(":", $searchval);
				$chrom = $array[0];
				$rangearray = explode("-", $array[1]);
				$string = "SELECT * FROM dbRIP WHERE chrom = '".$chrom."' AND chromEnd >= ".$rangearray[0]." AND chromStart <= ".$rangearray[1];
			} elseif (preg_match("/^\d+/", $searchval)) {
				$string = "SELECT * FROM dbRIP WHERE name = '".$searchval."'";
			} else {
				$string = "SELECT * FROM dbRIP WHERE originalId LIKE '%". $searchval."%'";
			}
			array_push($outstring, $string);
		}
		return $outstring;
	}

	public function advancedSearch($data)
	{
		$query = "SELECT * FROM hg19.dbRIP WHERE ";

		$first = true;

		if ($data['chr'] != 'all'){
			$first =false;
			$query .= "chrom = '".$data['chr']."'";
		}
		if($data['location'] != 'all'){
			if($first){
				$query .= "genoRegion LIKE '".$data['location']."%'";
				$first = false;
			} else {
				$query .= " AND genoRegion LIKE '".$data['location']."%'";
			}
		}
		if($data['source'] != 'all'){
			if($first){
				$query .= "polySource = '".$data['source']."'";
				$first = false;
			} else {
				$query .= " AND polySource = '".$data['source']."'";
			}
		}
		if($data['egroup'] != 'any'){
			if($first){
				$query .= "polySource = '".$data['egroup']."'";
				$first = false;
			} else {
				$query .= " AND polySource = '".$data['egroup']."'";
			}
		}
	}

	public function getFileData($file)
	{
		$returndata = array();
		$fh = fopen($file, 'r');
		while (true) {
			$filedata = fgets($fh);
			if ($filedata == "") {
				break;
			}
			$filedata = trim($filedata);
			array_push($returndata, $filedata);
		}
		return $returndata;
	}

}