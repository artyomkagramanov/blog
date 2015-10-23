<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Contracts\CategoryInterface;



class CategoryController extends Controller
{
    protected $category;
    

    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('categories.index',['categories'=>$this->category->getAll(),'title' => 'Categories']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         return view('categories.form',['title'=>"Create Category"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //

        if($this->category->create($request->all()))
        {
            return redirect('/category')->with('status', 'Category Added');
        }
        else
        {
            return redirect('/category/')->with('status', 'Unknown error!');
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
        //
        $category = $this->category->show($id);
        return view('categories.show',['category'=>$category,'title' => $category->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   

        $category = $this->category->show($id);
        return view('categories.form',['title'=>"Edit Category",'id'=>$id,'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        //
        if($this->category->update($request->all(),$id))
        {
            return redirect('/category')->with('status', 'Category Edited');
        }
        else
        {
            return redirect('/category/')->with('status', 'Unknown error!');
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
        if($this->category->delete($id))
        {
            return redirect('/category')->with('status', 'Category Deleted');
        }
        else
        {
            return redirect('/category/'.$id)->with('status', 'Unknown error!');
        }
    }
}
