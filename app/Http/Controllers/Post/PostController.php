<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contracts\PostInterface;
use App\Contracts\CategoryInterface;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $post;
    protected $category;

    public function __construct(PostInterface $post,CategoryInterface $category)
    {
        $this->post=$post;
        $this->category=$category;
    }

    public function index()
    {
        return view('posts.index',['posts'=>$this->post->getAll(),'title' => 'Posts']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.form',['title' => 'Create New Post','categories' => $this->category->getAll()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->file('post_image'));
        if($this->post->create($request))
        {
            return redirect('/post')->with('status', 'Post Added');
        }
        else
        {
            return redirect('/post/')->with('status', 'Unknown error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->post->show($id);
        return view('posts.show',['post'=>$post,'title' => $post->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$this->post->show($id))
            return redirect('/post/')->with('status', 'Unknown error!');
        $post = $this->post->show($id);
        $category = $this->category->getAll();
        return view('posts.form',['title'=>"Edit Post",'id'=>$id,'post' => $post,'categories'=>$category]);
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
        //
        if($this->post->update($request,$id))
        {
            return redirect('/post')->with('status', 'Post Edited');
        }
        else
        {
            return redirect('/post/')->with('status', 'Unknown error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->post->delete($id))
        {
            return redirect('/post')->with('status', 'Post Deleted');
        }
        else
        {
            return redirect('/post/'.$id)->with('status', 'Unknown error!');
        }
    }
}
