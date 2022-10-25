@extends('layouts.app')
@section('content')
    <!-- Header Start -->
    <div class="jumbotron jumbotron-image2 jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center my-5 py-5">
            <h1 class="text-black display-4 mt-4 mb-4">&nbsp</h1>
            <h1 class="text-white display-5 mb-5"> &nbsp</h1>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                    @include('.layouts.pages.search_template')
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
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Khóa học</h6>
                        <h1 class="display-4">Các khóa học hiện có</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($new_courses as $new_course)
                    @foreach($course_details as $course_detail)
                        @if($new_course->course_code == $course_detail->course_code)
                            <div class="col-lg-4 col-md-6 pb-4">
                                <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="{{route('detail',$new_course->slug)}}">
                                    <img style="" class="img-fluid" src="{{asset('uploads/courses/'.$course_detail->image)}}" alt="{{$new_course->title}}">
                                    <div class="courses-text">
                                        <h4 class="text-center text-white px-3">{{$new_course->title}}</h4>
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
                <div class="col-12">

                    <span style="display: flex" class="justify-content-center">{!! $new_courses->render() !!}</span>
                </div>

            </div>
        </div>
    </div>
    <!-- Courses End -->
@endsection
