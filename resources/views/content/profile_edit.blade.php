@extends('layouts.app')
@section('content')

<div class="list blue-back" id=profile-list>
    <div class="profile-image-up">
        
        <form action="/upload_confirm" method="post" enctype="multipart/form-data" autocomplete="off" onsubmit="return confirm('この内容で保存しますか？');">
        @csrf
            <div class="profile-image-frame">
                <label for="file-upload"><img class="profile-image"src="{{ auth()->user()->icon }}" alt="プロフィール画像"  width="200px" height="200px"></label>
            </div>
            <input type="hidden" name="id" value="{{ auth()->user()->id }}">
            <input id="file-upload" type="file" name="icon" accept="image/png, image/jpeg">
            <label for="file-upload" class="custom-file-upload">ファイルを選択</label>
            <button type="button" id="delete">選択解除</button>
            <div>
                <textarea name="explanation" id="profile-text" maxlength="66" cols="40" rows="3">{{ auth()->user()->explanation }}</textarea>
            </div>
            <div class="user-edit">
            @if ($errors->any())
                <div class="vali-error">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            <input type="hidden" name="color" value="{{ auth()->user()->name_color }}">
            @if ( auth()->user()->level >= 10)
                <div class="change-name-color">
                    <p>ユーザーレベル10以上でネームカラーを変更できます</p>
                    <div class="change-color {{ auth()->user()->name_color }}">{{ auth()->user()->name }}</div>
                    <select id="color-select" name="color">
                        <option class="black" value="black" {{ auth()->user()->name_color === 'black' ? 'selected' : '' }}>black</option>
                        <option class="red" value="red" {{ auth()->user()->name_color === 'red' ? 'selected' : '' }}>red</option>
                        <option class="blue" value="blue" {{ auth()->user()->name_color === 'blue' ? 'selected' : '' }}>blue</option>
                        <option class="green" value="green" {{ auth()->user()->name_color === 'green' ? 'selected' : '' }}>green</option>
                        <option class="yellow" value="yellow" {{ auth()->user()->name_color === 'yellow' ? 'selected' : '' }}>yellow</option>
                    </select>
                </div>
            @endif
                

                <input type="text" name="name" placeholder="ユーザー名" value="{{ auth()->user()->name }}">
                <input type="submit" value="保存">
            </div>
        </form>
        
    </div>
</div>
<!-- <div class="nondisplay-back nondisplay"></div> -->
    


@endsection