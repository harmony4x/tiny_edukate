@extends('layouts.app')
@section('content')
    <!-- Header Start -->
    <div class="jumbotron jumbotron-image1 jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center my-5 py-5">
            <h1 class="text-white mt-4 mb-4"> &nbsp</h1>
            <h1 class="text-white display-1 mb-5"> &nbsp</h1>
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


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{asset('pages/img/anh1.jpg')}}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Chọn chúng tôi?</h6>
                        <h1 class="display-4">Tại sao lại chọn Tiny Edukate</h1>
                    </div>
                    <p>Với nhiều năm hình thành va phát triển Tiny Edukate đã tổ chức hơn 200+ các khóa học online và offline. Tiny Edukate mang đến hệ thống trải nghiệm đa dạng, phong phú và hữu ích, giúp người học có nhiều trải nghiệm, chủ động trang bị năng lực để có thể thích ứng với các môi trường làm việc.</p>
                    <div class="row pt-3 mx-0">
                        <div class="col-3 px-0">
                            <div class="bg-success text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up">200</h1>
                                <h6 class="text-uppercase text-white">Khóa học<span class="d-block">Đa dạng</span></h6>
                            </div>
                        </div>
                        <div class="col-3 px-0">
                            <div class="bg-primary text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up">3</h1>
                                <h6 class="text-uppercase text-white">Cơ sở<span class="d-block">đào tạo</span></h6>
                            </div>
                        </div>
                        <div class="col-3 px-0">
                            <div class="bg-secondary text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up">92.1</h1>
                                <h6 class="text-uppercase text-white">Cơ hội<span class="d-block">Việc làm</span></h6>
                            </div>
                        </div>
                        <div class="col-3 px-0">
                            <div class="bg-warning text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up">1000</h1>
                                <h6 class="text-uppercase text-white">Học viên<span class="d-block"></span>Tham gia</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-image" style="margin: 90px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 my-5 pt-5 pb-lg-5">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Về chúng tôi</h6>
                        <h1 class="display-4">Tiny Edukate</h1>
                    </div>
                    <p class="mb-4 pb-2">Bắt đầu chuyển đổi hoặc nâng cao sự nghiệp của bạn với nhiều khóa học, chứng chỉ chuyên nghiệp và bằng cấp từ trường đại học. Với triết lý đào tạo <strong>"Thực học - Thực nghiệp"</strong> Tiny Edukate hướng tới đào tạo nguồn nhân lực chất lượng cao với phương pháp giảng dạy qua dự án thật.</p>
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-primary mr-4">
                            <i class="fa fa-2x fa-graduation-cap text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Sứ mệnh</h4>
                            <p>Cung cấp năng lực cạnh tranh cho đông đảo người học, góp phần mở rộng tri thức việt.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-secondary mr-4">
                            <i class="fa fa-2x fa-certificate text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Triết lý giáo dục</h4>
                            <p>Giáo dục đào tạo là tổ chức là quản trị việc tự học của người học.</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="btn-icon bg-warning mr-4">
                            <i class="fa fa-2x fa-book-reader text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Văn hóa</h4>
                            <p class="m-0">Tôn trong, Đổi mới, Đồng đội, Chí công, Gương mẫu, Sáng suốt,<strong><br> Học thật, thi thật, thành công thật<br>Làm khác để làm tốt</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{asset('pages/img/feature.jpg')}}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Start -->


    <!-- Courses Start -->
    <div class="container-fluid px-0 py-5">
        <div class="row mx-0 justify-content-center pt-5">
            <div class="col-lg-6">
                <div class="section-title text-center position-relative mb-4">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Khóa học mới</h6>
                    <h1 class="display-4">Các khóa học mới cập nhật</h1>
                </div>
            </div>
        </div>
        <div class="owl-carousel courses-carousel">
            @foreach($new_courses->take(6) as $new_course)
                @foreach($course_details as $course_detail)
                    @if($new_course->course_code == $course_detail->course_code)
                    <div class="courses-item position-relative">
                        <img class="img-fluid" src="{{asset('uploads/courses/'.$course_detail->image)}}" alt="{{$new_course->title}}">
                        <div class="courses-text">
                            <h4 class="text-center text-white px-3">{{$new_course->title}}</h4>
                            <div class="border-top w-100 mt-3">
                                <div class="d-flex justify-content-between p-4">
                                    <span class="text-white" style="font-size: 13px"><i class="fa fa-user mr-2"></i>{{$course_detail->instructor}}</span>
                                    <span class="text-white"><i class="fa fa-coins mr-2"></i> <small>{{number_format($course_detail->price)}} (VND)</small></span>
        {{--                            <span class="text-white"><i class="fa fa-star mr-2"></i>4.5 <small>(250)</small></span>--}}

                                </div>
                            </div>
                            <div class="w-100 bg-white text-center p-4" >
                                <a class="btn btn-primary" href="{{route('detail',$new_course->slug)}}">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="row justify-content-center bg-image mx-0 mb-5">
            <div class="col-lg-6 py-5">
                <div class="bg-white p-5 my-5">
                    <h1 class="text-center mb-4">Giảm giá 30% cho thành viên mới</h1>
                    <form>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="email" class="form-control bg-light border-0" placeholder="Email *" style="padding: 30px 20px;" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Số điện thoại *" style="padding: 30px 20px;" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select class="custom-select bg-light border-0 px-3" style="height: 60px;" required="required">
                                        <option selected disabled>Chọn khóa học</option>
                                        @foreach($new_courses as $course)
                                        <option value="{{$course->id}}">{{$course->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-primary btn-block" type="submit" style="height: 60px;" >Đăng ký ngay</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->



    <!-- Testimonial Start -->
    <div class="container-fluid bg-image py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Nhận xét</h6>
                        <h1 class="display-4">Học viên nói về Tiny Edukate</h1>
                    </div>
                    <p class="m-0">Sau khi đã học tập và làm việc cùng với chúng tôi, các học viên đã nói gì?</p>
                </div>
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel">
                        @foreach($testimonials as $testimonial)
                        <div class="bg-white p-5">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <p>{{$testimonial->content}}</p>
                            <div class="d-flex flex-shrink-0 align-items-center mt-4">
                                <img class="img-fluid mr-4" src="{{asset('uploads/avatar/'.$testimonial->image)}}" alt="">
                                <div>
                                    <h5>{{$testimonial->name}}</h5>
                                    <span>{{$testimonial->course->title}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Start -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="bg-light d-flex flex-column justify-content-center px-5" style="height: 450px;">
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-primary mr-4">
                                <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Địa chỉ liên hệ</h4>
                                <p class="m-0">{{$contact->location}}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-secondary mr-4">
                                <i class="fa fa-2x fa-phone-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Số điện thoại</h4>
                                <p class="m-0">{{$contact->phone}}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="btn-icon bg-warning mr-4">
                                <i class="fa fa-2x fa-envelope text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Email</h4>
                                <p class="m-0">{{$contact->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Nếu bạn cần giúp đỡ</h6>
                        <h1 class="display-5">Hãy nhắn tin cho chúng tôi</h1>
                    </div>
                    <div class="contact-form">
                        <form>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Tên của bạn" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="email" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Email" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Khóa học" required="required">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control border-top-0 border-right-0 border-left-0 p-0" rows="5" placeholder="Tin nhắn" required="required"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit">Gửi tin nhắn</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
