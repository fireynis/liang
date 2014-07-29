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
			<form class="form-horizontal" role="form" method="post" action="/usercontent" id="submission">
				<div class="form-group">
					<label for="chromosome" class="col-md-2">Chromosome</label>
					<div class="col-md-2">
						<input name="chromosome" type="text" placeholder="eg chr4/chrX/chrY" class="form-control input-sm" id="chromosome">
					</div>
					@if($errors->has('Chromosome'))
					<div class="alert alert-danger col-md-3">{{$errors->first('Chromosome')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="start" class="col-md-2">Start of Element</label>
					<div class="col-md-2">
						<input name="start" type="number" class="form-control input-sm " id="start">
					</div>
					@if($errors->has('Start of Element'))
					<div class="alert alert-danger alert-sm col-md-3">{{$errors->first('Start of Element')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="end" class="col-md-2">End of Element</label>
					<div class="col-md-2">
						<input name="end" type="number" class="form-control input-sm" id="end">
					</div>
					@if($errors->has('End of Element'))
					<div class="alert alert-danger col-md-3">{{$errors->first('End of Element')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="name" class="col-md-2">Name of Element</label>
					<div class="col-md-4">
						<input name="name" type="text" placeholder="eg 1002173" class="form-control input-sm" id="name">
					</div>
					@if($errors->has('Name of Element'))
					<div class="alert alert-danger col-md-3">{{$errors->first('Name of Element')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="fprimer" class="col-md-2">Forward Primer</label>
					<div class="col-md-4">
						<input name="fprimer" type="text" placeholder="eg GATCAGG" class="form-control input-sm" id="fprimer">
					</div>
				</div>
				<div class="form-group">
					<label for="rprimer" class="col-md-2">Reverse Primer</label>
					<div class="col-md-4">
						<input name="rprimer" type="text" placeholder="eg GATCAGG" class="form-control input-sm" id="rprimer">
					</div>
				</div>
				<div class="form-group">
					<label for="class" class="col-md-2">Class</label>
					<div class="col-md-2">
						<input name="class" type="text" placeholder="eg SINE" class="form-control input-sm" id="class">
					</div>
					@if($errors->has('Class'))
					<div class="alert alert-danger col-md-3">{{$errors->first('Class')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="family" class="col-md-2">Family</label>
					<div class="col-md-2">
						<input name="family" type="text" placeholder="eg Alu" class="form-control input-sm" id="family">
					</div>
					@if($errors->has('Family'))
					<div class="alert alert-danger col-md-3">{{$errors->first('Family')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="sfamily" class="col-md-2">Subfamily</label>
					<div class="col-md-2">
						<input name="sfamily" type="text" placeholder="eg AluYa5" class="form-control input-sm" id="sfamily">
					</div>
				</div>
				<div class="form-group">
					<label for="region" class="col-md-2">Genomic Region</label>
					<div class="col-md-4">
						<input name="region" type="text" placeholder="eg intron:PDCL2:NM:152401:1/6 or intergenic, exon, intron" class="form-control input-sm" id="region">
					</div>
					@if($errors->has('Genomic Region'))
					<div class="alert alert-danger col-md-3">{{$errors->first('Genomic Region')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="disease" class="col-md-2">Associated Diseases</label>
					<div class="col-md-4">
						<input name="disease" type="text" placeholder="eg cancer, huntington's" class="form-control input-sm" id="disease">
					</div>
				</div>
				<div class="form-group">
					<label for="submitter" class="col-md-2">Your Name</label>
					<div class="col-md-4">
						<input name="submitter" type="text" class="form-control input-sm" id="submitter">
					</div>
					@if($errors->has('Your Name'))
					<div class="alert alert-danger col-md-3">{{$errors->first('Your Name')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="ref" class="col-md-2">Peer Reviewed Article</label>
					<div class="col-md-4">
						<input name="ref" type="text" placeholder="Link to published article, such as PubMed" class="form-control input-sm" id="ref">
					</div>
					@if($errors->has('Peer Reviewed Article'))
					<div class="alert alert-danger col-md-3">{{$errors->first('Peer Reviewed Article')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="seq" class="col-md-2">Sequence of Element</label>
					<div class="col-md-6">
						<textarea name="seq" id="seq" class="form-control" rows="4"></textarea>
					</div>
					@if($errors->has('Sequence of Element'))
					<div class="alert alert-danger col-md-3">{{$errors->first('Sequence of Element')}}</div>
					@endif
				</div>
				<button type="submit" class="btn btn-success">Submit</button>
			</form>
		</div>
	</div>
</div>
@stop