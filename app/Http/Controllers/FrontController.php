<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class FrontController extends Controller
{
	public function index()
	{
		return view('index')->with('title', Setting::first()->site_name)
		->with('first_slide', Post::orderBy('created_at', 'desc')->first())
		->with('second_slide', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
		->with('third_slide', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
		->with('categories', Category::all())
		->with('newest', Post::orderBy('created_at', 'desc')->take(6)->get())
		->with('popular', Post::orderBy('views', 'desc')->take(3)->get())
		->with('settings', Setting::first());
	}

	public function singlePost($slug)
	{

		$post = Post::where('slug', $slug)->first();
		Post::where('slug', $slug)->increment('views');
		$next_id = Post::where('id', '>', $post->id)->min('id');
		$prev_id = Post::where('id', '<', $post->id)->max('id');

		return view('post')->with('post', $post)
		->with('title', $post->title)
		->with('settings', Setting::first())
		->with('categories', Category::take(5)->get())
		->with('next', Post::find($next_id))
		->with('prev', Post::find($prev_id))
		->with('tags', Tag::all());
	}

	public function allpost() {
		$post = Post::orderBy('created_at', 'desc')->get();
		return view('allpost')->with('allpost', $post)
		->with('title', Setting::first()->site_name)
		->with('categories', Category::all())
		->with('settings', Setting::first());
	}

	public function category($id)
	{
		$category = Category::find($id);

		return view('category')->with('category', $category)
		->with('title', $category->name)
		->with('settings', Setting::first())
		->with('categories', Category::take(5)->get());
	}

	public function tag($id)
	{
		$tag = Tag::find($id);

		return view('tag')->with('tag', $tag)
		->with('title', $tag->tag)
		->with('settings', Setting::first())
		->with('categories', Category::take(5)->get());
	}

	public function postBy($id)
	{
		$user = User::find($id);

		//  dd($user->post);
		return view('postby')->with('user', $user)
		->with('title', $user->name)
		->with('settings', Setting::first())
		->with('categories', Category::take(5)->get());

	}

	

	public function pdf($slug)
	{
		// echo public_path();
		$post = Post::where('slug', $slug)->first();
		$pdf = \PDF::loadView('layouts.postpdf', ['post' => $post]);

		// return view('layouts.postpdf')->with('post', $post);

				return $pdf->download('post.pdf');
	
	}
}
