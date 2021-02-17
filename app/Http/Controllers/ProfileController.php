<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }   

    public function update(ProfileRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->save();

        if(!$user->profile) {
            $user->profile()->create($request->all());
        }

        $user->profile()->update($request->only(['biography', 'address', 'phone']));

        return redirect()->route('profile.edit')->with('status', 'Profile saved successfully');
    }
}
