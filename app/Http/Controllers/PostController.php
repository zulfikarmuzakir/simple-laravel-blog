<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Path\To\DOMDocument;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::orderBy('created_at', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $tags = Tag::all();


        if ($categories->count() == 0 || $tags->count() == 0) {
            return redirect()->back()->with('info', 'You must create a category and tag first!');
        }

        return view('admin.posts.create')->with('categories', $categories)
                                        ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        $storage = "storage/content";
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images=$dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?);/', $src, $groups);
                $mimetype = $groups['mime'];
                $fileNameContent=uniqid();
                $fileNameContentRand = substr(md5($fileNameContent),6,6).'_'.time();
                $filepath =("$storage/$fileNameContentRand.$mimetype");
                $image = Image::make($src)
                                        ->resize(1200, null, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })
                                        ->encode($mimetype, 100)
                                        ->save(public_path($filepath));

                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('class', 'img-responsive');
            }
        }

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            // 'content' => $request->content,
            'content' =>$dom->saveHTML(), 
            'featured' => 'uploads/posts/' . $featured_new_name,
            'category_id' => $request->category_id,
            'slug' =>  Str::of($request->title)->slug('-'),
            'user_id' => Auth::id(),
            'views' => 0
        ]); 
        $post->tags()->attach($request->tags);

       return redirect()->back()->with('success', 'Create a post successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.posts.edit')->with('post', $post)
                                    ->with('categories', Category::all())
                                    ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $storage = "storage/content";
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images=$dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?);/', $src, $groups);
                $mimetype = $groups['mime'];
                $fileNameContent=uniqid();
                $fileNameContentRand = substr(md5($fileNameContent),6,6).'_'.time();
                $filepath =("$storage/$fileNameContentRand.$mimetype");
                $image = Image::make($src)
                                        ->resize(1200, null, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })
                                        ->encode($mimetype, 100)
                                        ->save(public_path($filepath));

                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('class', 'img-responsive');
            }
        }

        $post = Post::find($id);

        if ($request->hasFile('featured')) {
            $featured = $request->featured; 

            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/' . $featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $dom->saveHTML();
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);

        return redirect()->route('posts')->with('success', 'Post updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        $post->delete();

        return redirect()->back()->with('success', 'Post trashed');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        
        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        
        $post->forceDelete();

        return redirect()->back()->with('success', 'Post deleted permanently');
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        return redirect()->route('posts')->with('success', 'Post restored');
    }
}
