@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($videoIds as $key => $videoId)
                <iframe class="mt-1" width="368" height="225" src="https://www.youtube.com/embed/{{ $videoIds[$key]['videoId'] }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            @endforeach
        </div>
    </div>
@endsection