@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Our Blog Posts</div>

				<div class="panel-body">
                    @foreach($postsdata as $post)
                        <article>
                            <h2><a href='/b/{{ $post['id'] }}'>{{$post['title']}}</a></h2>
                            <div>
                                {{$post['subject']}}
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
