<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Talkroom;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $id = $request->id;
        $name = $request->name;
        $file = $request->file('image');
        $request->validate([
            'image' => 'required',
            'name' => 'required|max:16',
        ],[
            'image.required' => '画像を選択してください。',
            'name.required' => 'タイトルを入力してください',
            'name.max' => '16字以内で入力してください。',
        ]);
        if($file != null){
            $icon = $file->store('public/images');
            $arr = explode("/",$icon);
            $db_icon = "/storage/images/".end($arr);
        }
        Talkroom::create([
            'name' => $name,
            'image' => $db_icon,
            'user_id' => $id,
        ]);
        return redirect()->Route('home');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
