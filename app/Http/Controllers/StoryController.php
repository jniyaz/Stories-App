<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $stories = Story::where('user_id', $userId)
                            ->orderBy('id', 'DESC')
                            ->paginate(3);

        return view('story.index', compact('stories'));
    }

    public function show(int $id)
    {
        $story = Story::where('id', $id)->first();
        
        return view('story.show', compact('story'));
    }
}