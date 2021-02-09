<?php

namespace App\Http\Controllers;

use App\Models\Image;

class WelcomeController extends Controller
{
    /**
     * @param Image $image
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Image $image)
    {
        $images = $image->all();

        return view('home')->with(compact('images'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function about()
    {
        return view('about');
    }
}
