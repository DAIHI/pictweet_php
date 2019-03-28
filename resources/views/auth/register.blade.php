@extends('layout')

@section('content')
<div class="contents row">
  <div class="container">
    {{ Form::open() }}
      <h3>Sign up</h3>
      <div class="field">
        <label>Nickname <em>(6 characters maximum)</em>
          <input type='text' name="name">
        </label>
      </div>

      <div class="field">
        <label>Email
          <input type="email" name="email">
        </label>
      </div>

      <div class="field">
        <label>Password <em>(6 characters minimum)</em>
          <input type="password" autocomplete="off" name="password">
        </label>
      </div>

      <div class="field">
        <label>Password confirmation
          <input type="password" autocomplete="off" name="password_confirmation">
        </label>
      </div>

      <div class="actions">
        <input type="submit" value="Sign up">
      </div>
    {{ Form::close() }}
  </div>
</div>
@endsection
