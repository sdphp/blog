<?php namespace Blog;

class Post extends \Eloquent
{

	public static $accessable = array('title', 'slug', 'body'); // Items fillable by mass assignment

	public function author()
	{
		return $this->belongs_to('User', 'author_id');
	}
}