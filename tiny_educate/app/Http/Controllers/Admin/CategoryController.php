<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_category = Category::orderBy('id','DESC')->get();
        return view('admin.category.create')->with(compact('list_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|unique:categories|max:255',
                'slug' => 'required|unique:categories|max:255',
                'status' => 'required',
            ],
            [
                'title.required' => 'Tên danh mục không được bỏ trống',
                'slug.required' => 'Slug không được bỏ trống',
                'title.unique' => 'Tên danh mục đã tồn tại',
                'slug.unique' => 'Slug danh mục đã tồn tại',
            ]
        );

        $data = $request->all();
        $category = new Category();
        $category->title = $data['title'];
        $category->slug = $data['slug'];

        $category->status = $data['status'];
        $category->save();

        return redirect()->back()->with('message', "Thêm danh mục thành công");
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
        $category_edit = Category::find($id);
        $list_category = Category::orderBy('id','DESC')->get();
        return view('admin.category.create')->with(compact('list_category','category_edit'));
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
        $request->validate(
            [
                'title' => 'required|max:255',
                'slug' => 'required|max:255',

                'status' => 'required',
            ],
            [
                'title.required' => 'Tên danh mục không được bỏ trống',
                'slug.required' => 'Slug không được bỏ trống',

            ]
        );
        $data = $request->all();
        $category = Category::find($id);
        $category->title = $data['title'];
        $category->slug = $data['slug'];

        $category->status = $data['status'];
        $category->save();
        return redirect()->route('category.create')->with('message',"Cập nhật danh mục thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('message',"Xóa danh mục thành công");
    }
}
