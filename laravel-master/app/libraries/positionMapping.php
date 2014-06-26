<?php

class positionMapping {

    public static function positionMapping() {

        $data = DB::connection('hg19')->select("SELECT name, originalId, chrom,chromStart, chromEnd, polySubfamily FROM dbRIP");

    }

}