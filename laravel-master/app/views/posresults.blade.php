@extends('layouts.base')
@section('body')

<div class="jumbotron">
    <h1>Positional Mapping</h1>
    <p>is designed to allow users, in a batch style, to compare a new list of RIPs with RIPs in dbRIP and identify which are novel (not in dbRIP) and which are known (overlap with RIPs in dbRIP). The search is based on the genome locations of RIPs in the selected version of the reference genome. Input data can be provided either via copy-paste into the text area below in a delimited text file for uploading. In both cases, the input list is formated in one entry per line and with the first three columns by order being chromosome, chromStart and chromEnd either in BED format (e.g. chr1:20000-20005) or separated by tab.</p>
</div>
@include('nav')