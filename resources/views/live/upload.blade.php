@extends('layouts.app')

@section('head')
<script type="text/javascript">
</script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="mt-4 mx-auto">
                    <i class="fas fa-cut fa-5x" style="color: #55acee;"></i>
                    <iframe width="560" pause="810" height="315" src="https://www.youtube.com/embed/{{ $videoId }}?rel=0&fs=0&modestbranding=1&enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection