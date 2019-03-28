@extends('layout')

@section('content')
<div class="contents row">
  <div class="container">
    {{ Form::open() }}
      <h3>Log in</h3>
      <div class="field">
        <label>Email
          <input type="email" name="email">
        </label>
      </div>

      <div class="field">
        <label>Password
          <input type="password" autocomplete="off" name="password">
        </label>
      </div>

      <div class="field">
        <label>Remember me
          <input type="checkbox" value="1" name="remember_me">
        </label>
      </div>

      <div class="actions">
        <input type="submit" value="Log in">
      </div>
    {{ Form::close() }}
  </div>
</div>
@endsection
