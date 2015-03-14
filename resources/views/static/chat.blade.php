@extends('app')

@section('content')
<div class="full-content header-center">
    <h2>Chat</h2>
    <object type="application/x-shockwave-flash" data="{{URL::to('/')}}/lightIRC/lightIRC.swf" width="100%" height="400" id="lightIRC" style="visibility: visible;">
        <param name="flashvars" value="autojoin=#TheHive&amp;showNickSelection=true&amp;showIdentifySelection=true&amp;host=irc.canternet.org&amp;nick=Drone%2525&amp;styleURL=css/black.css">
    </object>
</div>
@endsection
