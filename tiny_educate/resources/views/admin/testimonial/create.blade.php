@extends('admin.layouts.master')
@section('content')

    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <h3 class="text-center">Nhận xét</h3>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                @if(!isset($testimonial_edit))
                    <div class="bg-light rounded  p-4">
                        <h4 class="mb-4">
                            Thêm danh mục
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
                        <form action="{{route('testimonial.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       placeholder="Tên học viên..." name="name" value="{{old('name')}}" id="slug" >
                                <label for="floatingInput">Tên học viên</label>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Avatar</label>
                                <input class="form-control" type="file" id="formFile" name="image" value="{{old('image')}}">
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       placeholder="Nhận xét..." name="content" value="{{old('content')}}">
                                <label for="floatingInput">Nhận xét</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="course_id"
                                        aria-label="Floating label select example">
                                    <option selected disabled>- - - - - - - - - -</option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->title}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Khóa học</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="status"
                                        aria-label="Floating label select example">
                                    <option selected disabled>- - - - - - - - - -</option>
                                    <option value="0">Không</option>
                                    <option value="1">Kích hoạt</option>
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
                        <form action="{{route('testimonial.update',$testimonial_edit->id)}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       placeholder="Tên học viên..." name="name" value="{{$testimonial_edit->name}}" id="slug" >
                                <label for="floatingInput">Tên học viên</label>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Avatar</label>
                                <input class="form-control" type="file" id="formFile" name="image">
                                <img src="{{asset('uploads/avatar/'.$testimonial_edit->image)}}" alt="">
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       placeholder="Nhận xét..." name="content" value="{{$testimonial_edit->content}}">
                                <label for="floatingInput">Nhận xét</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="course_id"
                                        aria-label="Floating label select example">
                                    <option disabled>- - - - - - - - - -</option>
                                    @foreach($courses as $course)
                                        @if($course->id == $testimonial_edit->id)
                                            <option selected value="{{$course->id}}">{{$course->title}}</option>
                                        @else
                                            <option  value="{{$course->id}}">{{$course->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Khóa học</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="status"
                                        aria-label="Floating label select example">
                                    @if($testimonial_edit->status==0)
                                        <option disabled>- - - - - - - - - -</option>
                                        <option selected value="0">Không</option>
                                        <option value="1">Kích hoạt</option>
                                    @else
                                        <option disabled>- - - - - - - - - -</option>
                                        <option value="0">Không</option>
                                        <option selected value="1">Kích hoạt</option>
                                    @endif
                                </select>
                                <label for="floatingSelect">Trạng thái</label>
                            </div>

                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                @endif
                <div class="bg-light rounded h-100 p-4">
                    <h4 class="mb-4">Hiển thị nhận xét</h4>
                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên học viên</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Nhận xét</th>
                            <th scope="col">Khóa học</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">...</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_testimonial as $key => $testimonial)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$testimonial->name}}</td>
                                <td><img width="150px" src="{{asset('uploads/avatar/'.$testimonial->image)}}" alt=""></td>
                                <td>{{$testimonial->content}}</td>
                                <td>{{$testimonial->course->title}}</td>
                                <td>{{$testimonial->status==0?"Ẩn":"Hiển thị"}}</td>
                                <td>
                                    <a href="{{route('testimonial.edit',$testimonial->id)}}" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active"></i></a>
                                    <form action="{{route('testimonial.destroy',$testimonial->id)}}" method="POST">
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
