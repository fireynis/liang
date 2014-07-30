<nav id="scroll" class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#liang-menu">
				<span class="sr-only">Toggle navigation</span>
				<span class="fa fa-bars"></span>
			</button>
			<a href="/" class="navbar-brand">Dr. Liang's Lab</a>
		</div>
		<div class="collapse navbar-collapse" id="liang-menu">
			<ul class="nav navbar-nav">
		        <li class="{{Request::path() == '/' ? 'active':''}}"><a href="{{URL::to('/')}}">Home</a></li>
		        <li class="{{Request::path() == 'search' ? 'active':''}}"><a href="{{URL::to('search')}}">Search</a></li>
		        <li class="{{Request::path() == 'positionmapping' ? 'active':''}}"><a href="{{URL::to('positionmapping')}}">Position Mapping</a></li>
		        <li class="{{Request::path() == 'usercontent' ? 'active':''}}"><a href="{{URL::to('usercontent')}}">Submit Your Data</a></li>
		        <li><a href="http://genomics.brocku.ca:8080/cgi-bin/hgBlat?command=start">BLAT</a></li>
				<li class="{{Request::path() == 'reference' ? 'active':''}}"><a href="/reference">References</a></li>
				<li><a target="_blank" href="http://genome.ucsc.edu/">UCSC Genomes</a></li>
				<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">More <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::to('description')}}">Description</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::to('uses')}}">dbRIP Usage</a></li>
				</ul>
			</ul>
		</div>
	</div>
</nav>
<nav id="holder" class="navbar navbar-default" style="display:none"></nav>
