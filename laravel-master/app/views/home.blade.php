@extends('layouts.base')
@section('body')
<div class="container-fluid">
	<div class="row">
		<div class="jumbotron home">
			<h1><img src="img/brock-50th-118.png"> Brock University dbRIP</h1>
			<p class="lead">A database of retrotransposon insertion polymorphisms in humans</p>
		</div>
@include('nav')
		<div class="col-md-offset-1 col-md-10 center">
			<h1>Recent Announcements/Updates</h1>
			<dl class="dl-horizontal">
				<dt>[06/01/2013]</dt>
				<dd>We started to use study IDs to facilitate search of
				MEIs in dbRIP that are associated with specific studies. The data for
				an individial study are also available as one downloadable file. The full list of
				study IDs is avaibable at <a href="http://genomics.brocku.ca:8080/dbRIP_ref.html">here.</a>
				</dd>
				<hr>

				<dt>[1/12/2012]</dt>
				<dd>As a heads-up, we are working on depositing a subset
				of RIPs reported by the 1000 genome project and adding a track for
				human-specific retrotransposon insertions, and will try to make them
				available at dbRIP in the near future.
				</dd>
				<hr>

				<dt>[1/12/2012]</dt>
				<dd>A utility has been added to allow other sites to link
				directly to dbRIP based on dbRIP and genome ID using a format like <a href="cgi-bin/link2dbripByID.cgi?dbripid=1000002&amp;genome=hg18">
				"http://dbrip.org/cgi-bin/link2dbripByID.cgi?dbripid=1000002&amp;genome=hg18"</a>,
				in which the "1000002" and "hg18" are to be replaced by the actual
				dbRIP ID and genome ID, respectively. Currently, this service is only
				available for hg18 and hg19, while the entries
				containing incomplete sequence (e.g. 1000001i) available only for hg19.
				</dd>
				<hr>

				<dt>[4/2/2011]</dt>
				<dd>A dataset representing 483 Alu insertions with
				incomplete insertion sequences identified using ME-SCAN as described in Witherspoon et al,
				BMC Genomics 11:410, 2010 has been deposited. These entries are denoted by
				a letter "i" at the end of the dbRIP accession#, e.g.: "1000002i" for differentiating from the regular RIP entries. They may be upgraded to
				the regular entries later once complete sequence information becomes
				available.  The data is available by setting the "sequence integrity level" to "incomplete" in SearchdbRIP. Please
				note that the data is only available in hg19.
				</dd>
				<hr>

				<dt>[3/30/2011]</dt>
				<dd>dbRIP v2h released: added new L1 RIP data based on Kidd
				et al. Cell 143:837-1847, 2010 from Fosmid-end sequencing. Total entries retrieved and
				curated: 191 (135 novel, 56 overlapping with existing RIPs in
				dbRIP). The data can be checked using author name,
				e.g. "Kidd" or "Eichler" in SearchdbRIP
				</dd>
				<hr>

				<dt>[10/5/2010]</dt>
				<dd>A new and stable dbRIP ID system is
				implemented in this test version. This system uses 7-digit
				numerical IDs, with the first digit used to indicate the major
				type of retrotransposons (1xxxxxx, 2xxxxxx, 3xxxxxx, 4xxxxxxx
				for Alu, L1, SVA and HERV, respectively). For example, dbRIP
				1000001 is an Alu RIP, while 2000100 is a L1. The remaining
				5 digits (5-9) are saved for new types of RIPs and for accommodating
				existing types that exceed 1 million in number.
				</dd>
				<hr>

				<dt>[10/5/2010]</dt>
				<dd>dbRIP obtained its new and permernent URL:
				<a href="http://dbRIP.org">dbRIP.org</a>
				</dd>
				<hr>

				<dt>[9/1/2010]</dt>
				<dd>HERV RIP data is added. For HERV RIPs with the
				presence of both full length LTR and solo-LTR, we provide both
				versions of the sequences and genotype data whenever available.
				</dd>
				<hr>

				<dt>[5/1/2010]</dt>
				<dd>The PositionMapping utility is added. This is
				useful for users with a need of comparing a list of newly
				identified candidate RIPs with data in dbRIP.
				</dd>
				<hr>

				<dt>[2/1/2010]</dt>
				<dd>dbRIP data to hg19 is provided.</li></dd>
				<hr>

				<dt>[12/15/2009]</dt>
				<dd>A test version of dbRIP with updated data
				(data from venter diploid genome) for both hg17 and hg18 is now
				available. Starting from hg18, the dbRIP ID is changed to a new
				system, in which a serial ID is used (e.g. "dbRIP_Alu_00001") to
				replace the old chr_Mbp_ID system. The new ID system provides
				stability not affected by the genome migration.
				</dd>
				<hr>

				<dt>[12/01/2008]</dt>
				<dd>dbRIP was relocated to <a href="http://dbRIP.brocku.ca">http://dbRIP.brocku.ca</a> from falcon.roswellpark.org:8080/ as of January 1, 2009.</dd>
				<hr>
			</dl>
		</div>
	</div>
</div>
@stop
