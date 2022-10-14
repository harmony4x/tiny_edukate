<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Course_Detail;
use App\Models\Statistical;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $list_user = User::orderBy('id','DESC')->get();
        $courses = Course::where('sold','<',40)->orderby('id','DESC')->get();
        return view('admin.user.create')->with(compact('list_user','courses'));
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
                'email' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'birthday' => 'required',
                'course_code' => 'required',
                'status' => 'required',
            ],
            [
                'email.required' => 'Email không được bỏ trống',
                'name.required' => 'Tên không được bỏ trống',
                'phone.required' => 'Điện thoại không được bỏ trống',
                'birthday.required' => 'Ngày sinh không được bỏ trống',

            ]
        );

        $data = $request->all();
        $user = new User();
        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->birthday = $data['birthday'];
        $user->course_code = $data['course_code'];
        $user->status = $data['status'];
        $user->registration_date = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $user->save();
        $id = $user->id;
        $user->id_student = "B18".$id;
        $user->save();

        if ($user->status==1 ){
            $user->pay_date = Carbon::now();
            $course = Course::where('course_code',$user->course_code)->first();
            $course->sold+=1;
            $course->save();
        }

        return redirect()->back()->with('message', "Thêm học viên thành công");
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
        $user_edit = User::find($id);
        $list_user = User::orderBy('id','DESC')->get();
        $courses = Course::where('sold','<',40)->orderby('id','DESC')->get();
        return view('admin.user.create')->with(compact('user_edit','list_user','courses'));
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
                'email' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'birthday' => 'required',
                'status' => 'required',
            ],
            [
                'email.required' => 'Email không được bỏ trống',
                'name.required' => 'Tên không được bỏ trống',
                'phone.required' => 'Điện thoại không được bỏ trống',
                'birthday.required' => 'Ngày sinh không được bỏ trống',

            ]
        );

        $data = $request->all();
        $user = User::find($id);
        if ($user->status==0 && $data['status']==1){

            $course = Course::where('course_code',$user->course_code)->first();
            $course->sold+=1;
            $course->save();
        }elseif ($user->status==1 && $data['status']==0){
            $course = Course::where('course_code',$user->course_code)->first();
            $course->sold-=1;
            $course->save();
        }
        $registration_date = $user->registration_date;
        $statistical = Statistical::where('registration_date',$registration_date)->get();
        if ($statistical){
            $statistical_count = $statistical->count();
        }else{
            $statistical_count = 0;
        }
        if ($user->status==0 && $data['status']==1){
            $course_code = $user->course_code;
            $course_detail = Course_Detail::where('course_code',$course_code)->first();
            $course_price = $course_detail->price;
            if ($statistical_count>0){
                $statistical_update = Statistical::where('registration_date',$registration_date)->first();
                $statistical_update->total_cost = $statistical_update->total_cost + $course_price;
                $statistical_update->total_user = $statistical_update->total_user +1;
                $statistical_update->save();
            }else {
                $statistical_new = new Statistical();
                $statistical_new->registration_date = $registration_date;
                $statistical_new->total_cost = $course_price;
                $statistical_new->total_user = 1;
                $statistical_new->save();
            }

        }

        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->birthday = $data['birthday'];
        $user->course_code = $data['course_code'];
        $user->score = $data['score'];
        $user->status = $data['status'];
        $user->save();




        return redirect()->route('user.create')->with('message',"Cập nhật học viên thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $course = Course::where('course_code',$user->course_code)->first();
        $course->sold-=1;
        $course->save();
        $user::delete();
        return redirect()->back()->with('message',"Xóa học viên thành công");
    }
}
