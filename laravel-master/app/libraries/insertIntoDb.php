<?php

class insertIntoDb {

	public static function insert($data) {
		if(is_null($data->sfamily) || empty($data->sfamily)) {
			$data->sfamily = "N/A";
		}
		if(is_null($data->disease) || empty($data->disease)) {
			$data->disease = "N/A";
		}
		Submissions::insert(array('chrom' => $data->chromosome, 'chromStart' => $data->start, 'chromEnd' => $data->end, 'name' => $data->name, 'forwardPrimer' => $data->fprimer, 'reversePrimer' => $data->rprimer, 'polyClass' => $data->class, 'polyFamily' => $data->family, 'polySubfamily' => $data->sfamily, 'polySeq' => $data->seq, 'polySource' => $data->submitter, 'reference' => $data->ref, 'genoRegion' => $data->region));
	}

} 