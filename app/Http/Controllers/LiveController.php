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
    public function Upload(Request $request)
    {
        $uploadingStartTime = $request->uploadingStartTime;
        $uploadingFinishTime = $uploadingStartTime + 15;

        return redirect()->route('top');
    }
}