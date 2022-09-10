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

    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <div class="section-title position-relative mb-5">
                            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Chi tiết khóa học</h6>
                            <h1 class="display-4">{{$course->title}}</h1>
                        </div>
                        <div>
                            {!! $course->description !!}
                        </div>
                    </div>

                    <h2 class="mb-3">Các khóa học liên quan</h2>
                    @if($related_courses)
                        <div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">
                            @foreach($related_courses as $related_course)
                                @foreach($courses_detail_all as $course)
                                    @if($related_course->course_code == $course->course_code)
                                <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="{{route('detail',$related_course->slug)}}">
                                    <img class="img-fluid" src="{{asset('uploads/courses/'.$course->image)}}" alt="">
                                    <div class="courses-text">
                                        <h4 class="text-center text-white px-3">{{$related_course->title}}</h4>
                                        <div class="border-top w-100 mt-3">
                                            <div class="d-flex justify-content-between p-4">
                                                <span class="text-white"><i class="fa fa-user mr-2"></i>{{$course->instructor}}</span>
                                                <span class="text-white"><i class="fa fa-coins mr-2"></i> <small>{{number_format($course->price)}} (VND)</small></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    @endif

                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="bg-primary mb-5 py-3">
                        <h3 class="text-white py-3 px-4 m-0">Thông tin</h3>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Giảng viên</h6>
                            <h6 class="text-white my-3">{{$course_detail->instructor}}</h6>
                        </div>

                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Bài học</h6>
                            <h6 class="text-white my-3">{{$course_detail->lecture}}</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Thời gian</h6>
                            <h6 class="text-white my-3">{{$course_detail->duration}} tuần</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Kỹ năng</h6>
                            <h6 class="text-white my-3">{{$course_detail->skill_level==0?"Cơ bản":"Nâng cao"}}</h6>
                        </div>
                        <div class="d-flex justify-content-between px-4">
                            <h6 class="text-white my-3">Ngôn ngữ</h6>
                            <h6 class="text-white my-3">{{$course_detail->language}}</h6>
                        </div>
                        <div class="d-flex justify-content-between px-4">
                            <h6 class="text-white my-3">Ngày bắt đầu</h6>
                            <h6 class="text-white my-3">{{$course_detail->start_day}}</h6>
                        </div>
                        <h5 class="text-white py-3 px-4 m-0">Giá tiền: {{number_format($course_detail->price)}} VNĐ</h5>
                        <div class="py-3 px-4">
                            <a class="btn btn-block btn-secondary py-3 px-5" href="">Ghi danh ngay</a>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h2 class="mb-3">Danh mục</h2>
                        <ul class="list-group list-group-flush">
                            @foreach($categories as $category)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">{{$category->title}}</a>
                                <span class="badge badge-primary badge-pill">
                                    @php
                                        $count=0
                                    @endphp
                                    @foreach($new_courses as $course)
                                        @if($category->id==$course->category_id)
                                            @php
                                                $count+=1;
                                            @endphp
                                        @endif
                                    @endforeach
                                    {{$count}}
                                </span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="mb-5">
                        <h2 class="mb-4">Các khóa học mới </h2>
                        @foreach($new_courses->take(4) as $new_course)
                            @foreach($courses_detail_all as $course)
                                @if($new_course->course_code == $course->course_code)
                                    <a class="d-flex align-items-center text-decoration-none mb-4" href="{{$new_course->slug}}">
                                        <img class="img-fluid rounded" src="{{asset('uploads/courses/'.$course->image)}}" alt="">
                                        <div class="pl-3">
                                            <h6>{{$new_course->title}}</h6>
                                            <div class="d-flex">
                                                <small class="text-body mr-3"><i class="fa fa-user text-primary mr-2"></i>{{$course->instructor}}</small>
                                                <small class="text-body"><i class="fa fa-coins text-primary mr-2"></i>{{number_format($course->price)}} (VND)</small>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->
@endsection
