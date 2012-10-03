<h1>{{ $post->title }}</h1>
<h2>Posted by {{$post->author->nickname}} ({{$post->edit_link}})</h2>
{{ $post->body }}