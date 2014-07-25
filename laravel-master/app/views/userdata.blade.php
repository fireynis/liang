@extends('layouts.base')
@section('body')
<div class="container-fluid">
	<div class="row">
		<div class="jumbotron">
			<h1><i style="color: #cc0000" class="fa fa-database"></i> Submit Your Content</h1>
			<p>If you have gathered your own data on transposable elements, and have either
				reinforced the location of a known element or discovered a novel one, we would
				like to add it to our growing database.</p>
		</div>
		@include('nav')
		<div class="col-md-offset-1 col-md-10 center">
			<h3>Please enter your data for the element below</h3>
			<p>If you are unsure if it is novel you can use either our
				<a class="btn btn-primary btn-xs" href="/search">search</a></h3> or our
				<a class="btn btn-primary btn-xs" href="/positionmapping">position mapping tool</a>.
				We are still interested if not as it will add evidence to already discovered elements.
			</p>
			<form class="form-horizontal" role="form" method="post" action="/userdata">
				<div class="form-group">
					<label for="chromosome" class="col-sm-2">Chromosome</label>
					<div class="col-md-2">
						<input name="chromosome" type="text" class="form-control input-sm" id="chromosome">
					</div>
				</div>
				<div class="form-group">
					<label for="start" class="col-sm-2">Start of Element</label>
					<div class="col-md-2">
						<input name="start" type="number" class="form-control input-sm " id="start">
					</div>
				</div>
				<div class="form-group">
					<label for="end" class="col-sm-2">End of Element</label>
					<div class="col-md-2">
						<input name="end" type="number" class="form-control input-sm" id="end">
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-2">Name of Element</label>
					<div class="col-md-2">
						<input name="name" type="text" class="form-control input-sm" id="name">
					</div>
				</div>
				<div class="form-group">
					<label for="fprimer" class="col-sm-2">Forward Primer</label>
					<div class="col-md-2">
						<input name="fprimer" type="text" class="form-control input-sm" id="fprimer">
					</div>
				</div>
				<div class="form-group">
					<label for="rprimer" class="col-sm-2">Reverse Primer</label>
					<div class="col-md-2">
						<input name="rprimer" type="text" class="form-control input-sm" id="rprimer">
					</div>
				</div>
				<div class="form-group">
					<label for="class" class="col-sm-2">Class</label>
					<div class="col-md-2">
						<input name="class" type="text" placeholder="eg SINE" class="form-control input-sm" id="class">
					</div>
				</div>
				<div class="form-group">
					<label for="family" class="col-sm-2">Family</label>
					<div class="col-md-2">
						<input name="family" type="text" placeholder="eg Alu" class="form-control input-sm" id="family">
					</div>
				</div>
				<div class="form-group">
					<label for="sfamily" class="col-sm-2">Subfamily</label>
					<div class="col-md-2">
						<input name="sfamily" type="text" placeholder="eg AluYa5" class="form-control input-sm" id="sfamily">
					</div>
				</div>
				<div class="form-group">
					<label for="disease" class="col-sm-2">Associated Diseases</label>
					<div class="col-md-2">
						<input name="disease" type="text" class="form-control input-sm" id="disease">
					</div>
				</div>
				<div class="form-group">
					<label for="ref" class="col-sm-2">Peer Reviewed Article</label>
					<div class="col-md-2">
						<input name="ref" type="text" class="form-control input-sm" id="ref">
					</div>
				</div>
				<div class="form-group">
					<label for="seq" class="col-sm-2">Sequence of Element</label>
					<div class="col-md-6">
						<textarea class="form-control" rows="4"></textarea>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@stop