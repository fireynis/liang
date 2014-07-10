<?php

class positionMapping {

    public static function posMap($data, $genome, $file) {

		if (!$file) {
			$queries = preg_split('/\s+/', $data['data']);
		} else {
			$queries = $data;
		}

	    if (empty($data['exval'])) {
	        $exval = 20;
	    } else {
		    $exval = $data['exval'];
	    }

	    $i = 0;

	    foreach ($queries as $each) {
		    $temp = explode(':', $each);
		    $chr = trim($temp[0]);
		    $temp = explode('-', $temp[1]);
		    $start = trim($temp[0]);
		    $end = trim($temp[1]);
		    $check = DB::connection($genome)->select("SELECT chrom, chromStart, chromEnd, name, originalId FROM dbRIP WHERE chrom LIKE '".$chr."' AND chromStart BETWEEN ".($start-$exval)." AND ".($start+$exval)." AND chromEnd BETWEEN ".($end-$exval)." AND ".($end+$exval));
		    if (count($check) > 0) {
			    $result[$i] = $check;
			    $i++;
		    }
	    }

	    if($i == 0) {
		    return  'empty';
	    }

	    return $result;

    }

}
