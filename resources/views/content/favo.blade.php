@extends('layouts.app')
@section('content')
<div class="action">お気に入り一覧</div>
<div class="list">
    @foreach($favorites as $favorite)
    <div class="list-box">
        <div class= "title">
            <div class="title-text">{{ $favorite->talkroom->name }}</div>
            <a class="thum" href="{{ Route('talkroom', ['id' => $favorite->talkroom->id]) }}"><img src="{{ $favorite->talkroom->image }}"></a>
        </div>
    </div>
    @endforeach
</div>
@endsection