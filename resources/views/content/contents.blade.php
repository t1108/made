@extends('layouts.app')
@section('content')

    <div class="action"><a href="{{ Route('create') }}">新規作成</a> </div>
    <div class="list">
        @foreach($talkrooms as $talkroom)
        <div class="list-box">
            <div class= "title">
                <div class="title-text">{{ $talkroom->name }}</div>
                <a class="thum" href="{{ Route('talkroom', ['id' => $talkroom->id]) }}"><img src="{{ $talkroom->image }}"></a>
            </div>
            @if(auth()->user()->role == 0)
            <div class="content-right">
                <a onclick="return confirm('このトークルームを削除しますか？');" href="{{ route('talkroom_delete',['id' => $talkroom->id]) }}">削除</a>
            </div>
            @endif
        </div>
        @endforeach
    </div>
@endsection