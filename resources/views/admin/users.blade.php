@extends('app')

@section('content')

    <div class="panel-heading">Our Users</div>

    <div class="panel-body">
        <table border="1">
            <tr>
                <th>User</th>
                <th>Action</th>
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
@endsection
