<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
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
        $list_testimonial = Testimonial::with('course')->orderBy('id','DESC')->get();
        $courses = Course::orderBy('id','DESC')->get();
        return view('admin.testimonial.create')->with(compact('list_testimonial','courses'));
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

                'name' => 'required',
                'content' => 'required',
                'image' => 'required',
                'course_id' => 'required',
                'status' => 'required',

            ],
            [


            ]
        );
        //them anh vao folder hinh188.jpg
        $get_image = $request->image;
        $path = 'uploads/avatar/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $data = $request->all();
        $testimonial = new Testimonial();
        $testimonial->name = $data['name'];
        $testimonial->image = $new_image;
        $testimonial->content = $data['content'];
        $testimonial->course_id = $data['course_id'];
        $testimonial->status = $data['status'];

        $testimonial->save();
        return redirect()->back()->with('message', 'Thêm nhận xét thành công');
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
        $testimonial_edit = Testimonial::with('course')->find($id);
        $list_testimonial = Testimonial::with('course')->orderBy('id','DESC')->get();
        $courses = Course::orderBy('id','DESC')->get();
        return view('admin.testimonial.create')->with(compact('list_testimonial','testimonial_edit','courses'));
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

                'name' => 'required',
                'content' => 'required',
                'image' => 'required',
                'course_id' => 'required',
                'status' => 'required',

            ],
            [


            ]
        );

        $data = $request->all();
        $testimonial = Testimonial::find($id);
        $get_image = $request->image;
        $path = 'uploads/avatar/';
        if ($get_image) {
            $old_image = $path.$testimonial->image;
            if(file_exists($old_image)) {
                unlink($old_image);
            }

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);

            $testimonial->image = $new_image;
        }
        $testimonial->name = $data['name'];
        $testimonial->image = $new_image;
        $testimonial->content = $data['content'];
        $testimonial->course_id = $data['course_id'];
        $testimonial->status = $data['status'];
        $testimonial->save();

        return redirect()->route('testimonial.create')->with('message',"Cập nhật nhận xét thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Testimonial::find($id)->delete();
        return redirect()->back()->with('message',"Xóa nhận xét thành công");
    }
}
