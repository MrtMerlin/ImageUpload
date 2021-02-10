<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Vote;
use Illuminate\Http\Request;
use Response;

class VoteController extends Controller
{
    /**
     * @param Request $request
     */
    public function makeVote(Request $request)
    {
        // create new vote
        $vote = new Vote;
        $vote->image_id = $request->input('image_id');
        if ($request->input('voteVal') == 'up') {
            $vote->vote_up = 1;
            $vote->vote_down = 0;
        } else {
            $vote->vote_up = 0;
            $vote->vote_down = 1;
        }
        $vote->save();
    }
}
