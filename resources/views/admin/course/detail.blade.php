@extends('admin.layouts.master')
@section('content')

    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
{{--        <h3 class="text-center">Khóa học</h3>--}}
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">

                <div class="bg-light rounded h-100 p-4">
                    <h4 class="mb-4">Chi tiết khóa học: {{$course_detail->course->title}}</h4>
                    <table class="table" >
                        <thead>
                        <tr>
                            <th scope="col">Mã khóa học</th>
                            <th scope="col">Người hướng dẫn</th>
                            <th scope="col">Số bài học</th>
                            <th scope="col">Thời gian học</th>
                            <th scope="col">Ngày bắt đầu</th>
                            <th scope="col">Ngày kết thúc</th>
                            <th scope="col">Trình độ</th>
                            <th scope="col">Ngôn ngữ</th>
                            <th scope="col">Giá tiền</th>
                            <th scope="col">Hình ảnh khóa học</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$course_detail->course_code}}</td>
                                <td>{{$course_detail->instructor}}</td>
                                <td>{{$course_detail->lecture}}</td>
                                <td>{{$course_detail->duration}} tuần</td>
                                <td>{{$course_detail->start_day}}</td>
                                <td>{{$course_detail->end_day}}</td>
                                <td>{{$course_detail->skill_level==0?"Cơ bản":"Nâng cao"}}</td>
                                <td>{{$course_detail->language}}</td>
                                <td>{{number_format($course_detail->price)}} VNĐ</td>
                                <td><img width="300px" src="{{asset('uploads/courses/'.$course_detail->image)}}" alt=""></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
    <div class="container-fluid pt-4 px-4">
        {{--        <h3 class="text-center">Khóa học</h3>--}}
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">

                <div class="bg-light rounded h-100 p-4">
                    <h4 class="mb-4">Học viên của khóa học</h4>
                    <table class="table" >
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã học viên</th>
                            <th scope="col">Tên học viên</th>
                            <th scope="col">Email học viên</th>
                            <th scope="col">Số điện thoại học viên</th>
                            <th scope="col">Điểm số</th>
                            <th scope="col">...</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$user->id_student}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->score}}</td>
                            <td><a href="{{route('user.edit',$user->id)}}" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active"></i></a></td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
    <!-- Form End -->
@endsection
