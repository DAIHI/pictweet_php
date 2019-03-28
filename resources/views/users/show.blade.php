@extends('layout')

@section('content')
  <div class="contents row">
    <h2><strong>{{ $name }}</strong>さんの投稿一覧</h2>
    @foreach($tweets as $tweet)
      <div class="content_post" style="background-image: url({{ $tweet->image }});">
        <div class="more">
          <span><img src="/images/arrow_top.png"></span>
          <ul class="more_list">
            <li><a href="/tweets/{{ $tweet->id }}">詳細</a></li>
            @if(Auth::check() && Auth::user()->id == $tweet->user_id)
              <li><a href="/tweets/{{ $tweet->id }}/edit">編集</a></li>
              <li><a href="/tweets/{{ $tweet->id }}" onclick="event.preventDefault(); document.getElementById('delete_{{ $tweet->id }}').submit();">削除</a></li>
              {{ Form::open(['url' => "/tweets/{$tweet->id}", 'method' => 'delete', 'id' => "delete_{$tweet->id}"]) }}
              {{ Form::close() }}
            @endif
          </ul>
        </div>

        <p>{{ $tweet->text }}</p>
        <span class="name">
          <a href="/users/{{ $tweet->user_id }}">
            <span>投稿者</span>{{ $name }}
          </a>
        </span>
      </div>
    @endforeach

    {{ $tweets->links() }}
  </div>
@endsection
