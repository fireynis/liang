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
						<input name="chromosome" type="text" placeholder="eg chr4/chrX/chrY" value="{{Input::old('chromosome')}}" class="form-control input-sm" id="chromosome">
					</div>
					@if($errors->has('Chromosome'))
					<div class="bg-danger col-md-3 round"><i class="fa fa-times" style="color:red"></i> {{$errors->first('Chromosome')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="start" class="col-md-2">Start of Element</label>
					<div class="col-md-2">
						<input name="start" type="number" class="form-control input-sm " value="{{Input::old('start')}}" id="start">
					</div>
					@if($errors->has('Start of Element'))
					<div class="bg-danger col-md-3 round"><i class="fa fa-times" style="color:red"></i> {{$errors->first('Start of Element')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="end" class="col-md-2">End of Element</label>
					<div class="col-md-2">
						<input name="end" type="number" class="form-control input-sm" value="{{Input::old('end')}}" id="end">
					</div>
					@if($errors->has('End of Element'))
					<div class="bg-danger col-md-3 round"><i class="fa fa-times" style="color:red"></i> {{$errors->first('End of Element')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="name" class="col-md-2">Name of Element</label>
					<div class="col-md-4">
						<input name="name" type="text" placeholder="eg 1002173" class="form-control input-sm" value="{{Input::old('name')}}" id="name">
					</div>
					@if($errors->has('Name'))
					<div class="bg-danger col-md-3 round"><i class="fa fa-times" style="color:red"></i> {{$errors->first('Name')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="fprimer" class="col-md-2">Forward Primer</label>
					<div class="col-md-4">
						<input name="fprimer" type="text" placeholder="eg GATCAGG" class="form-control input-sm" value="{{Input::old('fprimer')}}" id="fprimer">
					</div>
				</div>
				<div class="form-group">
					<label for="rprimer" class="col-md-2">Reverse Primer</label>
					<div class="col-md-4">
						<input name="rprimer" type="text" placeholder="eg GATCAGG" class="form-control input-sm" value="{{Input::old('rprimer')}}" id="rprimer">
					</div>
				</div>
				<div class="form-group">
					<label for="class" class="col-md-2">Class</label>
					<div class="col-md-2">
						<input name="class" type="text" placeholder="eg SINE" class="form-control input-sm" value="{{Input::old('class')}}" id="class">
					</div>
					@if($errors->has('Class'))
					<div class="bg-danger col-md-3 round"><i class="fa fa-times" style="color:red"></i> {{$errors->first('Class')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="family" class="col-md-2">Family</label>
					<div class="col-md-2">
						<input name="family" type="text" placeholder="eg Alu" class="form-control input-sm" value="{{Input::old('family')}}" id="family">
					</div>
					@if($errors->has('Family'))
					<div class="bg-danger col-md-3 round"><i class="fa fa-times" style="color:red"></i> {{$errors->first('Family')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="sfamily" class="col-md-2">Subfamily</label>
					<div class="col-md-2">
						<input name="sfamily" type="text" placeholder="eg AluYa5" class="form-control input-sm" value="{{Input::old('sfamily')}}" id="sfamily">
					</div>
				</div>
				<div class="form-group">
					<label for="region" class="col-md-2">Genomic Region</label>
					<div class="col-md-4">
						<input name="region" type="text" placeholder="eg intron:PDCL2:NM:152401:1/6 or intergenic, exon, intron" class="form-control input-sm" id="region">
					</div>
					@if($errors->has('Genomic Region'))
					<div class="bg-danger col-md-3 round"><i class="fa fa-times" style="color:red"></i> {{$errors->first('Genomic Region')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="disease" class="col-md-2">Associated Diseases</label>
					<div class="col-md-4">
						<input name="disease" type="text" placeholder="eg cancer, huntington's" class="form-control input-sm" value="{{Input::old('disease')}}" id="disease">
					</div>
				</div>
				<div class="form-group">
					<label for="submitter" class="col-md-2">Your Name</label>
					<div class="col-md-4">
						<input name="submitter" type="text" class="form-control input-sm" value="{{Input::old('submitter')}}" id="submitter">
					</div>
					@if($errors->has('Your Name'))
					<div class="bg-danger col-md-3 round"><i class="fa fa-times" style="color:red"></i> {{$errors->first('Your Name')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="email" class="col-md-2">Your Email</label>
					<div class="col-md-4">
						<input name="email" type="text" class="form-control input-sm" value="{{Input::old('email')}}" id="email">
					</div>
					@if($errors->has('Your Email'))
					<div class="bg-danger col-md-3 round"><i class="fa fa-times" style="color:red"></i> {{$errors->first('Your Email')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="institution" class="col-md-2">Your Institution</label>
					<div class="col-md-4">
						<input name="institution" type="text" class="form-control input-sm" value="{{Input::old('institution')}}" id="institution">
					</div>
					@if($errors->has('Your Institution'))
					<div class="bg-danger col-md-3 round"><i class="fa fa-times" style="color:red"></i> {{$errors->first('Your Institution')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="ref" class="col-md-2">Peer Reviewed Publication Status</label>
					<div class="col-md-4">
						<select name="ref" class="form-control input-sm"  id="ref" >
							<option {{(Input::old('ref') == 'manuscript' ) ? 'selected':''}} value="manuscript">Manuscript</option>
							<option {{(Input::old('ref') == 'submitted' ) ? 'selected':''}} value="submitted">Submitted</option>
							<option {{(Input::old('ref') == 'published' ) ? 'selected':''}} value="published">Published</option>
						</select>
					</div>
				</div>
				<div class="form-group pubHide">
					<label for="pub" class="col-md-2">If published please provide a link to the article:</label>
					<div class="col-md-4">
						<input name="pub" type="text" class="form-control input-sm" value="{{Input::old('pub')}}" id="pub">
					</div>
					@if($errors->has('Article'))
					<div class="bg-danger col-md-3 round"><i class="fa fa-times" style="color:red"></i> {{$errors->first('Article')}}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="seq" class="col-md-2">Sequence of Element</label>
					<div class="col-md-6">
						<textarea name="seq" id="seq" class="form-control" rows="4">{{Input::old('seq')}}</textarea>
					</div>
					@if($errors->has('Sequence of Element'))
					<div class="bg-danger col-md-3 round"><i class="fa fa-times" style="color:red"></i> {{$errors->first('Sequence of Element')}}</div>
					@endif
				</div>
				<button type="submit" class="btn btn-success">Submit</button>
			</form>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.pubHide').hide();
		if ($('#ref').val() == 'published') {
			$('.pubHide').show();
		}
		$('#ref').on('change', function() {
			if ( this.value == 'published')
			//.....................^.......
			{
				$(".pubHide").show();
			}
			else
			{
				$(".pubHide").hide();
			}
		});
	});
</script>
@stop