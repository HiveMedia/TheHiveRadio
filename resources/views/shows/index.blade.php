@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Our Shows</div>

				<div class="panel-body">
                    @foreach($showsdata as $show)
                        <article>
                            <h2><a href='/s/{{ $show['id'] }}'>{{$show['title']}}</a></h2>
                            <div>
                                {{$show['description_short']}}
                            </div>
                            <hr />
                        </article>
                    @endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection