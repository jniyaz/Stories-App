<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // \DB::enableQueryLog();
        $query = Story::with('user')->where('status', 1);

        // Filters
        $type = request()->input('type');
        in_array($type, ['short', 'long']) ? $query->where('type', $type) : null;

        $stories = $query->orderBy('id', 'DESC')->paginate(2);
        
        return view('dashboard.index', compact('stories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  object  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        $story = Story::where('slug', $story->slug)->first();
        return view('dashboard.show', compact('story'));
    }
}
