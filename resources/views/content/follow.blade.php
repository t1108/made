@extends('layouts.app')
@section('content')

<div class="list blue-back f-list">
    @if($follows->count() == 0)
        フォローしている人はいません。
    @endif
    
    <table class="follow-list">
        @foreach($follows as $follow)
       <tr>
            <td><a href="{{ route('profile', ['id' => $follow->user->id]) }}">{{ $follow->user->name }}</a></td>
       </tr>
       @endforeach
    </table>
</div>

@endsection