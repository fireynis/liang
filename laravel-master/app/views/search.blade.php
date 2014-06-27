@extends('layouts.base')
@section('body')
<div class="jumbotron">
    <h1>Database SNP and Transposon Search</h1>
    <p>We have collected and maintained a full genomic database which you can use to search for SNP and Transposons quickly and easily.</p>
</div>
@include('nav')

<div class="container-fluid">
<div class="row">
<div class="col-md-offset-1 col-md-10 center">
@if (isset($results))
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Chromosome</th>
            <th>Start</th>
            <th>End</th>
            <th>dbRIP ID</th>
            <th>Original ID's</th>
        </tr>
        </thead>
        <tbody>
        @foreach($results as $chrom)
        <tr>
            <td>{{$chrom->chrom}}</td>
            <td>{{$chrom->chromStart}}</td>
            <td>{{$chrom->chromEnd}}</td>
            <td>{{$chrom->name}}</td>
            <td>{{$chrom->originalId}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@elseif (isset($quickResults))
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Search</th>
            <th>Chromosome</th>
            <th>Start</th>
            <th>End</th>
            <th>dbRIP ID</th>
            <th>Original ID's</th>
        </tr>
        </thead>
        <tbody>
        @foreach($quickResults as $chrom => $info)
        @if($info == 'empty')
        <tr>
            <td>{{$chrom}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @else
        <tr>
            <td>{{$chrom}}</td>
            <td>{{$info[0]->chrom}}</td>
            <td>{{$info[0]->chromStart}}</td>
            <td>{{$info[0]->chromEnd}}</td>
            <td>{{$info[0]->name}}</td>
            <td>{{$info[0]->originalId}}</td>
        </tr>
        @endif
        @endforeach
        </tbody>
    </table>
</div>
@else
{{Form::open(array('url' => '/quicksearch', 'role' => 'form', 'files' => true))}}
<div class="form-group">
    <h2>Quick Search</h2>
    <p class="lead">Search dbRIP by databaseIDs, by originalIDs or by locations</p>
    <p class="small">(e.g. 1001461, Ya5NBC132, chr7, chrY:1-20000, etc.. Multiple IDs/locations should be delimited by commas)</p>
    {{Form::label('quicksearch', 'Search By Id')}}
    {{Form::text('quicksearch', null, array('placeholder'=>'e.g. 1001461, Ya5NBC132', 'class' => 'form-control'))}}
    <br>
    {{Form::label('genomeselect', 'In Genome ')}}
    {{Form::select('genome', array('hg19' => 'hg19', 'hg18' => 'hg18', 'hg17' => 'hg17'), 'hg19')}}
    <p class="lead">If you would like to up load a file, the entries must be one per line</p>
    <p class="small">(e.g. 1001461, Ya5NBC132, chr7, chrY:1-20000 each on a new line)</p>
    {{Form::label('searchfile', "Select File")}}
    {{Form::file('searchfile')}}
    <br>
    {{Form::submit('Search', array('class' => 'btn btn-success'))}}
    {{Form::close()}}
</div>
<div>
<h2>Advanced Search</h2>
<p>Search our database by selecting from the options below</p>
<hr>
<form action="/advancedsearch" method="post" class="form-horizontal" role="form">
<h4>Genome</h4>
<div class="form-group">
    <label class="control-label col-md-3">Select a genome</label>
    <div class="col-md-4">
        <select class="form-control input-sm" name="genome">
            <option value="hg19" selected="selected">hg19</option>
            <option value="hg18">hg18</option>
            <option value="hg17">hg17</option>
        </select>
    </div>
</div>
<h4>Search by RE position: </h4>
<div class="form-group">
    <label  class="control-label col-md-3">Select a chromosome</label>
    <div class="col-md-4">
        <select class="form-control input-sm" name="chr">
            <option value="all" selected="selected">all </option>
            <option value="chr1">chr1 </option>
            <option value="chr2">chr2 </option>
            <option value="chr3">chr3 </option>
            <option value="chr4">chr4 </option>
            <option value="chr5">chr5 </option>
            <option value="chr6">chr6 </option>
            <option value="chr7">chr7 </option>
            <option value="chr8">chr8 </option>
            <option value="chr9">chr9 </option>
            <option value="chr10">chr10 </option>
            <option value="chr11">chr11 </option>
            <option value="chr12">chr12 </option>
            <option value="chr13">chr13 </option>
            <option value="chr14">chr14 </option>
            <option value="chr15">chr15 </option>
            <option value="chr16">chr16 </option>
            <option value="chr17">chr17 </option>
            <option value="chr18">chr18 </option>
            <option value="chr19">chr19 </option>
            <option value="chr20">chr20 </option>
            <option value="chr21">chr21 </option>
            <option value="chr22">chr22 </option>
            <option value="chrX">chrX </option>
            <option value="chrY">chrY </option>
        </select>
    </div>
</div>
<br>
<div class="form-group">
    <label class="control-label col-md-3">Genomic region</label>
    <div class="col-md-4">
        <select class="form-control input-sm" name="location">
            <option value="all" selected="selected">all </option>
            <option value="exon">exons </option>
            <option value="intron">introns </option>
            <option value="promoter">promoters </option>
            <option value="downstream">downstream</option>
            <option value="intergenic">intergenic regions</option>
        </select>
    </div>
</div>
<br>
<h4>Search by source:</h4>
<div class="form-group">
<label class="control-label col-md-3">Inserstion identified from:</label>
    <div class="col-md-4">
        <select class="form-control input-sm" name="source">
            <option value="all" selected="selected">Any</option>
            <option value="UCSC">UCSC</option>
            <option value="Venter">Venter</option>
            <option value="1000">1000 Genome Projects</option>
            <option value="Other">Other</option>
        </select>
    </div>
</div>
<br>
<div class="form-group">
    <label class="control-label col-md-3">From ethnic group: </label>
    <div class="col-md-4">
        <select class="form-control input-sm" name="egroup">
            <option value="any" selected="selected">any </option>
            <option value="African American">African American </option>
            <option value="Asian">Asian </option>
            <option value="Asian/Alaskan Native">Asian/Alaskan Native </option>
            <option value="Baka_Pygmy">Baka Pygmy</option>
            <option value="Burunge">Burunge</option>
            <option value="Chinese">Chinese</option>
            <option value="Egyptian">Egyptian </option>
            <option value="Egyptian/South American">Egyptian/South American </option>
            <option value="European">European </option>
            <option value="European/German Caucasian">European/German Caucasian </option>
            <option value="Japanese">Japanese</option>
            <option value="Mayan">Mayan</option>
            <option value="M. East">Middle East</option>
            <option value="Mex_Indian">Mex Indian</option>
            <option value="Native_American">Native American </option>
            <option value="N_Europe">Northern European</option>
            <option value="Russian">Russian</option>
            <option value="South American">South American </option>
            <option value="SE_Asian">South East Asian</option>
        </select>
    </div>
</div>
<br>
<div class="form-group">
    <label class="control-label col-md-3">And/or not from ethnic group</label>
    <div class="col-md-4">
        <select class="form-control input-sm" name="egroup_not">
            <option value="blank" selected="selected">N/A </option>
            <option value="African American">African American </option>
            <option value="Asian">Asian </option>
            <option value="Asian/Alaskan Native">Asian/Alaskan Native </option>
            <option value="Baka_Pygmy">Baka Pygmy</option>
            <option value="Burunge">Burunge</option>
            <option value="Chinese">Chinese</option>
            <option value="Egyptian">Egyptian </option>
            <option value="Egyptian/South American">Egyptian/South American </option>
            <option value="European">European </option>
            <option value="European/German Caucasian">European/German Caucasian </option>
            <option value="Japanese">Japanese</option>
            <option value="Mayan">Mayan</option>
            <option value="M. East">Middle East</option>
            <option value="Mex_Indian">Mex Indian</option>
            <option value="Native_American">Native American </option>
            <option value="N_Europe">Northern European</option>
            <option value="Russian">Russian</option>
            <option value="South American">South American </option>
            <option value="SE_Asian">South East Asian</option>
        </select>
    </div>
</div>
<br>
<h4>Search by RE classification:</h4>
<div class="form-group">
    <label class="control-label col-md-3">Data type</label>
    <div class="col-md-4">
        <select class="form-control input-sm" name="hlevel">
            <option value="any" selected="selected">any</option>
            <option value="rip">RIP</option>
            <option value="hs">HS-RE</option>
        </select>
    </div>
    <i>HS-RE is only available for hg19</i>
</div>
<br>
<div class="form-group">
    <label class="control-label col-md-3">HS-RE classes</label>
    <div class="col-md-4">
        <select class="form-control input-sm" name="hsclass">
            <option value="any" selected="selected">any</option>
            <option value="Class I">Class I</option>
            <option value="Class Ib">Class Ib</option>
            <option value="Class III">Class III</option>
            <option value="Class IIIb">Class IIIb</option>
        </select>
    </div>
</div>
<br>
<div class="form-group">
    <label class="control-label col-md-3">Subfamily</label>
    <div class="col-md-4">
        <select class="form-control input-sm" name="sfamily">
            <option selected="" value="any">any </option>
            <option value="LTR">HERV </option>
            <option value="Other">SVA</option>
            <option value="LINE">all L1 </option>
            <option value="L1Ta">L1Ta </option>
            <option value="L1Hs">L1HS </option>
            <option value="L1PA2">L1PA2 </option>
            <option value="L1PA3">L1PA3 </option>
            <option value="L1PA4">L1PA4 </option>
            <option value="L1PA5">L1PA5 </option>
            <option value="NCLI">NCLI </option>
            <option value="SINE">all Alu </option>
            <option value="Sx">Sx </option>
            <option value="Sp">Sp </option>
            <option value="Sq">Sq </option>
            <option value="Y">Y </option>
            <option value="Ya1">Ya1 </option>
            <option value="Ya2">Ya2 </option>
            <option value="Ya3">Ya3 </option>
            <option value="Ya4">Ya4 </option>
            <option value="Ya5">Ya5 </option>
            <option value="Ya8">Ya8 </option>
            <option value="Yb3">Yb3 </option>
            <option value="Yb7">Yb7 </option>
            <option value="Yb8">Yb8 </option>
            <option value="Yb9">Yb9 </option>
            <option value="Yb10">Yb10 </option>
            <option value="Yc">Yc </option>
            <option value="Yc1">Yc1 </option>
            <option value="Yc2">Yc2 </option>
            <option value="Yd3">Yd3 </option>
            <option value="Yd6">Yd6 </option>
            <option value="Yd8">Yd8 </option>
            <option value="Ye2">Ye2 </option>
            <option value="Yf1">Yf1 </option>
            <option value="Yg6">Yg6 </option>
            <option value="Yh9">Yh9 </option>
            <option value="Yi6">Yi6 </option>
            <option value="Yj">Yj </option>
            <option value="Yx">Yx </option>
            <option value="NCAI">NCAI </option>
        </select>
    </div>
</div>
<br>
<h4>Search by RE frequency:</h4>
<div class="form-group">
    <label class="control-label col-md-3">Polymorphism frequency from</label>
    <div class="col-md-2">
        <select class="form-control input-sm" name="pfreqn">
            <option value="any" selected="selected">any </option>
            <option value="0">0 </option>
            <option value="0.1">0.1 </option>
            <option value="0.2">0.2 </option>
            <option value="0.3">0.3 </option>
            <option value="0.4">0.4 </option>
            <option value="0.5">0.5 </option>
            <option value="0.6">0.6 </option>
            <option value="0.7">0.7 </option>
            <option value="0.8">0.8 </option>
            <option value="0.9">0.9 </option>
        </select>
    </div>
    <div class="col-md-1"><strong>to</strong></div>
    <div class="col-md-2">
        <select class="form-control input-sm" name="pfreqm">
            <option value="any" selected="selected">any</option>
            <option value="0.1">0.1 </option>
            <option value="0.2">0.2 </option>
            <option value="0.3">0.3 </option>
            <option value="0.4">0.4 </option>
            <option value="0.5">0.5 </option>
            <option value="0.6">0.6 </option>
            <option value="0.7">0.7 </option>
            <option value="0.8">0.8 </option>
            <option value="0.9">0.9 </option>
            <option value="1.0">1.0 </option>
        </select>
    </div>
</div>
<br>
<div class="form-group">
    <label class="control-label col-md-3">Polymorphism levels</label>
    <div class="col-md-4">
        <select class="form-control input-sm" name="plevel">
            <option value="any" selected="selected">any </option>
            <option value="LF">Low frequency </option>
            <option value="IF">Intermediate frequency </option>
            <option value="HF">High frequency</option>
        </select>
    </div>
</div>
<br>
<h4>Other:</h4>
<!-- <label class="control-label">Resolution level of </label>
<select class="form-control input-sm" name="rlevel">
    <option value="any" selected="selected">any</option>
    <option value="R">regional</option>
    <option value="P">positional</option>
</select>
<br> -->
<div class="form-group">
    <label class="control-label col-md-3">Sequence integrity level of </label>
    <div class="col-md-4">
        <select class="form-control input-sm" name="ilevel">
            <option value="any" selected="selected">any</option>
            <option value="I">incomplete</option>
            <option value="C">complete</option>
        </select>
        <i>Available for HG19 only</i>
    </div>
</div>
<br>
<br>
<div class="form-group">
    <label for="disease" class="control-label col-md-3">Associated with disease</label>
    <div class="col-md-5">
        <input type="text" class="input-sm form-control" id="disease" name="disease" placeholder="Type in a disease name or 'all' or leave it blank">
    </div>
</div>
<div class="form-group">
    <label for="author" class="control-label col-md-3">Published by author</label>
    <div class="col-md-5">
        <input type="text" class="input-sm form-control" id="author" name="author" placeholder="Last name only, e.g. 'Batzer'. Case sensitive, you can leave it blank">
    </div>
</div>
<div class="form-group">
    <label for="studyID" class="control-label col-md-3">Group by study ID (Study ID's can be found <a href="http://genomics.brocku.ca:8080/dbRIP_ref.html" target="_blank">here</a>)</label>
    <div class="col-md-5">
        <input type="text" class="input-sm form-control" id="studyID" name="studyID" placeholder="Multiple Study IDs should be delimited by commas">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3">Insertion supported by</label>
    <div class="col-md-4">
        <select class="form-control input-sm" name="studysupport">
            <option value="%" selected="selected">1 or more</option>
            <option value="%Study ID%Study ID%">2 or more</option>
            <option value="%Study ID%Study ID%Study ID%">3 or more</option>
        </select>
    </div>
</div>
<br>
<input class="btn btn-success" value="Search" type="submit">
</form>
<br>
</div>
@endif
</div>
</div>
<br><br><br><br>
</div>
@stop