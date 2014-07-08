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
			<?php var_dump($results); ?>
		</div>
	</div>
</div>
@stop