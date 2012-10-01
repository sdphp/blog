<?php 
use \Blog\Post as Post;

Route::get('(:bundle)', array('as' => 'blog_listing', function(){
	return View::make('blog::listing')->with('posts', Post::all());
}));


Route::group( array('before' => 'auth'), function(){
	// Protected routes
	
	Route::get('(:bundle)/create', array('as' => 'blog_create', function(){
		return View::make('blog::form')->with('post', null);
	}));

	Route::post('(:bundle)/create', function(){
		$post = new Post( Input::all() );
		try
		{
			Auth::user()->posts()->insert( $post );
		}
		catch(Exception $e)
		{
			return Redirect::to_route('blog_create')->with('error', $e->getMessage())->with_input();
		}
		return Redirect::to_route('blog_post', array($post->slug));
	});

	Route::get('(:bundle)/edit/(:num)', array('as' => 'blog_edit', function($id){
		$post = Post::find($id);
		if ( ! $post ) return Response::error('404');
		return View::make('blog::form')->with('post', $post);
	}));

	Route::post('(:bundle)/edit/(:num)', function($id){
		$post = Post::find($id);
		if ( ! $post ) return Response::error('404');
		$post->fill( Input::all() );
		try
		{
			$post->save();
		}
		catch(Exception $e)
		{
			return Redirect::to_route('blog_edit', array($post->id))->with('error', $e->getMessage())->with_input();
		}
		return Redirect::to_route('blog_post', array($post->slug));

	});
});

Route::get('(:bundle)/(:all)', array('as' => 'blog_post', function($slug){
	$post = Post::where_slug($slug)->first();
	if ( ! $post ) return Response::error('404');
	return View::make('blog::post')->with('post', $post);
}));