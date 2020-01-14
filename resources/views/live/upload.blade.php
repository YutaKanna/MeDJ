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
  done = true;
}
}

function stopVideo() {
player.stopVideo();
}

</script>

<style>
    .btn {
        padding: 10px 24px;
        border: 0 none;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: black;
        background: yellow;
        display: inline-block;
        border-radius: 25px;
        text-decoration: none;
        transition: .4s;
        width: 150px;
    }
    .btn:hover {
        color: black;
    }
</style>

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="mt-4 mx-auto">
                    <form method="POST" action="{{ route('live.upload', $videoId) }}">
                        @csrf

                        <i id="upload" class="fas fa-cut fa-5x" style="color: #55acee;" onclick="ShowSaveBtn(), ShowResetBtn()"></i>
                        <iframe id="player" width="560" pause="810" height="315" src="https://www.youtube.com/embed/{{ $videoId }}?rel=0&fs=0&modestbranding=1&enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <button type="submit" id="save" class="btn mt-3 mx-auto center-block">保存する</button>
                        <input type="hidden" name="uploading" value="{{ $currentTime ?? null }}" />
                    <form>
                    <button type="submit" id="reset" class="btn mt-3 mx-auto center-block">リセット</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // ハサミ
        var ytPause = document.getElementById('upload');
        ytPause.addEventListener('click', function() {
            player.pauseVideo();
            var currentTime = player.getCurrentTime();
        });

        // リセット
        var ytPlay = document.getElementById('reset');
        ytPlay.addEventListener('click', function() {
            player.playVideo();
        });

        // 保存する
        document.getElementById("save").style.display ="none";

        function ShowSaveBtn(){
            const p1 = document.getElementById("save");

            if(p1.style.display=="block"){
                // noneで非表示
                p1.style.display ="none";
            }else{
                // blockで表示
                p1.style.display ="block";
            }
        }

        document.getElementById("reset").style.display ="none";

        function ShowResetBtn(){
            const p1 = document.getElementById("reset");

            if(p1.style.display=="block"){
                // noneで非表示
                p1.style.display ="none";
            }else{
                // blockで表示
                p1.style.display ="block";
            }
        }
    </script>
@endsection