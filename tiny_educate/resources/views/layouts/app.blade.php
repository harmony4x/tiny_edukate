<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tiny Edukate - Online Education Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('pages/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('pages/css/style.css')}}" rel="stylesheet">
    <style>
        .courses-item img {
            height: 350px !important;
        }

        .courses-list-item img{
            height: 320px;
        }
        .rounded {
            height: 70px;
            width: 70px;
        }
        .text-body {
            font-size: 12px;
        }
    </style>
</head>

<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('pages/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('pages/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('pages/lib/counterup/counterup.min.js')}}"></script>
<script src="{{asset('pages/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
</script>
<script type="text/javascript">
    var onloadCallback = function() {
        // alert("grecaptcha is ready!");
    };
</script>
<!-- Template Javascript -->
<script src="{{asset('pages/js/main.js')}}"></script>
</body>

</html>
