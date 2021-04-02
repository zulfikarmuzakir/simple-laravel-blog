<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(visits('App\Models\Post')->countries());
        $visitor = DB::table('posts')->sum('views');
        return view('admin.dashboard')->with('posts_count', Post::all()->count())
                                        ->with('trashed_count', Post::onlyTrashed()->get()->count())
                                        ->with('users_count', User::all()->count())
                                        ->with('categories_count', Category::all()->count())
                                        ->with('tags_count', Tag::all()->count())
                                        ->with('visitors_count', $visitor)
                                        ->with('top_post', Post::orderBy('views', 'desc')->take(10)->get());
                                        // ->with('count_visitor', $visitor);
    }
}
