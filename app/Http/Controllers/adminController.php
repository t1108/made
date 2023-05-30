<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\Talkroom;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function userlist()
    {
        if (auth()->user()->role == 0) {
            $users = User::all();

            return view('admin.userlist',['users' => $users]);
        } 
        abort(403, 'このページにアクセスする権限がありません。');
    }

    public function userdetail(Request $request)
    {
        if (auth()->user()->role == 0) {
            $user = User::findOrFail($request->id);
            $rankedComments = Comment::where('user_id', $request->id)
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

            return view('admin.user_detail', compact('user','rankedComments'));
        }
        abort(403, 'このページにアクセスする権限がありません。');
    }

    public function accountStatus(Request $request, $id)
    {
        if (auth()->user()->role == 0) {
            User::where('id', $id)->update([
                'account_status' => $request->status
            ]);
            
            return redirect()->route('user_detail',['id' => $id]);
        }
        abort(403, 'このページにアクセスする権限がありません。');
    }

    public function deletedRoom()
    {
        if (auth()->user()->role == 0) {
            $deleteds = Talkroom::where('del_flg', 1)->get();
            return view('admin.deleted_room', compact('deleteds'));
        } 
        abort(403, 'このページにアクセスする権限がありません。');
    }

    public function deletePermanently(Request $request)
    {
        if (auth()->user()->role == 0) {
            Talkroom::find($request->get('id'))->delete();
            return redirect()->back();
        } 
        abort(403, 'このページにアクセスする権限がありません。');
    }

    public function restoration(Request $request)
    {
        if (auth()->user()->role == 0) {
            Talkroom::find($request->get('id'))->update(['del_flg' => 0]);
            return redirect()->back();
        }
        abort(403, 'このページにアクセスする権限がありません。');
    }
    
}
