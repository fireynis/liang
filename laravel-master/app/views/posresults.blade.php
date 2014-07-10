@extends('layouts.base')
@section('body')
<div class="jumbotron">
	<h1>Position Mapping</h1>
	<p>Results are listed below</p>
</div>
@include('nav')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-offset-1 col-md-10 center">
			@if ($results == "empty")
			<br>
				<p>There were no matches found.</p>
			<br>
			@else
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
				@foreach($results as $result)
				<tr>
					<td>{{$result[0]->chrom}}</td>
					<td>{{$result[0]->chromStart}}</td>
					<td>{{$result[0]->chromEnd}}</td>
					<td>{{$result[0]->name}}</td>
					<td>{{$result[0]->originalId}}</td>
				</tr>
				@endforeach
				</tbody>
			</table>
			@endif
		</div>
	</div>
</div>
@stop