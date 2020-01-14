@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="mt-4 mx-auto">
                    <iframe id="player" width="560" pause="810" height="315" src="https://www.youtube.com/embed/{{ $live->video_id }}?start={{ $live->start_time }}&end={{ $live->finish_time }}&rel=0&fs=0&modestbranding=1&enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
