@extends('layouts.app')
@section('content')

<div class="list blue-back f-list">
    @if($followers->count() == 0)
        フォロワーはいません
    @endif
    
    <table class="follow-list">
    @foreach($followers as $follower)
       <tr>
            <td><a href="{{ route('profile', ['id' => $follower->user->id]) }}">{{ $follower->user->name }}</a></td>
       </tr>
    @endforeach
    </table>
</div>

@endsection