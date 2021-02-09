<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Vote;
use Illuminate\Http\Request;
use Response;

class VoteController extends Controller
{
    public function makeVote(Request $request)
    {
        $vote = new Vote;
        $vote->image_id = $request->input('image_id');
        if ($request->input('voteVal') == 'up') {
            $vote->vote_up = 1;
        } else {
            $vote->vote_down = 1;
        }
        $vote->save();
    }
}
