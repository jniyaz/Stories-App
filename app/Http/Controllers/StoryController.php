<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Story;
use App\Mail\NewStory;
use Illuminate\Http\Request;
use App\Http\Requests\StoryRequest;
use Intervention\Image\Facades\Image;
// use Illuminate\Support\Facades\Gate;

class StoryController extends Controller
{

    public function __construct()
    {
        // define policy for all methods in the class
        // this policy only works in resource controllers
        $this->authorizeResource(Story::class, 'story'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(5);
        return view('story.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $story = new Story;
        $tags = Tag::get();
        return view('story.create', compact('story', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryRequest $request)
    {
        $story = auth()->user()->stories()->create($request->all());

        if($request->hasFile('image')) {
            $this->_uploadImage($request, $story);
        }

        if($request->tags) {
            $story->tags()->sync($request->tags);
        }

        // Log info
        // \Log::info('A story with title ' . $story->title . ' was added.');
        
        // Mail Notification
        // \Mail::send(new NewStory($story->title));

        return redirect()->route('story.index')->with('status', 'Story added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  object  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        $story = Story::where('id', $story->id)->first();
        return view('story.show', compact('story'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  object  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        // Gate::authorize('edit-story', $story);

        // $this->authorize('update', $story);
        $tags = Tag::get();
        $story = Story::where('id', $story->id)->first();

        return view('story.edit', compact('story', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  object $story
     * @return \Illuminate\Http\Response
     */
    public function update(StoryRequest $request, Story $story)
    {
        $story->update($request->all());
        
        if($request->hasFile('image')) {
            $this->_uploadImage($request, $story);
        }

        if($request->tags) {
            $story->tags()->sync($request->tags);
        }

        return redirect()->route('story.index')->with('status', 'Story saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        $story->delete();
        return redirect()->route('story.index')->with('status', 'Story deleted successfully');
    }

    private function _uploadImage($request, $story)
    {
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'story' . '-' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('storage/stories/' . $filename);
            Image::make($image)->resize(300, 300)->save($location);
            $story->image = $filename;
            $story->save();
        }
    }
}   
