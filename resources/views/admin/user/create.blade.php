@extends('admin.layouts.master')
@section('content')

    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <h3 class="text-center">Khóa học</h3>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                @if(!isset($user_edit))
                    <div class="bg-light rounded  p-4">
                        <h4 class="mb-4">
                            Thêm học viên
                            @if ($errors->any())
                                <div class="alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(session('message'))
                                <div class="alert-success">

                                    <span class="m-1">{{session('message')}}</span>
                                    <span class="closebtn" style="float: right" onclick="this.parentElement.style.display='none';">&times;</span>

                                </div>
                            @endif
                        </h4>
                        <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       placeholder="Tên học viên..." name="name" value="{{old('name')}}" >
                                <label for="floatingInput">Tên học viên</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control"
                                       placeholder="Email học viên..." name="email" value="{{old('email')}}" >
                                <label for="floatingInput">Email học viên</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       placeholder="Số điện..." name="phone" value="{{old('phone')}}" >
                                <label for="floatingInput">Số điện thoại</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control"
                                       placeholder="Ngày sinh..." name="birthday" value="{{old('birthday')}}" >
                                <label for="floatingInput">Ngày sinh</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="course_code"
                                        aria-label="Floating label select example">
                                    <option selected disabled>- - - - - - - - - -</option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->course_code}}">{{$course->title}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Khóa học</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="status"
                                        aria-label="Floating label select example">
                                    <option selected disabled>- - - - - - - - - -</option>
                                    <option value="0">Chưa đóng tiền</option>
                                    <option value="1">Đã đóng tiền</option>
                                </select>
                                <label for="floatingSelect">Trạng thái</label>
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                @else
                    <div class="bg-light rounded  p-4">
                        <h4 class="mb-4">
                            Sửa danh mục
                            @if ($errors->any())
                                <div class="alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(session('message'))
                                <div class="alert-success " style="float: right">
                                    <span>{{session('message')}}</span>
                                    <span class="closebtn" style="float: right" onclick="this.parentElement.style.display='none';">&times;</span>

                                </div>
                            @endif
                        </h4>
                        <form action="{{route('user.update',$user_edit->id)}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       placeholder="Tên học viên..." name="name" value="{{$user_edit->name}}" >
                                <label for="floatingInput">Tên học viên</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control"
                                       placeholder="Email học viên..." name="email" value="{{$user_edit->email}}" >
                                <label for="floatingInput">Email học viên</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       placeholder="Số điện thoại..." name="phone" value="{{$user_edit->phone}}" >
                                <label for="floatingInput">Số điện thoại</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control"
                                       placeholder="Ngày sinh học viên..." name="birthday" value="{{$user_edit->birthday}}" >
                                <label for="floatingInput">Ngày sinh</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="course_code"
                                        aria-label="Floating label select example">
                                    <option disabled>- - - - - - - - - -</option>
                                    @foreach($courses as $course)
                                        @if($course->course_code == $user_edit->course_code)
                                            <option selected value="{{$course->course_code}}">{{$course->title}}</option>
                                        @else
                                            <option  value="{{$course->course_code}}">{{$course->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Khóa học</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control"
                                       placeholder="Điểm số..." name="score" value="{{$user_edit->score}}" >
                                <label for="floatingInput">Điểm số</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="status"
                                        aria-label="Floating label select example">
                                    @if($user_edit->status==0)
                                        <option disabled>- - - - - - - - - -</option>
                                        <option selected value="0">Chưa đóng tiền</option>
                                        <option value="1">Đã đóng tiền</option>
                                    @else
                                        <option disabled>- - - - - - - - - -</option>
                                        <option value="0">Chưa đóng tiền</option>
                                        <option selected value="1">Đã đóng tiền</option>
                                    @endif
                                </select>
                                <label for="floatingSelect">Trạng thái</label>
                            </div>

                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                @endif
                <div class="bg-light rounded h-100 p-4">
                    <h4 class="mb-4">Hiển thị học viên</h4>
                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã học viên</th>
                            <th scope="col">Tên học viên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Khóa học</th>
                            <th scope="col">Điểm số</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">...</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_user as $key => $user)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$user->id_student}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->birthday}}</td>
                                <td>{{$user->course_code}}</td>
                                <td>{{$user->score}}</td>
                                <td>{{$user->status==0?"Chưa đóng tiền":"Đã đóng tiền"}}</td>
                                <td>
                                    <a href="{{route('user.edit',$user->id)}}" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active"></i></a>
                                    <form action="{{route('user.destroy',$user->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có muốn xóa hay không?');" style="background: none; border: none; padding: 0"><i class="fa fa-trash text-danger text"></i></button>
                                    </form>
                                </td>
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
