<?php

class insertIntoDb {

	public static function insert($data) {
		if(is_null($data->sfamily) || empty($data->sfamily)) {
			$data->sfamily = "NA";
		}
		if(is_null($data->disease) || empty($data->disease)) {
			$data->disease = "NA";
		}
		if(is_null($data->fprimer) || empty($data->fprimer)) {
			$data->fprimer = "NA";
		}
		if(is_null($data->rprimer) || empty($data->rprimer)) {
			$data->rprimer = "NA";
		}
		if(is_null($data->region) || empty($data->region)) {
			$data->region = "NA";
		}
		if(isset($data->asc_method)){
			$spacer = "";
			foreach ($data->asc_method as $data) {
				$method .= $spacer.$data;
				$spacer = ';';
			}
		}

		$id = Submissions::insertGetId(array('chrom' => $data->chromosome, 'chromStart' => $data->start, 'chromEnd' => $data->end, 'name' => $data->name, 'forwardPrimer' => $data->fprimer, 'reversePrimer' => $data->rprimer, 'polyClass' => $data->class, 'polyFamily' => $data->family, 'polySubfamily' => $data->sfamily, 'polySeq' => $data->seq, 'polySource' => $data->submitter, 'reference' => $data->ref, 'genoRegion' => $data->region, 'ascertainingMethod' => $method));
	}

} 