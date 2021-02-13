<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $stories = Story::where('user_id', $userId)->orderBy('id', 'DESC')->paginate(5);

        return view('story.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('story.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'type' => 'required',
            'status' => 'required'
        ]);
        
        auth()->user()->stories()->create([
            'title' => $request->title, 
            'body' => $request->body, 
            'type' => $request->type, 
            'status' => $request->status
        ]);

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
        $story = Story::where('id', $story->id)->first();
        return view('story.edit', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  object $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'type' => 'required',
            'status' => 'required'
        ]);

        $story->update($data);

        return redirect()->route('story.index')->with('status', 'Story saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
