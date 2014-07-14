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
			<br>
			<a class="btn btn-primary" href="search">Return to Position Mapping</a>
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
					<th>Browser</th>
				</tr>
				</thead>
				<tbody>
				@foreach($results as $result)
				<tr>
					<td>{{$result->chrom}}</td>
					<td>{{$result->chromStart}}</td>
					<td>{{$result->chromEnd}}</td>
					<td>{{$result->name}}</td>
					<td>{{$result->originalId}}</td>
					<td><a href="{{$result->browserLink}}" class="{{$result->browserLinkClass}}" target="_blank">Browser</a></td>
				</tr>
				@endforeach
				</tbody>
			</table>
			@endif
		</div>
	</div>
</div>
@stop