@extends('layouts.app')
@section('content')
    <!-- Header Start -->
    <div class="jumbotron jumbotron-image2 jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center my-5 py-5">
            <h1 class="text-black display-4 mt-4 mb-4">&nbsp</h1>
            <h1 class="text-white display-5 mb-5"> &nbsp</h1>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-light bg-white text-body px-4 dropdown-toggle" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Kỹ Năng</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Cơ bản</a>
                            <a class="dropdown-item" href="#">Nâng cao</a>

                        </div>
                    </div>
                    <input type="text" class="form-control border-light" style="padding: 30px 25px;" placeholder="Từ Khóa...">
                    <div class="input-group-append">
                        <button class="btn btn-secondary px-4 px-lg-5">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Courses Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row mx-0 justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center position-relative mb-5">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Danh mục</h6>
                        <h1 class="display-4"></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($category_courses as $category_course)
                    @foreach($course_details as $course_detail)
                        @if($category_course->course_code == $course_detail->course_code)
                            <div class="col-lg-4 col-md-6 pb-4">
                                <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="{{route('detail',$category_course->slug)}}">
                                    <img style="" class="img-fluid" src="{{asset('uploads/courses/'.$course_detail->image)}}" alt="{{$category_course->title}}">
                                    <div class="courses-text">
                                        <h4 class="text-center text-white px-3">{{$category_course->title}}</h4>
                                        <div class="border-top w-100 mt-3">
                                            <div class="d-flex justify-content-between p-4">
                                                <span class="text-white"><i class="fa fa-user mr-2"></i>{{$course_detail->instructor}}</span>
                                                <span class="text-white"><i class="fa fa-coins mr-2"></i> <small>{{number_format($course_detail->price)}} (VND)</small></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                @endforeach
{{--                <div class="col-12">--}}

{{--                    <span style="display: flex" class="justify-content-center">{!! $category_course->render() !!}</span>--}}
{{--                </div>--}}

            </div>
        </div>
    </div>
    <!-- Courses End -->
@endsection
