<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;

class LiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Search the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if($request->has('keyword')) {
            $searchQuery = $request->get('keyword');

            $results = Youtube::search($searchQuery, 2);

            dd($results);

            $videoIds = [];

            foreach($results as $result) {
                $hoge = $result->id->videoId;
                dd($hoge);
                $array = [
                    'videoId' => $result->id->videoId
                ];
                array_push($videoIds, $array);
            }

            dd($videoIds);
        }

        return view('live.search.result', compact('videoIds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // lyric
        $lyric = new Lyric;
        $lyric->part_of_lyrics = $lyrics_request->part_of_lyrics;
        $lyric->artist = $lyrics_request->artist;
        $lyric->song = $lyrics_request->song;

        $lyric->save();

        $artist_and_song_for_Youtube = $lyric->artist.$space.$lyric->song;

        $youtube_video_id = Youtube::search($artist_and_song_for_Youtube, 1)[0]->id->videoId;

        return redirect()->route('posts.lyrics.index')->with('success_message', ('新しい歌詞を投稿しました'));
    }

    /**
     * Display the specified resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }
}
