@extends('admin.layouts.master')
@section('content')

    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <h3 class="text-center">Danh mục</h3>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                @if(!isset($category_edit))
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
                        <form action="{{route('category.store')}}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       placeholder="Tên danh mục..." name="title" value="{{old('title')}}" id="slug" onkeyup="ChangeToSlug()">
                                <label for="floatingInput">Tên danh mục</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       id="convert_slug" placeholder="" value="{{old('slug')}}" name="slug">
                                <label for="floatingInput">Slug danh mục</label>
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
                        <form action="{{route('category.update',$category_edit->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       placeholder="Tên danh mục..." name="title" value="{{$category_edit->title}}" id="slug" onkeyup="ChangeToSlug()">
                                <label for="floatingInput">Tên danh mục</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                       id="convert_slug" placeholder="" value="{{$category_edit->slug}}" name="slug">
                                <label for="floatingInput">Slug danh mục</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="status"
                                        aria-label="Floating label select example">
                                    @if($category_edit->status==0)
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
                    <h4 class="mb-4">Hiển thị danh mục</h4>
                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Slug danh mục</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">...</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_category as $key => $category)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$category->title}}</td>
                                <td>{{$category->slug}}</td>

                                <td>{{$category->status==0?"Ẩn":"Hiển thị"}}</td>
                                <td>
                                    <a href="{{route('category.edit',$category->id)}}" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active"></i></a>
                                    <form action="{{route('category.destroy',$category->id)}}" method="POST">
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
