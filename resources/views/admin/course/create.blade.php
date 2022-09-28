@extends('admin.layouts.master')
@section('content')

    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <h3 class="text-center">Khóa học</h3>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                @if(!isset($course_edit))
                    <div class="bg-light rounded  p-4">
                        <h4 class="mb-4">
                            Thêm khóa học
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
                        <form action="{{route('course.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       placeholder="Tên khóa học..." name="title" value="{{old('title')}}" id="slug" onkeyup="ChangeToSlug()">
                                <label for="floatingInput">Tên khóa học</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       id="convert_slug" placeholder="" value="{{old('slug')}}" name="slug">
                                <label for="floatingInput">Slug khóa học</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Mô tả khóa học..."
                                          id="editor" name="description" style="height: 150px;resize: none" >{{old('description')}}</textarea>
{{--                                <label for="floatingTextarea">Mô tả khóa học</label>--}}
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Hình ảnh</label>
                                <input class="form-control" type="file" id="formFile" name="image" value="{{old('image')}}">
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       id="convert_slug" placeholder="Số lượng học viên" value="{{old('quantity')}}" name="quantity">
                                <label for="floatingInput">Số lượng học viên</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       id="convert_slug" placeholder="Người hướng dẫn" value="{{old('instructor')}}" name="instructor">
                                <label for="floatingInput">Người hướng dẫn</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       id="convert_slug" placeholder="Số bài học" value="{{old('lecture')}}" name="lecture">
                                <label for="floatingInput">Số bài học</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       id="convert_slug" placeholder="Thời gian" value="{{old('duration')}}" name="duration">
                                <label for="floatingInput">Thời gian</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control"
                                       id="convert_slug" placeholder="Ngày bắt đầu" value="{{old('start_day')}}" name="start_day">
                                <label for="floatingInput">Ngày bắt đầu</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="skill_level"
                                        aria-label="Floating label select example">
                                    <option selected disabled>- - - - - - - - - -</option>
                                    <option value="0">Cơ bản</option>
                                    <option value="1">Nâng cao</option>
                                </select>
                                <label for="floatingSelect">Trình độ</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       id="convert_slug" placeholder="Ngôn ngữ" value="{{old('language')}}" name="language">
                                <label for="floatingInput">Ngôn ngữ</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       id="convert_slug" placeholder="Giá" value="{{old('price')}}" name="price">
                                <label for="floatingInput">Giá</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="category_id"
                                        aria-label="Floating label select example">
                                    <option selected disabled>- - - - - - - - - -</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Danh mục</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="status"
                                        aria-label="Floating label select example">
                                    <option selected disabled>- - - - - - - - - -</option>
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
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
                        <form action="{{route('course.update',$course_edit->id)}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       placeholder="Tên khóa học..." name="title" value="{{$course_edit->title}}" id="slug" onkeyup="ChangeToSlug()">
                                <label for="floatingInput">Tên khóa học</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       id="convert_slug" placeholder="" value="{{$course_edit->slug}}" name="slug">
                                <label for="floatingInput">Slug khóa học</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Mô tả khóa học..."
                                          id="editor" name="description" style="height: 150px;resize: none">{{$course_edit->description}}</textarea>
{{--                                <label for="floatingTextarea">Mô tả khóa học</label>--}}
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Hình ảnh</label>
                                <input class="form-control" type="file" id="formFile" name="image">
                                <img src="{{asset('uploads/courses/'.$course_edit->course_details->image)}}" alt="">
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       id="convert_slug" placeholder="Số lượng học viên" value="{{$course_edit->quantity}}" name="quantity">
                                <label for="floatingInput">Số lượng học viên</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       id="convert_slug" placeholder="Người hướng dẫn" value="{{$course_edit->course_details->instructor}}" name="instructor">
                                <label for="floatingInput">Người hướng dẫn</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       id="convert_slug" placeholder="Số bài học" value="{{$course_edit->course_details->lecture}}" name="lecture">
                                <label for="floatingInput">Số bài học</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       id="convert_slug" placeholder="Thời gian" value="{{$course_edit->course_details->duration}}" name="duration">
                                <label for="floatingInput">Thời gian</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control"
                                       id="convert_slug" placeholder="Ngày bắt đầu" value="{{$course_edit->course_details->start_day}}" name="start_day">
                                <label for="floatingInput">Ngày bắt đầu</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="skill_level"
                                        aria-label="Floating label select example">
                                    <option selected disabled>- - - - - - - - - -</option>
                                    @if($course_edit->course_details->skill_level==0)
                                        <option selected value="0">Cơ bản</option>
                                        <option value="1">Nâng cao</option>
                                    @else
                                        <option  value="0">Cơ bản</option>
                                        <option selected value="1">Nâng cao</option>
                                    @endif
                                </select>
                                <label for="floatingSelect">Trình độ</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       id="convert_slug" placeholder="Ngôn ngữ" value="{{$course_edit->course_details->language}}" name="language">
                                <label for="floatingInput">Ngôn ngữ</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       id="convert_slug" placeholder="Giá" value="{{$course_edit->course_details->price}}" name="price">
                                <label for="floatingInput">Giá</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="category_id"
                                        aria-label="Floating label select example">
                                    <option disabled>- - - - - - - - - -</option>
                                    @foreach($categories as $category)
                                        @if($category->id == $course_edit->id)
                                            <option selected value="{{$category->id}}">{{$category->title}}</option>
                                        @else
                                            <option  value="{{$category->id}}">{{$category->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Danh mục</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="status"
                                        aria-label="Floating label select example">
                                    @if($course_edit->status==0)
                                        <option disabled>- - - - - - - - - -</option>
                                        <option selected value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    @else
                                        <option disabled>- - - - - - - - - -</option>
                                        <option value="0">Ẩn</option>
                                        <option selected value="1">Hiển thị</option>
                                    @endif
                                </select>
                                <label for="floatingSelect">Trạng thái</label>
                            </div>

                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                @endif
                <div class="bg-light rounded h-100 p-4">
                    <h4 class="mb-4">Hiển thị danh mục</h4>
                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên khóa học</th>
                            <th scope="col">Slug khóa học</th>
                            <th scope="col">Mô tả khóa học</th>
                            <th scope="col">Mã khóa học</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Số lượng đăng ký</th>
                            <th scope="col">Thông tin khóa học</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">...</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_course as $key => $course)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$course->title}}</td>
                                <td>{{$course->slug}}</td>
                                <td>{!! $course->description!!}</td>
                                <td>{{$course->course_code}}</td>
                                <td>{{$course->quantity}}</td>
                                <td>{{$course->sold}}</td>
                                <td><a href="{{route('course.detail',$course->course_code)}}" class="active btn btn-primary" ui-toggle-class="">Chi tiết</a></td>
                                <td>{{$course->status==0?"Ẩn":"Hiển thị"}}</td>
                                <td>
                                    <a href="{{route('course.edit',$course->id)}}" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active"></i></a>
                                    <form action="{{route('course.destroy',$course->id)}}" method="POST">
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
