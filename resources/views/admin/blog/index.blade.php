@extends('app')

@section('content')
    <div class="full-content site-dashboard">

                    <div class="panel-heading"><h1>Our Blog Posts</h1></div>

                    <div class="panel-body">
                        <table border="1">
                            <tr>
                                <th>Topic</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($postsdata as $post)

                                <tr>
                                    <td>{{$post['title']}}</td>
                                    <td>
                                        {!! Html::link('admin/b/d/'.$post['id'],'Delete') !!} |
                                        {!! Html::link('admin/b/e/'.$post['id'],'Edit') !!} |
                                        {!! Html::link('admin/b/h/'.$post['id'],'Toggle Publicity') !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

@endsection
