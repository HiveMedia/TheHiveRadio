@extends('app')

@section('content')
    <div class="full-content site-dashboard">

        <div class="panel-heading"><h1>Our Shows</h1></div>

        <div class="panel-body">
            <table border="0">
                <tr>
                    <th> Show Name</th>
                    <th> Actions </th>
                </tr>
                @foreach($postsdata as $post)

                    <tr>
                        <td>{{$post['title']}}</td>
                        <td>
                            {!! Html::link('admin/s/d/'.$post['id'],'Delete') !!} |
                            {!! Html::link('admin/s/e/'.$post['id'],'Edit') !!} |
                            {!! Html::link('admin/s/h/'.$post['id'],'Toggle Publicity') !!} <br/>
                            <hr>
                            {!! Html::link('admin/s/u/'.$post['id'],'Upload Ep') !!} |
                            {!! Html::link('admin/s/s/'.$post['id'],'Show Eps') !!}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
