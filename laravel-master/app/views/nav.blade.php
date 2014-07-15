<nav id="scroll" class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
			<a href="/" class="navbar-brand">Dr. Liang's Lab</a>
		<ul class="nav navbar-nav">
	        @foreach ($links as $linkkey => $linkvalue) 
	            <li class="{{Request::path() == $linkvalue ? 'active':''}}"><a href="{{URL::to($linkvalue)}}">{{$linkkey}}</a></li>
	        @endforeach
	        <li class="dropdown">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		      More <span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu">
		    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::to('description')}}">Description</a></li>
		    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::to('uses')}}">dbRIP Usage</a></li>
		    </ul>
			<li><a href="http://genomics.brocku.ca:8080/cgi-bin/hgBlat?command=start">BLAT</a></li>
			<li class="{{Request::path() == 'reference' ? 'active':''}}"><a href="/reference">References</a></li>
			<li><a target="_blank" href="http://genome.ucsc.edu/">UCSC Genomes</a></li>
		</ul>
		</div>
</nav>
<nav id="holder" class="navbar navbar-default" style="display:none"></nav>
