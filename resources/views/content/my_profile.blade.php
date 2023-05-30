@extends('layouts.app')
@section('content')

<div class="list blue-back list-flex">
    <div class="profile-image-up">
        <div class="profile-image-frame">
            <img class="profile-image"src="{{ $user->icon }}" alt="プロフィール画像"  width="200px" height="200px" >
            <div class="name-flame {{$user->name_color}}">
                {{ $user->name }}
            </div>
            <div class="name-flame flame">
                <a href="{{ route('profile_edit') }}">プロフィールを編集する</a>
            </div>
        </div>
        <div class="column">
            <a href="{{ route('follow') }}">{{ $follow_count }} フォロー中</a>
            <a href="{{ route('follower') }}">{{ $follower_count }} フォロワー</a>
        </div>
    </div>
    <div class="left-border">
        <div class="level">
            <div class="two-content">
                <div class="user-lv">ユーザーレベル {{ $user->level }}</div>
                <div>Next Level {{ $user->exp }} / 10</div>
            </div>
            
            <div class="exp-gauge" style="--exp-percent: {{ $user->exp / 10 }}"></div>
        </div>
        <div class="exp-area">{{ $user->explanation ? $user->explanation : 'フリーコメントはありません。' }}</div>
    </div>
    <div class="left-border last-box">
        コメント数上位
        <ul class="rank-box">
            @foreach ($rankedComments->take(3) as $index => $comment)
                <li>
                    <a href="{{ Route('talkroom', ['id' => $comment->talkroom->id]) }}">{{ $comment->talkroom->name }}</a>
                    <p>{{ $comment->commentCount }}コメント</p>
                </li>
            @endforeach
        </ul>

    </div>
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
@if(session('message'))
    <div class="alert alert-success" id="edit-message">
        {{ session('message') }}
    </div>
@endif
<p class="back-link"><a href="{{ route('userlist') }}">一覧へ戻る</a></p>
@endsection