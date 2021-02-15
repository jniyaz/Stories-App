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

    public function restore(int $id)
    {
        $story = Story::withTrashed()->findOrFail($id);
        $story->restore();
        return redirect()->route('admin.story.index')->with('status', 'Story restored successfully');
    }

    public function destroy(int $id)
    {
        $story = Story::withTrashed()->findOrFail($id);
        $story->forceDelete();
        return redirect()->route('admin.story.index')->with('status', 'Story deleted successfully');
    }
}
