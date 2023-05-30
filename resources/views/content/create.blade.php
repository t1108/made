@extends('layouts.app')
@section('content')

<div class="list creat">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ Route('confirm') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="profile-image-frame creat-image">
            <label for="file-upload"><img class="profile-image creat-img"src="" alt="画像を選択してください。"  width="200px" height="200px"></label>
        </div>
        <input id="file-upload" type="file" name="image" accept="image/png, image/jpeg">
        <input type="hidden" value="{{ auth()->user()->id }}" name="id">

        <div class="file-upload">
            <label for="file-upload" class="custom-file-upload">ファイルを選択</label>
        </div>
        <br>
        <div class="file-upload">
            <label for="form-name">タイトル</label>
        </div>
        <div class="file-upload">
            <input type="text" name="name" id="form-name" value="{{ old('name'); }}">
        </div>
        <br>
        <div class="file-upload">
            <button class="post_submit" type="button">登録</button>
        </div>
        <div class="post_process">このトークルームが不適切だと判断された場合、
            <br>削除される場合があります。
            <br>トークルームを作成してもよろしいですか？<br>
            <div class="buttons">
                <button type="submit">はい</button>
                <button class="not" type="button">いいえ</button>
            </div>
        </div>
        <div class="modal"></div>
    </form>
</div>
@endsection