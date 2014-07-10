<?php 

class searchDB {

	public static function quickSearchData($datain, $genome) {

		if(isset($datain['quicksearch'])){
			$id = explode(',', $datain['quicksearch']);
		} else {
			$id = $datain;
		}
        $results = array();
		foreach ($id as $searchval) {
			$searchval = trim($searchval);

			if (preg_match("/^chr[1-9XY][0-9]*$/i", $searchval)) {
                $results[$searchval] = DB::connection($genome)->select("SELECT chrom, chromStart, chromEnd, name, originalId FROM ".$genome.".dbRIP WHERE chrom = '".$searchval."'");
			} elseif (preg_match("/^chr[1-9XY][0-9]*\:\d+\-\d+$/i", $searchval)) {
				$array = explode(":", $searchval);
				$chrom = $array[0];
				$rangearray = explode("-", $array[1]);
				$results[$searchval] = DB::connection($genome)->select("SELECT chrom, chromStart, chromEnd, name, originalId FROM dbRIP WHERE chrom = '".$chrom."' AND chromStart >= ".$rangearray[0]." AND chromEnd <= ".$rangearray[1]);
			} elseif (preg_match("/^\d+/", $searchval)) {
                $results[$searchval] = DB::connection($genome)->select("SELECT chrom, chromStart, chromEnd, name, originalId FROM dbRIP WHERE name = '".$searchval."'");
			} else {
                $results[$searchval] = DB::connection($genome)->select("SELECT chrom, chromStart, chromEnd, name, originalId FROM dbRIP WHERE originalId LIKE '%". $searchval."%'");
			}
            if(empty($results[$searchval])){
                $results[$searchval] = "empty";
            }
		}
		return $results;
	}

