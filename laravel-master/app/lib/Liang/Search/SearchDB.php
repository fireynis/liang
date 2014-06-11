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
		$from = "SELECT * FROM ".$data['genome'].".dbRIP as dr";
		$query = "WHERE ";

		$first = true;
		$egroup = true;

		if ($data['chr'] != 'all'){
			$first =false;
			$query .= "dr.chrom = '".$data['chr']."'";
		}
		if($data['location'] != 'all'){
			if($first){
				$query .= "dr.genoRegion LIKE '".$data['location']."%'";
				$first = false;
			} else {
				$query .= " AND dr.genoRegion LIKE '".$data['location']."%'";
			}
		}
		if($data['source'] != 'all'){
			if($first){
				$query .= "dr.polySource = '".$data['source']."'";
				$first = false;
			} else {
				$query .= " AND dr.polySource = '".$data['source']."'";
			}
		}
		if($data['egroup'] != 'any'){
			$from .= ", ".$data['genome'].".polyGenotype AS pg";
			$egroup = false;
			if($first){
				$query .= "pg.ethnicGroup = '".$data['egroup']."' AND dr.name = pg.name";
				$first = false;
			} else {
				$query .= " AND pg.ethnicGroup = '".$data['egroup']."' AND dr.name = pg.name";
			}
		}
		if($data['egroup_not'] != 'blank'){
			if ($egroup) {
				$from .= ", ".$data['genome'].".polyGenotype AS pg";
			}
			if($first){
				$query .= "pg.ethnicGroup != '".$data['egroup_not']."' AND dr.name = pg.name";
				$first = false;
			} else {
				$query .= " AND pg.ethnicGroup != '".$data['egroup_not']."' AND dr.name = pg.name";
			}
		}
		if ($data['hlevel'] != 'any') {
			if ($data['genome'] == 'hg19' && $data['hlevel'] == 'hs') {
				if($first){
					$query .= "dr.name != '%h%'";
					$first = false;
				} else {
					$query .= " AND dr.name != '%h%'";
				}
			}
			if ($data['hlevel'] != 'hs') {
				if($first){
					$query .= "dr.name != '%h%'";
					$first = false;
				} else {
					$query .= " AND dr.name != '%h%'";
				}
			}
		}
		if ($data['hsclass'] != 'any') {
			if ($first) {
				$query .= " dr.remarks = '".$data['hsclass']."%'";
				$first = false;
			} else {
				$query .= " AND dr.remarks = '".$data['hsclass']."%'";
			}
		}
		if ($data['sfamily'] != 'any') {
			if (!$first) {
				$query .= " AND";
			}
			$first = false;
			if ($data['sfamily'] != "LINE" || $data['sfamily'] != "SINE" || $data['sfamily'] != "LTR" || $data['sfamily'] != "Other") {
				$query .= " dr.polySubfamily LIKE '%".$data['sfamily']."%'";
			} else {
				$query .= " dr.polyClass = '".$data['sfamily']."'";
			}
		}
		if (condition) {
			# code...
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