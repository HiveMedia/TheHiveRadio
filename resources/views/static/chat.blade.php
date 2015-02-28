@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="site-content">

                <div class="site-content full-content">
                    <div class="site-content heading"><h3>Chat</h3></div>
                    <object type="application/x-shockwave-flash" data="/lightIRC/lightIRC.swf" width="100%" height="400" id="lightIRC" style="visibility: visible;">
                        <param name="flashvars" value="autojoin=#TheHive&amp;showNickSelection=true&amp;showIdentifySelection=true&amp;host=irc.canternet.org&amp;nick=Drone%2525&amp;styleURL=css/black.css">
                    </object>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection
