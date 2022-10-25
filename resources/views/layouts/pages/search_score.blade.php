@extends('layouts.app')
@section('content')
    <!-- Header Start -->
    <div class="jumbotron jumbotron-image2 jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center my-5 py-5">
            <h1 class="text-black display-4 mt-4 mb-4">&nbsp</h1>
            <h1 class="text-white display-5 mb-5"> &nbsp</h1>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                @include('.layouts.pages.search_template')
            </div>
        </div>
    </div>
    <!-- Header End -->
    <div class="container-fluid px-0 py-5">
        <div class="row justify-content-center bg-image mx-0 mb-5">
            <div class="col-lg-6 py-5">
                <div class="bg-white p-5 my-5">
                    <h1 class="text-center mb-4">Tra cứu điểm thi</h1>
                    <form method="GET" action="{{route('search_score')}}">
                        <div class="form-row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" class="form-control bg-light border-0" name="mssv" placeholder="Nhập vào mã số học viên" style="padding: 30px 20px;" required="required">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-primary btn-block" type="submit" style="height: 60px;">Tra cứu ngay</button>
                            </div>
                        </div>
                    </form>
                    @if(isset($keyword))
                    <h5 class="text-center text-success ">

                        @if(isset($user))
                            @if($user->score!='')
                                Điểm của thí sinh {{$user->name}} là: {{$user->score}}
                            @else
                                Hiện tại học viên chưa có điểm!!!
                            @endif
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
