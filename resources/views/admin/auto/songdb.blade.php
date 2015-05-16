@extends('app')

@section('content')
    <div class="full-content site-dashboard" ng-app="THR" ng-controller="AutoDJMusicSearch">
        <h1 style="text-align: center;">AutoDJ Songs</h1>
        {!! Form::label('Search:') !!}
        {!! Form::text('Search', null, ['class' => 'imacssclass', 'ng-model' => 'query', 'ng-keyup' =>'search()' ]) !!}
        <hr>
            <div>
            <% text %>


                <ul>
                    <div ng-repeat="song in songs">
                        <a href="#" ng-click="showDetails = ! showDetails"><% song.Artist %> - <% song.Title %></a>

                        <div ng-show="showDetails">
                            <hr />
                            <a href="{{URL::to('/')}}/admin/autodj/edit/<% song.ID %>">Edit</a>


                            <h5> Album Details </h5>
                            Album: <% song.Album %> | Track: <% song.TrackNo %> | Title: <% song.Title %> | Artist: <% song.Artist %> <br/>
                            Album Arist: <% song.AlbumArtist %> | Genre: <% song.Genre %> | Length: <% song.SongLen %><br/>
                            Comment: <% song.Comment %> <br/>
                            <h5> User Input </h5>
                            Last Requested: <% song.LastReq %> | Request Count:  <% song.ReqCount %> <br/>
                            Rating: <% song.Rating %> | Rating Votes: <% song.RatingVotes %> <br/>
                            Last Listeners: <% song.LastListeners %><br/>
                            <h5> File Details </h5>
                            URL: <% song.URL %><br/>
                            File Name: <% song.FN %><br/>
                            Last Played: <% song.LastPlayed %><br/>
                            Play Count: <% song.PlayCount %><br/>
                            <h6>Misc Detials</h6>
                            ID: <% song.ID %><br/>
                            Path: <% song.Path %><br/>
                            Last Modified: <% song.mTime %><br/>
                            Seen: <% song.Seen %><br/>
                            Checked: <% song.Checked %><br/>
                            Is playing: <% song.IsPlaying %><br/>
                        </div>
                        <hr/>
                    </div>

                </ul>
            </div>
        <hr/>
    </div>
@endsection
