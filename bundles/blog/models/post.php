<?php namespace Blog;

class Post extends \Eloquent
{

	public static $accessable = array('title', 'slug', 'body'); // Items fillable by mass assignment

	public function author()
	{
		return $this->belongs_to('User', 'author_id');
	}

	public function get_link()
	{
		return \HTML::link_to_route('blog_post', $this->title, array($this->slug));
	}

	public function get_edit_link( $title = 'Edit')
	{
		return \HTML::link_to_route('blog_edit', $title, array($this->id));
	}
}