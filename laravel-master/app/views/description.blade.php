@extends('layouts.base')
@section('body')
<div class="jumbotron home">
	<h1><img src="img/brock-50th-118.png"> Brock University dbRIP</h1>
	<p class="lead">A database of retrotransposon insertion polymorphisms in humans</p>
</div>
@include('nav')
<div class="container-fluid">
	<div class="col-md-offset-1 col-md-10 center">
		<p>
		<h3>Retrotransposons</h3> Constitute over 40% of the human genome and consist of several millions of family members.  They play important roles in shaping the structure and evolution of the genome and in
		participating in gene functioning and regulation. Since L1, <i>Alu</i>, and SVA retrotransposons are currently active in the human genome, their recent and ongoing
		retrotranspositional insertions generate a unique and important class of
		genetic polymorphisms (for the presence or absence of an insertion)
		among and within human populations. As such, they are useful genetic
		markers in population genetics studies due to their identical-by-descent
		and essentially homoplasy-free nature. Additionally, some polymorphic insertions are known to be responsible for a variety of human genetic diseases. <strong>dbRIP</strong> is a database of human <strong>Retrotransposon Insertion Polymorphisms (RIPs)</strong>, in which RIPs are highly
		integrated into the human genome annotation data provided by <a href="http://genome.ucsc.edu"><strong>UCSC Genome Browser</strong></a>. dbRIP contains all currently known <i>Alu</i>, L1, and SVA polymorphic insertion loci in the human genome.
		</p>
		<br><br>
	</div>
</div>