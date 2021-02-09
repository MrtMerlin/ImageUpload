<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Vote;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('image.create');
    }

    /**
     * @param Request $request
     * @param Image $image
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function view(Request $request, Image $image)
    {
        $votes = $image->votes->where('image_id');

        $upVote = 0;
        $downVote = 0;
        foreach ($votes as $vote) {
            if ($vote->vote_up == 1) {
                $upVote++;
            } else if ($vote->vote_down == 1) {
                $downVote++;
            }
        }

        return view('image.view')->with(compact('image', 'upVote', 'downVote'));
    }

    /**
     * @param Request $request
     * @param Image $image
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(Request $request, Image $image)
    {
        return view('image.update')->with(compact('image'));
    }

    public function save(Request $request, Image $image)
    {

        $action = $image->id ? "updated" : "created";

        if ($action == "created") {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $image = new Image;
            $image->name = $request->file('image')->getClientOriginalName();
            $image->path = $request->file('image')->store('public/images');
            $image->description = $request->input('description');
        }  else {
            $image = Image::query()->where('id', $image->id)->first();
            $image->name = $request->input('name');
            $image->description = $request->input('description');
        }

        $image->save();

        return redirect('/')->with('status','Image Has Been Saved.');
    }

    public function delete(Request $request, Image $image)
    {
        $image = Image::query()->where('id', $image->id)->first();
        $image->delete();
        return redirect('/')->with('status', 'Image has been deleted.');
    }
}
