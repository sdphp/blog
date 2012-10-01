{{ Form::open() }}

{{ Form::label('username', 'Email') }}
{{ Form::text('username', Input::old('username')) }}
<br />

{{ Form::label('password', 'Password') }}
{{ Form::password('password') }}
<br />

{{ Form::submit('Login') }}
{{ Form::close() }}