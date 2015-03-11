@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Our Shows</div>

                    <div class="panel-body">
                        <table border="1"><tr><th>Topic</th><th> Action </th></tr>
                        @foreach($postsdata as $post)

                                <tr><td>{{$post['title']}}</td>
                                <td>
                                    {!! Html::link('admin/s/d/'.$post['id'],'Delete') !!} |
                                    {!! Html::link('admin/s/e/'.$post['id'],'Edit') !!} |
                                    {!! Html::link('admin/s/h/'.$post['id'],'Toggle Publicity') !!}
                                </td>
                                </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
