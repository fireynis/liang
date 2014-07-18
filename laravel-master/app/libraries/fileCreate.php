<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 18/07/14
 * Time: 5:19 PM
 */

class fileCreate {

	public static function makeFile($results, $genome) {

		$fileName = "SearchRIP".(int)(time()+rand(1,1000))."_".date('Y-m-d');

		$length = 0;

//		foreach ($results as $data) {
//			$info = DB::connection($genome)->select("SELECT * FROM dbRIP WHERE name = '".$data->name."'");
//			if (strlen($info[0]->polySeq) > $length) {
//				$Seqlength = strlen($info[0]->polySeq);
//			}
//		}

		foreach ($results as $data) {
			$info = DB::connection($genome)->select("SELECT * FROM dbRIP WHERE name = '".$data->name."'");
			File::append('/home/liang/public_html/tmp/'.$fileName, $info[0]->name."\t".$info[0]->chrom."\t".$info[0]->chromStart."\t".$info[0]->chromEnd."\t".$info[0]->forwardPrimer."\t".$info[0]->reversePrimer."\n".$info[0]->polyClass."\t".$info[0]->polyFamily."\t".$info[0]->polySubfamily."\n".$info[0]->polySeq."\n");
			File::append('/home/liang/public_html/tmp/'.$fileName, "------------------------------------------------------------------------------------------------\n");
		}
		return $fileName;
	}
}