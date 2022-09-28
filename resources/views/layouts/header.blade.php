
<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
        <a href="{{route('index')}}" class="navbar-brand ml-lg-3">
            <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>Tiny Edukate</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="{{route('index')}}" class="nav-item nav-link active">Trang chủ</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Danh mục</a>
                    <div class="dropdown-menu m-0">
                        @foreach($categories as $category)
                        <a href="{{route('category_course',$category->slug)}}" class="dropdown-item">{{$category->title}}</a>
                        @endforeach
                    </div>
                </div>
                <a href="{{route('all_course')}}" class="nav-item nav-link">Khóa học</a>
                <a href="{{route('contact')}}" class="nav-item nav-link">Liên hệ</a>
            </div>
            <a href="{{route('search_score')}}" class="btn btn-primary py-2 px-4 d-none d-lg-block">Tra cứu điểm</a>
        </div>
    </nav>
</div>
<!-- Navbar End -->



