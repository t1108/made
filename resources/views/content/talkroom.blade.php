@extends('layouts.app')
@section('content')
<div class="room-header">
    <div><img src="{{ $talkroom->image }}" width="150px" height="100px"></div>
    <div class="room-name">
         {{ $talkroom->name }}
    </div>
    <div class="comment-post room-favo">
            @php
            $isBookmark = $bookmark->where('user_id', auth()->user()->id)
                            ->where('talkroom_id', $talkroom->id)
                            ->where('favorite', 1)
                            ->isNotEmpty();
            @endphp
        <button class="btn btn-outline-dark btn-bookmark" type="button" data-talkroom-id="{{ $talkroom->id }}">{{ $isBookmark ? 'お気に入り解除' : 'お気に入り登録' }}</button>
    </div>
    <div class="comment-post">
        <button class="btn btn-outline-dark post_submit" type="button">投稿</button>
    </div>
</div>

<div class="list talk-window">
    @foreach($comments as $comment)
    <div class="list white-back back-pastel-{{ $comment->back_color }}">
        <div class="header-icon flex-icon">
            <div class="comment-icon"><a href="{{ route('profile',['id' => $comment->user->id]) }}"><img src="{{ $comment->user->icon }}"  width="36px" height="36px" alt="icon" ></a></div>
            <div class="comment-name"><a class="{{ $comment->user->name_color }}" href="{{ route('profile',['id' => $comment->user->id]) }}">{{ $comment->user->name }}</a></div>
            <div class="user-level">&nbsp;Lv{{ $comment->user->level }}</div>
            <div class="date">{{ $comment->created_at }}</div>
        </div>
        <div class="comment-body">{{ $comment->comment }}</div>
        <ul class="comment-nav">
            @php
                $isLiked = $favorites->where('comment_id', $comment->id)
                            ->where('user_id', auth()->user()->id)
                            ->where('favorite', 1)
                            ->isNotEmpty();
            @endphp

            <li class="{{ $isLiked ? 'comment-favo-remove' : 'comment-favo' }}" data-comment-id="{{ $comment->id }}">
                {{ $comment->favorite_count }} いいね
            </li>
            @if($comment->user->id === auth()->user()->id)
            <li class="comment-del"><a onclick="return confirm('このコメントを削除しますか？');" href="{{ route('comment_del',['id' => $comment->id]) }}">削除</a></li>
            @endif
        </ul>
    </div>
    @endforeach
</div>
<form action="{{ Route('comment_post') }}" method="post">
    @csrf
    <div class="post_process">
        <h1>投稿</h1>
        <div class="two-space-content">
            <div class="count">0 / 200</div>
            @if( auth()->user()->level >=50 )
            <div class="content-right">(Lv50以上)背景色の変更</div>
            <select id="back-color-select" name="back_color">
                <option class="back-white" value="white">white</option>
                <option class="back-pastel-red" value="red">red</option>
                <option class="back-pastel-blue" value="blue">blue</option>
                <option class="back-pastel-green" value="green">green</option>
                <option class="back-pastel-yellow" value="yellow">yellow</option>
            </select>
            @endif
        </div>
        
        <textarea name="comment" id="comment" maxlength="200" cols="52" rows="10"></textarea>
        <div class="buttons">
            <button class="btn btn-outline-info" type="submit">投稿</button>
            <button class="btn btn-outline-danger not" type="button">キャンセル</button>
        </div>
        <input type="hidden" name="room_id" value="{{ $talkroom->id }}">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    </div>
    <div class="modal"></div>
</from>
@if(session('message'))
    <div class="alert alert-success" id="edit-message">
        {{ session('message') }}
    </div>
@endif
@endsection