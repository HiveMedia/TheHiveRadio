@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
                <img src="{{$showdata['banner_url']}}"/>
				<div class="panel-heading">{{$showdata['title']}}</div>

				<div class="panel-body">
					{{$showdata['description']}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
