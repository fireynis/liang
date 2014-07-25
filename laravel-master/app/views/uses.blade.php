@extends('layouts.base')
@section('body')
<div class="jumbotron">
	<h1><i style="color: #cc0000" class="fa fa-cogs"></i> Uses of dbRIP</h1>
	<p>A few examples</p>
</div>
@include('nav')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-offset-1 col-md-10 center">
			<br>
			<dl>
				<dt>Querying Retrotransposon Insertion Polymorphisms (RIPs)</dt>
				<dd>
				Using <a class="btn btn-primary btn-xs" href="/search" target="_blank"><b>SearchdbRIP</b></a>,
				you may query RIPs by RIP IDs, RIP subfamily, gene context, ethnic
				group name, allele frequency, disease association, etc. Using
				<a target="_blank" class="btn btn-primary btn-xs" href="http://genome.brocku.ca/cgi-bin/hgGateway?org=Human&amp;db=hg17&amp;hgsid=453">
				<b>Genome Gateway</b></a>, you may query RIPs by genetic IDs (gene IDs, accessions, STS, etc), and chromosome locations; Using
				<a target="_blank" class="btn btn-primary btn-xs" href="http://genome.brocku.ca/cgi-bin/hgBlat?command=start"><b>BLAT</b></a>
				you may search RIP by DNA or protein sequences.
				</dd><hr>
				<dt>Identifying RIPs associated with particular genes</dt>
				<dd>
				To do this, you identify the gene of your interest as you normally do with
				the UCSC browser and then check the polymorphic RIP tracks for the
				presence of polymorphic insertions. By clicking on the individual RIP,
				you can obtain detailed information for each polymorphic locus with
				regard to sequences (flanking, TSDs, elements), classification,
				primers, disease association, location in gene context, and publications
				describing the polymorphism (click when RIP subfamily ID is displayed
				by mouse over the RIP tick) (<a class="btn btn-success btn-xs" href="http://genome.brocku.ca/cgi-bin/hgc?hgsid=453&o=1574335&t=1637541&g=dbRIPAlu&i=1001461&c=chr1&r=1574335&l=1637541&db=hg18" target = "_blank">example</a>).
				</dd><hr>
				<dt>Genome-wide browsing of RIPs</dt>
				<dd>
				You can pick a chromosome or a particular genomic region and browse all available RIPs in this
				region along with other genome information provided in the UCSC
				genome browser.
				</dd><hr>
				<dt>Verifying newly identified retrotransposon insertions</dt>
				<dd>
				Check to see whether a putatively new insertion represents a
				previously known polymorphic locus or is a novel polymorphic locus.
				</dd><hr>
				<dt>Genome-wide view of all RIPs from one selected class or all classes (Genome plots)</dt>
				<dt>Downloading the entire set of RIP data</dt>
				<dd>
				The downloadable files include
				the sequences of the elements and/or flanking regions for large scale
				analyses, such as studying the trend of new insertions and identifying insertions
				specific to a particular ethnic group, etc.
				</dd><hr>
			</dl>
			<p>For information related to UCSC Genome Browser, please visit <a class="btn btn-success btn-xs" href="http://genome.ucsc.edu">UCSC Genome Website</a>.</p>

		</div>
	</div>
	<br><br>
</div>
@stop