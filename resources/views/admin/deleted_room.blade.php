@extends('layouts.app')
@section('content')
<div class="action">削除済みのトークルーム一覧</div>
<div class="list">
    @foreach($deleteds as $deleted)
    <div class="list-box">
        <div class= "title">
            <div class="title-text">{{ $deleted->name }}</div>
            <a class="thum" href="{{ Route('talkroom', ['id' => $deleted->id]) }}"><img src="{{ $deleted->image }}"></a>
        </div>
        <div class="two-content" style="padding : 0 10px">
            <a onclick="return confirm('このトークルームを復元しますか？');" href="{{ route('restoration',['id' => $deleted->id]) }}">復元</a>
            <a onclick="return confirm('このトークルームを完全に消去しますか？\nこの操作は取り消すことができません');" href="{{ route('delete_permanently',['id' => $deleted->id]) }}">消去</a>
        </div>
    </div>
    @endforeach
</div>
@endsection