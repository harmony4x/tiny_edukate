@extends('admin.layouts.master')
@section('content')

    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <h3 class="text-center">Liên hệ</h3>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                @if(!isset($contact_edit))
                    <div class="bg-light rounded  p-4">
                        <h4 class="mb-4">
                            Thêm liên hệ mới
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
                        <form action="{{route('contact.store')}}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control"
                                       placeholder="Email..." name="email" value="{{old('email')}}">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       placeholder="Địa chỉ cửa hàng..." name="location" value="{{old('location')}}">
                                <label for="floatingInput">Địa chỉ cửa hàng</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       placeholder="Số điện thoại" name="phone" value="{{old('phone')}}" id="slug">
                                <label for="floatingInput">Số điện thoại</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       placeholder="Địa chỉ trên google map" name="google_map" value="{{old('google_map')}}">
                                <label for="floatingInput">Địa chỉ trên google map</label>
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
                        <form action="{{route('contact.update',$contact_edit->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control"
                                       placeholder="Email..." name="email" value="{{$contact_edit->email}}">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       placeholder="Địa chỉ cửa hàng..." name="location" value="{{$contact_edit->location}}">
                                <label for="floatingInput">Địa chỉ cửa hàng</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       placeholder="Số điện thoại" name="phone" value="{{$contact_edit->phone}}">
                                <label for="floatingInput">Số điện thoại</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       placeholder="Địa chỉ trên google map" name="google_map" value="{{$contact_edit->google_map}}">
                                <label for="floatingInput">Địa chỉ trên google map</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                @endif
                <div class="bg-light rounded h-100 p-4">
                    <h4 class="mb-4">Hiển thị liên hệ</h4>
                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Số điện thoại</th>

                            <th scope="col">...</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_contact as $key => $contact)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->location}}</td>
                                <td>{{$contact->phone}}</td>

                                <td>
                                    <a href="{{route('contact.edit',$contact->id)}}" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active"></i></a>
                                    <form action="{{route('contact.destroy',$contact->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có muốn xóa hay không?');" style="background: none; border: none; padding: 0"><i class="fa fa-trash text-danger text"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <td colspan="5">{!! $contact->google_map !!}</td>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!-- Form End -->

@endsection
