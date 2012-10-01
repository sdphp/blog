{{ Form::open() }}

<p>{{ Session::get('error') }}</p>

{{ Form::label('title', 'Title') }}
{{ Form::text('title', Input::old( 'title',$post ? $post->title : '')) }}
<br />

{{ Form::label('slug', 'Slug') }}
{{ Form::text('slug', Input::old( 'slug',$post ? $post->slug : '')) }}
<br />

{{ Form::label('body', 'Body') }}<br />
{{ Form::textarea('body', Input::old( 'body',$post ? $post->body : '' ))}}
<br />

{{ Form::submit( $post ? 'Edit Post' : 'Create Post' ) }}
{{ Form::close() }}