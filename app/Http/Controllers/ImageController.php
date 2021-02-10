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
        // get votes for the image to be viewed.
        $votes = $image->votes->where('image_id');

        $upVote = 0;
        $downVote = 0;
        // for to get up and down votes, for display on the view page.
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

    /**
     * @param Request $request
     * @param Image $image
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(Request $request, Image $image)
    {
        // if image id exists update.
        $action = $image->id ? "updated" : "created";


        if ($action == "created") {
            // validate image which will be created.
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            // create new image, with attributes name, path and description.
            $image = new Image;
            $image->name = $request->file('image')->getClientOriginalName();
            $image->path = $request->file('image')->store('public/images');
            $image->description = $request->input('description');
        }  else {
            // query for image with the image->id.
            $image = Image::query()->where('id', $image->id)->first();
            $image->name = $request->input('name');
            $image->description = $request->input('description');
        }
        $image->save();

        return redirect('/')->with('status','Image Has Been Saved.');
    }

    /**
     * @param Request $request
     * @param Image $image
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function delete(Request $request, Image $image)
    {
        $image = Image::query()->where('id', $image->id)->first();
        $image->delete();
        return redirect('/')->with('status', 'Image has been deleted.');
    }
}
