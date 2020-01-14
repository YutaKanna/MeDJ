@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($videoIds as $key => $videoId)
                <a href="{{ route('live.show.upload-screen', $videoId) }}">
                    <img class="mt-1" src="https://img.youtube.com/vi/{{ $videoIds[$key]['videoId'] }}/mqdefault.jpg">
                </a>
            @endforeach
        </div>
    </div>
@endsection