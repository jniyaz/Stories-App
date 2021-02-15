<?php

namespace App\Http\Controllers\Admin;

use App\Story;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoriesController extends Controller
{
    public function index()
    {
        $stories = Story::onlyTrashed()
                        ->with('user')
                        ->orderBy('id', 'DESC')
                        ->paginate(5);
                        
        return view('admin.stories.index', compact('stories'));
    }
}
