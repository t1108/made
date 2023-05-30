<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Models\Follower;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function followList()
    {    
        $follows = Follow::where('follow_id', auth()->user()->id)->with('user')->get();
        return view('content.follow', compact('follows'));
    }

    public function followerList()
    {
        $followers = Follower::where('follower_id', auth()->user()->id)->with('user')->get();
        return view('content.follower', compact('followers'));
    }


    public function followProcess(Request $request)
    {
        $followId = auth()->user()->id;
        $followerId = $request->followerId;
        Follow::create([
            'follow_id' => $followId,
            'follower_id' => $followerId,
        ]);
        Follower::create([
            'follower_id' => $followerId,
            'follow_id' => $followId,
        ]);
        $follow = Follow::query()->get();
        $follower_count = $follow->where('follower_id', $followerId)->count();
        return response()->json(['count' => $follower_count]);
    }

    public function removeFollow(Request $request)
    {
        $followId = auth()->user()->id;
        $followerId = $request->followerId;
        Follow::where('follow_id',$followId)
            ->where('follower_id',$followerId)
            ->delete();
        Follower::where('follower_id',$followerId)
            ->where('follow_id',$followId)
            ->delete();
        $follow = Follow::query()->get();
        $follower_count = $follow->where('follower_id', $followerId)->count();
        return response()->json(['count' => $follower_count]);
    }
}
