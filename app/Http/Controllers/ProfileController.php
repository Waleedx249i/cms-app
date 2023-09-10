<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\Profile;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $profile = profile::find($id);
        $posts = $profile->user->post;
        return view('profile.show')->with('profile', $profile)->with('posts',$posts);
    }

    public function edit(profile $profile)
    {
       
       if (Auth::user()->can('edit',$profile)) {
        return view('profile.edit')->with('profile', $profile);
           
       } else {
        $posts = $profile->user->post;
        return redirect(route('profile.show',$profile->id));
       }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);
        if (Auth::user()->can('edit',$profile)) {
          

        // Validate the form data
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'about' => 'nullable|string|max:255',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'insta' => 'nullable|url|max:255',
            
        ]);

        // Update the profile image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images', 'public');
            $profile->image = $imagePath;
        }
        
        // Update the about field
        $profile->about = $request->input('about');

        // Update the Facebook field
        $profile->facebook = $request->input('facebook');

        // Update the Twitter field
        $profile->twitter = $request->input('twitter');
        
        // Update the insta field
        $profile->insta = $request->input('insta');

        // Save the updated profile profile
        $profile->save();

        return redirect(route('profile.show',$profile->id));
        } else {
            $posts = $profile->user->post;
            return view('profile.show')->with('profile', $profile)->with('posts',$posts);
        }
        
    }

  




}