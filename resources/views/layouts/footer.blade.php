<!-- Footer Start -->
<div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-6 mb-5">
                <a href="{{route('index')}}" class="navbar-brand">
                    <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>Tiny Edukate</h1>
                </a>
                <p class="m-0">Đến với chúng tôi để trải nghiệm chương trình giáo dục hiện đại cùng đội ngũ giảng viên chất lượng. Chúng tôi cam kết sẽ giúp bạn đạt nhiều thành công trên con đường lập nghiệp.</p>
            </div>
            <div class="col-md-6 mb-5">
                <h3 class="text-white mb-4">Đăng ký nhận tin</h3>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Địa chỉ email">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Đăng ký</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">Liên hệ</h3>
                <p><i class="fa fa-map-marker-alt mr-2"></i>{{$contact->location}}</p>
                <p><i class="fa fa-phone-alt mr-2"></i>{{$contact->phone}}</p>
                <p><i class="fa fa-envelope mr-2"></i>{{$contact->email}}</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-twitter"></i></a>
                    <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-facebook-f"></i></a>
                    <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-linkedin-in"></i></a>
                    <a class="text-white" href="#"><i class="fab fa-2x fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">Đường dẫn</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="{{route('index')}}"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>
                    <a class="text-white-50 mb-2" href="{{route('all_course')}}"><i class="fa fa-angle-right mr-2"></i>Tất cả khóa học</a>
                    <a class="text-white-50" href="{{route('contact')}}"><i class="fa fa-angle-right mr-2"></i>Liên hệ</a>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">Khóa học</h3>
                <div class="d-flex flex-column justify-content-start">
                    @foreach($new_courses->take(5) as $course)
                    <a class="text-white-50 mb-2" href="{{$course->slug}}"><i class="fa fa-angle-right mr-2"></i>{{$course->title}}</a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>



<!-- Back to Top -->
<!-- <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a> -->
