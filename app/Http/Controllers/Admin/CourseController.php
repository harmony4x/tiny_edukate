<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Course_Detail;
use function Sodium\add;


class CourseController extends Controller
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
        $list_course = Course::with('course_details')->orderBy('id','DESC')->get();
        $categories = Category::orderBy('id','DESC')->get();
        return view('admin.course.create')->with(compact('list_course','categories'));
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
                'title' => 'required|unique:course|max:255',
                'slug' => 'required|unique:course|max:255',
                'description' => 'required',
                'quantity' => 'required',
                'instructor' => 'required',
                'lecture' => 'required',
                'duration' => 'required',
                'start_day' => 'required',
                'language' => 'required',
                'price' => 'required',
                'skill_level' => 'required',
                'status' => 'required',
            ],
            [
                'title.required' => 'Tên danh mục không được bỏ trống',
                'slug.required' => 'Slug không được bỏ trống',
                'description.required' => 'Mô tả không được bỏ trống',
                'instructor.required' => 'Tên người hướng dẫn không được bỏ trống',
                'lecture.required' => 'Số bài học không được bỏ trống',
                'duration.required' => 'Thời gian khóa học không được bỏ trống',
                'start_day.required' => 'Ngày bắt đầu không được bỏ trống',
                'language.required' => 'Ngôn ngữ không được bỏ trống',
                'price.required' => 'Giá không được bỏ trống',
                'skill_level.required' => 'Tên danh mục không được bỏ trống',
                'title.unique' => 'Tên danh mục đã tồn tại',
                'slug.unique' => 'Slug danh mục đã tồn tại',

            ]
        );
        //them anh vao folder hinh188.jpg
        $get_image = $request->image;
        $path = 'uploads/courses/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $data = $request->all();
        $course = new Course();
        $course->title = $data['title'];
        $course->slug = $data['slug'];
        $course->description = $data['description'];
        $course->quantity = $data['quantity'];
        $course->category_id = $data['category_id'];

        $course->status = $data['status'];
        $course->save();
        $id = $course->id;
        $course->course_code = "CT".$id;
        $course->save();

        if ($course){
            $date = $data['duration']*7;
            $end_day = new Carbon($data['start_day']);
            $end_day = $end_day->addDays($date)->toDateString();
            $course_detail = new Course_Detail();
            $course_detail->course_code = "CT".$id;
            $course_detail->instructor = $data['instructor'];
            $course_detail->lecture = $data['lecture'];
            $course_detail->duration = $data['duration'];
            $course_detail->start_day = $data['start_day'];
            $course_detail->end_day = $end_day;
            $course_detail->skill_level = $data['skill_level'];
            $course_detail->language = $data['language'];
            $course_detail->price = $data['price'];
            $course_detail->image = $new_image;
            $course_detail->save();
        }
        return redirect()->back()->with('message', 'Thêm khóa học thành công');
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
        $course_edit = Course::with('course_details')->find($id);
        $list_course = Course::with('course_details')->orderBy('id','DESC')->get();
        $categories = Category::orderBy('id','DESC')->get();
        return view('admin.course.create')->with(compact('list_course','course_edit','categories'));
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
                'description' => 'required',
                'quantity' => 'required',
                'instructor' => 'required',
                'lecture' => 'required',
                'duration' => 'required',
                'start_day' => 'required',
                'language' => 'required',
                'price' => 'required',
                'skill_level' => 'required',
                'status' => 'required',
            ],
            [
                'title.required' => 'Tên danh mục không được bỏ trống',
                'slug.required' => 'Slug không được bỏ trống',
                'description.required' => 'Mô tả không được bỏ trống'
            ]
        );



        $data = $request->all();
        $course = Course::find($id);

        $course->title = $data['title'];
        $course->slug = $data['slug'];
        $course->description = $data['description'];
        $course->quantity = $data['quantity'];
        $course->category_id = $data['category_id'];
        $course->status = $data['status'];
        $course->save();

        $course_code = $course->course_code;

        $course_detail = Course_Detail::where('course_code',$course_code)->first();
        $get_image = $request->image;
        $path = 'uploads/courses/';
        if ($get_image) {
            $old_image = $path.$course_detail->image;
            if(file_exists($old_image)) {
                unlink($old_image);
            }

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);

            $course_detail->image = $new_image;
        }
        $date = $data['duration']*7;
        $end_day = new Carbon($data['start_day']);
        $end_day = $end_day->addDays($date)->toDateString();


        $course_detail->instructor = $data['instructor'];
        $course_detail->lecture = $data['lecture'];
        $course_detail->duration = $data['duration'];
        $course_detail->start_day = $data['start_day'];
        $course_detail->end_day = $end_day;
        $course_detail->skill_level = $data['skill_level'];
        $course_detail->language = $data['language'];
        $course_detail->price = $data['price'];

        $course_detail->save();

        return redirect()->route('course.create')->with('message',"Cập nhật khóa học thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();
        return redirect()->back()->with('message',"Xóa khóa học thành công");
    }

    public function course_detail($course_code){
        $course_detail = Course_Detail::with('course')->where('course_code',$course_code)->first();
        $users = User::where('course_code',$course_code)->where('status',1)->get();
        return view('admin.course.detail')->with(compact('course_detail','users'));
    }
}
