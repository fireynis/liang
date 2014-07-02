@extends('layouts.base')
@section('body')
<div class="jumbotron">
    <h1>Position Mapping</h1>
    <p>Using our databases you can determine if a transposable element you have found is novel or not. If there is a match within our database it is not novel.</p>
</div>
@include('nav')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-1 col-md-10 center">
            <h3>Search</h3>
            <p>Use the below text area to paste in a transposable element in the form of chr(1-9XY):start-finish. Each entry
                should be on a new line.</p>
            <p>Example:</p>
                <samp>chr1:7583132-7584649</samp><br>
                <samp>chr19:57787844-57789418</samp><br>
                <samp>chr14:20044209-20044610</samp><br><br>
            <form role="form">
                <div class="form-group">
                    <label class="control-label col-md-2">Enter data here</label>
                    <textarea name="data" class="form-control" rows="10"></textarea>
                </div>
                <p class="lead">If you would like to upload a file you may choose it below</p>
                <p>The entries must be each on a new line, the same as the text entries above</p>
                <label class="control-label">Select File:</label>
                <input type="file">
            </form>
            <br><br><br>
        </div>
    </div>
</div>
<br><br><br>
@stop