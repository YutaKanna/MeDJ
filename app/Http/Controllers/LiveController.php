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
     * Store a newly created resource in storage.
     *
     * @param Request $request,
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request, $videoId)
    {
        return view('live.upload', ['videoId' => $videoId]);
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
