@extends('layouts.app')
@section('content')

<div class="list dark-back">
    <table>
        <tr class="userlist-column">
            <th>ID</th>
            <th>ユーザー名</th>
            <th>email</th>
            <th>ロール</th>
            <th>状態</th>
            <th>フリーコメント</th>
            <th>詳細</th>
        </tr>
        @foreach($users as $user)
            <tr class="userlist-data">
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role == 0 ? '管理者' : '一般'; }}</td>
                <td class="{{ $user->account_status !== '正常' ? 'suspension' : ''; }}">{{ $user->account_status }}</td>
                <td class="white-space explanation">{{ $user->explanation }}</td>
                <td><a class="user-detail" href="{{ route('user_detail', ['id' => $user->id]) }}">ユーザー詳細</a></td>
            </tr>
        @endforeach
    </table>
        
</div>
@endsection