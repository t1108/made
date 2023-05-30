<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Talkroom;
use App\Models\Comment;
use App\Models\Follow;
use App\Models\Comment_favorite;
use App\Models\Room_favorite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class gamersController extends Controller
{
    private function level_up_process($userId)
    {
        $user = User::find($userId);
        if ($user->level != 999) {
            $user->exp++;
            if ($user->exp % 10 === 0) {
                $user->level++;
                $user->exp = 0;
            }
            $user->save();
        }
    }

    public function showTalkroom(Request $request)
    {
        $talkroomId = $request->get('id');
        $talkroom = Talkroom::find($talkroomId);
        $comments = Comment::where('room_id', $talkroomId)
                    ->with('user')
                    ->orderBy('created_at', 'desc')
                    ->get();    
        $favorites = Comment_favorite::all();
        $bookmark = Room_favorite::query()->get();
        return view('content.talkroom', compact('talkroom','comments','favorites','bookmark'));
    }

    public function deleteTalkroom(Request $request)
    {
        $talkroomId = $request->get('id');
        Talkroom::find($talkroomId)->update(['del_flg' => 1]);
        return redirect()->back();
    }

    public function saveBookmark(Request $request)
    {
        $talkroomId = $request->input('talkroomId');
        $userId = auth()->user()->id;
        $existingBookmark = Room_favorite::where('talkroom_id', $talkroomId)
            ->where('user_id', $userId)
            ->first();

        if ($existingBookmark) {
            $existingBookmark->favorite = 1;
            $existingBookmark->save();
        } else {
            Room_favorite::create([
                'talkroom_id' => $talkroomId,
                'user_id' => $userId,
            ]);
        }
        return response()->json(['message' => 'お気に入り登録しました']);
    }

    public function removeBookmark(Request $request)
    {
        $talkroomId = $request->input('talkroomId');
        $userId = auth()->user()->id;
        Room_favorite::where([
            'talkroom_id' => $talkroomId,
            'user_id' => $userId,
        ])->update(['favorite' => 0]);
        return response()->json(['message' => 'お気に入りを解除しました']);

    }
    
    public function comment_post(Request $request)
    {
        $talkroomId = $request->input('room_id');
        $userId = $request->input('user_id');
        $this->level_up_process($userId); //経験値アップのフラグ
        Comment::create($request->only(['comment', 'user_id', 'room_id','back_color']));
        return redirect()->route('talkroom', ['id' => $talkroomId]);
    }


    public function comment_del(Request $request)
    {
        $commentId = $request->get('id');
        Comment::where('id', $commentId)->delete();
        return redirect()->back();
    }

    public function like(Request $request)
    {
        $commentId = $request->input('commentId');
        $userId = auth()->user()->id;

        $existingFavorite = Comment_favorite::where('comment_id', $commentId)
            ->where('user_id', $userId)
            ->first();

        if ($existingFavorite) {
            $existingFavorite->favorite = 1;
            $existingFavorite->save();
        } else {
            Comment_favorite::create([
                'comment_id' => $commentId,
                'user_id' => $userId,
            ]);
            $comment = Comment::find($commentId);
            $this->level_up_process($comment->user_id); //経験値アップのフラグ
        }

        $comment = Comment::find($commentId);
        $comment->favorite_count++;
        $comment->save();

        return response()->json(['count' => $comment->favorite_count]);
    }

    
    public function unlike(Request $request)
    {
        $commentId = $request->input('commentId');
        $userId = auth()->user()->id;

        Comment_favorite::where([
            'comment_id' => $commentId,
            'user_id' => $userId,
        ])->update(['favorite' => 0]);
            
        $comment = Comment::find($commentId);
        $comment->favorite_count--;
        $comment->save();
            
        return response()->json(['count' => $comment->favorite_count]);
    }



    public function myProfile()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $comments = Comment::where('user_id', $id)
                    ->with('user')
                    ->orderBy('created_at', 'desc')
                    ->get();  
        $rankedComments = Comment::where('user_id', $id)
                    ->select('room_id', DB::raw('count(*) as commentCount'))
                    ->with(['talkroom' => function ($query) {
                        $query->select('id', 'name')->where('del_flg', 0);
                    }])
                    ->whereHas('talkroom', function ($query) {
                        $query->where('del_flg', 0);
                    })
                    ->groupBy('room_id')
                    ->orderByDesc('commentCount')
                    ->get();
        $favorites = Comment_favorite::all();
        $follow = Follow::query()->get();
        $follow_count = $follow->where('follow_id', $id)->count();
        $follower_count = $follow->where('follower_id', $id)->count();

        return view('content.my_profile', compact('user','comments','rankedComments','favorites','follow','follow_count','follower_count'));
    }


    public function profile_edit()
    {
        return view('content.profile_edit');
    }

    public function profile(Request $request)
    {
        $id = $request->get('id');
        if($id == auth()->user()->id){
            return redirect()->route('my_profile');
        }
        $user = User::find($id);
        $comments = Comment::where('user_id', $id)
                    ->with('user')
                    ->orderBy('created_at', 'desc')
                    ->get();  
        $rankedComments = Comment::where('user_id', $id)
                    ->select('room_id', DB::raw('count(*) as commentCount'))
                    ->with(['talkroom' => function ($query) {
                        $query->select('id', 'name')->where('del_flg', 0);
                    }])
                    ->whereHas('talkroom', function ($query) {
                        $query->where('del_flg', 0);
                    })
                    ->groupBy('room_id')
                    ->orderByDesc('commentCount')
                    ->get();
        $favorites = Comment_favorite::all();
        $follow = Follow::query()->get();
        $follow_count = $follow->where('follow_id', $id)->count();
        $follower_count = $follow->where('follower_id', $id)->count();
        return view('content.profile', compact('user','comments','rankedComments','favorites','follow','follow_count','follower_count'));
    }
    
    public function update_confirm(Request $request)
    {
        $file = $request->file('icon');
        if($file == null && auth()->user()->name == $request->name && auth()->user()->explanation == $request->explanation && auth()->user()->name_color == $request->color){
            return redirect()->route('my_profile');
        }
        $request->validate([
            'name' => 'required|max:16',
        ],[
            'name.required' => 'ユーザー名を入力してください'
        ]);
        $db_icon = auth()->user()->icon;
        if($file != null){
            $icon = $file->store('public/images');
            $arr = explode("/",$icon);
            $db_icon = "/storage/images/".end($arr);
        }
        User::profileEdit($request->name,$db_icon,$request->explanation,$request->color);
        return redirect()->route('my_profile')->with('message', '変更を保存しました');
    }

    public function favo()
    {
        $favorites = Room_favorite::where('user_id', auth()->user()->id)
        ->whereHas('talkroom', function ($query) {
            $query->where('del_flg', 0);
        })
        ->where('favorite', 1)
        ->get();

    return view('content.favo', compact('favorites'));
    }
    
    

}