	public static function advancedSearch($data)
	{
		$from = "SELECT chrom, chromStart, chromEnd, name, originalId FROM ".$data['genome'].".dbRIP dr";
		$query = " ";

		$first = true;
		$egroup = true;

		if ($data['chr'] != 'all'){
			$first =false;
			$query .= "WHERE dr.chrom = '".$data['chr']."'";
		}
		if($data['location'] != 'all'){
			if($first){
				$query .= "WHERE dr.genoRegion LIKE '".$data['location']."%'";
				$first = false;
			} else {
				$query .= " AND dr.genoRegion LIKE '".$data['location']."%'";
			}
		}
		if($data['source'] != 'all'){
			if($first){
				$query .= "WHERE dr.polySource = '".$data['source']."'";
				$first = false;
			} else {
				$query .= " AND dr.polySource = '".$data['source']."'";
			}
		}
		if($data['egroup'] != 'any'){
			$from .= ", ".$data['genome'].".polyGenotype AS pg";
			$egroup = false;
			if($first){
				$query .= "WHERE pg.ethnicGroup = '".$data['egroup']."' AND dr.name = pg.name";
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
				$query .= "WHERE pg.ethnicGroup != '".$data['egroup_not']."' AND dr.name = pg.name";
				$first = false;
			} else {
				$query .= " AND pg.ethnicGroup != '".$data['egroup_not']."' AND dr.name = pg.name";
			}
		}
		if ($data['hlevel'] != 'any') {
			if ($data['genome'] == 'hg19' && $data['hlevel'] == 'hs') {
				if($first){
					$query .= "WHERE dr.name LIKE '%h%'";
					$first = false;
				} else {
					$query .= " AND dr.name LIKE '%h%'";
				}
			}
			if ($data['hlevel'] == 'rip') {
				if($first){
					$query .= "WHERE dr.name NOT LIKE '%h%'";
					$first = false;
				} else {
					$query .= " AND dr.name NOT LIKE '%h%'";
				}
			}
		}
		if ($data['hsclass'] != 'any') {
			if ($first) {
				$query .= "WHERE dr.remarks LIKE '".$data['hsclass']."<br>%'";
				$first = false;
			} else {
				$query .= " AND dr.remarks LIKE '".$data['hsclass']."<br>%'";
			}
		}
		if ($data['sfamily'] != 'any') {
			if (!$first) {
				$query .= " AND";
			} elseif ($first) {
				$first = false;
				$query .= " WHERE";
			}
			$first = false;
			if ($data['sfamily'] != "LINE" || $data['sfamily'] != "SINE" || $data['sfamily'] != "LTR" || $data['sfamily'] != "Other") {
				$query .= " dr.polyClass LIKE '%".$data['sfamily']."%'";
			} else {
				$query .= " dr.polySubfamily LIKE '".$data['sfamily']."'";
			}
		}
        if ($data['ilevel'] == 'I') {
        	if ($first) {
        		$first = false;
        		$query .= "WHERE dr.name LIKE '%i'";
        	} else {
        		$query .= "AND dr.name LIKE '%i'";
        	}
        }
        if ($data['ilevel'] == 'C') {
        	if ($first) {
        		$first = false;
        		$query .= "WHERE dr.name NOT LIKE '%i'";
        	} else {
        		$query .= " AND dr.name NOT LIKE '%i'";
        	}
        }
        if (!empty($data['disease'])) {
        	if ($data['disease'] == 'all' || $data['disease'] == 'All') {
        		if ($first) {
        			$first = false;
            		$query .= "WHERE dr.disease NOT like 'NA;NA' AND disease NOT LIKE 'NA'";
            	} else {
            		$query .= " AND dr.disease NOT like 'NA;NA' AND disease NOT LIKE 'NA'";
            	}
        	} else {
	            if ($first) {
	            	$first = false;
	            	$query .= "WHERE dr.disease LIKE '%".$data['disease']."%'";
	            } else {
	            	$query .= " AND dr.disease LIKE '%".$data['disease']."%'";
	            }
        	}
        }
        if (!empty($data['author'])) {
        	if ($first) {
        		$first = false;
        		$query .= "WHERE dr.reference LIKE '%".$data['author']."%'";
        	} else {
        		$query .= " AND dr.reference LIKE '%".$data['author']."%'";
        	}
        }
        if (!empty($data['studyID'])) {
        	$studyId = explode(",", $data['studyID']);
        	foreach ($studyId as $id) {
				if ($first) {
	        		$first = false;
	        		$query .= "WHERE dr.reference LIKE '%Study ID</b>:".trim($id)."%'";
	        	} else {
	        		$query .= " OR dr.reference LIKE '%Study ID</b>:".trim($id)."%'";
	        	}
        	}
        }
        // if ($data['rlevel'] != 'any') {
        // 	if ($first) {
        // 		$query .= "WHERE dr,name LIKE '%".$data['rlevel']."'";
        // 	}
        // }
        if ($first) {
        	$first = false;
        	$query .= " WHERE dr.reference LIKE '".$data['studysupport']."'";
        } else {
        	$query .= " AND dr.reference LIKE '".$data['studysupport']."'";
        }
        if ($data['plevel'] == 'any' && $data['pfreqn'] != 'any') {
            $from = "SELECT dr.chrom, dr.chromStart, dr.chromEnd, dr.name, dr.originalId FROM ".$data['genome'].".dbRIP AS dr left join ".$data['genome'].".polyGenotype AS pg on dr.name = pg.name left join ".$data['genome'].".HERVGenotype AS hg on dr.name = hg.name";
            $query .= " GROUP BY dr.name having (sum(pg.plusPlus) + sum(pg.plusMinus) * 0.5)/ (sum(pg.plusPlus) + sum(pg.plusMinus) + sum(pg.minusMinus)) >= " . $data['pfreqn'] . " and (sum(pg.plusPlus) + sum(pg.plusMinus) * 0.5)/ (sum(pg.plusPlus) + sum(pg.plusMinus) + sum(pg.minusMinus)) <=" . $data['pfreqm'] . " or (sum(hg.fltr) + sum(hg.fltrSltr) * 0.5 + sum(hg.fltrPre) * 0.5)/(sum(hg.fltr) + sum(hg.fltrSltr) + sum(hg.fltrPre) + sum(hg.sltrPre) +sum(hg.pre) + sum(hg.sltr))>= " . $data['pfreqn'] . " and (sum(hg.fltr) + sum(hg.fltrSltr) * 0.5 + sum(hg.fltrPre) * 0.5)/(sum(hg.fltr) + sum(hg.fltrSltr) + sum(hg.fltrPre) + sum(hg.sltrPre) +sum(hg.pre) + sum(hg.sltr)) <= " . $data['pfreqm'];
		} elseif ($data['plevel'] != 'any') {
			$from = "SELECT dr.chrom, dr.chromStart, dr.chromEnd, dr.name, dr.originalId FROM ".$data['genome'].".dbRIP AS dr left join ".$data['genome'].".polyGenotype AS pg on dr.name = pg.name left join ".$data['genome'].".HERVGenotype AS hg on dr.name = hg.name";
            if ($data['plevel'] == 'LF') {
                
                $query .= ' GROUP BY dr.name having (sum(pg.plusPlus) + sum(pg.plusMinus) * 0.5)/ (sum(pg.plusPlus) + sum(pg.plusMinus) + sum(pg.minusMinus)) <=0.3 or (sum(hg.fltr) + sum(hg.fltrSltr) * 0.5 + sum(hg.fltrPre) * 0.5)/(sum(hg.fltr) + sum(hg.fltrSltr) + sum(hg.fltrPre) + sum(hg.sltrPre) +sum(hg.pre) + sum(hg.sltr))<= 0.3';

            }
            if ($data['plevel'] == 'IF') {
                
                $query .= ' GROUP BY dr.name having (sum(pg.plusPlus) + sum(pg.plusMinus) * 0.5)/ (sum(pg.plusPlus) + sum(pg.plusMinus) + sum(pg.minusMinus)) > 0.3 and (sum(pg.plusPlus) + sum(pg.plusMinus) * 0.5)/ (sum(pg.plusPlus) + sum(pg.plusMinus) + sum(pg.minusMinus)) <= 0.8 or (sum(hg.fltr) + sum(hg.fltrSltr) * 0.5 + sum(hg.fltrPre) * 0.5)/(sum(hg.fltr) + sum(hg.fltrSltr) + sum(hg.fltrPre) + sum(hg.sltrPre) +sum(hg.pre) + sum(hg.sltr))> 0.3 and (sum(hg.fltr) + sum(hg.fltrSltr) * 0.5 + sum(hg.fltrPre) * 0.5)/(sum(hg.fltr) + sum(hg.fltrSltr) + sum(hg.fltrPre) + sum(hg.sltrPre) +sum(hg.pre) + sum(hg.sltr)) <= 0.8';

            }
            if ($data['plevel'] == 'HF') {

                $query .= ' GROUP BY dr.name having (sum(pg.plusPlus) + sum(pg.plusMinus) * 0.5)/ (sum(pg.plusPlus) + sum(pg.plusMinus) + sum(pg.minusMinus)) <=0.3 or (sum(hg.fltr) + sum(hg.fltrSltr) * 0.5 + sum(hg.fltrPre) * 0.5)/(sum(hg.fltr) + sum(hg.fltrSltr) + sum(hg.fltrPre) + sum(hg.sltrPre) +sum(hg.pre) + sum(hg.sltr))<= 0.8';

            }
        }

        $result = DB::connection($data['genome'])->select($from.$query);

        return $result;
        
	}

	public static function getFileData($file)
	{
		$returndata = array();
		$fh = fopen($file, 'r');
		while (true) {
			$filedata = fgets($fh);
			if ($filedata == "") {
				break;
			}
			$filedata = trim($filedata);
			if (empty($filedata)) {
				continue;
			}
			array_push($returndata, $filedata);
		}
		return $returndata;
	}

}