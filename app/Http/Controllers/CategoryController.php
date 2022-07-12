<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Request as RequestsRequest;
use App\Traits\CommonModuleMethods;


class CategoryController extends Controller
{
    use CommonModuleMethods;


    /**
     * Root directory for all the view files.
     *
     * @var string
     */
    protected $viewRoot = 'category';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index() {
        
        $categories = Category::get();

        return $this->view('index',compact('categories'));
    
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
    */
    public function create(Category $category)
    {

        $categories = Category::with('parent')->get();
        
        $categorySelect = [];

        foreach($categories as $key => $value){
           $categorySelect[$value->id] = $value->title;
        }

        return $this->view('form',compact('category','categorySelect'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $attributes = $request->all();

        $category = Category::create($attributes);

        return redirect()->action('CategoryController@index')
                ->with('success', 'Product Category Created Successfully.');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     * @internal param Category $module
     */
    public function edit(Category $category)
    {

        $categories = Category::with('parent')->get();
        
        $categorySelect = [];

        foreach($categories as $key => $value){
           $categorySelect[$value->id] = $value->title;
        }

        return $this->view('form',compact('category','categorySelect'));


    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     * @internal param Category $module
     */
    public function update(Request $request, Category $category)
    {
        $attributes = $request->all();
        $category->fill($attributes);
        $category->save();

        return redirect()->action('CategoryController@index')
                ->with('success', 'Product Category Edited Successfully.');

    }


    public function testTree(){

        $categories = Category::with('parent','child')->get();
        // dd($categories);
        return $this->view('tree',compact('categories'));

    }


    public function viewPage($slug){

        $pages = explode('/', $slug);

        $category = Category::where('slug',end($pages))->first();

        return $this->view('show',compact('category'));
        

    }
}
