<h1>{{ $post->title }}</h1>
<h2>Posted by {{$post->author->nickname}} ({{HTML::link_to_route('blog_edit', 'Edit', array($post->id))}})</h2>
{{ $post->body }}