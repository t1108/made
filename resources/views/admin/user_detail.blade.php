@extends('layouts.app')
@section('content')

<div class="list blue-back list-flex">
    <div class="profile-image-up">
        <div class="profile-image-frame">
            <img class="profile-image"src="{{ $user->icon }}" alt="プロフィール画像"  width="200px" height="200px" >
            <div class="name-flame">
                {{ $user->name }}
            </div>
            @if($user->account_status != '永久停止' && $user->role != 0)

            <div class="form">
                <form action="{{ route('account_status', ['id' => $user->id]) }}" method="post">
                @csrf
                    <input name="id" type="hidden" value="{{ $user->id }}">
                    <p>アカウント状態</p>
                    <select name="status">
                        <!-- <option>{{ $user->account_status }}</option> -->
                        @foreach(['正常','停止','永久停止'] as $item)
                            <option class="status-op" @if($user->account_status == $item) selected @endif>{{ $item }}</option>
                        @endforeach
                    </select>
                    <div class="button">
                        <input type="submit" value="保存">
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>
    <div class="left-border">
        <div class="exp-area">{{ $user->explanation }}</div>
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
</div>

<p class="back-link"><a href="{{ route('userlist') }}">一覧へ戻る</a></p>
@endsection