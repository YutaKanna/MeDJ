@extends('layouts.app')

@section('head')
<script type="text/javascript">

//api用のJSを読み込む
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

//APIを実行
 var player;
  function onYouTubeIframeAPIReady() {
	player = new YT.Player("player",{
	events: {
        'onReady': onPlayerReady,//API呼び出しの受信を開始する準備ができると起動
        'onStateChange': onPlayerStateChange// プレーヤーの状態が変わると起動
      }
	});
  }

//関数
function onPlayerReady(event) {
event.target.playVideo();
}

//関数（以下は再生後2秒で止まる）
var done = false;
function onPlayerStateChange(event) {console.log(3);
if (event.data == YT.PlayerState.PLAYING && !done) {
  setTimeout(stopVideo, 2000);
  done = true;
}
}

function stopVideo() {
player.stopVideo();
}

</script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="mt-4 mx-auto">
                    <i class="fas fa-cut fa-5x" style="color: #55acee;"></i>
                    <iframe id="player" width="560" pause="810" height="315" src="https://www.youtube.com/embed/{{ $videoId }}?rel=0&fs=0&modestbranding=1&enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <button id="hoge">再生</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var ytPause = document.getElementById('hoge');
        ytPause.addEventListener('click', function() {
            player.pauseVideo();
        });
    </script>
@endsection