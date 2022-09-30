@extends('layouts.app')
@section('content')
    <!-- Header Start -->
    @if(session('message'))
        <div class="alert-success">

            <script>alert("Đăng ký khóa học thành công!")</script>

        </div>
    @endif
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
    <div class="container-fluid px-0 py-5">
        <div class="row justify-content-center  mx-0 mb-5">
            <div class="col-lg-6 py-5">
                <div class="bg-white p-5 my-5 bg-image">
                    <h1 class="text-center mb-4">Đăng ký khóa học</h1>
                    <form method="POST" action="{{route('user.store')}}">
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="email" class="form-control bg-light border-0" value="{{old('email')}}" name="email" placeholder="Email *" style="padding: 30px 20px;" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control bg-light border-0" value="{{old('name')}}" name="name" placeholder="Họ và tên" style="padding: 30px 20px;" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control bg-light border-0" value="{{old('phone')}}" name="phone" placeholder="Số điện thoại" style="padding: 30px 20px;" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="date" class="form-control bg-light border-0" value="{{old('birthday')}}" name="birthday" placeholder="Ngày sinh" style="padding: 30px 20px;" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select class="custom-select bg-light border-0 px-3" style="height: 60px;" required="required" name="course_code">
                                        <option selected disabled>Chọn khóa học</option>
                                        @foreach($new_courses as $course)
                                            <option value="{{$course->course_code}}">{{$course->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="hidden" name="status" value="0">
                                <button class="btn btn-primary btn-block" type="submit" style="height: 60px;" >Đăng ký ngay</button>
                            </div>
                        </div>
                    </form>
                    @if(isset($keyword))
                        <h5 class="text-center text-success ">

                            @if(isset($user))
                                Điểm của thí sinh {{$user->name}} là: {{$user->score}}
                            @else
                                Không tìm thấy kết quả!
                            @endif
                        </h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
