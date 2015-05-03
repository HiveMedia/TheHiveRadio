@extends('app')

@section('content')
    <div class="full-content site-dashboard">

        <div class="panel-heading"><h1>Our Users</h1></div>

        <div class="panel-body">
            <table border="0">
                <tr>
                    <th>User - Rank</th>
                    <th>Actions</th>
                </tr>
                @foreach($usersdata as $user)

                    <tr>
                        <td>{{$user['name']}} - {{$user['role']}}</td>
                        <td>
                            {!! Html::link('admin/u/d/'.$user['id'],'Delete') !!} |
                            {!! Html::link('admin/u/e/'.$user['id'],'Edit') !!} |
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
