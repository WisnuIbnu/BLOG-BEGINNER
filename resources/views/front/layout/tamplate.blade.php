
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        @stack('meta-seo')
        <title>Ujian Akhir Praktikum </title>
        <!-- Favicon-->
        <link rel="icon" type="image/png" href="{{ asset('front/img/123.png') }}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('front/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet" />
        @stack('css')
    </head>
    <body>
        {{-- Navbar Start --}}
       @include('front.layout.navbar')
        {{-- Navbar End --}}

        {{-- Page Header Start --}}
        @include('front.layout.Page-header')
        {{-- Page Header End --}}

        {{-- Content --}}
        @yield('content')


        {{-- Footer Start --}}
         <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright 2025&copy; WisnuIbnu. All Rights Reserved.</p></div>
        </footer>
        <!-- Footer End-->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('front/js/scripts.js') }}"></script>
        @stack('js')
    </body>
</html>
