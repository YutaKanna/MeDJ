<?php

namespace App\Http\Controllers;

use App\Live;
use Alaouy\Youtube\Facades\Youtube;
use Illuminate\Http\Request;

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

            $videoIds = [];
            foreach($results as $result) {
                $array = [
                    'videoId' => $result->id->videoId
                ];
                array_push($videoIds, $array);
            }
        }

        return view('live.search.result', compact('videoIds'));
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request,
     * @return \Illuminate\Http\Response
     */
    public function showUpload(Request $request, $videoId)
    {
        return view('live.upload', ['videoId' => $videoId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function Upload(Request $request, $videoId)
    {
        $live = new Live;
        $live->video_id = $videoId;
        $startTime = floor($request->startTime);
        $live->start_time = $startTime;
        $live->finish_time = $startTime + 15;

        $live->save();

        return redirect()->route('top');
    }
}