@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="mt-4 mx-auto">
                    @if ($live)
                    <iframe id="player" width="560" pause="810" height="315" src="https://www.youtube.com/embed/{{ $live->video_id }}?start={{ $live->start_time }}&end={{ $live->finish_time }}&showinfo=0&rel=0&fs=0&modestbranding=1&enablejsapi=1&autoplay=1&controls=0" frameborder="0" allowfullscreen></iframe>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
